<!--// CONTENT: FE_create_newrequest_user
// OUTPUT: FE_create_newrequest_user-->
<?php require "../../../template/header.php"; ?>
  <link rel="stylesheet" href="../Validator_request.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- -----------------content---------------------------- -->
<?php
    include "../../BE/MySql.php";
    $db_filter = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
    $qr_filter= new Query("mongonv2");
    //=====load db textid request=====
    function load_data_txtid_language_filter($db,$qr)
    {
        $result= $qr->select_data_valdator_rq($db,"textid_language");
        if (!$result)
        {
            die ('InCorrect');
        }
        else
        {
            return $result;
        }
        
    } 

?>
<div id="Validator_request_content">
        <h1>Validator request</h1>
        <div style="position: relative; left: 70px; top: 85px">
        <select name="filter_select" id="filter_select" style = "height: 35px; width:200px; border:none;font-family: Calibri; font-size: 15px;">
          <option value="2">textid</option>
          <option value="4">US_English</option>
          <?php
              $data_filter=load_data_txtid_language_filter($db_filter,$qr_filter);
              $row_filter = mysqli_fetch_assoc($data_filter);
              $arr_col_filter=array_keys($row_filter);
              $count_col_select_lang=5;
              for ($i=4;$i<count($arr_col_filter);$i++)
              {
                $pos=strpos($arr_col_filter[$i],"_text");
                if ($pos !== false)
                { 
                    $name_language=str_replace("_text","",$arr_col_filter[$i]);
                    echo "<option value='".$count_col_select_lang."'>".$name_language."</option>;";
                    $count_col_select_lang=$count_col_select_lang+1;
                }
              }
          ?>
          </select>
          <input id="filter_text" type="text" style = "height: 35px; width:200px; font-size: 15px; border: none ">
          <button id="btn_filter" style = "height: 35px; width: 100px; color: aliceblue; background-color: #6B4CD5; font-family: Calibri; font-size: 15px;font-weight: bold; cursor:pointer">Filter</button>
        </div> 
        <div id="Validator_Status_content" >
            <h2>Validator Status</h2>
            <div class="grid-container">
            <div class="boxvs" style="background-color: #FFFF00;"  ></div>
              <div class="boxvs">Untranslated</div>
              <div class="boxvs" style="background-color: #d88675;"  ></div>
              <div class="boxvs">Translated</div>
              <div class="boxvs" style="background-color: #548235;"  ></div>
              <div class="boxvs">Done</div>
            </div>
        </div>
        <p id="mess_tran2">The below translation request has been issued by Nissan Design. Please confirm and fill the translation text in the yellow box</p>
        <div id="containerbox2" class="box_btn" >
          <button   id="btn_Validator_request_save2"  disabled>Save</button>
          <a id="newrq" href="Validator_request_main.php?flag=0">
              <input type="button" id="btn_Validator_request_Confirm_translation" value="Confirm translation"  disabled>
          </a>
        </div>

<div id="Wraper_table_Validator_request"  >
<!-- back end include -->
  <?php include "../../BE/BE_USER_Validator_request_creat_newrequest.php" ?> 
</div>

  <div class="btn_back">
    <button id="btn_back_to_home">Back</button>

</div>

</div>
<!-- -----------------content---------------------------- -->
<script src="../Validator_request.js"></script>
<script src="../valiaccountshow.js"></script>
<script src="../Validator_request_popup.js"></script>
<script src="../valislide.js"></script>
<script src="./BE_script.js"></script>
<?php require "../../../template/footer.php"; ?>



