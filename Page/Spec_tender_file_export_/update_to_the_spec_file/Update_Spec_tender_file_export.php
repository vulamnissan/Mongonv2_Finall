<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>MeterMongon</title>
  <link rel="stylesheet" href="Update_Spec_tender_file_export1.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>
<body>

<?php
require "../../template/header.php";
?>

  <header>
    <div id="sidebar" class="sidebar">
      <ul>
            <li><a href="../home/home.html">Home</a></li>
            <li><a href="#">Spec tender File Export</a></li>
            <li><a href="../Function/Database_of_wording/Database of wording.html">Database of wording</a></li>
            <li><a href="../update_to_the_spec_file/Update_Spec_tender_file_export.html" style="color: #e94801;text-decoration: underline;"   >Manage application</a></li>
            <li><a href="#">Translation request</a></li>
            <li><a href="#">Validator request</a></li>
      </ul>
    </div>

    <div class="content">
      <div class="menu" onclick="toggleSidebar()">
        &#9776; <!-- biểu tượng menu -->
      </div>

    </div>
  
    <!-- <div   id="account-button"  >
                    <i class="fa fa-user"></i>
                    <span style="margin-left: 10px;" >Ngo Anh Tuan</span>
                <div class="notification-list-acc" id="notification-list-acc">
                  <p  id="account_type"  >Manager</p> 
                  <p id="email"   > KNT21345@local.nmcorp.nissan.biz</p> 
                  <button    >  Logout→</button>
                </div>



    </div> -->



  </header>

  <p id = "list_language" style="display:none"><?php echo $_GET["language"]??"" ?></p>
  
<!-- -----------------content---------------------------- -->
<div id = "Spec_tender_file_export_content" >
  <div id="Spec_tender_file_export">
  <h1>Spec tender File Export</h1>
  <div id="Spec_tender_file_export_text">
    <p>Please select the wording you want to update to the spec file!

       </p>
  </div>
      <div  class="box_btn" >
            <!-- <button   id="btn_Spec_tender_file_export_Save" class=" btn_display"     > Save </button>
            <button   id="btn_Spec_tender_file_export_Start_comparison"  class=" btn_display"   > Start comparison   </button> -->
            <button   id="btn_Spec_tender_file_export_Export_file"  class=" btn_display"   > Export file   </button>

      </div>   
</div>
<!-- -----------------Table---------------------------- -->

<div class="table_Spec_tender_file_export_container">
  
  <!-- <table id = "table_compare">

  </table> -->
</div>

<div id="Spec_tender_file_export_home_container">
  <div id="Spec_tender_file_export_home_function" class="mang_box">
    <button id = "Spec_tender_file_export_button_back" class="icon_button_display" > <-- Back </button>
  </div>
</div> 
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../update_to_the_spec_file/Update_Spec_tender_file_export.js"></script>

<footer>
  
  <h3>Copyright©Nissan Motor Co., Ltd. All Rights Reserved</h3>


</footer>



</body>
</html>

<!-- <script>
  var export_excel = document.getElementById('btn_Spec_tender_file_export_Export_file');
var table_compare = document.getElementById("table_");

// document.addEventListener('DOMContentLoaded',function(){
export_excel.addEventListener("click",function(){
 
//  console.log(last_row);
// var a= document.getElementById("table_").RowCount;
// console.log(a);
// var value = document.getElementById("").innerHTML; // lay gta tri td 
// console.log($("#input_10_4").is("checked"))
    
});
</script> -->