
<?php
session_start();
?>
<?php
$pw = $_POST["pw"]??"";
$request = $_POST["request"]??"";
// $request=$_SESSION['request'];
$id_manager = $_COOKIE['ID'] ;
$link_file_json_manager = "../../../Data/UserData/".$id_manager."/".$request.".json";
$jsonString = file_get_contents($link_file_json_manager);
$jsonData = json_decode($jsonString, true);
if($pw == $jsonData["password"])
{
    echo(1);
   
}

?>

