<?php
    // CONTENT: CREATOR SET PASSWORD
    // INPUT: $path
    // OUPUT: SAVE PASSWORD TO FILE JSON

    //1. INPUT HANDLE 
    $path=$_GET["link_file"]??"";
    //2. SAVE PASSWORD
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