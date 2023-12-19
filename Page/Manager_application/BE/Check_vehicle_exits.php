<?php
    //CONTENT: CHECK VEHICLE IS EXITS IN TABLE VEHICLE LANGUAGE
    //INPUT: $new_vehicle
    //OUTPUT: OK OR NG

    //1. INPUT HANDLE
    $new_vehicle=$_POST["new_veh"]??"";

    include "MySql.php";
    $db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
    $qr= new Query("mongonv2");

    $result= $qr->select_vehicle($db, "vehicle_language");
    $arr_vehicle=[];
    while ($row = mysqli_fetch_assoc($result))
        {
            $arr_vehicle[]=$row['Vehicle'];
        }

    $arr_vehicle = array_map('strtoupper', $arr_vehicle);
    //2. OUTPUT
    if (in_array(strtoupper($new_vehicle), $arr_vehicle)) 
        {
            echo "OK";
        } 
    else 
        {
            echo "NG";
        }


?>