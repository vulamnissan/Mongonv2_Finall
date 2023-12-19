
<?php
    //CONTENT: TRANSLATOR SEND MAIL TO MANAGER
    //INPUT: $id(TRANSLATOR), $request, $url
    //OUTPUT:  SEND MAIL TO MANAGER, SAVE FILE IN FOLDER MANAGEMENT
    try
    {
        //1. INPUT HANDLE
        // 1.1 INPUT FROM POST
        $id=($_POST["id"]??"");
        $request=($_POST["rq"]??"");
        $path = str_replace(" ","",'../../../Data/UserData/'.$id.'/'.$request.'.json');
        $arr_path=explode("/",$path);
        $request=$arr_path[count($arr_path)-1];
        $request=str_replace(".json","",$request);

        //?????????????????????
        $url="https://";
        //????????????????????
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
        $creator_mail=$jsonData['creator']['mail'];

        $translator_name=$jsonData['translator']['name'];
        $translator_sect=$jsonData['translator']['sect'];
        $translator_company=$jsonData['translator']['company'];
        $translator_mail=$jsonData['translator']['mail'];
	$jsonData['name_request']=$request;
        $pw=$jsonData['password'];

        $time=$jsonData['date'];

        // 2. CREATE AND SEND MAIL
        require "../../send_mail.php";
        $mail_sender = "email";
        $name_receiver = $_SESSION['name'];
        $mail_receiver = "email";

        //2.1.1 CREATE MAIL REQUEST
        $subject_translate_request = "Completed: Translation Request ".$request;
        $htmlBody_translate_request = "<h2>To: ".$translator_name. "</h2>"
                                        ."<br>"
                                        ."<h3>Translation Request ".$request." has been complete</h3>"
                                        ."<p>Click the following URL</p>"
                                        ."<p>Don't return to the sender of this mail.</p>"; 
        Send_Mail($subject_translate_request,$htmlBody_translate_request,$mail_sender,$mail_receiver);

        //2.1.2 SEND MAIL REQUEST TO MANAGER
        //3. iNSERT DATABASE
        include "MySql.php";
        $db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
        $qr= new Query("mongonv2");

         //3.1 GET LAST ROW OF TABLE REQUEST
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

        //4. INSERT TABLE REQUEST
        $last_request=get_count_request($qr,$db);
        $id=$last_request;
        function add_request($qr,$db,$id,$rq,$stt,$creator,$date,$dl,$user)
                {
                        $query= $qr->insert_request($db,"request",$id,$rq,$stt,$creator,$date,$dl,$user);             
                }
        //CHANGE STATUS REQUEST AFTER TRANSLATE COMPLETE

        function change_status_rq($qr,$db,$rq)
                {
                        $date_issue_arr = getdate();
                        $date_issue = $date_issue_arr['mday']."/".$date_issue_arr['mon']."/".$date_issue_arr['year'];
                        $query= $qr->change_status_request($db,$rq,$date_issue);
                }
        change_status_rq($qr,$db,$request);
	add_request($qr,$db,$id,$request,"Open",$creator_name,$time,$dl,"0");

        // 5. SAVE FILE JSON TO FOLDER MANAGEMENT
        $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
        file_put_contents(str_replace(" ","","../../../Data/UserData/0/".$request.".json"),$jsonString);
        //6. SAVE FILE JSON TO CREATOR
        $result= $qr->select_id_manager($db,"user",$creator_mail);
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
                        $id_user=$row['id'];
                };
        file_put_contents(str_replace(" ","","../../../Data/UserData/".$id_user."/".$request.".json"),$jsonString);
        echo " Send mail complete.";
        
    }
    catch(Exception $e)
        {
                echo "Fail to send mail";
        }

?>
