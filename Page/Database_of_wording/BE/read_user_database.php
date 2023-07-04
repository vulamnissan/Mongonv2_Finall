<?php  
    $connect_1 = connect_db('localhost','mongonv2','root','');
    $add_sql_1 = "SELECT * FROM user";
    // echo $add_sql;exit;
    $result_1 = $connect_1  -> query($add_sql_1);
    $count_row = 0;
    $arr = array();
    if ($result_1->num_rows > 0){
        while ($row = $result_1 -> fetch_assoc()){
            // echo "<tr>";
            $count_row = $count_row + 1;
            $count_col = 0;
            $ind = 0;
            foreach($row as $keys => $data){
                $arr[$ind] = $data;
                $ind = $ind + 1;
            }
            if($arr[1] == $_COOKIE['name']){
                echo "<tr>";
                echo "<td> Name </td>";
                echo "<td><input class = \"sender\" type= \"text\" value = '".$arr[1]."'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td> Sect </td>";
                echo "<td><input class = \"sender\" type= \"text\" value = '".$arr[3]."'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td> Mail </td>";
                echo "<td><input class = \"sender\" type= \"text\" value = '".$arr[2]."'></td>";
                echo "</tr>";
                // break;
            }
            else{
                continue;
            }
}
}
$connect_1 -> close();
 ?>
 <script>
            $(document).ready(function() {
            $('#Meter_Display_type_ok').click(function() {
              var paragraphs = document.querySelectorAll(".meter_popup_input[type = 'text']");
              console.log(document.getElementById(paragraphs[0].id).value);
              var last_row = paragraphs.length/2;
              var limit_length_object = {};
              var flag = 0;
              var k = 0;
              for (j = 1;j <= last_row; j++){
                var key_id = j + "limit1";
                // console.log(key_id);
                var key = document.getElementById(key_id).innerHTML;
                // console.log(key);
                limit_length_object[key] = {};
                if (flag > 0){
                  var k = k + 2;
                }
                var flag = flag + 1;
                for( var i = k ; i < paragraphs.length; i++){ //lay data ban dau trong database
                  temp_key = "Meter";
                  temp_key_1  = "Limit";
                    limit_length_object[key][temp_key] =document.getElementById(paragraphs[i].id).value;
                    limit_length_object[key][temp_key_1] = document.getElementById(paragraphs[i+1].id).value;
                    break;
                }
              }

              console.log(limit_length_object);
              $(document).ready(function(){
              $.post("../../BE/save_limit_length.php", {object: limit_length_object}, function(data){
                console.log(data);
            });
            });
            });
        });
 </script>
  