<?php
    try
    {
    
        $arr_data=$_POST["content"]??"";
        $path=$_POST["link"]??"";

        $jsonString = json_encode($arr_data, JSON_PRETTY_PRINT);
        file_put_contents($path,$jsonString);
        // print_r($jsonString);
        // echo $path;
        echo "Save Successfully";

    }
    catch(Exception $e)
    {
        echo "Fail to save";
    }
?>