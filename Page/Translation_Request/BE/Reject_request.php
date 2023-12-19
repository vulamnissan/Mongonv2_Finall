<?php
    // CONTENT: MANAGER REJECT REQUET OF CREATOR
    // INPUT: $id(MANAGER),$request
    // OUPUT: DELETE FILE JSON AND SEND MAIL REJECT TO CREATOR
    
    //1. INPUT HANDLE
    // 1.1 INPUT FROM GET
    $id=($_GET["id"]??"");
    $request=($_GET["rq"]??"");
    $path = str_replace(" ","",'../../../Data/UserData/'.$id.'/'.$request.'.json');

    //1.2 INPUT FROM FILE JSON
    $jsonString = file_get_contents($path);
    $jsonData = json_decode($jsonString, true);
    
    $mgr_name=$jsonData["mgr"]['name'];
    $mgr_sect=$jsonData['mgr']['sect'];
    $mgr_mail=$jsonData['mgr']['mail'];
    $mgr_company=$jsonData['mgr']['company'];

    $creator_name=$jsonData['creator']['name'];
    $creator_sect=$jsonData['creator']['sect'];
    $creator_company=$jsonData['creator']['company'];
    $creator_mail=$jsonData['creator']['mail'];

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

    //3.2 DELETE FILE JSON
    $status=unlink($path);
    if ($status)
    {
        echo "Successfully reject request";
    }
    else
    {
        echo "Error when rejecting";
    }
?>
