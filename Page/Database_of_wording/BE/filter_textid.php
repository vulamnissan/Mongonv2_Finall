<?php
include "connect_database.php";
include "my_sql.php";
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");
$connection = mysqli_connect($_SESSION['db_host'], $_SESSION['db_user'], $_SESSION['db_pass'], $_SESSION['db_dbname']);
$result = $qr->select_data($db, 'textid_language');
$a = $_POST['filter_value']??"";
$type_filter = $_POST['type_filter']??"";
?>
<table id="myTable_Database_of_wording">
<thead id="thead_a" class="sticky-thead">
        <tr>
            <th id="th_check" rowspan="3">Check</th>
            <th id="th_textid" rowspan="3">Text ID</th>
            <th id="th_ver"  rowspan="3">Ver</th>
            <th id="th_eng">US English</th>      
            <?php
                unset($_SESSION['DB_'.$temp_id]);
                $connect = connect_db($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
                $result = $qr->select_data($db, 'textid_language');
                if ($result->num_rows > 0){
                    while ($row = $result-> fetch_assoc()){
                        $arr_key = array_keys($row);
                        for($i = 4;$i< count($arr_key);$i++){
                            echo "<th colspan='6'>".$arr_key[$i]."</th>";
                            $i = $i+ 5;
                        }
                    echo "</tr>";
                    break;
                    }
                }
                echo "<tr>";
                echo "<th rowspan=\"2\" id=\"th_text\">Text</th>";
                if ($result->num_rows > 0){
                    while ($row = $result-> fetch_assoc()){
                        $arr_key = array_keys($row);
                        for($i = 4;$i< count($arr_key);$i++){
                            echo "<th colspan='4'>Translation</th>";
                            echo "<th colspan='2'>Validation</th>";
                            $i = $i+ 5;
                        }
                    echo "</tr>";
                    break;
                    }
                }
                echo "<tr>";
                
                if ($result->num_rows > 0){
                    while ($row = $result-> fetch_assoc()){
                        $arr_key = array_keys($row);
                        for($i = 4;$i< count($arr_key);$i++){
                            echo "<th> Translation result</th>";
                            echo "<th >Request code</th>";
                            echo "<th >Translator</th>";
                            echo "<th >Completion date</th>";
                            echo "<th >Validator</th>";
                            echo "<th >Completion date</th>";
                            $i = $i+ 5;
                        }
                    echo "</tr>";
                    break;
                    }
                }
            ?>
                                                                  
    </thead>
    <tbody>
 <?php
            if (isset($_POST['filter_value']) && $a !== "") {
                $filterValue = $_POST['filter_value'];
                if($type_filter == 'textid' || $type_filter == 'US_English'){
                    $result = $qr->filter_db_wording($db, $table, $type_filter, $filterValue);
                }
                else{
                    $type_filter = $type_filter.'_text';
                    $result = $qr->filter_db_wording($db, $table, $type_filter, $filterValue);
                }
            }
            $arr = array();
            $count_row = 0;
            if ($result->num_rows > 0){
                while ($row = $result-> fetch_assoc()){
                    $count_col = 0;
                    $count_row = $count_row + 1;
                    $count = 0;
                    echo "<tr>";
                    echo "<td><input id = '".$count_row."db"."' type = \"checkbox\" class = \"check;\"/></td> ";
                    $ind = 0;
                    foreach($row as $keys => $data){
                        $status = "";
                        $arr[$ind] = $data;
                        $ind = $ind + 1;
                    }
                    for($i=1;$i <= 3;$i++){
                        $count_col = $count_col + 1;
                        echo "<td id = '".$count_row."db_".$count_col."' class = '". $status ."' >" . $arr[$i] . "</td>"; 
                    }
                    $check = 0;
                    $check_1 = 0;
                    $status = "";
                    for($i=4;$i <= count($arr)-1;$i++){
                        $count_col = $count_col + 1;
                        $status = "";
                        $check = 0;
                        if (($i-4)%6 ==0){
                            $status = "";
                            for($j = $i+1;$j<= $i+5;$j++){
                                if($arr[$j] == NULL){
                                    $check = $check+1;
                                    continue;
                                }
                                else{
                                    $check_1 = $check_1 + 1;
                                    continue;
                                }
                            }
                            if($arr[$i] == NULL){
                                $check = $check+1;
                            }
                            if ($check == 6){
                                $status = "blank"; 
                            }
                            if ($check <5 and $check !=0 ){
                                $status = "normal"; 
                            }
                            if ($check == 0 or $check == 5){
                                $status = "full";
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
<?php
// close connect
mysqli_close($connection);
?>
