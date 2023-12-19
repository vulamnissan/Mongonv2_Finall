<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Meter Mongon</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../../Controller/control.js" ></script>
</head>
<?php
  ini_set('session.gc_maxlifetime', 1200);
  if(isset($_SESSION["email"]))
  {
      //nothing;
  }
  else
  {
    header("Location:http://main.mongonv2.net/mongonv2_official/Page/Login_Logout/login.php?");
    exit;
  }
?>
<body>
<header>
    <div id="sidebar" class="sidebar">
    <ul>
                     <?php

                     if (isset($pageTitle5) && $pageTitle5 === "h") {
                     echo '<li onclick = "side_bar_redirect(this.id)" style="color: #e94801; text-decoration: underline;">Home</li>';
                     } else {
                     echo '<li onclick = "side_bar_redirect(this.id)"   style="color: #ffffff;" ><a href="http://main.mongonv2.net/mongonv2_official/Page/home/home.php">Home</a></li>';
                     }
                     ?>
                    <?php
                     if (isset($pageTitle4) && $pageTitle4 === "Spec tender File Export") {
                     echo '<li onclick = "side_bar_redirect(this.id)"   id="li_spec" style="color: #6b4CD5; text-decoration: underline;">Spec tender File Export</li>';
                     } else {
                     echo '<li onclick = "side_bar_redirect(this.id)"   id="li_spec" style="color: black;" >Spec tender File Export</li>';
                     }
                     ?>
                    
                    <?php
                     if (isset($pageTitle) && $pageTitle === "Database of wording" or isset($pageTitle5) && $pageTitle5 === "Information about TEXT ID") {
                     echo '<li onclick = "side_bar_redirect(this.id)"   id="li_data" style="color: #6b4CD5; text-decoration: underline;">Database of wording</li>';
                     } else {
                     echo '<li onclick = "side_bar_redirect(this.id)"   id="li_data"  style="color: black;" >Database of wording</li>';
                     }
                     ?>

                     <?php
                     if (isset($pageTitle1) && $pageTitle1 === "I") {
                     echo '<li onclick = "side_bar_redirect(this.id)"   id="li_manager" style="color: #6b4CD5; text-decoration: underline;">Manage application</li>';
                     } else {
                     echo '<li onclick = "side_bar_redirect(this.id)"   id="li_manager"  style="color: black;" >Manage application</li>';
                     }
                     ?>
                     
                     <?php
                     if (isset($pageTitle2) && $pageTitle2 === "Translation Request") {
                     echo '<li onclick = "side_bar_redirect(this.id)"   id="li_tran" style="color: #6b4CD5; text-decoration: underline;">Translation request</li>';
                     } else {
                     echo '<li onclick = "side_bar_redirect(this.id)"   id="li_tran"  style="color: black;" >Translation request</li>';
                     }
                     ?>
                                          <?php
                     if (isset($pageTitle3) && $pageTitle3 === "Validator request") {
                     echo '<li onclick = "side_bar_redirect(this.id)"   id="li_vali" style="color: #6b4CD5; text-decoration: underline;">Validator request</li>';
                     } else {
                     echo '<li onclick = "side_bar_redirect(this.id)"   id ="li_vali"  style="color: black;" >Validator request</li>';
                     }
                     ?>

              </ul>
    </div>

    <div class="content">
      <div class="menu" onclick="toggleSidebar()">
        &#9776; 
      </div>
    </div>

    <div   id="account-button"   >
        <i class="fa fa-user"></i>
            <span style="margin-left: 10px;" ><?php echo $_SESSION["name"]; ?></span>
                <div class="notification-list-acc" id="notification-list-acc" style="z-index: 99 ;">
                  <p id = "account_type"  ><?php echo $_SESSION["type"] ?></p> 
                  <p id = "email"> <?php echo $_SESSION["email"]; ?></p> 
                  <button id = "logout" > Logout→</button>
                </div>
                
    </div>

    <p id="user_ID" style="display: none;"><?php echo $_SESSION['ID']; ?></p>

    </div>
    <script>
      // LOGOUT
      $("document").ready(function(){
          $('#logout').click(function(){
            location.href = "http://main.mongonv2.net/mongonv2_official/Page/Login_Logout/login.php?status=logout";
        })
      })  

    function side_bar_redirect(id){
          var type_account = document.getElementById("account_type").innerHTML;
          if (type_account == "translator" || type_account == "validator"){
              //Dont use side bar
          }
          else {
          // DATABASE OF WORDING
          if (id == "li_data" && (type_account=="user") ){
                      location.href = "http://main.mongonv2.net/mongonv2_official/Page/Database_of_wording/FE/Information about TEXT ID/Information_about_TEXT_ID_list_request_manager/Information_about_TEXT_ID_list_request_user.php";
                    }
                    else if (id == "li_data" && type_account=="manager" ){
                      location.href = "http://main.mongonv2.net/mongonv2_official/Page/Database_of_wording/FE/Information about TEXT ID/Information_about_TEXT_ID_list_request_manager/Information_about_TEXT_ID_list_request_manager.php";
                    }

                    // TRANSLATE REQUEST
                    if (id == "li_tran" && type_account=="user" ){
                      location.href = "http://main.mongonv2.net/mongonv2_official/Page/Translation_Request/FE/Translation_request_list_request_manager/Translation_request_list_request_user.php";
                    }
                    else if (id == "li_tran" && type_account=="manager" ){
                      location.href = "http://main.mongonv2.net/mongonv2_official/Page/Translation_Request/FE/Translation_request_list_request_manager/Translation_request_list_request_manager.php";
                    }

                      // VALIDATOR REQUEST
                    if (id == "li_vali" && type_account=="user" ){
                      location.href = "http://main.mongonv2.net//mongonv2_official/Page/Validator_request/FE/User/Validator_request_list_request.php";
                    }
                    else if (id == "li_vali" && type_account=="manager" ){
                      location.href = "http://main.mongonv2.net/mongonv2_official/Page/Validator_request/FE/Manager/Validator_request_list_request_manager.php";
                    }

                    // SPEC TENDER REPORT
                    if (id == "li_spec" && (type_account=="user" || type_account == "manager") ){
                      location.href = "http://main.mongonv2.net/mongonv2_official/Page/Spec_tender_file_export_/Spec_tender_file_export.php";
                    }
                    
                    // MANAGER APPLICATION
                    if (id == "li_manager" && (type_account=="user" || type_account == "manager")  ){
                      location.href = "http://main.mongonv2.net/mongonv2_official/Page/Manager_application/FE/Manage_application.php";
                    }       
          }
          

          
      }


      
    </script>

  </header>
