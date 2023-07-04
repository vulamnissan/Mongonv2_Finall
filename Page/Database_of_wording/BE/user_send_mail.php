<?php
// Content of the email
// $path = '../../../Data/UserData/2/test.json';
$request="TR01";
$url="http//";
$mgr_company="NS";
$creator_company="NS";
$creator_name = $_POST["name_sender"]??"";
$creator_sect = $_POST["sect_sender"]??"";
$creator_mail = $_POST["mail_mail"]??"";
$arr_user = $_POST["arr_user"]??"";
$mgr_name = $_POST["name_address"]??"";
$mgr_sect = $_POST["sect_address"]??"";
$mail_address = $_POST["mail_address"]??"";
$rq = $_POST["rq"]??"";
$user_id = $_POST["user_id"]??"";
$subject = "Request for additional information";
$json_user = file_get_contents("../../../Data/UserData/user.json");
$user_data = json_decode($json_user, true); 
foreach($user_data as $key => $value){
        // echo $key;
        if($key === $mail_address){
                $id_M = $user_data[$key]['id'];
                // echo $a;
                break;
        }
}
echo $id_M;
$link_file = "../../../Data/UserData/".$user_id."/".$rq.".json";
// $jsonString = json_encode($arr_json, JSON_PRETTY_PRINT);
$jsonData = file_get_contents($link_file);

$data = json_decode($jsonData, JSON_PRETTY_PRINT);
$data_json = json_encode($data, JSON_PRETTY_PRINT);
// print_r($data1);
$filePath = "../../../Data/UserData/".$id_M."/".$rq.".json";

if (file_put_contents($filePath, $data_json)) {
    echo "File written successfully!";
} else {
    echo "Error writing file.";
}

// Chuyển đổi JSON thành dữ liệu PHP
$data = json_decode($jsonData, true);

$body = "To: ".$mgr_name. "
        \n
        \n The below translation request has been sent to you, so please check it!
        \n URL: ".$url."
        \n TEXT ID: ".$textid."
        \n
        \n Receiver Engineering Contact Information:
        \n==================================================
        \n Company Name: ".$mgr_company." 
        \n User Name: ".$mgr_name."
        \n Department Code: ".$mgr_sect."
        \n
        \n Sender Engineering Contact Information:
        \n==================================================
        \n Sender Company: ".$creator_company." 
        \n Sender User: ".$creator_name."
        \n Department Code: ".$creator_sect."";

// Create the email draft
$emailDraft = "mailto:?subject=" . $string = str_replace("+", " ", urlencode($subject)) . "&body=" . $string1 = str_replace("+", " ", urlencode($body)) . "&to=" . $string1 = str_replace("+", " ", urlencode($mail_address));

// Open the email draft in Outlook
$command = 'open "' . $emailDraft . '"';
shell_exec($command);

// echo "Email draft opened in Outlook.";
?>



