<?php

use PhpMyAdmin\Config\Settings\Console;
use PhpOffice\PhpSpreadsheet\Helper\Downloader;

    $arr_data = $_POST["arr_data"]??"";
    $arr_textid = $_POST["arr_textid"]??""; 
    $count_textid = $_POST["count_textid"]??"";
    $name_file = $_POST["file_"]??""; 
    $username = $_POST["username"]??""; 
    $version = $name_file;
    $currentDateTime = date('Y-m-d');
    $name_file = $name_file.".xlsx";
    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet; 
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    
    $link_file=$_SESSION["uploads_file"];
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($link_file);
    $worksheet =$spreadsheet -> getSheetByName("mongon");
    $hencou_array = array();

    foreach ($arr_textid as $key=>$value){
        $key = explode("_",$key);
        $col_temp = $key[1]+1 ;
        $row_temp = $key[0]+1 ;

        $hencou_array[$row_temp] = array();
        $hencou_array[$row_temp][] = $value; 

        $worksheet-> setCellValue([$col_temp,$row_temp],$value);
        $cell = $worksheet->getCellByColumnAndRow($col_temp, $row_temp);
        $style = $cell->getStyle();
        $font = $style->getFont();
        $font->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    }

    foreach ($arr_data as $key=>$value){
        $key = explode("_",$key);
        $value = str_replace("<br>","",$value);
        $col_temp = $key[1]+1 ;
        $row_temp = $key[0]+1 ;

        $language_row = 8;
        $hencou_language = $worksheet->getCellByColumnAndRow($col_temp, $language_row)->getValue();
        
        $cellValue = $worksheet->getCellByColumnAndRow($col_temp, $row_temp)->getValue();
        $worksheet-> setCellValue([$col_temp,$row_temp],$value);
        $hencou_array[$row_temp][] = "[" . $hencou_language . ":"  . $cellValue . " -> " . $value . "]";

        $cell = $worksheet->getCellByColumnAndRow($col_temp, $row_temp);
        $style = $cell->getStyle();
        $font = $style->getFont();
        $font->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 

    }

    $data = $worksheet->toArray();
    $count_textid = $count_textid+1;
    for ($rowIndex = $count_textid; $rowIndex > 9; $rowIndex--) {
        $currentRow = $data[$rowIndex];
        if (empty($currentRow[1])) {
            $worksheet->removeRow($rowIndex + 1);
        }
    }

    //------------------------------------------------------------------------

    $worksheet2 =$spreadsheet -> getSheetByName("歴史");    
    $mergedData = "";
    foreach ($hencou_array as $row) {
        $mergedData .= $row[0] . ": " . implode(", ", array_slice($row, 1)) . "\n";
    }
    $lastRow = 3; 
    for ($i = 3; $i<2000; $i++) {
        $cell_cB = $worksheet2->getCellByColumnAndRow(2, $i)->getValue();
        if (empty($cell_cB)) {
            $lastRow = $i;
            break;
        }
    }
    $worksheet2-> setCellValue([2,$lastRow],$currentDateTime);  //date
    $worksheet2-> setCellValue([6,$lastRow],$version);          //file name
    $worksheet2-> setCellValue([10,$lastRow],$mergedData);      //hencou contents
    $worksheet2-> setCellValue([42,$lastRow],$username);        //author

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet,'Xlsx');

    //link download
    $save_path = "".$name_file;
    echo $name_file;
    $writer->save($save_path);

?>



