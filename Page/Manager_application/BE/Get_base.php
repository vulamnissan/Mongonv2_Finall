<?php
    //CONTENT: LIST BASE WHEN ADD VEHICLE
    //INPUT: 
    //OUTPUT: LIST BASE WHEN ADD VEHICLE
    include "MySql.php";
    $db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
    $qr= new Query("mongonv2");
    //1. GET LIST VEHICLE FROM DATABASE
    $arr_vehicle=[];
    $count_vehicle_language = load_count_vehicle_language($db,$qr);
    while ($row = mysqli_fetch_assoc($count_vehicle_language))
        {
            $arr_vehicle[]=$row['Vehicle'];
        }
    function load_count_vehicle_language($db,$qr)
        {
            $result= $qr->select_vehicle($db,"vehicle_language");
            return $result;
        }

    //2. OUTPUT LIST VEHICLE
    print_r(json_encode($arr_vehicle));
?>