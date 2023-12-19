<?php
// path of input file 
$file_path = "/var/www/html/mongonv2_official/Page/Spec_tender_file_export_/update_to_the_spec_file/".$_SESSION["download_file"]; 

if (file_exists($file_path)) 
    {
        ob_end_clean(); 
        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');    
        header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
        echo "Download complete ! ";
    exit;
    } 
else 
    {
        echo "File isn't excist.";
    }
?>
