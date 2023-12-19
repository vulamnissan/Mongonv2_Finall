<?php
include "../../Translation_Request/BE/MySql.php";
$db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
$qr= new Query("mongonv2");
require_once(__DIR__.'/vendor/autoload.php');
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$reader->setReadDataOnly(True);
$spreadsheet = $reader->load(__DIR__.'/'.$_SESSION["uploads_file"]);
$sheet = $spreadsheet->getSheetByName('mongon');
$array_in  = $sheet->toArray();
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 

$lange_arr_temp = $_GET['list_lan'];
$ouput_version_number_temp = array();
$ouput_version_number_temp = explode("_@_",$lange_arr_temp);
$ouput_version_number = $ouput_version_number_temp[1];
$_SESSION["download_file"] = $ouput_version_number . ".xlsx";
$select_project = $ouput_version_number_temp[2];

echo "<div id ='output_version_number' style='display:none'>$ouput_version_number_temp[1]</div>";
#--------------
$lange_arr_temp2 = $ouput_version_number_temp[0];
$lange_arr = array();
$lange_arr = explode('_0_',$lange_arr_temp2);
$lange_arr_temp = $lange_arr;
$check_language = array(
'US_English'=> "0",
'Japanese_text'=> "1",	
'Arabic_text'=> "2",
'BrazilianPortuguese_text'=> "3",	
'British_text'=> "4",		
'CanadianFrench_text'=> "5",	
'Chinese_text'=> "6",	
'Czech_text'=> "7",	
'Danish_text'=> "8",	
'Dutch_text'=> "9",	
'Finnish_text'=> "10",		
'French_text'=> "11",	
'German_text'=> "12",	
'Greek_text'=> "13",	
'Hungarian_text'=> "14",		
'Italian_text'=> "15",		
'Korea_text'=> "16",		
'MexicanSpanish_text'=> "17",	
'Norwegian_text'=> "18",	
'Polish_text'=> "19",	
'Portuguese_text'=> "20",	
'Russian_text'=> "21",		
'Slovak_text'=> "22",	
'Spanish_text'=> "23",	
'Swedish_text'=> "24",		
'Taiwanese_text'=> "25",	
'Thai_text'=> "26",	
'Turkish_text'=> "27",		
'Ukrainian_text'=> "28");

for ($i=0;$i<count($lange_arr)-1;$i++){
    $lange_arr[$i]=$check_language[$lange_arr[$i]];
}


//################### sql database: textid_language

$result = $qr -> select_textID_language($db);
$array_db = mysqli_fetch_all($result);

//################################### sql database: textid_vehicle lay cac gia tri textid tuong ung voi loai xe
$result2 = $qr -> select_textid_vehicle($db,$select_project);
$array_db_select_project_textid = mysqli_fetch_all($result2);

$array_db_select_project_textid = array_reduce($array_db_select_project_textid, 'array_merge', []);
?>
<table id = "table_">
        <thead  class="sticky">
        <?php 
        echo "<tr>";
        echo "<th  class='textid_spec' rowspan = '2'> TextID </th>";
        for ($i=0; $i <count($lange_arr_temp)-1 ; $i++){
            echo "<th colspan = '2'>" .$lange_arr_temp[$i]. "</th>";
        }
        for ($i=5;$i<=32;$i++){
            
        }
        echo "</tr>";

        echo "<tr>";
        for ($i=1; $i <count($lange_arr) ; $i++){
            echo "<th>Data Base</th>";
            echo "<th>Select File</th>";
        }
        echo "</tr>";
        ?>
        </thead>
        <tbody>

<?php

$textid_list = array();
$array_in_textid = [];
foreach ($array_in as $item) {
    $array_in_textid[] = $item[1];
}

$array_in_textid = array_filter($array_in_textid, function($value) {
    return trim($value) !== ''; 
});
$array_in_textid = array_values($array_in_textid); 

for ($x=10; $x <= count($array_in);$x++){ 
    for ($y=0; $y<=count($array_db);$y++){
        if (($array_in[$x][1] == $array_db[$y][1]) and (in_array($array_in[$x][1],$array_db_select_project_textid)) ){
            echo "<tr style='display:none' >";
            echo "<td>" . $array_in[$x][1] . "</td>"; 
            for ($i=0; $i<=count($array_db[0]); $i++){
                
                if (in_array($i,$lange_arr)){
                    if (trim($array_in[$x][$i+4]) == trim($array_db[$y][$i+3]))
                        {
                            echo "<td class = 'giong'>" . $array_db[$y][$i+3] . "</td>";
                            echo "<td class = 'giong'>" . $array_in[$x][$i+4] . "</td>"; 
                        }
                    else
                        {
                            $textid_list[] = $array_in[$x][1];
                            echo "<td>". $array_db[$y][$i+3] ."</td>";
                            echo "<td>". $array_in[$x][$i+4] ."</td>";
                        }
                }
            }
            echo "</tr>";
            #-----------------------------------------------------------------------------------------
            echo "<tr>";
            if (in_array($array_in[$x][1],$textid_list)){
                echo "<td id = 'text_".$x."'>" . $array_in[$x][1] . "</td>"; 
                for ($i=0; $i<=count($array_db[0]); $i++){
                    
                    if (in_array($i,$lange_arr)){
                        if (trim($array_in[$x][$i+4]) == trim($array_db[$y][$i+3])){
                            
                            echo "<td class = 'giong'>" . $array_db[$y][$i+3] . "</td>";
                            echo "<td class = 'giong'>" . $array_in[$x][$i+4] . "</td>"; 
                            
                        }else{
                            
                            echo "<td class = 'khac' id='text_db_".$x."_".($i+4)."'>". "<input type='checkbox' id='input_".$x."_".($i+4)."'></br>" . $array_db[$y][$i+3] . "</td>";
                            echo "<td class = 'khac' id='text_excel_".$x."_".($i+4)."'>".$array_in[$x][$i+4]."</td>";                    
                            
                        }
                        if (isset($_POST["input_".$y.$x.$i])){
                            $array_in[$x][$i+4] = $array_db[$y][$i+3];
                        }

                    }
                }
            }    
            echo "</tr>";
        }
    }
}

$temp = count($array_in_textid)+7;
$x = $temp;
for ($y=0; $y<=count($array_db);$y++){
    if ((!in_array($array_db[$y][1],$array_in_textid)) and (in_array($array_db[$y][1], $array_db_select_project_textid)) and ($array_db[$y][1] != "")){
        $x = $x + 1;
        echo "<tr>";
        echo "<td id = 'text_".$x."' >" . $array_db[$y][1] . "</td>"; 
        for ($i=0; $i<=count($array_db[0]); $i++){                
            if (in_array($i,$lange_arr)){                
                echo "<td class = 'khac' id='text_db_".$x."_".($i+4)."' >". "<input type='checkbox' id='input_".$x."_".($i+4)."' ></br>" . $array_db[$y][$i+3] . "</td>";
                echo "<td class = 'khac' >"."</td>";                    
            }
        }
        echo "</tr>";
    }
}

$x = $x+1;
echo "<div id ='count_textid' style='display:none'>$x</div>";
?>
</tbody>
</table>

<script>
var data_change_save =document.getElementById("btn_Spec_tender_file_export_Export_file");
var download_output =document.getElementById("btn_Spec_tender_file_export_download_file");
var table =document.getElementById("table_");
var data_table={};
var data_textid={};

data_change_save.addEventListener("click",function(){
    var last_row=table.rows.length;
    var last_col = table.rows[2].cells.length;
    for (i=10;i<last_row+5;i++)
    {
        try{
            var txt = document.getElementById("text_"+i).innerHTML;
            data_table[txt]={};
            data_textid[txt]={};
            for(j=0;j<50;j++)
                {
                    try
                        {
                            if (document.getElementById("input_"+i+"_"+j).checked)
                            {
                                temp = document.getElementById("text_db_"+i+"_"+j).innerHTML;
                                data_table[i+"_"+j] = temp.replace('<input type="checkbox" id="input_'+i+'_'+j+'">',"");
                                temp2 = document.getElementById("text_"+i).innerHTML;
                                data_textid[i+"_1"] = temp2;
                            }
                            else
                            {
                                //nothing to do
                            }

                        }
                    catch
                        {
                            //nothing to do
                        }

                }
        }
        catch
            {
                    //nothing to do 
            }
    }
    $(document).ready(function()
        {
            var output_version_number = document.getElementById("output_version_number").innerHTML;
            var count_textid = document.getElementById("count_textid").innerHTML; 
            var username = document.getElementById("email").innerHTML;       
            $.post("Export_excel.php", {arr_data:data_table,arr_textid:data_textid,file_:output_version_number,count_textid:count_textid,username:username}, function(data){
                    alert(data);      
                    });
        })
})
</script>
