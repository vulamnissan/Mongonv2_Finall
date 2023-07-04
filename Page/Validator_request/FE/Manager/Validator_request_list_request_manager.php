<?php require "../../../template/header.php"; ?>
  <link rel="stylesheet" href="../Validator_request.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- -----------------content---------------------------- -->
<div id="Validator_request_content">
        <h1>Validator request</h1>
        <p id="mess_tran2">The below translation request has been issued by Nissan Design. Please confirm and fill the translation text in the yellow box</p>


<div id="Wraper_table_Validator_request_manager"  >
  
  <table id="myTable_Translation_Request_info_manager">
    <thead >
      <tr>
        <th >No</th>
        <th >Request Number</th>
        <th >Status</th>
        <th >Requester</th>
        <th >Date Issue</th>

    </thead>
    <tbody>
    <?php include "../../BE/BE_MANAGER_request_list_request.php" ?> 
    </tbody>
  </table>


</div>

<div class="btn_back">
    <button id="btn_back_to_home"  >
      ← Back
    </button>

</div>
<div  id="Validator_Request_view"   >
  <div id="modal_Validator_Request_view"  >
  <h4 id ="txt_request"></h4>
              <p id="lack_of_infor" style="color: RED;"  >Please enter Password</p>

                    <div   id="Validator_Request_view_form"   >
                            <span>
                              <label for="fname">Password:</label>
                              <input   id="vali_request_pass" type="text"  name="fname">
                            </span>

                    </div>

                    <div class="Validator_Request_view_btn_ok_cancle">
                                <button   id="Validator_Request_view_cancel"   class="btn_pop"     >Cancel
                                </button>
                                <button   id="Validator_Request_view_ok"   class="btn_pop"     >OK
                                </button>                                                        
                    </div>
  </div>
</div>

</div>
<!-- -----------------content---------------------------- -->
<script src="../Validator_request.js"></script>
<script src="../Manager/manager.js"></script>
<script src="../User/BE_script.js"></script>

<?php require "../../../template/footer.php"; ?>



