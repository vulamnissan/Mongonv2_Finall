<?php

use PhpMyAdmin\Config\Settings\Console;
use PhpOffice\PhpSpreadsheet\Helper\Downloader;

    $arr_data=$_POST["arr_data"]??"";
    $name_file = $_POST["file_"]??""; 
    $name_file = $name_file.".xlsx";
    // echo $name_file;
    // print_r($arr_data) ;
    print('go');

    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet; 
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    
    $link_file="form_input_language.xlsx";

    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($link_file);
    $worksheet =$spreadsheet -> getSheetByName("Sheet2");
    

    foreach ($arr_data as $key=>$value)
    {
        $key = explode("_",$key);
        print_r($value) ;
        $worksheet-> setCellValue([$key[1]+1,$key[0]+1],$value);

    }
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet,'Xlsx');

    //link download
    $save_path = "".$name_file;
    // $save_path = $name_file;

    echo $save_path;  
    $writer->save($save_path);

?>



