
<?php
// CONTENT: Send mail validator
// INPUT: request, id_manager, language
// OUTPUT: Send mail validator 
?>
<?php

//====================== Get infor manager ========================

$request = $_POST["request"]??"";
$language_th= $_POST['language_th']??"";
$mail= $_POST['mail']??"";
$deadline = $_POST['deadline']??"";
$id_manager = $_SESSION['ID'];
$link_file_json_manager = "../../../Data/UserData/".$id_manager."/".$request.".json";
$jsonString = file_get_contents($link_file_json_manager);
$jsonData = json_decode($jsonString, true);

$url="http//";

$mgr_name=$jsonData["mgr"]['name'];
$mgr_sect=$jsonData['mgr']['sect'];
$mgr_mail=$jsonData['mgr']['mail'];
$mgr_company=$jsonData['mgr']['company'];;

$creator_name=$jsonData['creator']['name'];
$creator_sect=$jsonData['creator']['sect'];
$creator_company=$jsonData['creator']['company'];

$validator_name=$jsonData["validator"]['name'];
$validator_sect=$jsonData['validator']['sect'];
$validator_mail=$jsonData['validator']['mail'];
$validator_company=$jsonData['validator']['company'];;

$pw=$jsonData['password'];

$jsonData['deadline']= $deadline ;
$jsonData['mail']= $mail ;

// 2. CREATE AND SEND MAIL VALIDATOR
require "../../send_mail.php";
$mail_sender = "email";
$name_receiver = $_SESSION['name'];
$mail_receiver = "email";

$subject_request = "Validator Request".$request;
$htmlBody_request = "<h2>To: ".$validator_name. "</h2>"
                                ."<br>"
                                ."The below Validator request has been sent to you, so please check it!"
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

//2.1.2 SEND MAIL REQUEST TO VALIDATOR
Send_Mail($subject_request, $htmlBody_request, $mail_sender, $mail_receiver);

//2.1.3 SEND MAIL REQUEST PASSWORD TO VALIDATOR 
$subject_request = " Password of Validator Request".$request;
$htmlBody_request = "<h2>To: ".$validator_name. "</h2>"
                                ."<br>"
                                ."Password: ".$pw
                                ."<h3>Request Number: ".$request."_".$language_th."</h3>"
                                ."<p>Don't return to the sender of this mail.</p>"; 

//2.1.2 SEND MAIL REQUEST TO VALIDATOR
Send_Mail($subject_request, $htmlBody_request, $mail_sender, $mail_receiver);

//===============Save request Manage to Db ========
include "MySql.php";
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");
//===== Lay id cua M ==========
$query= $qr->select_id_manager($db, "user", $validator_mail);
$result=$db->get_data($query);
if (!$result)
        {
                die ('Query wrong !');
        }
else
        {
                //nothing to do 
        }

while ($row = mysqli_fetch_assoc($result))
        {
                $id_validator=$row['id'];
        };
// get last row  table request

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

        function count_requestnumber($qr, $db, $request, $id_validator)
                {
                        $query= $qr->count_requestnumber_check($db, "request", $request, $id_validator);
                        $result=$db->get_data($query);
                        while ($row = mysqli_fetch_assoc($result))
                                {
                                        $count_requestnumber=$row['COUNT(requestnumber)'];
                                };
                        return $count_requestnumber;
                }

        function update_request_before_send($qr, $db, $deadline, $request)
                {
                        $query= $qr->update_request($db, "request", $deadline, $request);
                        $db->get_data($query);
                }

        $count_requestnumber_check = count_requestnumber($qr, $db, $request, $id_validator);
      
        if($count_requestnumber_check == 0)
                {
                        add_request($qr, $db, $id, $request, "Open", $creator_name, $date, $time, $id_validator);
                }
        else
                {   
                        update_request_before_send($qr, $db, $deadline, $request);
                }
                
        // ======== save folder cua validator ============
        $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
        $link_file_json_validator = "../../../Data/UserData/".$id_validator."/".$request.".json";

        if (file_put_contents($link_file_json_validator, $jsonString)) 
                {
                        echo "Send request successfully.". $link_file_json_validator;
                }
        else
                {
                        echo "Fail to send mail";

                }
?>
