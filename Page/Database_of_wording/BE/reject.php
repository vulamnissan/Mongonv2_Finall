<?php
//SEND MAIL AND DELETE FILE JSON IN FOLDER OF MANAGER
include "my_sql.php";
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");
function get_user_data($qr, $db)
    {
        //=======================get data user=================
        $result= $qr->select_data($db, "user");
        // $result=$db->get_data($query);
        if (!$result)
        {
            die ('The query is wrong');
        }
        else
        {

        }
        $user_data=[];
        while ($row = mysqli_fetch_assoc($result))
        {
            $user_data[$row['mail']]=[];
            $user_data[$row['mail']]['id']=$row['id'];
            $user_data[$row['mail']]['name']=$row['name'];
            $user_data[$row['mail']]['type']=$row['type'];
            $user_data[$row['mail']]['password']=$row['password'];
            $user_data[$row['mail']]['sect']=$row['sect'];
            $user_data[$row['mail']]['company']=$row['company'];
            $user_data[$row['mail']]['mail']=$row['mail'];
        };
        return $user_data;
    }
$arr_user = get_user_data($qr, $db);
$data_user_index = array_values($arr_user);
$id=($_GET["id"]??"");
$request=($_GET["rq"]??"");
$path = str_replace(" ", "", '../../../Data/UserData/'.$id.'/'.$request.'.json');

// =========================send mail======================
$jsonString = file_get_contents($path);
$jsonData = json_decode($jsonString, true);

foreach($jsonData as $key => $value){
    for($i =0;$i < count($data_user_index);$i++){
        if($key === $data_user_index[$i]['name']){
            $creator_name=$data_user_index[$i]['name'];
            $creator_sect=$data_user_index[$i]['sect'];
            $creator_company=$data_user_index[$i]['company'];
            $creator_mail=$data_user_index[$i]['mail'];
            break;
        }
    }
}

for($i =0;$i < count($data_user_index);$i++){
    if($data_user_index[$i]['id'] === $id){
        $mgr_name=$data_user_index[$i]['name'];
        $mgr_sect=$data_user_index[$i]['sect'];
        $mgr_mail=$data_user_index[$i]['mail'];
        $mgr_company=$data_user_index[$i]['company'];
        break;
    }
}

// 2. CREATE AND SEND MAIL
require "../../send_mail.php";
$mail_sender = "email";
$name_receiver = $_SESSION['name'];
$mail_receiver = "email";

$subject_request = "Reject for request : ".$request;
$htmlBody_request = "<h2>To: ".$creator_name. "</h2>"
                                ."<br>"
                                ."<h3>The below request for additional information can't approved, so please check the contents again.</h3>"
                                ."Request Number: ".$request.""
                                ."<p>Don't return to the sender of this mail.</p>"  
                                ."</br>"; 

//2.1.2 SEND MAIL REQUEST TO MANAGER
Send_Mail($subject_request, $htmlBody_request, $mail_sender, $mail_receiver);  
// Open the email draft in Outlook
// ========================delete file=====================
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
