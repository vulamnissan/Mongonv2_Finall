<?php
$pageTitle5 = "Information about TEXT ID" ;
?>

<?php require "../../../template/header.php"; ?>
<link rel="stylesheet" href="Information_about_TEXT_ID.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- -----------------content---------------------------- -->
<div id="Information_about_TEXT_ID">
    <h1>Information about TEXT ID</h1>
        <div  class="box_btn" >
              <button   id="btn_Information_about_TEXT_ID_modify"   disabled  >Modify</button>
              <button   id="btn_Information_about_TEXT_ID_save"    disabled  >Save</button>
              <button   id="btn_Information_about_TEXT_ID_Limit_length_Manage"  disabled >Limit length Manage</button>
              <button   id="btn_Information_about_TEXT_ID_reset"   disabled  >Reset</button>
              <button   id="btn_Information_about_TEXT_ID_Reject"  disabled >Reject</button>
              <button   id="btn_Information_about_TEXT_ID_Approval"   disabled  >Approval</button>
              <button   id="btn_Information_about_TEXT_ID_Set_Approval_route"    disabled  >Set Approval route</button>
              <button   id="btn_Information_about_TEXT_ID_Send"     disabled  >Send</button>

        </div>

        <div id="Wraper_table_Information_about_TEXT_ID"  class="table-container">
<!-- ----------------------------backend---------------------------- -->

<?php include "../../BE/connect_database.php"; ?>
<?php include "../../BE/information_text_id.php"; ?>
<!-- ----------------------------backend---------------------------- -->
        </div>
        <div class="btn_back">
                <button id="btn_back_to_Database_of_wording_content">Back</button>
        </div>
<!-- ------------------------------------------------------Meter Display type popup-------------------------------- -->
                                          <div  id="Information_about_TEXT_ID_Meter_Display_type"   >
                                                <div id="modal_Meter_Display_type"  >
                                                        <h4>Meter Display Type</h4>
                                                        <p id="lack_of_infor4" >Please enter information</p>
                                                          <div id="table_Meter_Display_type"  style="overflow:auto;">
 <!-- ----------------------------backend---------------------------- -->
 <?php include "../../BE/limit_length.php" ?>
 <!-- ----------------------------backend---------------------------- -->
                                                        </div>
                                                      <div class="btn_ok_cancle">
                                                          <button   id="Meter_Display_type_add"   class="btn_pop"     >Add
                                                          </button>
                                                          <button   id="Meter_Display_type_remove"   class="btn_pop"     >Remove
                                                          </button>
                                                          <button   id="Meter_Display_type_cancel"   class="btn_pop"     >Cancel
                                                          </button>
                                                          <button   id="Meter_Display_type_ok"   class="btn_pop"     >OK
                                                          </button>
    
                                                      </div>
                                                </div>
                                          </div>
<!-- ------------------------------------------------------Meter Display type popup-------------------------------- -->
<!-- ------------------------------------------------------Set Approval-------------------------------- -->
                                            <div  id="Information_about_TEXT_ID_Set_Approval"   >
                                              <div id="modal_Set_Approval"  >
                                                  <h4>Set Approval</h4>
                                                  <p id="lack_of_infor2"   >Please enter information</p>
                                                      <div id="table_Set_Approval">
 <!-- ----------------------------backend---------------------------- -->
                                                  <table>
                                                      <thead>
                                                              <tr>
                                                                <th  colspan="2"  >Creator</th>
                                                              </tr>
                                                      </thead>
                                                      <tbody>
                                                              <?php include "../../BE/read_user_database.php" ?>
                                                      </tbody>
                                                  </table>
                                                  <table>
                                                      <thead>
                                                            <tr>
                                                              <th  colspan="2"  >MGR</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody>
                                                            <tr>
                                                              <td>Name</td>
                                                              <td><input id = "name_mgr" type="text" placeholder="Please enter your name"   ></td>
                                                            </tr>
                                                            <tr>
                                                              <td>Sect</td>
                                                              <td><input id = "sect_mgr"  type="text" placeholder="Please enter your sect" ></td>
                                                            </tr>
                                                            <tr>
                                                              <td>Mail</td>
                                                              <td><input id = "mail_mgr" type="text" placeholder="Please enter your mail"  ></td>
                                                            </tr>
                                                      </tbody>
                                                  </table>
 <!-- ----------------------------backend---------------------------- -->
                                                      </div> 
                                                      <div class="btn_ok_cancle">
                                                          <button   id="Set_Approval_cancel"   class="btn_pop"     >Cancel
                                                          </button>
                                                          <button   id="Set_Approval_ok"   class="btn_pop"     >OK
                                                          </button>                                                        
                                                      </div>
                                              </div>
                                            </div>
<!-- ------------------------------------------------------Set Approval-------------------------------- -->
</div> 
<!-- -----------------content---------------------------- -->

<!-- ------------------select reset------------------------------- -->
<?php
  include "../../BE/reset.php";
  ?>
<script src="../Information about TEXT ID/Information_about_TEXT_ID.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
  include "../../BE/set_approval.php"
?>

<?php require "../../../template/footer.php"; ?>