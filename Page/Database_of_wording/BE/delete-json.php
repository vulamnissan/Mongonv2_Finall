<?php
//DELETE FILE JSON WHEN SELECT BUTTON RESET
$user_name = $_SESSION["name"]??"";
$user_id = $_SESSION["ID"];
include "connect_database.php";
$json_data = file_get_contents(trim($_POST["link_file"]??""));
$products = json_decode($json_data, true); 
$connect = connect_db($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);

foreach($products[$user_name] as $key => $value) 
    {
        $add_sql = "SELECT * FROM textid_infor  WHERE textid_infor.textid ='$key' ";
        $result = $connect  -> query($add_sql);

        if ($result->num_rows > 0){
            while ($row = $result-> fetch_assoc()){
                $products[$user_name][$key]['Content'] = $row['content'];
                $products[$user_name][$key]['Meter type'] = $row['meter_type'];
                $products[$user_name][$key]['Display type'] = $row['display_type'];
                $products[$user_name][$key]['Number of lines'] = $row['number_lines'];
                $products[$user_name][$key]['US English'] = $row['US_English'];
                $products[$user_name][$key]['Japanese']= $row['Japanese'];
                $products[$user_name][$key]['Vehicle already applied']= $row['VehicleApplied'];
                $products[$user_name][$key]['Manager approval status']= $row['ManagerApproval'];
                $products[$user_name][$key]['Date']= $row['Date'];
            }
        }
    }
$link_file = "../../../Data/UserData/".$user_id."/".$_POST['rq'].".json";
$jsonString = json_encode($products, JSON_PRETTY_PRINT);
if (file_put_contents($link_file, $jsonString)) 
    {
        echo "Reset successfully";
    }
else
    {
        echo "Fail to Reset";
    }
?>