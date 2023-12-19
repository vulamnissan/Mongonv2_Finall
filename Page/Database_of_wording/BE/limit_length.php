<table id = "table_limit_length">
      <thead>
          <th>Display Type</th>
          <th>Meter</th>
          <th>Limit</th>
          <th>Font size</th>
      </thead>
      <?php
      //CONFIGURE TABLE "FIX_LIMIT"
              $connect_1 = connect_db($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
              $result_1 = $qr->select_data($db, "fix_limit");
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
  // -------------get the newly added data -------------

$(document).ready(function() {
  $('#Meter_Display_type_ok').click(function() {
    
    var inputs = document.querySelectorAll("#new_display_type");
    console.log(inputs);
    if (inputs.length ==0) //update value in table to database
    {
      var table = document.getElementById('table_limit_length');
      var last_row = table.rows.length - 1;
      var limit_length_object = {}; // object save data after editing
      var flag = 0;
      var k = 0;
      for (j = 1;j <= last_row; j++)
      {
        var key_id = j + "limit1";
        var key = document.getElementById(key_id).innerHTML;
        if (flag > 0){
          var k = k + 2;
        }
        var flag = flag + 1;
          key1= key +"_"+ document.getElementById(j+"limit2").value;
          limit_length_object[j]={};
            limit_length_object[j]["text"] = key;
            limit_length_object[j]["Meter"] = document.getElementById(j+"limit2").value;
            limit_length_object[j]["Limit"] = document.getElementById(j+"limit3").value;
            limit_length_object[j]["Fontsize"] = document.getElementById(j+"limit4").value;
      }
      $(document).ready(function(){
        $.post("../../BE/save_limit_length.php", {object: limit_length_object}, function(data){
          alert("Updated");
        });
      });
    }
    else //insert new value to databse after select button Add
    { 
      var limit_length_object_add = {};
      var inputs = document.querySelectorAll("#table_Meter_Display_type input");
      inputs.forEach(function(input) {
        input.addEventListener("input", function() {
          // Update the input value in the "value" property of input
          input.value = this.value;
        });
      });
      var data_arr = []; // Arrays to save data
      function getDataFromInputs() {
        var inputs = document.querySelectorAll("#table_Meter_Display_type tbody tr.tr_input_new input");
        var rowData = [];

        // Loop through all the inputs in the newly created row
        inputs.forEach(function(input) {
          rowData.push(input.value); // Get value from input and add to array rowData
        });

        return rowData;
      }

      function addDataToStorage() {
        var rowData = getDataFromInputs();
        if (rowData.length > 0) {
          data_arr.push(rowData); // Add the rowData array to the data_arr
        }
      }

        addDataToStorage();
        var len = data_arr.length;
        var temp_key = "Meter";
        var temp_key_1  = "Limit";
        var temp_key_2  = "Fontsize";
        console.log(data_arr);
        if(len === 0){
          return "1";
        }
        else{
          for (i = 0; i < data_arr[len-1].length; i++){
            var key  = data_arr[len-1][i];
            limit_length_object_add[key] = {}; // object save newly added data
              if(data_arr[len-1].length >3){
                limit_length_object_add[data_arr[len-1][i]][temp_key] = data_arr[len-1][i + 1];
                limit_length_object_add[data_arr[len-1][i]][temp_key_1] = data_arr[len-1][i + 2];
                limit_length_object_add[data_arr[len-1][i]][temp_key_2] = data_arr[len-1][i + 3];
                i = i + 2;
              }
              else{
                limit_length_object_add[data_arr[len-1][i]][temp_key] = data_arr[len-1][i + 1];
                limit_length_object_add[data_arr[len-1][i]][temp_key_1] = data_arr[len-1][i + 2];
                limit_length_object_add[data_arr[len-1][i]][temp_key_2] = data_arr[len-1][i + 3];
                break;
              }
          }
        }
        console.log(limit_length_object_add)
          $(document).ready(function(){
            $.post("../../BE/save_limit_length_add_new.php", {object_add: limit_length_object_add}, function(data){
              alert(data);
            });
          });
    }
  });
});

</script>
