<?php
//SAVE VALUES LIMIT LENGTH AFTER CHANGE VALUES
include "my_sql.php";
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");

function update_limit($qr, $db, $display_type, $meter, $limit, $id)
    {
        $query= $qr->update_limit($db, "fix_limit", $display_type, $meter, $limit, $id);
    }
$arr_json = $_POST["object"]??"";
$link_file = "../../../Data/UserData/file_draft_limit_length.json";
$jsonString = json_encode($arr_json,  JSON_PRETTY_PRINT);
if (file_put_contents($link_file,  $jsonString)) 
    {
        echo "Save successfully";
    }
else
    {
        echo "Fail to save";
    }

foreach($arr_json as $key => $value){
    $id = $key;
    $display_type=$arr_json[$key]['text'];
    
    $limit = $arr_json[$key]['Limit'];
    $meter = $arr_json[$key]['Meter'];

    update_limit($qr, $db, $display_type, $meter, $limit, $id);

}

?>    