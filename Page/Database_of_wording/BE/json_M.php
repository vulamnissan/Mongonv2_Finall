<?php
// include "main_function.php";
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
?>
