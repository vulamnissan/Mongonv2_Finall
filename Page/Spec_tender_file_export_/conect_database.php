<?php
include "../Translation_Request/BE/MySql.php";
$db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
$qr= new Query("mongonv2");
        $result = $qr->select_data($db,"vehicle_language");
        $arr = array();
        if ($result->num_rows>0){
            while ($row = $result -> fetch_assoc()){
                $count = 0;
                $ind = 0;
                foreach($row as $keys => $data){
                    $status = "";
                    $arr[$ind] = $data;
                    $ind = $ind +1;
                }
                echo "<pre>";
                    $i=1;
                    $count_col =$count_col+1;
                    echo "<option id = 'vehicle_".$count_col."' class = '". $status ."' >" . $arr[$i] . "</option>"; 
                }}
            
                
    ?> 


            
        
        
