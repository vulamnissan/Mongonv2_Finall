<?php
include "my_sql.php";
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");
$data_add_col = $_POST['arr_data_add_col']??"";
$meter_add = $_POST['meter_add']??"";
$vehicle_add = $_POST['vehicle_add']??"";

$last_row_vehicle_language = get_count_vehicle_language($qr, $db);
$query_insert_vehicle_to_vehicle_language = $qr-> insert_vehicle_to_vehicle_language($db, $table, $last_row_vehicle_language, $vehicle_add, $meter_add);
$add_cl = $qr -> add_cl($db, $vehicle_add);
$temp_field = '';


foreach($data_add_col[$vehicle_add] as $key => $value)
    {
        $update_table = $qr -> update_textid_vehicle_new($db, $vehicle_add, $value, $key);
    }

function get_count_vehicle_language($qr, $db)
    {
        $result= $qr->count_data($db, "vehicle_language");
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

echo "Update VEHICLE & METER completed";
?>