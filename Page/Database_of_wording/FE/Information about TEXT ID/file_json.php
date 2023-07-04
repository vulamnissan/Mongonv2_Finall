<?php
    $arr_json = $_POST["flag"]??"";
    $link_file = "test123.json";
    $jsonString = json_encode($arr_json, JSON_PRETTY_PRINT);
    print_r($jsonString);
    // $a = file_put_contents("test123.json", $jsonString);
    // echo $a;
    if (file_put_contents("test_json.json", $jsonString)) 
    {
        echo "Save successfully";
    }
    else
    {
        echo "Fail to save";
    }
// ?>
      