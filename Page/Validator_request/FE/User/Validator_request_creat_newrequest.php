<?php require "../../../template/header.php"; ?>
  <link rel="stylesheet" href="../Validator_request.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- -----------------content---------------------------- -->
<div id="Validator_request_content">
        <h1>Validator request</h1>
        <p id="mess_tran2">The below translation request has been issued by Nissan Design. Please confirm and fill the translation text in the yellow box</p>
        <div id="containerbox2" class="box_btn" >
          <button   id="btn_Validator_request_save2"  disabled>Save</button>
          <!-- duc_href_comfirm -->
          <a href="Validator_request_main.php?flag=0">
              <input type="button" id="btn_Validator_request_Confirm_translation" value="Confirm translation" class="btn" disabled>
          </a>
          <!-- <button   id="btn_Validator_request_Confirm_translation"    disabled  >Confirm translation</button> -->

        </div>

<div id="Wraper_table_Validator_request"  >
<!-- back end include -->
  <?php include "../../BE/BE_USER_Validator_request_creat_newrequest.php" ?> 
</div>

  <div class="btn_back">
    <button id="btn_back_to_home"  >
      ← Back
    </button>

</div>

</div>
<!-- -----------------content---------------------------- -->
<script src="../Validator_request.js"></script>
<script src="../valiaccountshow.js"></script>
<script src="../Validator_request_popup.js"></script>
<script src="../valislide.js"></script>
<script src="./BE_script.js"></script>
<?php require "../../../template/footer.php"; ?>



