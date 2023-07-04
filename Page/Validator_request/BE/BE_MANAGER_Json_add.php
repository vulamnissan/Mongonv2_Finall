<?php
// Start the session
session_start();
?>

<?php
  $api_list=$_POST["api_list"]??"";
  $request = $_POST["request"]??"";
  $id_manager = $_COOKIE['ID'];
  $link_file_json_manager = "../../../Data/UserData/".$id_manager."/".$request.".json";
  $link_file_json_add = "../../../Data/UserData/".$id_manager."/".$request."_add.json";

// echo $request;
// $link_file_json = "../../../Data/UserData/data.json";
//  $link_file_json_add = "../../../Data/UserData/".$id_manager."/".$request."_add.json";
// echo is_file($link_file_json_add);
// echo $link_file_json_add;
if (is_file($link_file_json_add) == 1){
    $jsonString = file_get_contents($link_file_json_add);
    $jsonData = json_decode($jsonString, true);

    foreach ($api_list as $language=>$value){
        $jsonData[$language]['mail'] = $api_list[$language]['mail']  ;
         $jsonData[$language]['deadline'] = $api_list[$language]['deadline'] ;
    } 

    $jsonString_finall = json_encode($jsonData, JSON_PRETTY_PRINT);

    if (file_put_contents($link_file_json_add,$jsonString_finall)) 
    {
        echo "Save successfully";
        
    }
    else
    {
        echo "Fail to save";
       
    }

}
else
{
    $jsonString = json_encode($api_list, JSON_PRETTY_PRINT);
    //$link_file_json_add = "../../../Data/UserData/".$_COOKIE['ID'] ."/".$request."_add.json";
    // $_SESSION['link_file_json_add'] = "../../../Data/UserData/".$_COOKIE['ID'] ."/".$request."_add.json";
    if (file_put_contents($link_file_json_add,$jsonString)) 
    {
        echo "Save successfully";
        
    }
    else
    {
        echo "Fail to save";
       
    }
}



?>