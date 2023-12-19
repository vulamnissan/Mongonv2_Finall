
<?php
// CONTENT: CREATOR SEND MAIL TO MANAGER
// INPUT: $path
// OUTPUT: SEND MAIL TO MANAGER, INSERT DATABASE, CREATE FILE JSON IN FOLDER MANAGER

        // 1. INPUT HANDLE
        //1.1 INPUT FROM POST
        $path=$_POST["link_file"]??"";
        $arr_path=explode("/",$path);
        $request=$arr_path[count($arr_path)-1];
        $request=str_replace(".json","",$request);
        $url="http//";

        //1.2 INPUT FROM FILE JSON
        $jsonString = file_get_contents($path);
        $jsonData = json_decode($jsonString, true);

        $mgr_name=$jsonData["mgr"]['name'];
        $mgr_sect=$jsonData['mgr']['sect'];
        $mgr_mail=$jsonData['mgr']['mail'];
        $mgr_company=$jsonData['mgr']['company'];;

        $creator_name=$jsonData['creator']['name'];
        $creator_sect=$jsonData['creator']['sect'];
        $creator_company=$jsonData['creator']['company'];

        $pw=$jsonData['password'];

        $time=$jsonData['date'];
        require "../../send_mail.php";

        // 2. CREATE AND SEND MAIL

        $mail_sender = "email";
        $name_receiver = $_SESSION['name'];
        $mail_receiver = "email";

        // 2.1.1 CREATE MAIL REQUEST
        $subject_translate_request = "Translation Request ".$request;
        $htmlBody_translate_request = "<h2>To: ".$mgr_name. "</h2>"
                                        ."<p>The below translation request has been sent to you, so please check it!</p>"
                                        ."<br>"
                                        ."<h3>Request Number: ".$request."</h3>"
                                        ."<p>Receiver Engineering Contact Information:</p>"
                                        ."<p>==================================================</p>"
                                        ."<p>Company Name: ".$mgr_company." </p>"
                                        ."<p>User Name: ".$mgr_name."</p>"
                                        ."<p>Department Code: ".$mgr_sect."</p>"
                                        ."<p>Sender Engineering Contact Information:</p>"
                                        ."<p>==================================================</p>"
                                        ."<p>Company Name: ".$creator_company."</p>"
                                        ."<p>User Name: ".$creator_name."</p>"
                                        ."<p>Department Code: ".$creator_sect."</p>";    
        Send_Mail($subject_translate_request,$htmlBody_translate_request,$mail_sender,$mail_receiver);
        
        //2.2.1 CREATE MAIL PASSWORD
        $subject_pass = "Translation Request ".$request;
        $htmlBody_pass = "<h2>To: ".$mgr_name. "</h2>"
                        ."<p>The below translation request has been sent to you, so please check it!</p>"
                        ."<br>"
                        ."<h3>Password: ".$pw."</h3>"
                        ."<p>Receiver Engineering Contact Information:</p>"
                        ."<p>==================================================</p>"
                        ."<p>Company Name: ".$mgr_company." </p>"
                        ."<p>User Name: ".$mgr_name."</p>"
                        ."<p>Department Code: ".$mgr_sect."</p>"
                        ."<p>Sender Engineering Contact Information:</p>"
                        ."<p>==================================================</p>"
                        ."<p>Company Name: ".$creator_company."</p>"
                        ."<p>User Name: ".$creator_name."</p>"
                        ."<p>Department Code: ".$creator_sect."</p>";  
        // Create the email draft
        Send_Mail($subject_pass,$htmlBody_pass,$mail_sender,$mail_receiver);
        
        //3. iNSERT DATABASE
        include "MySql.php";
        $db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
        $qr= new Query("mongonv2");
        //3.1 GET DATA FROM DATABASE
        //3.1.1 GET ID OF TRANSLATOR
        $result= $qr->select_id_manager($db,"user",$mgr_mail);
        if (!$result)
                {
                        die ('Query Wrong');
                }
        else
                {
                        //nothing to do
                }

        while ($row = mysqli_fetch_assoc($result))
                {
                        $id_manager=$row['id'];
                };

        //3.1.2 GET LAST ROW OF TABLE REQUEST
        function get_count_request($qr,$db)
                {
                        $result= $qr->count_data($db,"request");
                        while ($row = mysqli_fetch_assoc($result))
                                {
                                        $last_row=$row['count(*)']; 
                                };
                                
                        if ($last_row===0)
                                {
                                        return 1;
                                }
                        else
                                {
                                        return $last_row+1;
                                }
                }

        //3. INSERT TABLE REQUEST
        $last_request=get_count_request($qr,$db);
        $id=$last_request;
        function add_request($qr,$db,$id,$rq,$stt,$creator,$date,$dl,$user)
                {
                        $query= $qr->insert_request($db,"request",$id,$rq,$stt,$creator,$date,$dl,$user);
                }
        add_request($qr,$db,$id,$request,"Open",$creator_name,$time,$dl,$id_manager);

        // 4. SAVE FILE JSON TO FOLDER MANAGER
        $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
        if (file_put_contents("../../../Data/UserData/".$id_manager."/".$request.".json",$jsonString)) 
            {
                echo "Mail send complete ";
            }
        else
            {
                echo "Fail to send mail";
            }
?>
