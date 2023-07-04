
<?php
session_start();
?>
<?php

//====================== Lay thong tin manager ========================

// $request=$_SESSION['request'];
// $id_manager = $_SESSION['id_manager'];
// $link_file_json_manager = $_SESSION['link_file_json_manager'];
$request = $_POST["request"]??"";
$language = $_POST["language"]??"";
$id_manager = $_COOKIE['ID'];
$link_file_json_manager = "../../../Data/UserData/".$id_manager."/".$request.".json";
$link_file_json_add = "../../../Data/UserData/".$id_manager."/".$request."_add.json";
$jsonString = file_get_contents($link_file_json_manager);
$jsonData = json_decode($jsonString, true);
$jsonString_add = file_get_contents($link_file_json_add);
$jsonData_add = json_decode($jsonString_add, true);
$validator_mail_language=$jsonData_add[$language]['mail'];
// echo ($validator_mail_language);
$url="http//";
// echo ($link_file_json_manager);

// $jsonString = file_get_contents($path);
// $jsonData = json_decode($jsonString, true);

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

$time=$jsonData['date'];

// mail to manager
$subject = "Validator Request ".$request;
$body = "To: ".$mgr_name. "
        \n
        \n The below translation request has been sent to you, so please check it!
        \n URL: ".$url."
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

$emailDraft = "mailto:?subject=" . $string = str_replace("+", " ", urlencode($subject)) . "&body=" . $string1 = str_replace("+", " ", urlencode($body)) . "&to=" . $validator_mail_language;

// Open the email draft in Outlook
$command = 'open "' . $emailDraft . '"';
shell_exec($command);


// Mail password
$subject = "Validator Request ".$request;
$body = "To: ".$validator_name. "
        \n
        \n Password: ".$pw."
        \n Receiver Engineering Contact Information:
        \n==================================================
        \n Company Name: ".$validator_company." 
        \n User Name: ".$validator_name."
        \n Department Code: ".$validator_sect."
        \n
        \n Sender Engineering Contact Information:
        \n==================================================
        \n Company Name: ".$mgr_company." 
        \n User Name: ".$mgr_name."
        \n Department Code: ".$mgr_sect."";


// Create the email draft
$emailDraft = "mailto:?subject=" . $string = str_replace("+", " ", urlencode($subject)) . "&body=" . $string1 = str_replace("+", " ", urlencode($body)) . "&to=" . $validator_mail_language;

// Open the email draft in Outlook
$command = 'open "' . $emailDraft . '"';
shell_exec($command);        

// echo ("asdads");

//===============Luu reauest cua M vao Db ========
        include "MySql.php";
    $db = new connect_DB("localhost","mongonv2","root","");
    $qr= new Query("mongonv2");
        //===== Lay id cua M ==========
        $query= $qr->select_id_manager("user",$validator_mail_language);
        $result=$db->get_data($query);
        if (!$result)
        {
                die ('Câu truy vấn bị sai');
        }
        else
        {

        }

        while ($row = mysqli_fetch_assoc($result))
        {
                $id_validator=$row['id'];
        };
        // echo ($id_validator);
        // lay dong cuoi bang request

        function get_count_request($qr,$db)
        {
        $query= $qr->count_data("request");
        $result=$db->get_data($query);
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

        // Luu request cua M vao DB
        $last_request=get_count_request($qr,$db);
        // echo $last_request;
        $id=$last_request;
        function add_request($qr,$db,$id,$rq,$stt,$creator,$date,$dl,$user)
        {
                $query= $qr->insert_request("request",$id,$rq,$stt,$creator,$date,$dl,$user);
                // echo $query;
                $db->get_data($query);
        }
        add_request($qr,$db,$id,$request,"Open",$creator_name,$time,$dl,$id_validator);
        // echo ($jsonString);
        // ======== Luu vao folder cua validator ============
        $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
        $link_file_json_validator = "../../../Data/UserData/".$id_validator."/".$request.".json";

        if (file_put_contents($link_file_json_validator,$jsonString)) 
        {
                echo "Please check your email before sending.";
        }
        else
        {
                echo "Fail to send mail";

        }
?>
