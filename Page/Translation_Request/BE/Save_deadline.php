<?php
    $deadline=$_GET["deadline"]??"";
    //======= can truyen link ===================
    // $path = '../../../Data/UserData/2/test.json';
    $id=($_GET["id"]??"");
    $request=($_GET["rq"]??"");
    $path = str_replace(" ","",'../../../Data/UserData/'.$id.'/'.$request.'.json');
    // echo $path;
    //==========================================
    $jsonString = file_get_contents($path);
    $jsonData = json_decode($jsonString, true);
    // print_r($jsonData);
    $jsonData["deadline"]=$deadline;
    // print_r($jsonData);
    $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
    if (file_put_contents($path,$jsonString)) 
    {
        echo "Set deadline successfully";
    }
    else
    {
        echo "Fail to set deadline";
    }
?>