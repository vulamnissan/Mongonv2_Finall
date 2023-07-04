<?php
// Start the session
session_start();
?>
<?php
    $flag= $_POST['flag']??"";
    // echo $flag;
    if($flag == "1")
    {
        $request = $_POST['request'];
        $link_file_json= "../../../Data/UserData/". $_COOKIE['ID'] ."/".$request .".json";
        $link_file_json_add= "../../../Data/UserData/". $_COOKIE['ID'] ."/".$request."_add.json";
    }
    if($flag == "0")
    {
        $request = $_SESSION['request'];
        $link_file_json = $_SESSION['link_file_json'];
        $link_file_json_add = $_SESSION['link_file_json_add'];
    }
    // $link_file_json = $_SESSION['link_file_json'];
    // $path=$_GET["link_file"]??"";
    // echo $path;
    // echo $link_file_json;
    // echo $pw;
    $jsonString = file_get_contents($link_file_json);
    $jsonData = json_decode($jsonString, true);
    $pw=$_POST["pw"]??"";
    $jsonData["password"]=$pw;
    $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
    if (file_put_contents($link_file_json,$jsonString)) 
    {
        echo "Set password successfully";
    }
    else
    {
        echo "Fail to set password";
    }
?>