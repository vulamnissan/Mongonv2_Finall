<footer >  
  <h3>Copyright©Nissan Motor Co., Ltd. All Rights Reserved</h3>
</footer>

<script>

function changecolor_status(table){
    var rows = table.getElementsByTagName("tr");
    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        for (var j = 0; j < cells.length; j++) {
            var cell = cells[j];
            var cellValue = cell.textContent || cell.innerText;
            if (cellValue.trim() === "Close") {
                cell.style.color = "gray";
            }
            else if(cellValue.trim() === "Open") {
                cell.style.color = "blue";
                cell.style.fontWeight = "bold";
	    }
          }
    }  
}

var table_list_databaseofwording = document.getElementById("myTable_Information_about_TEXT_ID_info_manager"); 
var table_list_translate = document.getElementById("myTable_Translation_request_info_manager"); 
var table_list_validator = document.getElementById("myTable_validator_Request_info"); 
var table_list_validator_m = document.getElementById("myTable_validator_Request_info_manager"); 
var table_list_validator_m_v = document.getElementById("myTable_Translation_Request_info_manager"); 

if(table_list_databaseofwording !== null){
  changecolor_status(table_list_databaseofwording);
}
if(table_list_translate !== null){
changecolor_status(table_list_translate);
}
if(table_list_validator !== null){
  changecolor_status(table_list_validator);
}
if(table_list_validator_m !== null){
  changecolor_status(table_list_validator_m);
}
if(table_list_validator_m_v !== null){
  changecolor_status(table_list_validator_m_v);
}


function encodeHTML(input) {
  return input.replace(/&/g, '&amp;')
              .replace(/</g, '&lt;')
              .replace(/>/g, '&gt;')
              .replace(/"/g, '&quot;')
              .replace(/'/g, '&#39;');
}

</script>

</body>
<style>
  img:hover{
    height: 200px;
  };
  #btn_back_home {
    display: none;
  }
  #btn_back_to_Database_of_wording_content {
    display: none;
  }
  #Manage_application_button_back {
    display: none;
  }
  #Spec_tender_file_export_button_back {
    display: none;
  }

</style>
</html>
