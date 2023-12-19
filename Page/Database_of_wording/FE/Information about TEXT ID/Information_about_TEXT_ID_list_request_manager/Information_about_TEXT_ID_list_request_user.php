
<?php
$pageTitle5 = "Information about TEXT ID" ;
?>

<?php require "../../../../template/header.php"; ?>
    <link rel="stylesheet" href="../Information_about_TEXT_ID_list_request_manager/Information_about_TEXT_ID_list_request_manager.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- -----------------content---------------------------- -->
<div id="Information_about_TEXT_ID_content">
    <h1>Database of wording</h1>
    <p id="mess_tran2">The below translation request has been issued by Nissan Design. Please confirm and fill the translation text in the yellow box</p>
    <div  class="box_btn" >
      <button id="Information_about_TEXT_ID_new_request"  class="btn">Show Database</button>
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
                $id_user_temp = $_GET['id_user']??"";
                $rq_temp = $_GET['rq']??"";
                  include "../../../BE/my_sql.php";
                  include "../../../BE/request.php";
            ?>
        </tbody>
      </table>
    </div>

    <div class="btn_back">
        <button id="btn_back_to_home">Back</button>
    </div>

</div>
<!-- -----------------content---------------------------- -->
<script src="../Information_about_TEXT_ID_list_request_manager/Information_about_TEXT_ID_list_request_manager.js"></script>
<!-- ============= button create new request=================== -->
<script>
    var newUrl = "#new-trang";
    window.location.hash = newUrl;
    var btn_new_request = document.getElementById("Information_about_TEXT_ID_new_request");
    btn_new_request.addEventListener("click",function(){
        window.location.href = "../../Database of wording.php";
    });
</script>

<?php require "../../../../template/footer.php"; ?>


