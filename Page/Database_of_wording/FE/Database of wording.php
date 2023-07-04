<?php
$pageTitle = "Database of wording" ;
// $id_user_temp = $_GET['id_user']??"";
// echo $id_user_temp;
// $rq_temp = $_GET['rq']??"";
// echo $rq_temp;
?>

<?php require "../../template/header.php"; ?>
 <link rel="stylesheet" href="Database_of_wording.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- -----------------content---------------------------- -->
<div id="Database_of_wording_content">
        <h1>Database of wording</h1>
  <div id="wraper_Validator_Status"  >
                    <div>
                        <button id="btn_Information_about_TEXT_ID"  >Information about TEXT ID</button>
                    </div>
        <div id="Validator_Status_content" >
            <h2>Validator Status</h2>
            <div class="grid-container">
              <div class="boxvs" style="background-color: #FFFF00;"  ></div>
              <div class="boxvs">Untranslated</div>
              <div class="boxvs" style="background-color: #7A2600;"  ></div>
              <div class="boxvs">Translated</div>
              <div class="boxvs" style="background-color: #548235;"  ></div>
              <div class="boxvs">Done</div>
            </div>
        </div>
    
  
  </div>

  <div id="Wraper_table_Database_of_wording"  class="table-container">



<!-- ----------------------------backend---------------------------- -->
  <?php include "../BE/config_table.php";?>

</div>



<!-- <div class="btn_back">
    <button id="btn_back_to_home"  >
      ← Back
    </button>

</div> -->

</div>
<!-- -----------------content---------------------------- -->
<script src="../FE/Database_of_wording.js"></script>
<!-- <script src="../FE/config_table.js"></script> -->
<script>
    // insertPHPIntoDiv();
  </script>
<?php 


include "../../template/footer.php"; 

?>

