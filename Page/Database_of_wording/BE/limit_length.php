<table >
      <thead>
          <th>Display Type</th>
          <th>Meter</th>
          <th>Limit</th>
      </thead>
      <?php
              $connect_1 = connect_db('localhost','mongonv2','root','');
              $add_sql_1 = "SELECT * FROM fix_limit";
              // echo $add_sql;exit;
              $result_1 = $connect_1  -> query($add_sql_1);
              $count_row = 0;
              $arr = array();
              if ($result_1->num_rows > 0){
                  while ($row = $result_1 -> fetch_assoc()){
                      echo "<tr>";
                      $count_row = $count_row + 1;
                      $count_col = 0;
                      $ind = 0;
                      foreach($row as $keys => $data){
                          $arr[$ind] = $data;
                          $ind = $ind + 1;
                      }  
                      for($i = 1;$i <= count($arr) - 1;$i++){
                          $count_col = $count_col +1;
                          if($i == 1){
                            echo "<td class = \"meter_popup_input\" id = '".$count_row."limit".$count_col."'>" . $arr[$i] . "</td>"; 
                          }
                        else{
                          echo "<td><input id = '".$count_row."limit".$count_col."' type = \"text\" class = \"meter_popup_input\" value = '".$arr[$i]."'></td>"; 
                        }
                      }
                      echo "</tr>";
          }
          }
          $connect_1 -> close();
      ?>
  </table>
    <script>
  // -------------select ok khi bam OK trong bang limit length-------------------
        $(document).ready(function() {
            $('#Meter_Display_type_ok').click(function() {
              var paragraphs = document.querySelectorAll(".meter_popup_input[type = 'text']");
              // console.log(document.getElementById(paragraphs[0].id).value );
              var last_row = paragraphs.length/2;
              // console.log(last_row);
              var limit_length_object = {};
              var flag = 0;
              var k = 0;
              for (j = 1;j <= last_row; j++){
                var key_id = j + "limit1";
                // console.log(key_id1);
                var key = document.getElementById(key_id).innerHTML;
                
                // limit_length_object[key] = {};
                if (flag > 0){
                  var k = k + 2;
                }
                var flag = flag + 1;
                  key1= key +"_"+ document.getElementById(j+"limit2").value;
                  // console.log(document.getElementById("1limit2").value);
                  console.log(document.getElementById(j+"limit2").value);
                  limit_length_object[j]={};
                    limit_length_object[j]["text"]=key;
                    limit_length_object[j]["Meter"] =document.getElementById(j+"limit2").value;
                    limit_length_object[j]["Limit"] = document.getElementById(j+"limit3").value;

              }
              console.log(limit_length_object);
              $(document).ready(function(){
              $.post("../../BE/save_limit_length.php", {object: limit_length_object}, function(data){
                // console.log(data);
                alert("Updated");
            });
            });
            });
        });
</script>
<script>
  // -------------lay data vua ADD vao-------------
$(document).ready(function() {
  $('#Meter_Display_type_ok').click(function() {
var limit_length_object_add = {};
var inputs = document.querySelectorAll("#table_Meter_Display_type input");
inputs.forEach(function(input) {
  input.addEventListener("input", function() {
    // Cập nhật giá trị nhập vào thuộc tính "value" của input
    input.value = this.value;
  });
});
var data_arr = []; // Mảng để lưu trữ dữ liệu
function getDataFromInputs() {
  var inputs = document.querySelectorAll("#table_Meter_Display_type tbody tr.tr_input_new input");
  var rowData = [];

  // Lặp qua tất cả các input trong hàng mới được tạo
  inputs.forEach(function(input) {
    rowData.push(input.value); // Lấy giá trị từ input và thêm vào mảng rowData
  });

  return rowData;
}

function addDataToStorage() {
  var rowData = getDataFromInputs();
  if (rowData.length > 0) {
    data_arr.push(rowData); // Thêm mảng rowData vào mảng data
  }
}


addDataToStorage();
// console.log(data_arr);
// In mảng dữ liệu ra console log
var len = data_arr.length;
// console.log(len);
var temp_key = "Meter";
var temp_key_1  = "Limit";
if(len === 0){
  return "1";
}
else{
//----------------------------
for (i = 0; i < data_arr[len-1].length; i++){
var key  = data_arr[len-1][i];
limit_length_object_add[key] = {};
  if(data_arr[len-1].length >3){
  limit_length_object_add[data_arr[len-1][i]][temp_key] = data_arr[len-1][i + 1];
  limit_length_object_add[data_arr[len-1][i]][temp_key_1] = data_arr[len-1][i + 2];
  i = i + 2;
  }
  else{
  limit_length_object_add[data_arr[len-1][i]][temp_key] = data_arr[len-1][i + 1];
  limit_length_object_add[data_arr[len-1][i]][temp_key_1] = data_arr[len-1][i + 2];
  break;
  }
}
}
$(document).ready(function(){
  $.post("../../BE/save_limit_length_add_new.php", {object_add: limit_length_object_add}, function(data){
    // console.log(data);
    });
    });
  });
});
</script>
