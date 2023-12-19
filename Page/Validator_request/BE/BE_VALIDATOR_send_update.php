<?php
include "MySql.php";
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");
$date_arr = getdate();
$date = $date_arr['mday']."/".$date_arr['mon']."/".$date_arr['year'];
$arr_update= [] ;
$request= $_POST['rq'];
$jsonString_save = "../../../Data/UserData/".$_SESSION['ID']."/".$request."_finall.json";
if(file_exists($jsonString_save)==false){
        echo "Please save before send result!";
    }
    else{
        $json = file_get_contents($jsonString_save);
        $jsonData = json_decode($json,  true);
        foreach ($jsonData as $textID=>$value1)
        {
            if ($textID != "translator")
	    {
		$value_textID  = $textID;
                foreach($jsonData[$textID] as $language=>$value1){
                    $flag_tsukarow = 0;
                    if ($language != "content" && $language !="display" && $language !="layout" && $language !="us" ){
    
                        if ($jsonData[$textID][$language]["text"] <> ""){
                            $record_ver = $qr -> get_request_ver($db, $textID);
                            while ($row = mysqli_fetch_assoc($record_ver)){
                                $ver = $row['ver']+ 1 ;
                                $us = $row[$language];
                                if ($row[$language."_text"] != ""){
                                    $flag_tsukarow = 1;
                                    break;
                                }
                            };
                            
                            // Max ver haven't data
                            if ( $flag_tsukarow == 0 ){
                                if($jsonData[$textID][$language]["word"] == "" || $jsonData[$textID][$language]["word"] == "OK"){
                                    $query_update = $qr -> update_textid_upver($db, $language, $jsonData[$textID][$language]["text"], $jsonData["translator"]["request"], $jsonData["translator"]["name"], $_SESSION['name'], $jsonData["translator"]["date"], $date, $textID);
                                }
                                else {
                                    $query_update = $qr -> update_textid_dont_upver($db, $language, $jsonData[$textID][$language]["word"], $_SESSION['name'], $date, $jsonData["translator"]["request"], $jsonData["translator"]["name"], $jsonData["translator"]["date"], $textID);
                                }
                            }
                            //Max ver have data : add new row 
                            else if ($flag_tsukarow == 1)
                            { 
                                if($jsonData[$textID][$language]["word"] == "" || $jsonData[$textID][$language]["word"] == "OK"){
                                    $query_insert = $qr -> insert_textid_upver($db, $language, $textID, $ver, $jsonData[$textID]['us'], $jsonData[$textID][$language]["text"], $date, $_SESSION['name'], $jsonData["translator"]["request"], $jsonData["translator"]["name"], $jsonData["translator"]["date"]);
                                }
                                else{
                                    $query_insert = $qr -> insert_textid_dont_upver($db, $language, $textID, $ver, $jsonData[$textID]['us'], $jsonData[$textID][$language]["word"], $_SESSION['name'], $date, $jsonData["translator"]["request"], $jsonData["translator"]["name"], $jsonData["translator"]["date"]);
                                    }
                            }
                        }
                    }
                }
            }
            
        } 

        //CHANGE STATUS REQUEST AFTER VALIDATOR COMPLETE
        function change_status_rq($db, $qr, $rq, $date)
            {
                $result = $qr -> sql_change_status_rq($db, $date, $rq);
            }
        change_status_rq($db, $qr, $request, $date);
        //CHANGE FILE TRANSLATE AFTER VALIDATOR COMPLETE
        function change_translate_file($TR_rq, $textID, $language)
        {
            $link = "../../../Data/UserData/0" ."/". $TR_rq .".json" ;
            $json = file_get_contents($link);
            $jsonData = json_decode($json,  true);
            $jsonData["translation_request"][$textID]["language"][$language]["content"] = "0";
            $json_encode = json_encode($jsonData,  JSON_PRETTY_PRINT);
            if (file_put_contents($link, $json_encode)) 
                {
                    //nothing to do
                }
                else
                {
                    //nothing to do

                }
        }
        change_translate_file($jsonData["translator"]["request"], $value_textID, $language);
        // 2. CREATE AND SEND MAIL MANAGER
        require "../../send_mail.php";
        $mail_sender = "email";
        $name_receiver = $_SESSION['name'];
        $mail_receiver = "email";
        //2.1.3 SEND MAIL REQUEST PASSWORD TO MANAGER 
        $subject_request = " Validator Request : ".$request." Complete";
        $htmlBody_request = "<h2>To: ".$mgr_name. "</h2>"
                                        ."<br>"
                                        ."<h3>Validator Request : ".$request."Complete</h3>"
                                        ."<p>Don't return to the sender of this mail.</p>"; 
        
        //2.1.2 SEND MAIL REQUEST TO MANAGER
        Send_Mail($subject_request, $htmlBody_request, $mail_sender, $mail_receiver);
        echo "Update Database Complete !"; 
       }
?>

