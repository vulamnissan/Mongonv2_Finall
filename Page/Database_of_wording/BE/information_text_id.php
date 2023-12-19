<table id = "myTable">
        <thead>
            <th>Check</th>
            <th>Text ID</th>
            <th>Content</th>
            <th>Display type</th>
            <th>Meter type</th>
            <th>Number of lines</th>
            <th>US English</th>
            <th>Japanese</th>
            <th>Vehicle already applied</th>
            <th>Manager approval status</th>
            <th>Date</th>
        </thead>
        <p id="link_file_json" style = "display:none" ></p>
        <?php
            include "../../BE/main_function.php";
            $result_limit_display= $qr->select_limit_display_type($db, "fix_limit");
            $result_limit_meter= $qr->select_limit_meter($db, "fix_limit");
            $type_account = $_SESSION['type'];

            $arr_meter = [];
            if ($result_limit_meter->num_rows > 0){
                $i = 0;
                while ($row = $result_limit_meter-> fetch_assoc()){
                    $i += 1;
                    $arr_meter['meter'][$i-1] = $row['meter'];
                }
            }

            $arr_display_type = [];
            if ($result_limit_display->num_rows > 0){
                $i = 0;
                while ($row = $result_limit_display-> fetch_assoc()){
                    $i += 1;
                    $arr_display_type['display_type'][$i-1] = $row['display_type'];
                }
            }
                                    
            if($type_account === "user"){
                //========check type_account exists=========
                if (isset($_GET['id_user'])) {

                    $id_user_temp = $_GET['id_user']??"";
                    $rq_temp = $_GET['rq']??"";
                    $filePath = "../../../../Data/UserData/".$id_user_temp."/".$rq_temp.".json"; //link file json draft request
        ?>
                <tbody id = "table_user">
                <?php
                    if (file_exists($filePath)) {  //exists file json
                        $json_data = file_get_contents("../../../../Data/UserData/".$id_user_temp."/".$rq_temp.".json");
                        $products = json_decode($json_data, true); 
                        $data = array_values($products[$user_name]);
                        $k = 0;
                        $count_row = 0;
                        if(count($products) != 0){
                            foreach($products[$user_name] as $key => $value){  
                                echo "<tr>";
                                $k = $k + 1; 
                                echo "<td><input id ='".$k."' type = \"checkbox\" class = \"checkbox_Active\"/></td> ";
                                echo "<td id = '".$k."_1" ."' class = \"checkbox_Active\" >" . $key . "</td>"; 
                                for($i = $k - 1;$i < count($data); $i++){      
                ?>
                                <td class = "input_data" id = '<?php echo $k ."_2"?>'> <?php echo $data[$i]['Content'] ?> </td>
                                <td class = "input_data" id = '<?php echo $k ."_3"?>'> <?php echo $data[$i]['Display type'] ?> </td>
                                <td class = "input_data" id = '<?php echo $k ."_4"?>'> <?php echo $data[$i]['Meter type'] ?> </td>
                                <td class = "input_data" id = '<?php echo $k ."_5"?>'> <?php echo $data[$i]['Number of lines'] ?> </td>
                                <td class = "input_data" id = '<?php echo $k ."_6"?>'> <?php echo $data[$i]['US English'] ?> </td>
                                <td class = "input_data" id = '<?php echo $k ."_7"?>'> <?php echo $data[$i]['Japanese'] ?> </td>
                                <td class = "input_data" id = '<?php echo $k ."_8"?>'> <?php echo $data[$i]['Vehicle already applied'] ?> </td> 
                                <td class = "input_data" id = '<?php echo $k ."_9"?>'> <?php echo $data[$i]['Manager approval status'] ?> </td> 
                                <td class = "input_data" id = '<?php echo $k ."_10"?>'> <?php echo $data[$i]['Date'] ?> </td>
                            </tr>
                            <?php
                                break;
                            }
                        }
                    }
                }
            }
     
            else { // file json not exists
                $rq_exist_json = $_SESSION['DB_'.$user_id]??"";
                
                if ($rq_exist_json !== ''){
                    $json_data = file_get_contents("../../../../Data/UserData/".$user_id."/".$rq_exist_json.".json");
                    $products = json_decode($json_data, true); 
                    $data = array_values($products[$user_name]);
                    $k = 0;
                    $count_row = 0;
                    if(count($products) != 0){
                        foreach($products[$user_name] as $key => $value){  
                            echo "<tr>";
                            $k = $k + 1; 
                            echo "<td><input id ='".$k."' type = \"checkbox\" class = \"checkbox_Active\"/></td> ";
                            echo "<td id = '".$k."_1" ."' class = \"checkbox_Active\" >" . $key . "</td>"; 
                            for($i = $k - 1;$i < count($data); $i++){      
                                ?>
                                    <td class = "input_data" id = '<?php echo $k ."_2"?>'> <?php echo $data[$i]['Content'] ?>  </td>
                                    <td class = "input_data" id = '<?php echo $k ."_3"?>'> <?php echo $data[$i]['Display type'] ?> </td>
                                    <td class = "input_data" id = '<?php echo $k ."_4"?>'> <?php echo $data[$i]['Meter type'] ?> </td>
                                    <td class = "input_data" id = '<?php echo $k ."_5"?>'> <?php echo $data[$i]['Number of lines']?> </td>
                                    <td class = "input_data" id = '<?php echo $k ."_6"?>'> <?php echo $data[$i]['US English'] ?>  </td>
                                    <td class = "input_data" id = '<?php echo $k ."_7"?>'> <?php echo $data[$i]['Japanese'] ?>  </td>
                                    <td class = "input_data" id = '<?php echo $k ."_8"?>'> <?php echo $data[$i]['Vehicle already applied'] ?> </td> 
                                    <td class = "input_data" id = '<?php echo $k ."_9"?>'> <?php echo $data[$i]['Manager approval status'] ?> </td> 
                                    <td class = "input_data" id = '<?php echo $k ."_10"?>'> <?php echo $data[$i]['Date'] ?> </td>
                                </tr>
                                <?php
                                break;
                            }
                        }
                    }
                }
                else{
                    $json_textid = file_get_contents("../../../../Data/UserData/textid_select_data_wording.json"); //file contains text_id selected
                    $textid = json_decode($json_textid, true); 
                    $data_textid = array_values($textid);
                    $uniqueArr = array_unique($data_textid);
                    $uniqueArray = array_values($uniqueArr);
                    $connect = connect_db($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
                    $count_row = 0;
                    
                    for ($indexs = 0; $indexs < count($uniqueArray); $indexs++){
                        $textid_select = $uniqueArray[$indexs];
                        $result = $qr -> select_textid_infor_filter($db, $table, $textid_select);
                        $arr = array();
                        if ($result->num_rows > 0){
                            while ($row = mysqli_fetch_assoc($result)){
                                $count_row = $count_row + 1;
                                $count_col = 0;
                                echo "<tr>";
                                echo "<td><input id = '".$count_row."' type = \"checkbox\" class = \"checkbox_Active_1\"/></td> ";
                                $ind = 0;
                                foreach($row as $keys => $data){
                                    $arr[$ind] = $data;
                                    $ind = $ind + 1;
                                }
                                for($i = 0;$i <= 2;$i++){
                                    $count_col = $count_col +1;
                                    if($i == 2){
                                        echo "<td>";
                                        echo "<select class = \"input_data\" id = '".$count_row."_".$count_col."'>";
                                        echo "<option >" . $arr[2] . "</option>";
                                        echo 'ok'.$arr[2].'ok';
                                        if ($result_limit_display->num_rows > 0){
                                            for($k = 0; $k < count($arr_display_type['display_type']);$k++){
                                                echo $arr_display_type['display_type'][$k];
                                                echo "<option >" . $arr_display_type['display_type'][$k] . "</option>";
                                            }
                                        }
                                        echo "</select>";
                                        echo "</td>";
                                    }
                                    else{
                                        echo "<td class = \"input_data\" id = '".$count_row."_".$count_col."' >" . $arr[$i] . "</td>";
                                    }
                                }
                                for($i = 3;$i <= count($arr) - 1;$i++){
                                    $count_col = $count_col +1;
                                    if($i == 3){
                                        echo "<td>";
                                        echo "<select class = \"input_data\" id = '".$count_row."_".$count_col."'>";
                                        echo "<option >" . $arr[3] . "</option>";
                                        if ($result_limit_meter->num_rows > 0){
                                            for($j = 0; $j < count($arr_meter['meter']);$j++){
                                                echo $arr_meter['meter'][$j];
                                                echo "<option >" . $arr_meter['meter'][$j] . "</option>";
                                            }
                                        }
                                        echo "</select>";
                                        echo "</td>";
                                    }
                                    elseif ($i == 9){
                                        $date = getdate();
                                        echo "<td class = \"input_data\" id = '".$count_row."_".$count_col."' >" .$date['year']."/".$date['mon']."/".$date['mday']. "</td>"; 
                                    }

                                    //---------------------------- Column car information ----------------------------
                                    elseif ($i == 7){
                                        $result_textid_vehicle = $qr->select_data_car($db, 'textid_vehicle', $arr[0]);
                                        $temp_textid_vehicle = [];
                                        $temp_value = 0;
                                        $temp_row = mysqli_fetch_assoc($result_textid_vehicle);
                                        $key_vehicle = array_keys($temp_row);
                                        $name_car = '';
                                        $temp_name_car = [];
                                        for($k = 1; $k < count($key_vehicle); $k++){
                                            if($temp_row[$key_vehicle[$k]] == 1){
                                                $name_car = $name_car.'/'.$key_vehicle[$k];
                                            }
                                        }
                                        $name_car = substr($name_car, 1);
                                        echo "<td class = \"input_data\" id = '".$count_row."_".$count_col."' >".$name_car."</td>";
                                        }

                                    //--------------------------------------------------------------------------------
                                    else{
                                        echo "<td class = \"input_data\" id = '".$count_row."_".$count_col."' >" .$arr[$i] . "</td>";  
                                    }
                                }
                                echo "</tr>";
                            }
                        }
                    }
            $connect -> close();
        ?>
    </tbody>
<?php
            }
        }
    }
?>
    <?php
if($type_account === "manager"){
?>    
<tbody id="table_manager">
        <?php
            $id_user_temp = $_GET['id_user']??"";
            $id_M = $_GET['id_M']??"";
            $rq_temp = $_GET['rq']??"";
            $requester_temp = $_GET['rqter']??"";
            $json_data = file_get_contents("../../../../Data/UserData/".$id_M."/".$rq_temp.".json");
            $products = json_decode($json_data, true); 
            $data = array_values($products[$requester_temp]);
            $k = 0;
            $count_row = 0;
            if(count($products) != 0){
                foreach($products[$requester_temp] as $key => $value){  
                    echo "<tr>";
                    $k = $k + 1; 
                    echo "<td><input id ='".$k. "M"."' type = \"checkbox\" class = \"checkbox_Active\"/></td> ";
                    echo "<td id = '".$k."_1" ."' class = \"checkbox_Active\" >" . $key . "</td>"; 
                    for($i = $k - 1;$i < count($data);$i++){      
        ?>
                        <td id = '<?php echo $k ."_2"?>'> <?php echo $data[$i]['Content'] ?>  </td>
                        <td id = '<?php echo $k ."_3"?>'> <?php echo $data[$i]['Display type'] ?> </td>
                        <td id = '<?php echo $k ."_4"?>'> <?php echo $data[$i]['Meter type'] ?> </td>
                        <td id = '<?php echo $k ."_5"?>'> <?php echo $data[$i]['Number of lines']?> </td>
                        <td id = '<?php echo $k ."_6"?>'> <?php echo $data[$i]['US English'] ?>  </td>
                        <td id = '<?php echo $k ."_7"?>'> <?php echo $data[$i]['Japanese'] ?>  </td>
                        <td id = '<?php echo $k ."_8"?>'> <?php echo $data[$i]['Vehicle already applied']  ?> </td> 
                        <td id = '<?php echo $k ."_9"?>'> <?php echo $user_name ?> </td> 
                        <td id = '<?php echo $k ."_10"?>'> <?php echo $data[$i]['Date'] ?> </td>
                    </tr>
        <?php
                        break;
                    }
                }
            }         
        ?>
        </tbody>
<?php
}

?>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var type = document.getElementById("account_type").innerHTML;
    let arr = ["Text ID", "Content", "Display type", "Meter type", "Number of lines", "US English", "Japanese", "Vehicle already applied", "Manager approval status", "Date"];
    document.getElementById("btn_Information_about_TEXT_ID_save").addEventListener("click", function() {
        if(type === "user"){
            var rows = document.querySelectorAll('.input_data');
            var last_row = rows.length;  // last row of table in HTML
            var name_user = "<?php echo $user_name ?>";
            var temp = {}; //object contains the information on the table after the checked
            var rq = "<?php echo $rq; ?>";
            temp[name_user]={};
            for (i = 1;i <= last_row; i++)
            {
                if ($('#' + i).is(":checked")==true)
                {
                    var temp_size = 1;
                    var key_id=i + '_1';
                    var key = document.getElementById(key_id).innerHTML;
                    temp[name_user][key]={};
                    for(var j = 1; j < arr.length; j++){ //for each column
                        var temp_size = temp_size+1;
                        var id_s = String(i) + '_' + String(temp_size);
                        if (temp_size == 3 || temp_size == 4){
                            var select_value = document.getElementById(id_s);
                            var temp_value = select_value.options[select_value.selectedIndex].text;
                            var temp_value = temp_value.trim();
			}
                        else{
                            var temp_value = document.getElementById(id_s).innerHTML;
                        }

                        var temp_key = arr[j];
                        temp[name_user][key][temp_key]= encodeHTML(temp_value);
                    }
                }
            }
            var flag = "<?php echo $_GET['flag']??""?>";
            
            if(flag == 1){
                var rq = "<?php echo $_GET['rq']??""?>"
                $(document).ready(function(){
                    $.post("../../BE/file_json.php", {flag: temp, rq: rq, user_id: "<?php echo $user_id ?>"}, function(data){
                        $('#link_file_json').html(data);
                            alert(data);
                    });
                });
            }
            else{
                $(document).ready(function(){
                    $.post("../../BE/file_json.php", {flag: temp, rq: rq, user_id: "<?php echo $user_id ?>"}, function(data){
                        $('#link_file_json').html(data);
                            alert(data);
                    });
                });
            }

            $(document).ready(function(){
                $.post("../../BE/add_rq_db.php", {rq: rq, temp_id_user: "<?php echo $temp_id_user ?>", temp_rq_check: "<?php echo $temp_rq_check ?>", last_DB: "<?php echo $last_DB ?>"}, function(data){
                
                });
            });

        }

        if(type !== "user"){
            var rows = document.querySelectorAll('table#myTable > tbody#table_manager > tr');
            var lastRow = rows.length; // last row of table in HTML
                var last_row=  lastRow;
                var name_user = "<?php echo $requester_temp ?>";
                var temp = {};
                temp[name_user]={};
                for (i = 1;i <= last_row; i++) // for each row
                {
                    if ($('#' + i + 'M').is(":checked")==true)
                    {
                                var temp_size = 1;
                                var key_id= i + '_1';
                                var key = document.getElementById(key_id).innerHTML;
                                temp[name_user][key]={};
                                for(var j = 1; j < arr.length; j++){ //for each column
                                    var temp_size = temp_size+1;
                                    var id_s = String(i) + '_' + String(temp_size);
                                    var temp_value = document.getElementById(id_s).innerHTML.trim();
                                    var temp_key = arr[j].trim();
                                    temp[name_user][key][temp_key]= temp_value;
                                }
                    }
                }
                var id_M = "<?php echo $id_M ?>";//id of manager in database
                    var rq = "<?php echo $_GET['rq']??"" ?>";
                    var user_id = "<?php echo $_GET['id_user']??"" ?>";
                $(document).ready(function(){
                    $.post("../../BE/json_M.php", {flag1 : temp, id_M : id_M, rq: rq, user_id: user_id}, function(data){
                        alert(data);
                    });
                });
        }
});
    document.getElementById("btn_Information_about_TEXT_ID_Reject").addEventListener("click", function() {
        $(document).ready(function(){
                var id = "<?php echo $id_M ?>"; // id of manager
                var rq =  "<?php echo $rq_temp ?>";
                $.get("../../BE/reject.php", {id: id, rq: rq}, function(data){
                    alert(data);
                });
        });
    });

    document.getElementById("btn_Information_about_TEXT_ID_Approval").addEventListener("click", function() {
        $(document).ready(function(){
                var id = "<?php echo $id_M ?>"; // id of manager
                var rq =  "<?php echo $rq_temp ?>"; //request of user
		$.get("../../BE/approval_M.php", {id: id, rq: rq}, function(data){
                    alert(data);
                });
        });
    });
</script>
