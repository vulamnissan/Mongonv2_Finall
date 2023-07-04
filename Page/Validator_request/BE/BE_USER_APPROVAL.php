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
    // // $path = "../".$link_file_json;
    $jsonString = file_get_contents($link_file_json);
    $jsonData = json_decode($jsonString, true);
    // $user_mail=$_COOKIE['email'];
    // $user_name=$_COOKIE['name'];

    $name_mrg=$_POST["name_mrg"]??"";
    $sect_mgr=$_POST["sect_mgr"]??"";
    $mail_mgr=$_POST["mail_mgr"]??"";
    $company_mgr=$_POST["company_mgr"]??"";

    $name_validator=$_POST["name_validator"]??"";
    $sect_validator=$_POST["sect_validator"]??"";
    $mail_validator=$_POST["mail_validator"]??"";
    $company_validator=$_POST["company_validator"]??"";

    $jsonData["validator"]['name']=$name_validator;
    $jsonData["validator"]['sect']=$sect_validator;
    $jsonData["validator"]['mail']=$mail_validator;
    $jsonData["validator"]['company']=$company_validator;

    $jsonData["mgr"]['name']=$name_mrg;
    $jsonData["mgr"]['sect']=$sect_mgr;
    $jsonData["mgr"]['mail']=$mail_mgr;
    $jsonData["mgr"]['company']=$company_mgr;

    // print_r($jsonData);
    $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
    if (file_put_contents($link_file_json,$jsonString)) 
    {
        echo "Set approval successfully";
    }
    else
    {
        echo "Fail to set approval";
    }
?>