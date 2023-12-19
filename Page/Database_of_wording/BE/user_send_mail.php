<?php
//USER SEND MAIL TO MANAGER
include "my_sql.php";
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");
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

$last_request=get_count_request($qr, $db); //last row 
$arr_time=getdate();
$time_now=$arr_time['mday']."/".$arr_time['mon']."/".$arr_time['year'];
$id = $last_request;
$stt="Open";
$date=($time_now);
$dl=NULL;
foreach($user_data as $key => $value){
    if($key === $mail_address){
        $id_M = $user_data[$key]['id'];
        break;
    }
}
$user=$id_M;
add_request($qr, $db, $id, $rq, $stt, $creator_name, $date, $dl, $id_M);
$link_file = "../../../Data/UserData/".$user_id."/".$rq.".json";
$jsonData = file_get_contents($link_file);

$data = json_decode($jsonData, JSON_PRETTY_PRINT);
$data_json = json_encode($data, JSON_PRETTY_PRINT);
$filePath = "../../../Data/UserData/".$id_M."/".$rq.".json";

if (file_put_contents($filePath, $data_json)) {
    echo "File written successfully!";
} 
else {
    echo "Error writing file.";
}

// Move JSON to PHP data
$data = json_decode($jsonData, true);

// 2. CREATE AND SEND MAIL
require "../../send_mail.php";
$mail_sender = "email";
$name_receiver = $_SESSION['name'];
$mail_receiver = "email";

$subject_request = "Database of Wording Request ".$rq;
$htmlBody_request = "<h2>To: ".$mgr_name. "</h2>"
                                ."<br>"
                                ."<h3>Database of wording request : ".$rq." has been complete</h3>"
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


function add_request($qr, $db, $id, $rq, $stt, $creator, $date, $dl, $user)
    {
        $query= $qr->insert_request($db, "request", $id, $rq, $stt, $creator, $date, $dl, $user);
    }
function get_count_request($qr, $db) // search last row in table "request"
    {
        $result= $qr->count_data($db, "request");
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

?>



