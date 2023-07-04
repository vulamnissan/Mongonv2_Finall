
<?php             
 $pageTitle2 = "Translation Request";
?>
<?php require "../../../template/header.php"; ?>
  <link rel="stylesheet" href="../Translation_request_list_request_manager/Translation_request_list_request_manager.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- -----------------content---------------------------- -->
<div id="Translation_request_content">
        <h1>Translation request</h1>
        <p id="mess_tran2">The below translation request has been issued by Nissan Design. Please confirm and fill the translation text in the yellow box</p>


<div id="Wraper_table_Translation_request_manager"  >
  <table id="myTable_Translation_request_info_manager">
    <thead >
      <tr>
        <th >No</th>
        <th >Request Number</th>
        <th >Status</th>
        <th >Requester</th>
        <th >Date Issue</th>

    </thead>
    <tbody>
      <!-- <tr>
        <td>1</td>
        <td class="list_request">ffff</button></td>
        <td>1234567890</td>
        <td>1</td>
        <td>Nguyễn Văn A</td>
      </tr>
      <tr>
        <td>1</td>
        <td>Nguyễn Văn A</td>
        <td>1234567890</td>
        <td>1</td>
        <td>Nguyễn Văn A</td>

      </tr>
      <tr>
        <td>1</td>
        <td>Nguyễn Văn A</td>
        <td>1234567890</td>
        <td>1</td>
        <td>Nguyễn Văn A</td>
      </tr> -->
      <?php include "../../BE/List_request_manager.php" ?>
    </tbody>
  </table>


</div>

<div class="btn_back">
    <button id="btn_back_to_home"  >
      ← Back
    </button>
</div>

<div  id="Translation_request_view"   >
  <div id="modal_Translation_request_view"  >
      <h4 id = "txt_request"></h4>
              <p id="lack_of_infor" style="color: RED;"  >Please enter Password</p>
          
                <form id="form_Translation_request_view"  >
                    <div   id="Translation_request_view_form"   >
                            <span>
                              <label for="fname">Password:</label>
                              <input   id="Translation_request_pass" type="text"  name="fname">
                            </span>

                    </div>

                    <div class="Translation_request_view_btn_ok_cancle">
                                <button   id="Translation_request_view_cancel"   class="btn_pop"     >Cancel
                                </button>
                                <button   id="Translation_request_view_ok"   class="btn_pop"     >OK
                                </button>                                                        
                    </div>
                </form>
      
  </div>
</div>

</div>
<!-- -----------------content---------------------------- -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../Translation_request_list_request_manager/Translation_request_list_request_manager.js"></script>



<?php require "../../../template/footer.php"; ?>