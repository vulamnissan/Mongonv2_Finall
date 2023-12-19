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
        <div  class="box_btn" >
          <!-- <button   id="btn_Translation_Request_Modify"    >Modify</button> -->
          <button   id="btn_Translation_Request_new_request" class="btn" >New request</button>

       
        </div>

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
    <?php include "../../BE/List_request_user.php" ?>
    </tbody>
  </table>


</div>

<div class="btn_back">
    <button id="btn_back_to_home">Back</button>
</div>


<!-- -----------------content---------------------------- -->
<script src="../Translation_request_list_request_manager/Translation_request_list_request_manager.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../FE/BE_script.js"></script>
<script src="../FE/Translation_Request.js"></script>

<!-- ============= button create new request=================== -->
<script>
    var btn_new_request = document.getElementById("btn_Translation_Request_new_request");
    btn_new_request.addEventListener("click",function(){
        // Next page
        window.location.href = "../Translation_Request.php";
    });
</script>



<?php require "../../../template/footer.php"; ?>


