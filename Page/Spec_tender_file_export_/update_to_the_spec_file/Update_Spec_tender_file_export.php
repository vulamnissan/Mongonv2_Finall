
  <?php
    require "../../template/header.php";
  ?>

<title>MeterMongon</title>
  <link rel="stylesheet" href="Update_Spec_tender_file_export1.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>


  <p id = "list_language" style="display:none"><?php echo $_GET["language"]??"" ?></p>
  
<!-- -----------------content---------------------------- -->
<div id = "Spec_tender_file_export_content" >
  <div id="Spec_tender_file_export">
  <h1>Spec tender File Export</h1>
  <div id="Spec_tender_file_export_text">
    <p>Please select the wording you want to update to the spec file!</p>
  </div>
      <div  class="box_btn" >
            <button   id="btn_Spec_tender_file_export_Export_file"  class=" btn_display"   > Export file   </button>
            <form action="download.php" target="blank"  method="POST">
              <button type="submit"  id="btn_Spec_tender_file_export_download_file"  class=" btn_display"   > Download File  </button>
            </form>
      </div>   
</div>
<!-- -----------------Table---------------------------- -->

<div class="table_Spec_tender_file_export_container">
</div>

<div id="Spec_tender_file_export_home_container">
  <div id="Spec_tender_file_export_home_function" class="mang_box">
    <button id = "Spec_tender_file_export_button_back" class="icon_button_display" > Back </button>
  </div>
</div> 
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../update_to_the_spec_file/Update_Spec_tender_file_export.js"></script>


<?php require "../../template/footer.php"; ?>

