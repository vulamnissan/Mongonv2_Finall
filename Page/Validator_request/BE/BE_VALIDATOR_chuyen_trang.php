<?php
$pw = $_POST["pw"]??"";
$request=$_POST['rq'];
$id_validator= $_COOKIE['ID'];
$link_file_json_validator = "../../../Data/UserData/".$id_validator."/".$request.".json";
$jsonString = file_get_contents($link_file_json_validator);
$jsonData = json_decode($jsonString, true);
if($pw == $jsonData["password"])
{
    echo 1;
   
}
else{
    echo 0;
}

?>