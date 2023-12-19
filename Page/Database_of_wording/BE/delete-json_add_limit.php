<?php
$link_file = "../../../Data/UserData/file_draft_limit_length_add_new.json";
$fileToDelete = $link_file; // The path to the JSON file to be deleted

if (unlink($fileToDelete)) 
    {
        echo 'The JSON file has been deleted successfully.';
    } 
else 
    {
        echo 'Error deleting JSON file.';
    }
?>