
<?php
// CONTENT: NEXT PAGE
// INPUT: $pw,$id_manage
// OUTPUT: save file josn_add 
// Start the session
?>
<?php
    $request = $_POST["request"]??"";
    $language_th = $_POST["language_th"]??"";
    $deadline = $_POST["deadline"]??"";
    $mail = $_POST["mail"]??"";
    $id_manager = $_SESSION['ID'];
    $link_file_json_manager = "../../../Data/UserData/".$id_manager."/".$request.".json";

    $jsonString = file_get_contents($link_file_json_manager);
    $jsonData = json_decode($jsonString, true);
    $jsonData["mail"]=$mail;
    $jsonData["deadline"]=$deadline;
    $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);

    if (file_put_contents($link_file_json_manager,$jsonString)) 
        {
            echo "Save successfully";
        }
    else
        {
            echo "Fail to save";
        }



?>