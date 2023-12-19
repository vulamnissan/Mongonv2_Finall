
<?php

//TOKEN check 
include "../Translation_Request/BE/MySql.php";
$db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
$qr= new Query("mongonv2");

require "../template/header.php"; 

?>
  <link rel="stylesheet" href="home.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- -----------------content---------------------------- -->
<div id="home_container">
  <div id="home_function">
    <div id="Spec_tender_File_Export" class="box" data-url="https://example.com/page1" >Spec tender File Export</div>
    <div id="Database_of_wording" class="box" >Database of wording</div>
    <div id="Manage_application" class="box"  style="display:none">Manager application</div>
    <div id="Translation_request" class="box" data-url="https://example.com/page4">Translation request</div>
    <div id="Validator_request" class="box" data-url="https://example.com/page5">Validator request</div>
    <div id="Vehicle_manage" class="box" data-url="https://example.com/page6">Vehicle manage</div>
    
  </div>
  <div id="home_view_function" class="centerBox">
    <div id="viewbox">
      <h1 id="title">メータ文言</h1>
      <p id="description">Enter title here !</p>
      <button id="startButton" onclick="goToPage()">Get Started</button>
    </div>
  </div>
</div>

<script src="../home/home.js"></script>


<?php require "../template/footer.php"; ?>

