
<?php require "../../../template/header.php"; ?>
<link rel="stylesheet" href="../Validator_request.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- -----------------content---------------------------- -->
<div id="Validator_request_content">
        <h1>Validator request</h1>
        <p id="mess_enter_address">Please enter the address and deadline information</p>
        <p id="mess_tran2">The below translation request has been issued by Nissan Design. Please confirm and fill the translation text in the yellow box</p>
        <div id="containerbox5" class="box_btn" >
          <button   id="btn_Validator_request_save5"  class="btn">Save</button>
          <button   id="btn_Validator_request_Hamidashi_check" class= "btn" >Hamidashi check</button>
          <button   id="btn_Validator_request_Send_result"     disabled  >Send result</button>

        </div>
<p id="mess_validator_check">Please re-enter a valid translation results</p>
<p id="mess_validator_info_check">Please enter full information</p>
<p id="mess_validator_info_check_OK_NG">Please enter only NG and OK in the Result</p>

<div id="Wraper_table_Validator_Request_validator" >                                     
     <?php 
        try {
          include "../../BE/BE_VALIDATOR_table_tonggle.php" ;
        } catch (Exception $e){
          echo 'Loading ... ';
        }
     ?>
</div>
          <div id="box_langue">

              <button class="prev-button" onclick="previous()"> < </button>

                <div class="slideshow">
                     <!-- include file -->
                     <?php include "../../BE/BE_VALIDATOR_request_main_buttonlanguage.php" ?> 
                </div>
                  <button class="next-button" onclick="next()">    >  </button>
              </div>
  <div class="btn_back">
    <button id="btn_back_to_home">Back</button>

</div>
<!-- ------------------------------------------------------Set password-------------------------------- -->
<div  id="Validator_Request_Set_password"   >
  <div id="modal_Validator_Request_Set_password"  >
      <h4>Set Password</h4>
          <p id="header_setpass">This will create a password-protected copy</p>
              <p id="lack_of_infor" style="color: RED;"  >Please enter information</p>
                  <p  id="not_macth"  style="color: RED;"  >Create password and confirm password do not match</p>
          
                <form id="form_Validator_Request_Set_password"  >
                    <div  id="Validator_Request_form_set_password"   >
                            <span>
                              <label for="fname">Create password:</label>
                              <input   id="create_pass" type="text"  name="fname">
                            </span>
                            <span>
                              <label for="lname">Confirm password:</label>
                              <input     id="conf_pass" type="text"  name="lname">
                            </span>
                    </div>

                    <div class="Validator_Request_Set_password_btn_ok_cancle">
                                <button   id="Validator_Request_Set_password_cancel"   class="btn_pop"     >Cancel
                                </button>
                                <button   id="Validator_Request_Set_password_ok"   class="btn_pop"     >OK
                                </button>                                                        
                    </div>
                </form>
      
  </div>
</div>
<!-- ------------------------------------------------------Set password-------------------------------- -->
<!-- ------------------------------------------------------Set approval-------------------------------- -->
<div  id="Validator_request_Set_Approval"   >
  <div id="modal_Validator_request_Set_Approval"  >
      <h4>Set Approval</h4>
            <p id="lack_of_infor2"   >Please enter information</p>

          <div id="table_Validator_request_Set_Approval">
            <table>
              <thead>
              <tr>
                <th  colspan="2"  >Translator</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Name</td>
                <td><input type="text" placeholder="Please enter your name"   ></td>
              </tr>
              <tr>
                <td>Sect</td>
                <td><input type="text" placeholder="Please enter your sect" ></td>
              </tr>
              <tr>
                <td>Mail</td>
                <td><input type="text" placeholder="Please enter your mail"  ></td>
              </tr>
            </tbody>
            </table>
              <table>
                  <thead>
                  <tr>
                    <th  colspan="2"  >Creator</th>
                  </tr>
                </thead>
              <tbody>
                  <tr>
                    <td>Name</td>
                    <td><input type="text" placeholder="Please enter your name"   ></td>
                  </tr>
                  <tr>
                    <td>Sect</td>
                    <td><input type="text" placeholder="Please enter your sect" ></td>
                  </tr>
                  <tr>
                    <td>Mail</td>
                    <td><input type="text" placeholder="Please enter your mail"  ></td>
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
                  <td><input type="text" placeholder="Please enter your name"   ></td>
                </tr>
                <tr>
                  <td>Sect</td>
                  <td><input type="text" placeholder="Please enter your sect" ></td>
                </tr>
                <tr>
                  <td>Mail</td>
                  <td><input type="text" placeholder="Please enter your mail"  ></td>
                </tr>
              </tbody>
              </table>
          </div> 
          <div class="Validator_request_Set_Approval_btn_ok_cancle">
              <button   id="Validator_request_Set_Approval_cancel"   class="btn_pop"     >Cancel</button>
              <button   id="Validator_request_Set_Approval_ok"   class="btn_pop"     >OK</button>                                                        
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
          <input type="text">
        <div class="Translation_Request_Set_dealine_btn_ok_cancle">
            <button   id="Translation_Request_Set_dealine_cancel"   class="btn_pop"     >Cancel
            </button>
            <button   id="Translation_Request_Set_dealine_ok"   class="btn_pop"     >OK
            </button>
        </div>
  </div>
</div>
<!-- ------------------------------------------------------Set deadline-------------------------------- -->

</div>
<script src="../Validator_request.js"></script>
<script src="../valiaccountshow.js"></script>
<script src="../Validator_request_popup.js"></script>
<script src="../valislide.js"></script>
<script src="./validator.js"></script>
<?php require "../../../template/footer.php"; ?>


