<?php
    include "MySql.php";
    $pass=$_POST["pass"]??"";
    $request=$_POST["rq"]??"";
    $db = new connect_DB("localhost","mongonv2","root","");
    $qr= new Query("mongonv2");

    //=========== can truyen================
    $id_manager=$_COOKIE['ID'];


    $path = '../../../Data/UserData/'.$id_manager.'/'.$request.'.json';
    //LAY PASS TU FILE JSON CU MANAGER
    $jsonString = file_get_contents($path);
    $jsonData = json_decode($jsonString, true);
    $pass_json=$jsonData["password"];
    if ($pass == $pass_json)
    {
        echo "ok";
    }
    else
    {
        echo"ng";
    }
?>