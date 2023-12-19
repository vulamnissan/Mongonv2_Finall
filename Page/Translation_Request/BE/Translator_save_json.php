<?php
    // CONTENT: TRANSLATOR SAVE INFORMATION AFTER TRANSLATION INTO FILE
    // INPUT: $arr_data,$path
    //OPUTPUT: SAVE FILE JSON
    try
        {
            //1. INPUT HANDLE
            $arr_data=$_POST["content"]??"";
            $path=$_POST["link"]??"";
            //2. SAVE FILE
            $jsonString = json_encode($arr_data, JSON_PRETTY_PRINT);
            file_put_contents($path,$jsonString);
            echo "Save successfully";
        }
    catch(Exception $e)
        {
            echo "Fail to save";
        }
?>