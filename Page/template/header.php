<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Meter Mongon</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../../Controller/control.js" ></script>
</head>

<body>
<header>
    <div id="sidebar" class="sidebar">
              <ul>
                     <?php
                    // Kiểm tra nếu tiêu đề chứa chữ "Home"
                     if (isset($pageTitle5) && $pageTitle5 === "h") {
                     echo '<li  style="color: #e94801; text-decoration: underline;">Home</li>';
                     } else {
                     echo '<li  style="color: #ffffff;" ><a href="http://localhost/mongonv2_demo/Page/home/home.php" >Home</a></li>';
                     }
                     ?>
                    <?php
                    // Kiểm tra nếu tiêu đề chứa chữ "Spec tender File Export"
                     if (isset($pageTitle4) && $pageTitle4 === "Spec tender File Export") {
                     echo '<li id="li_spec" style="color: #e94801; text-decoration: underline;">Spec tender File Exportg</li>';
                     } else {
                     echo '<li id="li_spec"  style="color: #ffffff;" >Spec tender File Export</li>';
                     }
                     ?>
                    
                    <?php
                    // Kiểm tra nếu tiêu đề chứa chữ "Database of wording"
                     if (isset($pageTitle) && $pageTitle === "Database of wording" or isset($pageTitle5) && $pageTitle5 === "Information about TEXT ID") {
                     echo '<li id="li_data" style="color: #e94801; text-decoration: underline;">Database of wording</li>';
                     } else {
                     echo '<li id="li_data"  style="color: #ffffff;" >Database of wording</li>';
                     }
                     ?>

                     <?php
                    // Kiểm tra nếu tiêu đề chứa chữ "
                     if (isset($pageTitle1) && $pageTitle1 === "I") {
                     echo '<li id="li_manager" style="color: #e94801; text-decoration: underline;">Manage application</li>';
                     } else {
                     echo '<li id="li_manager"  style="color: #ffffff;" >Manage application</li>';
                     }
                     ?>
                     
                     <?php
                    // Kiểm tra nếu tiêu đề chứa chữ "Translation Request"
                     if (isset($pageTitle2) && $pageTitle2 === "Translation Request") {
                     echo '<li id="li_tran" style="color: #e94801; text-decoration: underline;">Translation request</li>';
                     } else {
                     echo '<li id="li_tran"  style="color: #ffffff;" >Translation request</li>';
                     }
                     ?>
                                          <?php
                    // Kiểm tra nếu tiêu đề chứa chữ "Validator request"
                     if (isset($pageTitle3) && $pageTitle3 === "Validator request") {
                     echo '<li li_vali" style="color: #e94801; text-decoration: underline;">Validator request</li>';
                     } else {
                     echo '<li li_vali"  style="color: #ffffff;" >Validator request</li>';
                     }
                     ?>

              </ul>
    </div>

    <div class="content">
      <div class="menu" onclick="toggleSidebar()">
        &#9776; <!-- biểu tượng menu -->
      </div>
    </div>

    <div   id="account-button"   >
        <i class="fa fa-user"></i>
            <span style="margin-left: 10px;" ><?php echo $_COOKIE["name"]; ?></span>
                <div class="notification-list-acc" id="notification-list-acc" style="z-index: 99 ;">
                  <p  id="account_type"  ><?php echo $_COOKIE["type"] ?></p> 
                  <p id="email"   > <?php echo $_COOKIE["email"]; ?></p> 
                  <button id = "logout" > Logout→</button>
                </div>
                
    </div>

    <p id="user_ID" style="display: none;"><?php echo $_COOKIE['ID']; ?></p>

    </div>
    <script>
      // LOGOUT
      $("document").ready(function(){
          $('#logout').click(function(){
            location.href = "http://localhost/mongonv2_demo/Page/Login_Logout/login.php?status=logout";
          })
      })  
    </script>

  </header>
