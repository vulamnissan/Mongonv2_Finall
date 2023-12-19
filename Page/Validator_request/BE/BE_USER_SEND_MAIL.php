
<?php
// CONTENT: user send mail
// INPUT: $request
// OUTPUT: user send mail
// session_start();
?>

<?php

//======================  send manager ========================
    $flag= $_POST['flag']??"";
    $link_file_json_add= $_POST['link_file_json_add']??"";
    $language_th= $_POST['language_th']??"";
    $mail= $_POST['mail']??"";
    $deadline = $_POST['deadline']??"";
    if($flag == "1")
        {
            $request = $_POST['request'];
            $link_file_json= "../../../Data/UserData/". $_SESSION['ID'] ."/".$request .".json";
        }
    if($flag == "0")
        {
            $request = $_SESSION['request'];
            $link_file_json = $_SESSION['link_file_json'];
        }

$link_file_json_add = explode(".json",  $link_file_json_add);
$link_file_json_add=$link_file_json_add[0].".json";
$jsonString = file_get_contents($link_file_json_add);
$jsonData = json_decode($jsonString,  true);
$url="http//";
$mgr_name=$jsonData["mgr"]['name'];
$mgr_sect=$jsonData['mgr']['sect'];
$mgr_mail=$jsonData['mgr']['mail'];
$mgr_company=$jsonData['mgr']['company'];;

$creator_name=$jsonData['creator']['name'];
$creator_sect=$jsonData['creator']['sect'];
$creator_company=$jsonData['creator']['company'];

$pw=$jsonData['password'];



$jsonData['deadline']= $deadline ;
$jsonData['mail']= $mail ;

// 2. CREATE AND SEND MAIL MANAGER
require "../../send_mail.php";
$mail_sender = "email";
$name_receiver = $_SESSION['name'];
$mail_receiver = "email";

$subject_request = "Validator Request".$request;
$htmlBody_request = "<h2>To: ".$mgr_name. "</h2>"
                                ."<br>"
                                ."The below Validator request has been sent to you,  so please check it!"
                                ."<h3>Request Number: ".$request."_".$language_th."</h3>"
                                ."<p>Don't return to the sender of this mail.</p>"  
                                ."</br>"                                     
                                ."Receiver Engineering Contact Information:"
                                ."<p>==================================================</p>"                                      
                                ."<p>Company Name: ".$mgr_company."</p>"
                                ."<p>User Name: ".$mgr_name."</p>"
                                ."<p>Department Code: ".$mgr_sect."</p>"
                                ."</br>"    
                                ."Sender Engineering Contact Information:"
                                ."<p>==================================================</p>"  
                                ."<p>Sender Company: ".$creator_company." </p>"
                                ."<p>Sender User: ".$creator_name."</p>"
                                ."<p>Department Code: ".$creator_sect."</p>"; 

//2.1.2 SEND MAIL REQUEST TO MANAGER
Send_Mail($subject_request, $htmlBody_request, $mail_sender, $mail_receiver);

//2.1.3 SEND MAIL REQUEST PASSWORD TO MANAGER 
$subject_request = " Password of Validator Request".$request;
$htmlBody_request = "<h2>To: ".$mgr_name. "</h2>"
                                ."<br>"
                                ."Password: ".$pw
                                ."<h3>Request Number: ".$request."_".$language_th."</h3>"
                                ."<p>Don't return to the sender of this mail.</p>"  
                                ."</br>"
                                ."Receiver Engineering Contact Information:"
                                ."<p>==================================================</p>"
                                ."<p>Company Name: ".$mgr_company."</p>"
                                ."<p>User Name: ".$mgr_name."</p>"
                                ."<p>Department Code: ".$mgr_sect."</p>"
                                ."</br>"
                                ."Sender Engineering Contact Information:"
                                ."<p>==================================================</p>"  
                                ."<p>Sender Company: ".$creator_company." </p>"
                                ."<p>Sender User: ".$creator_name."</p>"
                                ."<p>Department Code: ".$creator_sect."</p>"; 

//2.1.2 SEND MAIL REQUEST TO MANAGER
Send_Mail($subject_request, $htmlBody_request, $mail_sender, $mail_receiver);
//===============Save reauest M into Db ========
    include "MySql.php";
    $db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
    $qr= new Query("mongonv2");
        //===== get id M ==========
        $query= $qr->select_id_manager($db, "user", $mgr_mail);
        $result=$db->get_data($query);
        if (!$result)
            {
                die ('Câu truy vấn bị sai');
            }
        else
            {
                //nothing to do
            }

        while ($row = mysqli_fetch_assoc($result))
        {
                $id_manager=$row['id'];
                
        };

        function get_count_request($qr, $db)
        {
            $query= $qr->count_data($db, "request");
            $result=$db->get_data($query);
            while ($row = mysqli_fetch_assoc($result))
                {
                    
                    $last_row=$row['MAX(id)']; 
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

        $last_request=get_count_request($qr, $db);
        $id=$last_request;
        $time=$jsonData['deadline'];
        $date = $jsonData['date'];
        function add_request($qr, $db, $id, $rq, $stt, $creator, $date, $dl, $user)
            {
                $query= $qr->insert_request($db, "request", $id, $rq, $stt, $creator, $date, $dl, $user);
                $db->get_data($query);
            }
        function count_requestnumber($qr, $db, $request, $id_manager)
            {
                $query= $qr->count_requestnumber_check($db, "request", $request, $id_manager);
                $result=$db->get_data($query);
                while ($row = mysqli_fetch_assoc($result))
                {
                    $count_requestnumber=$row['COUNT(requestnumber)'];
                };
                return $count_requestnumber;
            }

        function update_request_before_send($qr, $db, $deadline, $request)
            {
                    $query= $qr->update_request($db,  "request",  $deadline, $request);
                    $db->get_data($query);
            }

        $count_requestnumber_check = count_requestnumber($qr, $db, $request."_".$language_th, $id_manager);
        if ($count_requestnumber_check == 0)
            {
                add_request($qr, $db, $id, $request."_".$language_th, "Open", $creator_name, $date, $time, $id_manager);
            }
        else 
            {
                update_request_before_send($qr, $db, $deadline, $request."_".$language_th);
            }
 
        $link_file_json_manager = "../../../Data/UserData/".$id_manager."/".$request."_".$language_th.".json";

        $jsonString = json_encode($jsonData,  JSON_PRETTY_PRINT);
        if (file_put_contents($link_file_json_manager, $jsonString)) 
            {
                    echo "Send request successfully.";
            }
        else
            {   
                    echo "Fail to send mail";
            }
?>


