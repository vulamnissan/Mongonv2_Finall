<?php
    // CONTENT: CHECK PASWORD MANAGER ENTER
    // INPUT: $pass , $ request
    //OUTPUT: CHECK PASS "OK" OR "NG"
    include "MySql.php";
    $pass=$_POST["pass"]??"";
    $request=$_POST["rq"]??"";
    $db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
    $qr= new Query("mongonv2");
    $id_manager=$_SESSION['ID'];
    $path = '../../../Data/UserData/'.$id_manager.'/'.$request.'.json';
// 1. GET DATA FROM FILE JSON
    $jsonString = file_get_contents($path);
    $jsonData = json_decode($jsonString, true);
    $pass_json=$jsonData["password"];
     //2. CHECK PASS
    if ($pass == $pass_json)
        {
            echo "ok";
        }
    else
        {
            echo"ng";
        }
?>