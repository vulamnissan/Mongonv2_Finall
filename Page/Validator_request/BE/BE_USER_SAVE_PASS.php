
<?php
// CONTENT: save pass user
// INPUT: $request, flag,password
// OUTPUT: save pass user 
// Start the session
session_start();
?>

<?php
    $flag= $_POST['flag']??"";
    $link_file_json_add= $_POST['link_file_json_add']??"";

    if($flag == "1")
        {
            $request = $_POST['request'];
            $link_file_json= "../../../Data/UserData/". $_SESSION['ID'] ."/".$request .".json";
        }
    if($flag == "0")
        {
            $request = $_SESSION['request'];
            $link_file_json = $_SESSION['link_file_json'];
        }
    $link_file_json_add = explode(".json", $link_file_json_add);
    $link_file_json_add=$link_file_json_add[0].".json";
    $jsonString = file_get_contents($link_file_json_add);

        
    $jsonData = json_decode($jsonString, true);
    $pw=$_POST["pw"]??"";
    $jsonData["password"]=$pw;
    $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
    if (file_put_contents($link_file_json_add,$jsonString)) 
        {
            echo "Set password successfully";
        }
    else
        {
            echo "Fail to set password";
        }
?>