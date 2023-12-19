

<?php
// CONTENT: CREATE TABLE USER
// INPUT: $request,$id_manage
// OUTPUT: CREATE TABLE USER
// Start the session
?>

<?php
// table main user
$flag= $_POST['flag'];
//////post///////////
$language_btn = $_POST["language_btn"]??"";

if($flag === "1")
    {
        $request = $_POST['rq'];
        $link_file_json= "../../../Data/UserData/". $_SESSION['ID'] ."/".$request .".json";
        $link_file_json_add= "../../../Data/UserData/". $_SESSION['ID'] ."/". $_POST['rq']."_".$language_btn.".json";
    }
else
    {
        $request = $_SESSION['request'];
        $link_file_json = $_SESSION['link_file_json'];
        $link_file_json_add = "../../../Data/UserData/". $_SESSION['ID'] ."/". $request."_".$language_btn.".json";
    }


$jsonString = file_get_contents($link_file_json);
$jsonData = json_decode($jsonString, true);
//////////////json_add///////////////

if (is_file($link_file_json_add) == 1 )
    {
        $jsonString_add = file_get_contents($link_file_json_add);
        $jsonData_add = json_decode($jsonString_add, true);
    }

$arr_col=[];
foreach ($jsonData['validation_request'] as $text=>$value1)
    {
        foreach ($jsonData['validation_request'][$text]['language'] as $language=>$value2)
            {
                if ($value2['content'] !== "0"&& $language!=="US_English")
                    {   
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
                                    echo "<td class ='request' id='td_request_".$count_row."_".$count_col."'>".$request."</td>";
                                    $count_col=$count_col+1;
                                    echo "<td class ='textid' id='td_textid_".$count_row."_".$count_col."'>".$txtid."</td>";
                                    $count_col=$count_col+1;
                                    echo "<td class ='content_' id='td_content_".$count_row."_".$count_col."'>".$jsonData['validation_request'][$txtid]["content"]."</td>";
                                    $count_col=$count_col+1;
                                    echo "<td class ='displaytype' id='td_displaytype_".$count_row."_".$count_col."'>".$jsonData['validation_request'][$txtid]['display_type']."</td>";
                                    $count_col=$count_col+1;
                                    $firstUnderscorePos = strpos($txtid, '_');
                                    $secondUnderscorePos = strpos($txtid, '_', $firstUnderscorePos + 1);
                                    $pic_name = substr($txtid, 0, $secondUnderscorePos);
                                    $link_pic_layout = "../../../../Data/ProjectData/Layout_pic/" . $pic_name . ".PNG";
                                    echo "<td class ='layout' id='td_layout_".$count_row."_".$count_col."'>"."<img id = 'layout_pic' height = '80px' src='".$link_pic_layout."'>"."</td>";
                                    $count_col=$count_col+1;
                                    echo "<td class ='limitlenght' id='td_limitlenght_".$count_row."_".$count_col."'>".$jsonData['validation_request'][$txtid]['limit_lenght']."</td>";
                                    $count_col=$count_col+1;
                                    echo "<td class = 'numberofline' id='td_numberofline_".$count_row."_".$count_col."'>".$jsonData['validation_request'][$txtid]['number_line']."</td>";
                                    $count_col=$count_col+1;
                                    echo "<td class = 'us' id='td_language_".$count_row."_".$count_col."'>".$jsonData['validation_request'][$txtid]['language']['US_English']['content']."</td>";
                                    $count_col=$count_col+1;
                                    echo "<td class = 'language_tonggle' id='td_language_tonggle".$count_row."_".$count_col."'>".$jsonData['validation_request'][$txtid]['language'][$language]['content']."</td>";
                                    
                                    if ($count_row == 1){
                                        echo'<td class = "mail" rowspan = "'.count($arr_col[$language]).'" > 
                                                <form  id="Validator_Request_form_mail_deadline"   >
                                                    <span class=" wendigo"  >
                                                    <label for="input_mail">Address Mail:</label>
                                                        <br>
                                                            <input type="text" id="'.$language.'_mail" name="input_mail" value="'.$jsonData_add["validator"]["mail"].'" >
                                                        <br>
                                                    </span>
                                                    <span class=" wendigo"  >
                                                    <label for="input_deadline">Deadline Request:</label>
                                                        <br>
                                                            <input onchange = "deadline_check(this.id)" type="date" id="'.$language.'_deadline" name="input_deadline" value="'.$jsonData_add["deadline"].'">
                                                        </span>
                                                </form>
                                            </td>'; 
                                    }
                                $count_row=$count_row+1;
                                $last_request = $last_request+1;
                                }
                            }    
                        }
                       
                    }
 
                  echo "</tr>";          
               ?>
        </tbody>
    </table>

    <script>
    //Deadline day check 
    function deadline_check(id){
        var deadline_day = document.getElementById(id).value;
        var now_date = Date.now();

        //  Date from timestamp
        const dateObj = new Date(now_date);

        // get day,month,year 
        const day = dateObj.getDate();
        const month = dateObj.getMonth() + 1; 
        const year = dateObj.getFullYear();

        //"yyyy/mm/dd"
        const formattedDate = `${year}-${month < 10 ? '0' + month : month}-${day < 10 ? '0' + day : day}`;
        if(deadline_day<formattedDate){
            alert("Please set dealine again ! (Deadline is before today )");
            document.getElementById(id).value = "";
            }
        }
</script>

</html> 