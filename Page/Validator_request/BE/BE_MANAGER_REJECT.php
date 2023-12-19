
<?php
// CONTENT: Reject mail
// INPUT: link_file_json_manager
// OUTPUT: save file josn_add 

$request = $_POST["request"]??"";
$id_manager = $_SESSION['ID'];
$link_file_json_manager = "../../../Data/UserData/".$id_manager."/".$request.".json";
    $jsonString = file_get_contents($link_file_json_manager);
    $jsonData = json_decode($jsonString, true);

    // =========================send mail======================

    $mgr_name=$jsonData["mgr"]['name'];
    $mgr_sect=$jsonData['mgr']['sect'];
    $mgr_mail=$jsonData['mgr']['mail'];
    $mgr_company=$jsonData['mgr']['company'];

    $creator_name=$jsonData['creator']['name'];
    $creator_sect=$jsonData['creator']['sect'];
    $creator_company=$jsonData['creator']['company'];
    $creator_mail=$jsonData['creator']['mail'];

    // mail to manager
    // 2. CREATE AND SEND MAIL
    require "../../send_mail.php";
    $mail_sender = "email";
    $name_receiver = $_SESSION['name'];
    $mail_receiver = "email";

    $subject_request = "Reject for additional information :".$request;
    $htmlBody_request = "<h2>To: ".$creator_name. "</h2>"
                                    ."<br>"
                                    ."<h3>The below request for additional information can't approved, so please check the contents again.</h3>"
                                    ."Request Number: ".$request.""
                                    ."<p>Don't return to the sender of this mail.</p>"  
                                    ."</br>"; 

    //2.1.2 SEND MAIL REQUEST TO MANAGER
    Send_Mail($subject_request,$htmlBody_request,$mail_sender,$mail_receiver);  
    // =========================delete file json=====================
    $status=unlink($link_file_json_manager);
    // =========================delete file database=====================
    if ($status)
        {
            echo "Successfully reject request";
        }
    else
        {
            echo "Error when rejecting";
        }
?>
