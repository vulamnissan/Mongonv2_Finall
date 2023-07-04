<?php
session_start();
?>
<?php


$request = $_POST["request"]??"";
$id_manager = $_COOKIE['ID'];
$link_file_json_manager = "../../../Data/UserData/".$id_manager."/".$request.".json";
    $jsonString = file_get_contents($link_file_json_manager);
    $jsonData = json_decode($jsonString, true);

    // $id=($_GET["id"]??"");
    // $request=($_GET["rq"]??"");
    // $path = str_replace(" ","",'../../../Data/UserData/'.$id.'/'.$request.'.json');

    // =========================Gui mail======================
    // $jsonString = file_get_contents($path);
    // $jsonData = json_decode($jsonString, true);
    
    $mgr_name=$jsonData["mgr"]['name'];
    $mgr_sect=$jsonData['mgr']['sect'];
    $mgr_mail=$jsonData['mgr']['mail'];
    $mgr_company=$jsonData['mgr']['company'];

    $creator_name=$jsonData['creator']['name'];
    $creator_sect=$jsonData['creator']['sect'];
    $creator_company=$jsonData['creator']['company'];
    $creator_mail=$jsonData['creator']['mail'];

    // $pw=$jsonData['password'];

    // $time=$jsonData['date'];

    // mail to manager
    $subject = "Reject Translation Request ".$request;
    $body = "To: ".$creator_name. "
            \n
            \n The below translation request has been sent to you, so please check it!
            \n Request Number: ".$request."
            \n
            \n Receiver Engineering Contact Information:
            \n==================================================
            \n Company Name: ".$mgr_company." 
            \n User Name: ".$mgr_name."
            \n Department Code: ".$mgr_sect."
            \n
            \n Sender Engineering Contact Information:
            \n==================================================
            \n Company Name: ".$creator_company." 
            \n User Name: ".$creator_name."
            \n Department Code: ".$creator_sect."";

    // $attachmentPath = "test123.json";

    $emailDraft = "mailto:?subject=" . $string = str_replace("+", " ", urlencode($subject)) . "&body=" . $string1 = str_replace("+", " ", urlencode($body)) . "&to=" . $creator_mail;

    // Open the email draft in Outlook
    $command = 'open "' . $emailDraft . '"';
    shell_exec($command);
    // echo $link_file_json_manager;
    // =========================Xoa file json=====================
    $status=unlink($link_file_json_manager);
    // =========================Xoa file database=====================
    if ($status)
    {
        echo "Successfully reject request";
    }
    else
    {
        echo "Error when rejecting";
    }
?>