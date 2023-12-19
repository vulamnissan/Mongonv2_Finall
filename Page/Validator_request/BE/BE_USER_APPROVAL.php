
<?php
// CONTENT: USER APPROVAL
// INPUT: $flag, $request
// OUTPUT: CREATE TABLE USER
// Start the session
?>

<?php

    $flag= $_POST['flag']??"";
    $link_file_json_add= $_POST['link_file_json_add']??"";
    if($flag == "1")
        {
            $request = $_POST['request'];
            $link_file_json= "../../../Data/UserData/". $_SESSION['ID'] ."/".$request .".json";
        }
    if($flag == "0")
        {
            $request = $_SESSION['request'];
            $link_file_json = $_SESSION['link_file_json'];
        }
    // split string
    $link_file_json_add = explode(".json",  $link_file_json_add);
    $link_file_json_add=$link_file_json_add[0].".json";
    $jsonString = file_get_contents($link_file_json_add);
    $jsonData = json_decode($jsonString,  true);

    $name_mrg=$_POST["name_mrg"]??"";
    $sect_mgr=$_POST["sect_mgr"]??"";
    $mail_mgr=$_POST["mail_mgr"]??"";
    $company_mgr=$_POST["company_mgr"]??"";

    $name_validator=$_POST["name_validator"]??"";
    $sect_validator=$_POST["sect_validator"]??"";
    $mail_validator=$_POST["mail_validator"]??"";
    $company_validator=$_POST["company_validator"]??"";

    $jsonData["validator"]['name']=$name_validator;
    $jsonData["validator"]['sect']=$sect_validator;
    $jsonData["validator"]['mail']=$mail_validator;
    $jsonData["validator"]['company']=$company_validator;

    $jsonData["mgr"]['name']=$name_mrg;
    $jsonData["mgr"]['sect']=$sect_mgr;
    $jsonData["mgr"]['mail']=$mail_mgr;
    $jsonData["mgr"]['company']=$company_mgr;

    $jsonString = json_encode($jsonData,  JSON_PRETTY_PRINT);
    if (file_put_contents($link_file_json_add, $jsonString)) 
        {
            echo "Set approval successfully";
        }
    else
        {
            echo "Fail to set approval";
        }
?>