<?php
    //========================
    $id=($_POST["id"]??"");
    $request=($_POST["rq"]??"");
    $path = str_replace(" ","",'../../../Data/UserData/'.$id.'/'.$request.'.json');

    $name_tran=$_POST["name"]??"";
    $mail_tran=$_POST["mail"]??"";
    $sect_tran=$_POST["sect"]??"";
    $com_tran=$_POST["com"]??"";
    //========================

    $jsonString = file_get_contents($path);
    $jsonData = json_decode($jsonString, true);

    $jsonData["translator"]['name']=$name_tran;
    $jsonData["translator"]['sect']=$sect_tran;
    $jsonData["translator"]['mail']=$mail_tran;
    $jsonData["translator"]['company']=$com_tran;

    $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
    // $link_save_file=str_replace(" ","","../../../Data/UserData/".$id_maruboshi."/".$request.".json");
    if (file_put_contents($path,$jsonString)) 
    {
            echo "Change Translator Complete";
    }
    else
    {
            echo "Fail To Change Translator";
            // echo "../../../Data/UserData/".$id_maruboshi."/".$request.".json";

    }



?>