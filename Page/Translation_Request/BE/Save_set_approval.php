<?php
    // Save approval
    // $path = '../../../Data/UserData/2/test.json';
    $path=$_POST["link_file"]??"";
    $check=$_POST["check"]??"";
    // echo $check;
    $jsonString = file_get_contents($path);
    $jsonData = json_decode($jsonString, true);
    if ($check==="show_name_creator") // show set approval
    {
        // echo $jsonData["creator"]['name'];
        echo "<input type=\"text\" value=".$jsonData["creator"]['name']."   >";
    }
    else if ($check==="show_sect_creator") // show set approval
    {
        // echo $jsonData["creator"]['sect'];
       echo " <input type=\"text\"  value=".$jsonData["creator"]['sect']."  >";
    }
    else if ($check==="show_mail_creator") // show set approval
    {
        // echo $jsonData["creator"]['mail'];
        echo "<input type=\"text\" value=".$jsonData["creator"]['mail']."  >";
    }
    else if ($check==="show_company_creator") // show set approval
    {
        // echo $jsonData["creator"]['mail'];
        echo "<input type=\"text\" value=".$jsonData["creator"]['company']."  >";
    }
    else if ($check==="ok") // save set applroval
    {
        $name_translator=$_POST["name_tran"]??"";
        $sect_translator=$_POST["sect_tran"]??"";
        $mail_translator=$_POST["mail_tran"]??"";
        $company_translatior=$_POST["com_tran"]??"";

        $name_mrg=$_POST["name_m"]??"";
        $sect_mrg=$_POST["sect_m"]??"";
        $mail_mrg=$_POST["mail_m"]??"";
        $company_mrg=$_POST["com_m"]??"";

        $jsonData["translator"]['name']=$name_translator;
        $jsonData["translator"]['sect']=$sect_translator;
        $jsonData["translator"]['mail']=$mail_translator;
        $jsonData["translator"]['company']=$company_translatior;

        $jsonData["mgr"]['name']=$name_mrg;
        $jsonData["mgr"]['sect']=$sect_mrg;
        $jsonData["mgr"]['mail']=$mail_mrg;
        $jsonData["mgr"]['company']=$company_mrg;

        $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
        if (file_put_contents($path,$jsonString)) 
        {
            echo "Set approval successfully";
        }
        else
        {
            echo "Fail to set approval";
        }
    }
    
?>