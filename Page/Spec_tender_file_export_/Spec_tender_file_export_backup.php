<?php             
$pageTitle4 = "Spec tender File Export";
?>
    <?php require "../template/header.php"; ?>


  <link rel="stylesheet" href="Spec_tender_file_export.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>


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
<form style="margin-bottom: 5px"  target="blank" action="upload_action.php" class ="table_Spec_tender_file_export_container" method="post" enctype="multipart/form-data">
    <input type="submit" class="btn_Spec_tender_file_export selectfile" id="btn_table_Spec_tender_file_export_Select_wording_list" value = "Upload file used compare"></input>
    <!-- <input type="file" name="excelFile" id="fileInput" class="file-input" /></input>  -->
    <input type="file" name="excelFile" class="table_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Select_wording_list_display"></input>
</form>

<div class="table_Spec_tender_file_export_container">
  <button class="btn_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Select_project" disabled >Select project</button>
  <select size="1" class="table_Spec_tender_file_export" id="select_project">
    <option value="">Select Car</option>
    <!-- -----------------backend---------------------------- -->

    <?php include "conect_database.php"
    ?>
    <!-- -----------------backend---------------------------- -->
  </select>    
  <!-- <input class="table_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Select_wording_list_display">Select file list language base </input> -->
  <button class="btn_Spec_tender_file_export selectfile" id="btn_table_Spec_tender_file_export_Select_language">Select language</button>
  <div class="table_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Select_language_display"> language </div>
    <div id = "language_display">
      <!-- -----------------backend---------------------------- -->
  <?php include "language_display.php" ?>
    
    <!-- -----------------backend---------------------------- -->
      
    </div>


  <button class="btn_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Output_version_number" disabled >Output version number</button>
  <input type="text" class="table_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Output_version_number_input"></input>
  <button class="btn_Spec_tender_file_export selectfile" id="btn_table_Spec_tender_file_export_Select_storage_location">Select storage location

  </button>
  <div  class="table_Spec_tender_file_export" id="btn_table_Spec_tender_file_export_Select_storage_location_display" >Download/</div>
  <div></div>
</div>

<div id="Spec_tender_file_export_home_container">
  <div id="Spec_tender_file_export_home_function" class="mang_box">
    <button id = "Spec_tender_file_export_button_back" class="icon_button_display" > Back </button>
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


  
  <?php require "../template/footer.php"; ?>


