<?php
include "../../BE/main_function.php";
    $arr_json = $_POST["flag"]??"";
    $check = $_POST["flag_son"]??"";
    // echo $check;
    $user_id = $_COOKIE["ID"]??"";
    // echo $user_id;
    $rq = $_POST["rq"]??"";
    if($check != 1){
        $link_file = "../../../Data/UserData/".$user_id."/".$rq.".json";
        $jsonString = json_encode($arr_json, JSON_PRETTY_PRINT);
        // $a = file_put_contents($link_file, $jsonString);
        if (file_put_contents($link_file, $jsonString)) 
        {
            echo "Save successfully";
        }
        else
        {
            echo "Fail to save";
        }
    }
    else{
        // $id_user = $_GET["id_user"]; 
        $rq_old = $_POST["rq_old"]; 
        // echo $rq_old;
        $link_file = "../../../Data/UserData/".$user_id."/".$rq_old.".json";
        $jsonString = json_encode($arr_json, JSON_PRETTY_PRINT);
        // $a = file_put_contents($link_file, $jsonString);
        if (file_put_contents($link_file, $jsonString)) 
        {
            echo "Save successfully";
        }
        else
        {
            echo "Fail to save";
        }
    }

    // if flag ===1 then 
    //     sua 
?>
      