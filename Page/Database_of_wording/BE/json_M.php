<?php
include "my_sql.php";
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");
$arr_json = $_POST["flag1"]??"";
$id_M = $_POST["id_M"]??"";
$user_id = $_POST["user_id"]??"";
$rq = $_POST["rq"]??"";
$link_file = "../../../Data/UserData/".$id_M."/".$rq.".json";
$jsonString = json_encode($arr_json, JSON_PRETTY_PRINT);

if (file_put_contents($link_file, $jsonString)) 
    {
        echo "Save successfully";
    }
else
    {
        echo "Fail to save";
    }
    
foreach($arr_json  as $key => $value){
    $name_M = $key;
    break;
}
$query= $qr->update_request($db, 'request', $name_M, $rq, $id_M);
?>
