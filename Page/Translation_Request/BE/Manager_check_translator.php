<?php
// MANAGER CHANGE INFORMATION OF TRANSLATOR
// INPUT: $i(MANAGER), $request,$name_tran,$mail_tran,$sect_tran,$com_tran
// OUPUT: FILE JSON REPLACEMENT INFORMATION OF TRANSLATOR

//1. INPUR HANDLE
// 1.1 INPUT FROM POST
$id=($_POST["id"]??"");
$request=($_POST["rq"]??"");
$path = str_replace(" ","",'../../../Data/UserData/'.$id.'/'.$request.'.json');
$name_tran=$_POST["name"]??"";
$mail_tran=$_POST["mail"]??"";
$sect_tran=$_POST["sect"]??"";
$com_tran=$_POST["com"]??"";

//1.2 INPUT FORM FILE JSON
$jsonString = file_get_contents($path);
$jsonData = json_decode($jsonString, true);
$jsonData["translator"]['name']=$name_tran;
$jsonData["translator"]['sect']=$sect_tran;
$jsonData["translator"]['mail']=$mail_tran;
$jsonData["translator"]['company']=$com_tran;

// 2. OUTPUT SAVE FILE JSON 
$jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
if (file_put_contents($path,$jsonString)) 
        {
                echo "Change Translator Complete";
        }
else
        {
                echo "Fail To Change Translator";
        }
?>