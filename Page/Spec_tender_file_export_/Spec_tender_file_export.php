<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>MeterMongon</title>
  <link rel="stylesheet" href="Spec_tender_file_export.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>


</head>
<body>
  <header>
    <div id="sidebar" class="sidebar">
      <ul>
            <li><a href="../home/home.html">Home</a></li>
            <li><a href="#">Spec tender File Export</a></li>
            <li><a href="../Function/Database_of_wording/Database of wording.html">Database of wording</a></li>
            <li><a href="../Spec_tender_file_export/Spec_tender_file_export.html" style="color: #e94801;text-decoration: underline;"   >Manage application</a></li>
            <li><a href="#">Translation request</a></li>
            <li><a href="#">Validator request</a></li>
      </ul>
    </div>

    <div class="content">
      <div class="menu" onclick="toggleSidebar()">
        &#9776; <!-- biểu tượng menu -->
      </div>

    </div>
  
    <div   id="account-button"  >
                    <i class="fa fa-user"></i>
                    <span style="margin-left: 10px;" >Ngo Anh Tuan</span>
                <div class="notification-list-acc" id="notification-list-acc">
                  <p  id="account_type"  >Manager</p> 
                  <p id="email"   > KNT21345@local.nmcorp.nissan.biz</p> 
                  <button    >  Logout→</button>
                </div>



    </div>



  </header>
<div id="Information_about_TEXT_ID_content">
<!-- -----------------content---------------------------- -->
  <div id="Information_about_TEXT_ID">
    <h1>Spec tender File Export</h1>
  <div id="Spec_tender_file_export_text">
    <p>Please select from which version of the wording list you want to update.<br>
      Then select which language you would like to update.<br>
      We will compare database of wording with wording list version you have selected.<br>
      We will extract difference the database of wording and wording list version you have selected.<br>
      You need to select the appropriate diff to upload to spec tender file.<br>
      Finally, you just need to name the output ver and press the export button and you can get the spec tender file you want!
       </p>
  </div>
      <div  class="box_btn" >
            <button   id="btn_Spec_tender_file_export_Start_comparison" class=" btn_display" >Start comparison</button>
            <button   id="btn_Spec_tender_file_export_Save"  class=" btn_display"   > Save   </button>

      </div>   
</div>
<!-- -----------------Table---------------------------- -->

<div class="table_Spec_tender_file_export_container">
  <button class="btn_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Select_project" disabled >Select project</button>
  <select size="1" class="table_Spec_tender_file_export" id="select_project">
    <option value="">Chọn từ list tên các xe trong data base</option>
    <!-- -----------------backend---------------------------- -->

    <?php include "conect_database.php"
    ?>
    <!-- -----------------backend---------------------------- -->
  </select>
  <button class="btn_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Select_wording_list">
    <input type="file" id="fileInput" class="file-input" /></input> Select wording list</button>

  <div class="table_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Select_wording_list_display">Chọn file list language base từ trong máy
  </div>
  <button class="btn_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Select_language">Select language</button>
  <div class="table_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Select_language_display"> language </div>
    <div id = "language_display">
      <!-- -----------------backend---------------------------- -->
  <?php include "language_display.php" ?>
    
    <!-- -----------------backend---------------------------- -->
      
    </div>


  <button class="btn_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Output_version_number" disabled >Output version number</button>
  <input type="text" class="table_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Output_version_number_input"></input>
  <button class="btn_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Select_storage_location">Select storage location

  </button>
  <div  class="table_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Select_storage_location_display" >Download/</div>
  <div></div>
</div>
<div id="Spec_tender_file_export_home_container">
  <div id="Spec_tender_file_export_home_function" class="mang_box">
    <button id = "Spec_tender_file_export_button_back" class="icon_button_display" > ← Back </button>
  </div>
</div> 
<!-- ------------------------------------------------------Meter Display type popup-------------------------------- -->
<div  id="Information_about_TEXT_ID_Meter_Display_type"   >
  <div id="modal_Meter_Display_type"  >
          <h4>Select language</h4>
            <div id="table_Meter_Display_type">
    <!-- -----------------backend---------------------------- -->

            <?php include "select_language_database.php"
    ?>
      <!-- -----------------backend---------------------------- -->

          </div>
        <div class="btn_ok_cancle">
            <button   id="Meter_Display_type_cancel"   class="btn_pop"     >Cancel
            </button>
            <button   id="Meter_Display_type_ok"   class="btn_pop"     >OK
            </button>
        </div>
  </div>
</div>

</div>


<script src="Spec_tender_file_export.js"></script>

<footer>
  
  <h3>Copyright©Nissan Motor Co., Ltd. All Rights Reserved</h3>


</footer>


</body>
</html>
