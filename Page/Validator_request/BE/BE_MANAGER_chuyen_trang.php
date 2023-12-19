<?php
// CONTENT: NEXT PAGE
// INPUT: $pw,$id_manage
// OUTPUT: 1
$pw = $_POST["pw"]??"";
$request = $_POST["request"]??"";
$id_manager = $_SESSION['ID'] ;
$link_file_json_manager = "../../../Data/UserData/".$id_manager."/".$request.".json";
$jsonString = file_get_contents($link_file_json_manager);
$jsonData = json_decode($jsonString, true);
if($pw == $jsonData["password"])
    {
        echo(1);
    }

?>

