
<?php
$pageTitle5 = "Information about TEXT ID" ;
?>
<style>
a{
  color: white;
  text-decoration: none;
}

</style>
<?php require "../../../../template/header.php"; ?>

    <link rel="stylesheet" href="../Information_about_TEXT_ID_list_request_manager/Information_about_TEXT_ID_list_request_manager.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  


<!-- -----------------content---------------------------- -->
<div id="Information_about_TEXT_ID_content">
        <h1>Database of wording</h1>
        <p id="mess_tran2">The below translation request has been issued by Nissan Design. Please confirm and fill the translation text in the yellow box</p>
        <div  class="box_btn" >
          <!-- <button   id="btn_Translation_Request_Modify"    >Modify</button> -->
          <button   id="Information_about_TEXT_ID_new_request"  class="btn">New Request</button>
        </div>

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
    //  echo $user_id;
    //  echo $rq;
     $id_user_temp = $_GET['id_user']??"";
    //  echo $id_user_temp;
     $rq_temp = $_GET['rq']??"";
    //  echo $rq_temp;
      include "../../../BE/my_sql.php";
      include "../../../BE/request.php";
      // include "../"
     ?>
    </tbody>
  </table>


</div>

<div class="btn_back">
    <button id="btn_back_to_home"  >
      ← Back
    </button>

</div>


</div>
<!-- -----------------content---------------------------- -->
<script src="../Information_about_TEXT_ID_list_request_manager/Information_about_TEXT_ID_list_request_manager.js"></script>
<!-- ============= button create new request=================== -->
<script>
    var btn_new_request = document.getElementById("Information_about_TEXT_ID_new_request");
    btn_new_request.addEventListener("click",function(){
        // console.log("son");
        
        window.location.href = "../../Database of wording.php";

    });
</script>


<?php require "../../../../template/footer.php"; ?>


