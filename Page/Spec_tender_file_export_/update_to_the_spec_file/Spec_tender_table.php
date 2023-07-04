<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->
    

<?php

require_once(__DIR__.'/vendor/autoload.php');
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$reader->setReadDataOnly(True);
$spreadsheet = $reader->load(__DIR__.'/form_input_language.xlsx');
// $sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
$sheet = $spreadsheet->getSheetByName('Sheet2');
$array_in  = $sheet->toArray();
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 

// header('Content-Type: application/vnd.ms-excel');
// header('Content-Disposition: attachment;filename="hello_world.xlsx"');


$lange_arr_temp = $_GET['list_lan'];
// print_r($lange_arr_temp);

$ouput_version_number_temp = array();
$ouput_version_number_temp = explode("_@_",$lange_arr_temp);

// truyen ten luu file
$ouput_version_number = $ouput_version_number_temp[1];
// echo $ouput_version_number;

echo "<div id ='output_version_number' style='display:none'>$ouput_version_number_temp[1]</div>";


#--------------
$lange_arr_temp2 = $ouput_version_number_temp[0];
$lange_arr = array();
$lange_arr = explode('_0_',$lange_arr_temp2);

// $lange_arr_temp = $_GET['list_lan'];
// // print_r($lange_arr_temp);
// $lange_arr = array();
// $lange_arr = explode('_0_',$lange_arr_temp);
// echo"<pre>";
// print_r($lange_arr);
// echo count($lange_arr);

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
// echo"<pre>";
// print_r($check_language);

for ($i=0;$i<count($lange_arr)-1;$i++){
    $lange_arr[$i]=$check_language[$lange_arr[$i]];
}
// echo "<pre>";
// print_r($lange_arr);





//###################

$conn = mysqli_connect('localhost','root','','mongonv2');
$sql = "SELECT id, textid, ver,
US_English,
Japanese_text,	
Arabic_text	,
BrazilianPortuguese_text,	
British_text,		
CanadianFrench_text,	
Chinese_text,	
Czech_text,	
Danish_text,	
Dutch_text,	
Finnish_text,		
French_text,	
German_text,	
Greek_text,	
Hungarian_text,		
Italian_text,		
Korea_text,		
MexicanSpanish_text,	
Norwegian_text,	
Polish_text,	
Portuguese_text,	
Russian_text,		
Slovak_text,	
Spanish_text,	
Swedish_text,		
Taiwanese_text,	
Thai_text,	
Turkish_text,		
Ukrainian_text
FROM textid_language WHERE (textid,ver) IN ( SELECT textid, MAX(ver) FROM textid_language WHERE textid IN (SELECT textid FROM textid_language) GROUP BY textid)GROUP BY textid";
$result = $conn  -> query($sql);
$array_db = mysqli_fetch_all($result);
// echo "<pre>";
// print_r($array_db);
?>
<!-- <style>
    #table td{
        border: solid black 1px;
    }
    #table tr{
        border: solid black 1px;
    }

    .khac{
        background-color: red;
    }
    .giong{
        background-color: green;
    }
    #input_1{
        margin-right: auto;
    }
</style> -->
<table id = "table_">
        <thead  class="sticky">
        <?php 
        echo "<tr>";
        echo "<th  class='textid_spec' rowspan = '2'> TextID </th>";
        for ($i=0; $i <count($lange_arr_temp)-1 ; $i++){
            echo "<th colspan = '2'>" .$lange_arr_temp[$i]. "</th>";
        }
        // echo "<th rowspan = '2'>TextID</th>";
        for ($i=5;$i<=32;$i++){
            
        }
        echo "</tr>";

        echo "<tr>";

        // echo "<th></th>";
        for ($i=1; $i <count($lange_arr) ; $i++){
            echo "<th>Data Base</th>";
            echo "<th>Select File</th>";
        }
        // echo "<th rowspan = '2'>TextID</th>";
        // for ($i=5;$i<=32;$i++){
            
        // }
        echo "</tr>";
        ?>
        </thead>
        <tbody>

<?php



for ($x=10; $x <= count($array_in);$x++){
    for ($y=0; $y<=count($array_db);$y++){
        if ($array_in[$x][1] == $array_db[$y][1]){
            echo "<tr>";
            echo "<td id = 'text_".$x."'>" . $array_in[$x][1] . "</td>"; 
            for ($i=0; $i<=count($array_db[0]); $i++){
                
                if (in_array($i,$lange_arr)){
                    if ($array_in[$x][$i+4] == $array_db[$y][$i+3]){
                        
                        // echo "<td class = 'giong'>". "<input type='checkbox' id='input_1'>" . $array_db[$y][$i+3] . "</td>";
                        // echo "<td class = 'giong'>" .$array_in[$x][$i+4]."</td>"; 
                        echo "<td class = 'giong'>" . $array_db[$y][$i+3] . "</td>";
                        echo "<td class = 'giong'>" . $array_in[$x][$i+4] . "</td>"; 

                        
                    }else{
                        
                        echo "<td class = 'khac' id='text_db_".$x."_".($i+4)."'>". "<input type='checkbox' id='input_".$x."_".($i+4)."'>" . $array_db[$y][$i+3] . "</td>";
                        echo "<td class = 'khac' id='text_excel_".$x."_".($i+4)."'>".$array_in[$x][$i+4]."</td>";
                    

                        
                    }
                if (isset($_POST["input_".$y.$x.$i])){
                    $array_in[$x][$i+4] = $array_db[$y][$i+3];
                }

                }
            }
            echo "</tr>";
        }
    }
}



?>
</tbody>
</table>

<!-- </body>
</html> -->
<script>
var data_change_save =document.getElementById("btn_Spec_tender_file_export_Export_file");
var table =document.getElementById("table_");
var data_table={};
data_change_save.addEventListener("click",function(){
    var last_row=table.rows.length;
    // var last_row=10;
    var last_col = table.rows[2].cells.length;
    // console.log(document.getElementById("input_10_4").checked);
    // console.log(last_row);
    // console.log(last_col);
    for (i=10;i<last_row+5;i++)
    {
        var txt = document.getElementById("text_"+i).innerHTML;
        data_table[txt]={};
        for(j=0;j<50;j++)
        {
            // if (document.getElementById("input_"+i+"_"+j).checked)
            //     {
            //         data_table[i+"_"+j]=document.getElementById("text_db_"+i+"_"+j).innerHTML;
            //     }
            // console.log(j);
            try
            {
                // console.log(document.getElementById("text_db_"+i+"_"+j).innerHTML);
                if (document.getElementById("input_"+i+"_"+j).checked)
                {
                    // data_table[i+"_"+j]=document.getElementById("text_db_"+i+"_"+j).innerHTML;
                    temp = document.getElementById("text_db_"+i+"_"+j).innerHTML;
                    data_table[i+"_"+j] = temp.replace('<input type="checkbox" id="input_'+i+'_'+j+'">',"");
                    
                }
                else
                {
                    // data_table[i+"_"+j]=document.getElementById("text_excel_"+i+"_"+j).innerHTML;
                }

            }
            catch
            {

            }

        }
    }
    $(document).ready(function()
    {
         var output_version_number = document.getElementById("output_version_number").innerHTML;
        //  console.log(output_version_number);
        $.post("Export_excel.php", {arr_data:data_table,file_:output_version_number}, function(data){
            //  console.log(output_version_number);
            console.log(data);
            // $('#Wraper_table_Translation_Request_info').html(data);
            // alert(data);
        });

    })

    alert("downloaded");

    
    
})


</script>