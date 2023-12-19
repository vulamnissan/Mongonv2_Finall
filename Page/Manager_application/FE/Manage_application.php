<?php             
 $pageTitle1 = "I";
?>

<?php require "../../template/header.php"; ?>
  <link rel="stylesheet" href="./Manage_application.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <h1>Manage Application</h1>
<!-- -----------------content---------------------------- -->
<p id = "flag_btn" style ="display:none"  ></p>
<div id="Manage_application_home_container">

  <div id="Manage_application_home_function" class="mang_box">
    <div id="Manage_application_Manage_language_apply_vehicle"    class="box active" >Manage language apply vehicle</div>
    <div  id="Manage_application_Manage_adopt_of_wording"  class="box" >Manage adopt of wording</div>
  </div>

  <div id="Manage_application_home_view_function" class="Manager_centerBox">
            <div  id="table_Manage_language_apply_vehicle">
              <div id = "manage_language_apply_vehicle_btn" class="box_btn" >

                <button   id="btn_Manage_language_apply_vehicle_vehicle"  class="btn"  >Add Vehicle</button>
                <button   id="btn_Manage_language_apply_vehicle_Lange" class="btn"  >Add Language</button>
                <button   id="btn_Manage_language_apply_vehicle_Save"   disabled  >Save</button>
              </div>
              <div id="table_spec_wrap">
                <table id = "manage_language_apply_vehicle_table">
                <?php include "../BE/Show_vehicle.php"?>
                </table>
              </div>
            </div>
          
  <div  id="table_Manage_adopt_of_wording">
    <div id = "manage_adopt_of_wording_btn" class="box_btn">
      <button   id="btn_Manage_adopt_of_wording_add" class="btn"  >Add Text ID</button>
      <button   id="btn_Manage_adopt_of_wording_add_vehicle"  class="btn"  >Add Vehicle</button>
      <button   id="btn_Manage_adopt_of_wording_Save"  disabled  >Save</button>
      <button   id="btn_Manage_adopt_of_wording_delete"   >delete</button>
    </div>
    <div id="table_data_wrap">
        <?php include "../BE/manager_adopt_of_wording.php" ?>
    </div>
  </div>
</div>
          
  </div>
<button id = "Manage_application_button_back" class="icon_button_display" >Back</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="Manage_application.js"></script>
<script src="b.js"></script>
<script src="adopt.js"></script>
<script src="c.js"></script>
<script src="add_control.js"></script>
<script src="../BE/BE_script.js"></script>
</body>


<?php 

include "../../template/footer.php"; 

?>


