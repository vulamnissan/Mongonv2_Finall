<?php
    // CONTENT: MANAGER SAVE DEADLINE TRANSLATE
    // INPUT: $deadline, $id( MANAGER), $request
    // OUTPUT: OUTPUT SAVE DEADLINE TO FILE JSON

    //1. INPUT HANDLE
    $deadline=$_GET["deadline"]??"";
    $id=($_GET["id"]??"");
    $request=($_GET["rq"]??"");
    $path = str_replace(" ","",'../../../Data/UserData/'.$id.'/'.$request.'.json');
    // 2. SAVE DEADLINE TO FILE JSON
    $jsonString = file_get_contents($path);
    $jsonData = json_decode($jsonString, true);
    $jsonData["deadline"]=$deadline;
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