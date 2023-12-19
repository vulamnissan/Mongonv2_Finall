<?php
$pageTitle = "Database of wording" ;

?>

<?php require "../../template/header.php"; ?>
 <link rel="stylesheet" href="Database_of_wording.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- -----------------content---------------------------- -->
<div id="Database_of_wording_content">
        <h1>Database of wording</h1>
    <div id="wraper_Validator_Status"  >
                    <div>
                    <button id="btn_Information_about_TEXT_ID"  >Information about TEXT ID</button>
<!-- -------------------  FIlTER BUTTON ------------------->
                        <?php
                          include "../BE/my_sql.php";
                          function load_data_txtid_language_select_lang($db,$qr)
                          {
                            $result= $qr->select_data($db,"textid_language");
                            if (!$result)
                            {
                                die ('Query is wrong');
                            }
                            else
                            {
                                return $result;
                            }
                          }
                            
                        ?>
                    <div style="position: relative; left: 70px; top: 30px">
                      <select name="filter_select_db_wd"  id="type_filter" style = "height: 35px; width:200px; border:none;font-family: Calibri; font-size: 15px;">
                        <option value="textid">textid</option>
                        <option value="US_English">US_English</option>
                        <?php
                          $db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
                          $qr= new Query("mongonv2");
                          $data_select_lang = load_data_txtid_language_select_lang($db,$qr);
                          $row_select_lang = mysqli_fetch_assoc($data_select_lang);
                          $arr_col_select_lang=array_keys($row_select_lang);
                          $count_col_select_lang=4;
                          for ($i=4;$i<count($arr_col_select_lang);$i++)
                          { 
                            $pos=strpos($arr_col_select_lang[$i],"_text");
                            
                            if ($pos !== false)
                            {
                                $count_col_select_lang=$count_col_select_lang+1;
                                $name_language=str_replace("_text","",$arr_col_select_lang[$i]);
                                echo "<option value='".$name_language."'>".$name_language."</option>;";
                            }
                          }
                        ?>
                      </select>
                      <input id = 'filter' style = "height: 35px; width:200px; font-size: 15px; border: none "></input>
                      <button id = 'btn_filter' style = "height: 35px; width: 100px; color: aliceblue; background-color: #6B4CD5; font-family: Calibri; font-size: 15px;font-weight: bold; cursor:pointer">Filter</button>
                    </div>
 <!-- --------------------------------------------------------------->
 
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

    </div>

    <div id="Wraper_table_Database_of_wording"  class="table-container">

<!-- ----------------------------backend---------------------------- -->
      <?php include "../BE/config_table.php";?>

    </div>



    <div class="btn_back">
      <button id="btn_back_to_home"  >
        ← Back
      </button>
    </div>

</div>
<!-- -----------------content---------------------------- -->
<script src="../FE/Database_of_wording.js"></script>
<script>
    // insertPHPIntoDiv();
  </script>
<?php 


include "../../template/footer.php"; 

?>

