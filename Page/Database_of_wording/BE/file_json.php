<?php
include "../../BE/main_function.php";
$arr_json = $_POST["flag"]??"";
$id = $_POST["user_id"]??"";
$user_id = $_SESSION["ID"]??"";
$rq = $_POST["rq"]??"";
$_SESSION['DB_'.$user_id] = $rq;
$link_file = "../../../Data/UserData/".$user_id."/".$rq.".json";
$jsonString = json_encode($arr_json, JSON_PRETTY_PRINT);
if (file_put_contents($link_file, $jsonString)) 
    {
        echo "Save successfully ";
    }
else
    {
        echo "Fail to save ";
    }

?>
      