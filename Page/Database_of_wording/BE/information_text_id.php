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
try {
        include "../../BE/main_function.php";
        $type_account = $_COOKIE['type']; //====can truyen type account======
        if($type_account === "user"){
            //========kiem tra truyen dc chua=========
            if (isset($_GET['id_user'])) {
            //===========================================
            $id_user_temp = $_GET['id_user']??"";
            // echo $id_user_temp;
            $rq_temp = $_GET['rq']??"";
            // echo $rq_temp;
            $filePath = "../../../../Data/UserData/".$id_user_temp."/".$rq_temp.".json";
            //echo $filePath;
             ?>
            <tbody id = "table_user">
             <?php
            if (file_exists($filePath)) {
                // echo "Tệp JSON tồn tại.";

                $json_data = file_get_contents("../../../../Data/UserData/".$id_user_temp."/".$rq_temp.".json");
                $products = json_decode($json_data, true); 
                $data = array_values($products[$user_name]);
                // echo count($data);
                $k = 0;
                $count_row =0;
                if(count($products) != 0){
                    foreach($products[$user_name] as $key => $value){  
                        echo "<tr>";
                        $k = $k + 1; 
                        echo "<td><input id ='".$k."' type = \"checkbox\" class = \"checkbox_Active\"/></td> ";
                        echo "<td id = '".$k."_1" ."' class = \"checkbox_Active\" >" . $key . "</td>"; 
                        for($i = $k - 1;$i < count($data); $i++){      
            ?>
                            <td class = "input_data" id = '<?php echo $k ."_2"?>' > <?php echo $data[$i]['Content'] ?>  </td>
                            <td class = "input_data" id = '<?php echo $k ."_3"?>'>  <?php echo $data[$i]['Display type'] ?> </td>
                            <td class = "input_data" id = '<?php echo $k ."_4"?>'> <?php echo $data[$i]['Meter type'] ?> </td>
                            <td class = "input_data"  id = '<?php echo $k ."_5"?>'>  <?php echo $data[$i]['Number of lines']?> </td>
                            <td class = "input_data"  id = '<?php echo $k ."_6"?>'>  <?php echo $data[$i]['US English'] ?>  </td>
                            <td class = "input_data"  id = '<?php echo $k ."_7"?>'>  <?php echo $data[$i]['Japanese'] ?>  </td>
                            <td class = "input_data" id = '<?php echo $k ."_8"?>'>  <?php echo $data[$i]['Vehicle already applied'] ?> </td> 
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
                    
             else {
                // echo "Tệp JSON không tồn tại.";
            
                // include "../../BE/main_function.php";
                $json_textid = file_get_contents("../../../../Data/UserData/textid_select_data_wording.json");
                $textid = json_decode($json_textid, true); 
                $data_textid = array_values($textid);
                $uniqueArray = array_unique($data_textid);
                // print_r($data_textid);
                $connect = connect_db('localhost','mongonv2','root','');
                $count_row = 0;
                for ($indexs = 0; $indexs < count($uniqueArray); $indexs++){
                    $add_sql = "SELECT * FROM textid_infor  WHERE textid ='$uniqueArray[$indexs]' ";

                    // echo $add_sql;
                    $result = $connect  -> query($add_sql);
                    $arr = array();
                    
                    if ($result->num_rows > 0){
                        while ($row = $result-> fetch_assoc()){
                            $count_row = $count_row + 1;
                            $count_col = 0;
                            // print_r($row);
                            echo "<tr>";
                            echo "<td><input id = '".$count_row."' type = \"checkbox\" class = \"checkbox_Active_1\"/></td> ";
                            $ind = 0;

                            foreach($row as $keys => $data){
                                $arr[$ind] = $data;
                                $ind = $ind + 1;
                            }
                    for($i = 0;$i <= 2;$i++){
                        $count_col = $count_col +1;
                        echo "<td class = \"input_data\" id = '".$count_row."_".$count_col."' >" . $arr[$i] . "</td>"; 
                    }
                    for($i = 3;$i <= count($arr) - 1;$i++){
                        $count_col = $count_col +1;
                        echo "<td class = \"input_data\" id = '".$count_row."_".$count_col."' >" . $arr[$i] . "</td>"; 
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
?>
    <?php
if($type_account === "manager"){
?>    
<tbody id="table_manager">
        <?php
                    //======can truyen========
                // $id_manager = "4";//truyen user_id
            //=====================
            $id_user_temp = $_GET['id_user']??"";
            $rq_temp = $_GET['rq']??"";
            // echo $rq_temp;
            $rquester_temp = $_GET['rqter']??"";
            // echo $rquester_temp;
            $json_data = file_get_contents("../../../../Data/UserData/".$id_user_temp."/".$rq_temp.".json");
            $products = json_decode($json_data, true); 
            $data = array_values($products[$rquester_temp]);
            // print_r($data);
            $k = 0;
            $count_row =0;
            if(count($products) != 0){
                foreach($products[$rquester_temp] as $key => $value){  
                    echo "<tr>";
                    $k = $k + 1; 
                    echo "<td><input id ='".$k. "M"."' type = \"checkbox\" class = \"checkbox_Active\"/></td> ";
                    echo "<td id = '".$k."_1" ."' class = \"checkbox_Active\" >" . $key . "</td>"; 
                    for($i = $k - 1;$i < count($data); $i++){      
                ?>
                        <td id = '<?php echo $k ."_2"?>' > <?php echo $data[$i]['Content'] ?>  </td>
                        <td id = '<?php echo $k ."_3"?>'>  <?php echo $data[$i]['Display type'] ?> </td>
                        <td id = '<?php echo $k ."_4"?>'> <?php echo $data[$i]['Meter type'] ?> </td>
                        <td id = '<?php echo $k ."_5"?>'>  <?php echo $data[$i]['Number of lines']?> </td>
                        <td id = '<?php echo $k ."_6"?>'>  <?php echo $data[$i]['US English'] ?>  </td>
                        <td id = '<?php echo $k ."_7"?>'>  <?php echo $data[$i]['Japanese'] ?>  </td>
                        <td id = '<?php echo $k ."_8"?>'>  <?php echo $data[$i]['Vehicle already applied'] ?> </td> 
                        <td id = '<?php echo $k ."_9"?>'> <?php echo $data[$i]['Manager approval status'] ?> </td> 
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

}
catch( Exception $e){
    echo "lam", $e -> getMessage();
    include "../../../template/loader.php";

}

?>
    </table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var type = document.getElementById("account_type").innerHTML;
    let arr = ["Text ID","Content","Display type","Meter type","Number of lines","US English","Japanese","Vehicle already applied","Manager approval status","Date"];
    document.getElementById("btn_Information_about_TEXT_ID_save").addEventListener("click", function() {
        if(type === "user"){
            <?php 
                add_request($qr,$db,$id,$rq,$stt,$creator,$date,$dl,$user);
            ?>
            var rows = document.querySelectorAll('.input_data');
            var lastRow = rows.length;
            var last_row= lastRow;
            var name_user = "<?php echo $user_name ?>";
            var last_col= 10;
            var temp = {};
            var rq = "<?php echo $rq; ?>";
            temp[name_user]={};
            for (i = 1;i <= last_row; i++) // chay tung dong
        {
            if ($('#' + i).is(":checked")==true)
            {
                    var temp_size = 1;
                    var key_id=i + '_1';
                    var key = document.getElementById(key_id).innerHTML;
                    temp[name_user][key]={};
                    for(var j = 1; j < arr.length; j++){ //for cot
                        var temp_size = temp_size+1;
                        var id_s = String(i) + '_' + String(temp_size);
                        console.log(id_s);
                        var temp_value = document.getElementById(id_s).innerHTML;
                        var temp_key = arr[j];
                        temp[name_user][key][temp_key]= temp_value;
                        }
                }
            }
            $(document).ready(function(){
                $.post("../../BE/file_json.php", {flag: temp, rq: rq, user_id: "<?php echo $user_id ?>"}, function(data){
                    $('#link_file_json').html(data);
                    console.log(data);
                    alert("Save Success");
                        });
                    });
}
if(type !== "user"){
    var rows = document.querySelectorAll('table#myTable > tbody#table_manager > tr');
    var lastRow = rows.length;
    console.log(lastRow);
                var last_row=  lastRow;
                var name_user = "<?php echo $user_name ?>";
                var last_col= 10;
                var temp = {};
                temp[name_user]={};
                for (i = 1;i <= last_row; i++) // chay tung dong
                {
                    if ($('#' + i + 'M').is(":checked")==true)
                    {
                                var temp_size = 1;
                                var key_id= i + '_1';
                                var key = document.getElementById(key_id).innerHTML;
                                // console.log(key);
                                temp[name_user][key]={};
                                for(var j = 1; j < arr.length; j++){ //for cot
                                    var temp_size = temp_size+1;
                                    var id_s = String(i) + '_' + String(temp_size);
                                    // console.log(id_s);
                                    var temp_value = document.getElementById(id_s).innerHTML;
                                        // console.log(temp_value);
                                    var temp_key = arr[j];
                                    temp[name_user][key][temp_key]= temp_value;
                                }
                    }
                }
                var id_M = "<?php echo $id_user_temp ?>";//M
                    var rq = "<?php echo $_GET['rq']??"" ?>";
                    var user_id = "<?php echo $_GET['id_user']??"" ?>";
                $(document).ready(function(){
                    $.post("../../BE/json_M.php", {flag1 : temp,id_M : id_M, rq: rq, user_id: user_id}, function(data){
                        console.log(data);
                        // alert(data);
                    });
                });
        }
});
document.getElementById("btn_Information_about_TEXT_ID_Reject").addEventListener("click", function() {
        $(document).ready(function(){
                var id = "<?php echo $id_user_temp ?>";
                var rq =  "<?php echo $rq_temp ?>";
                $.get("../../BE/reject.php", {id: id, rq: rq}, function(data){
                    console.log(data);
                    // alert(data);$rq_temp
                });
        });
    });

    document.getElementById("btn_Information_about_TEXT_ID_Approval").addEventListener("click", function() {
        $(document).ready(function(){
                var id = "<?php echo $id_user_temp ?>";
                var rq =  "<?php echo $rq_temp ?>";
                $.get("../../BE/approval_M.php", {id: id, rq: rq}, function(data){
                    console.log(data);
                    // alert(data);$rq_temp
                });
        });
    });
</script>