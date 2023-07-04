<?php
// Start the session
session_start();
?>
<?php
$request = $_POST["request"]??"";
$id_manager = $_COOKIE['ID'];
$link_file_json_manager = "../../../Data/UserData/".$id_manager."/".$request.".json";
$link_file_json_add = "../../../Data/UserData/".$id_manager."/".$request."_add.json";


$jsonString = file_get_contents($link_file_json_manager);
$jsonData = json_decode($jsonString, true);
//////////////json_add///////////////




if (is_file($link_file_json_add) == 1 ){
    $jsonString_add = file_get_contents($link_file_json_add);
    $jsonData_add = json_decode($jsonString_add, true);
}
// echo "<pre>";
// print_r($jsonData_add);
//////post///////////
$language_btn = $_POST["language_btn"]??"";

// echo $link_file_json;
// check cac ngon ngu da duoc tick dich
$arr_col=[];
foreach ($jsonData['validation_request'] as $text=>$value1)
{
    foreach ($jsonData['validation_request'][$text]['language'] as $language=>$value2)
    {
        if ($value2['content'] !== "0"&& $language!=="US_English")
        {   
            // echo $value2;
            $arr_col[$language][$text]= $value2['content'];
        }
    }
}


?>

<html>
    <table id="myTable_Validator_Request_user" style= "border-collapse:collapse;" border =1px;>
        <thead>
            <th id = 'th_requestnumber_1_1'>Request Number</th>
            <th id ='th_textid_1_2'>Text ID</th>
            <th id='th_content_1_3'>What you want to convey to customers</th>
            <th id ="th_dislplay_1_4">Display Type</th>
            <th id='th_layout_1_5'>Layout</th>
            <th id ="th_limitlenght_1_6">Limit lenght</th>
            <th id="th_numberoflines_1_7">Number of lines</th>
            <th id="th_language_1_8">US_English</th>
            <th id="th_language_1_9"><?php echo $language_btn ; ?></th>
            <th id="mail_valid">Mail</th>
        </thead>
        <tbody>
                <?php
                    $count_row=1;
                    $count_col=1;
                    foreach ($arr_col as $language=>$value)
                    {
                        if ($language == $language_btn){
                            foreach($arr_col[$language] as $txtid=>$value){
                                if($arr_col[$language][$txtid] !== "" ){
                                    echo "<tr>";
                                    echo "<td id='td_request_".$count_row."_".$count_col."'>".$request."</td>";
                                    $count_col=$count_col+1;
                                    echo "<td id='td_textid_".$count_row."_".$count_col."'>".$txtid."</td>";
                                    $count_col=$count_col+1;
                                    echo "<td id='td_content_".$count_row."_".$count_col."'>".$jsonData['validation_request'][$txtid]["content"]."</td>";
                                    $count_col=$count_col+1;
                                    echo "<td id='td_displaytype_".$count_row."_".$count_col."'>".$jsonData['validation_request'][$txtid]['display_type']."</td>";
                                    $count_col=$count_col+1;
                                    echo "<td id='td_kayout_".$count_row."_".$count_col."'>".$jsonData['validation_request'][$txtid]['layout']."</td>";
                                    $count_col=$count_col+1;
                                    echo "<td id='td_limitlenght_".$count_row."_".$count_col."'>".$jsonData['validation_request'][$txtid]['limit_lenght']."</td>";
                                    $count_col=$count_col+1;
                                    echo "<td id='td_numberofline_".$count_row."_".$count_col."'>".$jsonData['validation_request'][$txtid]['number_line']."</td>";
                                    $count_col=$count_col+1;
                                    echo "<td id='td_language_".$count_row."_".$count_col."'>".$jsonData['validation_request'][$txtid]['language']['US_English']['content']."</td>";
                                    $count_col=$count_col+1;
                                    echo "<td id='td_language_lam".$count_row."_".$count_col."'>".$jsonData['validation_request'][$txtid]['language'][$language]['content']."</td>";
                                    if ($count_row == 1){
                                        echo'<td rowspan = "'.count($arr_col[$language]).'" > 
                                                <form  id="Validator_Request_form_mail_deadline"   >
                                                    <span class=" wendigo"  >
                                                    <label for="input_mail">Address Mail:</label>
                                                        <br>
                                                            <input class="input1" type="text" id="'.$language.'_mail" name="input_mail" value="'.$jsonData_add[$language]["mail"].'" >
                                                        <br>
                                                    </span>
                                                    <span class=" wendigo"  >
                                                    <label for="input_deadline">Deadline Request:</label>
                                                        <br>
                                                            <input class="input1"  type="text" id="'.$language.'_deadline" name="input_deadline" value="'.$jsonData_add[$language]["deadline"].'" >
                                                        </span>
                                                </form>
                                            </td>'; 
                                    }
                                $count_row=$count_row+1;
                                }
                            }    
                        }
                       
                    }
 
                  echo "</tr>";          
               ?>
        </tbody>
    </table>

  
</html> 