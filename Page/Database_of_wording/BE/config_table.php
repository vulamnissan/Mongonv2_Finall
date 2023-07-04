<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- <style>
    .blank {
        color: red;
    }
</style> -->
<body>
    <table id="myTable_Database_of_wording">
        <!-- <input type = "button" id = "save_btn" value= "save"> -->
        <!-- <tr> -->
            <!-- gan thead vao day -->
            <!-- <th>CK</th>
            <th>ID</th>
            <th>AC</th>
            <th>Company</th>
            <th>Form</th>
            <th>Volume</th> -->
        <!-- </tr> -->
        <thead id="thead_a" class="sticky-thead">
                                                                  <tr>
                                                                    <th id="th_check" rowspan="3">Check</th>
                                                                    <th id="th_textid" rowspan="3">Text ID</th>
                                                                    <th id="th_ver"  rowspan="3">Ver</th>
                                                                    <th id="th_eng">US English</th>
                                                                    <!-- <th colspan="6">English</th> -->
                                                                    <th colspan="6">Japanese</th>
                                                                    <th colspan="6">French</th>
                                                                    <th colspan="6">Italian</th>
                                                                    <th colspan="6">Japanese</th>
                                                                    <th colspan="6">French</th>
                                                                    <th colspan="6">Italian</th>
                                                                    <th colspan="6">Japanese</th>
                                                                    <th colspan="6">French</th>
                                                                    <th colspan="6">Italian</th>
                                                                    <th colspan="6">Japanese</th>
                                                                    <th colspan="6">French</th>
                                                                    <th colspan="6">Italian</th>
                                                                    <th colspan="6">Japanese</th>
                                                                    <th colspan="6">French</th>
                                                                    <th colspan="6">Italian</th>
                                                                    <th colspan="6">Japanese</th>
                                                                    <th colspan="6">French</th>
                                                                    <th colspan="6">Italian</th>
                                                                    <th colspan="6">Japanese</th>
                                                                    <th colspan="6">French</th>
                                                                    <th colspan="6">Italian</th>
                                                                    <th colspan="6">Italian</th>
                                                                  </tr>
                                                                  <tr>
                                                                    <th rowspan="2" id="th_text">Text</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    <th colspan="4">Translation</th>
                                                                    <th colspan="2">Validation</th>
                                                                    
                                                                  </tr>
                                                                  <tr>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Translation result</th>
                                                                    <th>Request code</th>
                                                                    <th>Translator</th>
                                                                    <th>Completion date</th>
                                                                    <th>Validator</th>
                                                                    <th>Completion date</th>

                                                                  </tr>
            </thead>
            <tbody>
        <?php
        include "connect_database.php"
        ?>
 <?php
            $connect = connect_db('localhost','mongonv2','root','');
            $add_sql = "SELECT * FROM textid_language";
            // echo $add_sql;exit;
            $result = $connect  -> query($add_sql);
        $arr = array();
        $count_row = 0;
            if ($result->num_rows > 0){
                while ($row = $result-> fetch_assoc()){
                    $count_col = 0;
                    $count_row = $count_row + 1;
                    $count = 0;
                    // print_r($row);
                    echo "<tr>";
                    echo "<td><input id = '".$count_row."db"."' type = \"checkbox\" class = \"check;\"/></td> ";
                    $ind = 0;
                    foreach($row as $keys => $data){
                        $status = "";
                        // print_r($row[$keys]);
                        $arr[$ind] = $data;
                        $ind = $ind + 1;
                    }
                    // echo "<pre>";
            // print_r($arr);
            for($i=1;$i <= 3;$i++){
                $count_col = $count_col + 1;
                echo "<td id = '".$count_row."db_".$count_col."' class = '". $status ."' >" . $arr[$i] . "</td>"; 
            }
            $check = 0;
            $check_1 =0;
            $status = "";
            for($i=4;$i <= count($arr)-1;$i++){
                $count_col = $count_col + 1;
                $status = "";
                $check = 0;
                if (($i-4)%6 ==0){
                    $status = "";
                for($j = $i+1;$j<= $i+5;$j++){
                    // echo "<td id = '".$count_row_1."_".($count_col-1)."' class = '". $status ."' >" . $arr[$j] . "</td>"; 
                    if($arr[$j] == NULL){
                        $check = $check+1;
                        continue;
                    }
                    else{
                        $check_1 = $check_1 + 1;
                        continue;
                    }
                    // print_r($arr[0]);
                }
                if($arr[$i] == NULL){
                    $check = $check+1;
                }
                if ($check ==6){
                    //to vang
                    $status = "blank"; 
                }
                if ($check <6 and $check !=0){
                    //to nau nau
                    $status = "normal"; 
                }
                if ($check ==0){
                    $status = "full";
                    //to mau green
                }
                echo "<td id = '".$count_row."db_".$count_col."' class = '". $status ."' >" . $arr[$i] . "</td>"; 

            }
            else{
                echo "<td id = '".$count_row."db_".$count_col."' class = '". $status ."' >" . $arr[$i] . "</td>"; 
            }
        }
                }
                echo "</tr>";
            }
            $connect -> close();
?> 
</tbody>
    </table>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  document.getElementById("btn_Information_about_TEXT_ID").addEventListener("click", function() {
    var rows = document.querySelectorAll('table#myTable_Database_of_wording > tbody > tr');
    var lastRow = rows.length;
    console.log(lastRow);
    var last_row= lastRow;
    // console.log(last_row);
    var last_col= 10;
    var temp = {};
    var temp_size = 0;
    for (i = 1;i <= last_row; i++) // chay tung dong
{
    if ($('#' + i + 'db').is(":checked")==true)
    {
            var temp_size = 1;
            var key_id=i + 'db_1';
            var key = document.getElementById(key_id).innerHTML;
            var temp_size = temp_size+1;
            var id_s = String(i) + 'db_' + String(1);
            var temp_value = document.getElementById(id_s).innerHTML;
            temp[i] = temp_value;
        }
    }
    $(document).ready(function(){
    $.post("../BE/object_textid_select.php", {flag: temp}, function(data){
        console.log(data);
    });
    });
  });
</script>
</html>