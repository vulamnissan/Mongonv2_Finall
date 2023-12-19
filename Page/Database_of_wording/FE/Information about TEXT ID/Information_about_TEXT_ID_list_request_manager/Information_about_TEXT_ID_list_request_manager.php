
<?php
$pageTitle5 = "Information about TEXT ID" ;
?>

<?php require "../../../../template/header.php"; ?>

    <link rel="stylesheet" href="../Information_about_TEXT_ID_list_request_manager/Information_about_TEXT_ID_list_request_manager.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
<!-- -----------------content---------------------------- -->
<div id="Information_about_TEXT_ID_content">
        <h1>Database of wording </h1>
        <p id="mess_tran2">The below translation request has been issued by Nissan Design. Please confirm and fill the translation text in the yellow box</p>

<div id="Wraper_table_Information_about_TEXT_ID_manager"  >
  <table id="myTable_Information_about_TEXT_ID_info_manager">
    <thead >
      <tr>
        <th >No</th>
        <th >Request Number</th>
        <th >Status</th>
        <th >Requester</th>
        <th >Date Issue</th>
    </thead>
    <tbody>
    <?php 
      include "../../../BE/my_sql.php";
      include "../../../BE/table_request_M.php";
    ?>
    </tbody>
  </table>
</div>

<div class="btn_back">
    <button id="btn_back_to_home"  >Back</button>

</div>
<div  id="Information_about_TEXT_ID_view"   >
  <div id="modal_Information_about_TEXT_ID_view"  >
      <h4>VR0001</h4>
              <p id="lack_of_infor" style="color: RED;"  >Please enter Password</p>
          
                <form id="form_Information_about_TEXT_ID_view"  >
                    <div   id="Information_about_TEXT_ID_view_form"   >
                            <span>
                              <label for="fname">Password:</label>
                              <input   id="Information_about_TEXT_ID_pass" type="text"  name="fname">
                            </span>

                    </div>

                    <div class="Information_about_TEXT_ID_view_btn_ok_cancle">
                                <button   id="Information_about_TEXT_ID_view_cancel"   class="btn_pop"     >Cancel
                                </button>
                                <button   id="Information_about_TEXT_ID_view_ok"   class="btn_pop"     >OK
                                </button>                                                        
                    </div>
                </form>
      
  </div>
</div>

</div>
<!-- -----------------content---------------------------- -->
<script src="../Information_about_TEXT_ID_list_request_manager/Information_about_TEXT_ID_list_request_manager.js"></script>

<?php require "../../../../template/footer.php"; ?>

