<?php             
 $pageTitle2 = "Translation Request";
?>

<?php require "../../template/header.php"; ?>
  <link rel="stylesheet" href="Translation_Request.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- <div> -->
  <p id = "choose_page" style ="display:none"  > <?php echo $_GET["flag"]??"" ?> </p>
  <p id= "choose_id" style ="display:none"  > <?php echo $_GET["id_user"]??"" ?> </p>
  <p id = "choose_rq" style ="display:none"  > <?php echo $_GET["rq"]??"" ?> </p>
<!-- </div> -->
<!-- -----------------content---------------------------- -->
<div id="Translation_Request_content">
        <h1>Translation Request</h1>
        <p id="mess_tran">The below translation request has been sent to you, so please check it!</p>
        <p id="mess_tran2">The below translation request has been issued by Nissan Design. Please confirm and fill the translation text in the yellow box</p>
        
        <div  class="box_btn" >
          <!-- <button   id="btn_Translation_Request_Modify"    >Modify</button> -->
          <button   id="btn_Translation_Request_save"  disabled>Save</button>
          <button   id="btn_Translation_Request_Confirm_translation"    disabled  >Confirm translation</button>
          <button   id="btn_Translation_Request_Set_Password"   disabled  >Set Password</button>
          <button   id="btn_Translation_Request_Set_Approval"  disabled >Set Approval</button>
          <button   id="btn_Translation_Request_Send_Approval"   disabled  >Send Approval</button>
          <button   id="btn_Translation_Set_Deadline"  >Set Deadline</button>
          <button   id="btn_Translation_Request_Reject"    >Reject</button>
          <button   id="btn_Translation_Request_Check_Translation"    >Check Translation</button>
          <button   id="btn_Translation_Request_Send_request_to_Maruboshi"    disabled  >Send request to Maruboshi</button>
          <button   id="btn_Translation_Request_save_translator"  class="btn" >Save</button>
          <button   id="btn_Translation_Request_Hamidashi_check"     disabled  >Hamidashi check</button>
          <button   id="btn_Translation_Request_Send_result"     disabled  >Send result</button>

        </div>
        <p id="mess_tran3">Please re-enter a valid translation results</p>

  <div id="Wraper_table_Translation_Request"  class="table-container">

<!-- ----------------------------backend---------------------------- -->
<!-- < include "../BE/BE_Translation_Request.php" ?> -->
<!-- ----------------------------backend---------------------------- -->
 

  </div>
  <div id="Wraper_table_Translation_Request_info"  class="table-container">


                                        
 
 <!-- ----------------------------backend---------------------------- -->
 <!--id cua table phai dat nhu nay  <table id="myTable_Translation_Request_info"> -->
 <!-- <include "../BE/BE_Confirm_Translation.php" ?> -->
<!-- ----------------------------backend---------------------------- -->


</div>
<div id="Wraper_table_Translation_Request_Translator"  class="table-container">



 <!-- ----------------------------backend---------------------------- -->
 <!--id cua table phai dat nhu nay  <table id="myTable_Translation_Request_Translator"> -->
<!-- ----------------------------backend---------------------------- -->


</div>
  <div class="btn_back">
    <button id="btn_back_to_home"  >
      ← Back
    </button>

</div>
<!-- ------------------------------------------------------Set password-------------------------------- -->
<div  id="Translation_Request_Set_password"   >
  <div id="modal_Translation_Request_Set_password"  >
      <h4>Set Password</h4>
          <p id="header_setpass">This will create a password-protected copy</p>
              <p id="lack_of_infor" style="color: RED;"  >Please enter information</p>
                  <p  id="not_macth"  style="color: RED;"  >Create password and confirm password do not match</p>
          
                <form id="form_Translation_Request_Set_password"  >
                    <div   id="Translation_Request_form_set_password"   >
                            <span>
                              <label for="fname">Create password:</label>
                              <input   id="create_pass" type="text"  name="fname">
                            </span>
                            <span>
                              <label for="lname">Confirm password:</label>
                              <input     id="conf_pass" type="text"  name="lname">
                            </span>
                    </div>

                    <div class="Translation_Request_Set_password_btn_ok_cancle">
                                
                                <button   id="Translation_Request_Set_password_cancel"   class="btn_pop"     >Cancel
                                </button>
                                <button   id="Translation_Request_Set_password_ok"   class="btn_pop"     >OK
                                </button>                                                        
                    </div>
                </form>
      
  </div>
</div>
<!-- ------------------------------------------------------Set password-------------------------------- -->
<!-- ------------------------------------------------------Set approval-------------------------------- -->
<div  id="Translation_Request_Set_Approval"   >
  <div id="modal_Translation_Request_Set_Approval"  >
      <h4>Set Approval</h4>
            <p id="lack_of_infor2"   >Please enter information</p>

          <div id="table_Translation_Request_Set_Approval">
  <!-- ----------------------------backend---------------------------- -->
  <table>
    <thead>
    <tr>
      <th  colspan="2"  >Creator</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Name</td>
      <td id = "name_creator" ></td>
      <!-- <td><input type="text" id = "name_translator" value=""  placeholder="Please enter your name" ></td> -->
    </tr>
    <tr>
      <td >Sect</td>
      <td id = "sect_creator"></td>
      <!-- <td><input type="text" id = "sect_translator"   placeholder="Please enter your sect"></td> -->
    </tr>
    <tr>
      <td>Mail</td>
      <td id = "mail_creator" ></td>
      <!-- <td><input type="text" id = "mail_translator"   placeholder="Please enter your mail"  ></td> -->
    </tr>
    <tr>
      <td>Company</td>
      <td id = "company_creator" ></td>
      <!-- <td><input type="text" id = "mail_translator"   placeholder="Please enter your mail"  ></td> -->
    </tr>
  </tbody>
  </table>
    <table>
        <thead>
        <tr>
          <th  colspan="2"  >Translator</th>
        </tr>
      </thead>
    <tbody>
        <tr>
          <td>Name</td>
          <td><input type="text" id = "name_translator" placeholder="Please enter your name"   ></td>
        </tr>
        <tr>
          <td>Sect</td>
          <td><input type="text" id = "sect_translator" placeholder="Please enter your sect" ></td>
        </tr>
        <tr>
          <td>Mail</td>
          <td><input type="text" id = "mail_translator" placeholder="Please enter your mail"  ></td>
        </tr>
        <tr>
          <td>Company</td>
          <td><input type="text" id = "company_translator" placeholder="Please enter your mail"  ></td>
        </tr>
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
        <td><input type="text" id = "name_mrg" placeholder="Please enter your name"   ></td>
      </tr>
      <tr>
        <td>Sect</td>
        <td><input type="text" id = "sect_mrg" placeholder="Please enter your sect" ></td>
      </tr>
      <tr>
        <td>Mail</td>
        <td><input type="text" id = "mail_mrg" placeholder="Please enter your mail"  ></td>
      </tr>
      <tr>
        <td>Company</td>
        <td><input type="text" id = "company_mrg" placeholder="Please enter your mail"  ></td>
      </tr>
    </tbody>
    </table>
<!-- ----------------------------backend---------------------------- -->

          </div> 
          <div class="Translation_Request_Set_Approval_btn_ok_cancle">
              <button   id="Translation_Request_Set_Approval_cancel"   class="btn_pop"     >Cancel</button>
              <button   id="Translation_Request_Set_Approval_ok"   class="btn_pop"     >OK</button>                                                        
          </div>
  </div>
</div>
<!-- ------------------------------------------------------Set approval-------------------------------- -->
<!-- ------------------------------------------------------Set deadline-------------------------------- -->
<div  id="Translation_Request_Set_dealine"   >
  <div id="modal_Translation_Request_Set_dealine"  >
          <h5>Meter Display type</h4>
          <p id="lack_of_infor3"   >Please enter information</p>
          <label for="">Date</label>
          <input id ="Translation_Request_set_deadline" type="text">
        <div class="Translation_Request_Set_dealine_btn_ok_cancle">
            <button   id="Translation_Request_Set_dealine_cancel"   class="btn_pop"     >Cancel
            </button>
            <button   id="Translation_Request_Set_dealine_ok"   class="btn_pop"     >OK
            </button>
        </div>
  </div>
</div>
<!-- ------------------------------------------------------Set deadline-------------------------------- -->
<!-- ------------------------------------------------------Set approval-------------------------------- -->
<div  id="Translation_Request_Check_Translation"   >
  <div id="modal_Translation_Request_Check_Translation"  >
      <h6>Translator Address</h6>
          
      <p id="lack_of_infor4" style="color: RED;"  >Please enter information</p>
          <!-- <div id="table_Translation_Request_Check_Translation"> -->
  <!-- ----------------------------backend---------------------------- -->
              <table id="table_Translation_Request_Check_Translation">
                <thead>
                  <tr>
                    <th colspan="2">Translator</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Name</td>
                    <td id = "tran_name_input" ></td>
                  </tr>
                  <tr>
                    <td>Sect</td>
                    <td id = "tran_sect_input" ></td>
                  </tr>
                  <tr>
                    <td>Mail</td>
                    <td id = "tran_mail_input" ></td>
                  </tr>
                  <tr>
                  <td  >Company</td>
                    <td id = "tran_compny_input"></td>
                  </tr>
                </tbody>
              </table>
<!-- ----------------------------backend---------------------------- -->

          <!-- </div>  -->
          <div class="Translation_Request_Check_Translation_btn_ok_cancle">
            <button   id="Translation_Request_Check_Translation_Eddit"   class="btn_pop"     >Edit</button>
              <button   id="Translation_Request_Check_Translation_cancel"   class="btn_pop"     >Cancel</button>
              <button   id="Translation_Request_Check_Translation_ok"   class="btn_pop"     >OK</button>                                                        
          </div>
  </div>
</div>


</div>



<!-- -----------------content---------------------------- -->
<script src="../FE/tranpopup.js"></script>

<!-- ================================================ SCRIPT CUA HOANG ===============================================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../FE/BE_script.js"></script>
<script src="../FE/Translation_Request.js"></script>

<?php 

include "../../template/footer.php"; 

?>


