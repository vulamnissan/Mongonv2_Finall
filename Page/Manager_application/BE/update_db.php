<?php
include "my_sql.php";
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");

$data_table_change = $_POST['object_data']??"";
$data_table_change_textid = array_keys($data_table_change); // array from html
$textid_vehicle = get_list_textid_vehicle($qr, $db); // array textid from data base

foreach($data_table_change as $key => $value){
    if(in_array($key,$textid_vehicle)){
        echo "The Textid is duplicated , Please retype it !";
        // if($data_table_change[$key]['check'] == 1){
        //     $text_id = $key;
        //     $temp = $data_table_change[$text_id];
        //     $data_key = array_keys($temp);
        //     $data_value = array_values($temp);
        //     $temp_field = '';
        //     for($i=1; $i < count($data_key);$i++){
        //         if($i == (count($data_key) -1)){
        //             $temp_field = $temp_field.$data_key[$i]."="."'$data_value[$i]'";
        //         }
        //         else{
        //         $temp_field = $temp_field.$data_key[$i]."="."'$data_value[$i]'".",";
        //         }
        //     }
    
        //     $query = "UPDATE ".'mongonv2.textid_vehicle SET '.$temp_field." WHERE"." textid="."'$text_id'";
        //     get_update_textid_vehicle($db,$query);
        // }
    }

    else{
        //insert to tables
        $temp = $data_table_change[$key];
        $data_table_change_key = array_keys($temp);
        $data_table_change_value = array_values($temp);
        $temp_field = 'textid';
        for($i=1; $i < count($data_table_change_key);$i++){
            $temp_field = $temp_field.",".$data_table_change_key[$i];
        }
        $temp_value= "'".$key."'";
        for($i=1; $i < count($data_table_change_value);$i++){
            $temp_value = $temp_value.","."'".$data_table_change_value[$i]."'";
        }
        $query = $qr->insert_vehicle($db,'textid_vehicle', $temp_field, $temp_value);
        $query_insert_to_textid_infor = $qr->insert_to_textid_infor($db,'textid_infor', $key);
        $query_insert_to_textid_language = $qr-> insert_to_textid_language($db, 'textid_language', $key);
    
        echo "Update TEXTID completed";
    }
}

function get_list_textid_vehicle($qr, $db)
    {
        //======================GET DATA TEXTID_VEHICLE=================
        $result= $qr->select_data($db, "textid_vehicle");
        if (!$result)
            {
                die ('Query is wrong');
            }
        else
            {
                //nothing to do
            }
        $textid_vehicle=[];
        $k = 0;
        while ($row = mysqli_fetch_assoc($result))
            {
                $k = $k + 1;
                $textid_vehicle[$k-1]=$row['textid']; 
            };
        return $textid_vehicle;
    }

?>
