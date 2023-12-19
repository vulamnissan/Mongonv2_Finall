<?php
$email = $_POST['email'];
$old_pass = $_POST['old_pass'];
$new_pass = $_POST['new_pass'];

$old_pass_encode = hash("sha256", $old_pass);
$new_pass_encode = hash("sha256", $new_pass);

 // get database info
 $json_data = file_get_contents("../../../Data/UserData/Database_info.json");
 $db_info = json_decode($json_data, true); 
 $_SESSION['db_host'] = $db_info['endpoint'];
 $_SESSION['db_dbname'] = $db_info['database'];
 $_SESSION['db_user'] = $db_info['user'];
 $_SESSION['db_pass'] = $db_info['password'];

include "../../Translation_Request/BE/MySql.php";
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");

$record_user = $qr -> select_data($db, "user");
$user = []; 
while ($row = mysqli_fetch_assoc($record_user))
    {
        $user[$row['mail']]['ID'] = $row['id'];
        $user[$row['mail']]['pass'] = $row['password'];
        $user[$row['mail']]['type'] = $row['type'];
        $user[$row['mail']]['sect'] = $row['sect'];
        $user[$row['mail']]['name'] = $row['name'];
    };

if ($old_pass_encode == $user[$email]['pass'])
    {
        $action = $qr->update_new_pass($db, $email, $new_pass_encode);
        echo "Change pass complete !";
    }
else
    {
        echo "Please check email or password !";
    }


?>