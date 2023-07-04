<?php
    $arr_json = $_POST["flag"]??"";
    $link_file = "../../../Data/UserData/textid_select_data_wording.json";
    $jsonString = json_encode($arr_json, JSON_PRETTY_PRINT);
    $a = file_put_contents($link_file, $jsonString);
    if (file_put_contents($link_file, $jsonString)) 
    {
        echo "Save successfully";
    }
    else
    {
        echo "Fail to save";
    }
// ?>