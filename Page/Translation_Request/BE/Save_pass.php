<?php
    // print_r($_SESSION);
    // Save password
    // $path = '../../../Data/UserData/2/test.json';
    $path=$_GET["link_file"]??"";
    // echo $path;
    $jsonString = file_get_contents($path);
    $jsonData = json_decode($jsonString, true);
    $pw=$_GET["pass"]??"";
    $jsonData["password"]=$pw;
    $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
    if (file_put_contents($path,$jsonString)) 
    {
        echo "Set password successfully";
    }
    else
    {
        echo "Fail to set password";
    }
?>