<?php
//SAVE VALUES IN LIMIT LENGTH AFTER ADDED
include "my_sql.php";
$arr_json = $_POST["object_add"]??"";
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");

function get_count_limit($qr, $db) //search last row in table "fix_limit"
    {
        $result= $qr->count_data($db, "fix_limit");
        while ($row = mysqli_fetch_assoc($result))
            {
                $last_row=$row['count(*)']; 
            };
        if ($last_row===0)
            {
                return 1;
            }
        else
            {
                return $last_row+1;
            }
    }
$last_row_limit = get_count_limit($qr, $db);
function get_insert_limit($qr, $db, $id, $display_type, $meter, $limit, $fontsize) // function insert to table "fix_limit"
{
    $query= $qr->insert_limit($db, "fix_limit", $id, $display_type, $meter, $limit, $fontsize);
}
$result= $qr->select_limit($db, "fix_limit");
$check = 0;
foreach($arr_json as $key => $value){
    $temp_check_limit = $key.$arr_json[$key]['Meter'];
    if ($result->num_rows > 0){
        while ($row = $result-> fetch_assoc()){
            $temp_check_limit_db = $row['display_type'].$row['meter'];
            if ($temp_check_limit == $temp_check_limit_db){
                $check = $check + 1;
                break;
            }
        }
    }
    if($check == 1){
        break;
    }
}

if ($check == 1){
    echo "Display type and Meter type is duplicated . Please check before add information !";
}
else {
    $link_file = "../../../Data/UserData/file_draft_limit_length_add_new.json";
    $jsonString = json_encode($arr_json,  JSON_PRETTY_PRINT);
    
    if (file_put_contents($link_file,  $jsonString)) 
        {   
            echo "Save successfully";
        }
    else
        {
            echo "Fail to save";
        }
    if($check == 0){
        foreach($arr_json as $key => $value){
            $display_type = $key;
            $id=$last_row_limit;
            $limit = $arr_json[$key]['Limit'];
            $meter = $arr_json[$key]['Meter'];
            $fontsize = $arr_json[$key]['Fontsize'];
            get_insert_limit($qr, $db, $id, $display_type, $meter, $limit, $fontsize); // call function insert to table "limnit"
        
        }
    }
}
    
?>    
