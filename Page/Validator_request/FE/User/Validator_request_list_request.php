<?php
$pageTitle3 = "Validator request";
?>
<!--// CONTENT: FE_list_request_user
// OUTPUT: FE_list_request_user-->
<?php require "../../../template/header.php"; ?>
  <link rel="stylesheet" href="../Validator_request.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- -----------------content---------------------------- -->
<div id="Validator_request_content">
        <h1>Validator request</h1>
        <p id="mess_tran2">The below translation request has been issued by Nissan Design. Please confirm and fill the translation text in the yellow box</p>
        <div id="containerbox1" class="box_btn" >
          <!-- duc_href_newrq -->
          <a href="Validator_request_creat_newrequest.php">
              <input type="button" id="btn_Validator_request_new_request" value="New Request" class="btn">
          </a>
          <!-- <button  id="btn_Validator_request_new_request"  class="btn"  >New Request</button> -->

        </div>


              <p id="mess_tran3">Please re-enter a valid translation results</p>

<div id="Wraper_table_Validator_request"  >
<?php include "../../BE/BE_USER_Validator_request_list_request.php" ?> 
<!-- <div id="Wraper_table_Validator_request"  >
<table id="myTable_Translation_Request_info_validator">
    <thead >
      <tr>
        <th >No</th>
        <th >Request Number</th>
        <th >Status</th>
        <th >Requester</th>
        <th >Date Issue</th>

    </thead>
    <tbody>
    < include "../../BE/BE_USER_Validator_request_list_request.php" ?> 
    </tbody>
  </table>-->
</div> 

<div class="btn_back">
    <button id="btn_back_to_home">Back</button>

</div>


</div>
<!-- -----------------content---------------------------- -->
<script src="../Validator_request.js"></script>
<script src="../User/user.js"></script>
<script src="./BE_script.js"></script>
<?php require "../../../template/footer.php"; ?>


