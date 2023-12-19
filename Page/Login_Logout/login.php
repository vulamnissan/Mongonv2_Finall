<!DOCTYPE html>
<html>
<?php
  $check_logout = $_GET["status"]??"";
  if ($check_logout = "")
      {
      //nothing
      }
    else 
      {
        session_destroy();
      }

  // Generate CSRF token
  $csrfToken = bin2hex(random_bytes(32));
  $_SESSION['csrf_token'] = $csrfToken;
?>
<head>
<title>Login</title>
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="overlay"></div>
    <div class="login-box">
        <form autocomplete="off">
            <center>
                <h1>メータ文言管理</h1>
            </center>
          <div class="user-box">
            <input id="email" type="text" name="" required = "" >
            <label>Email</label>
	          <input type="hidden" name="token" value="<?php echo htmlspecialchars($csrfToken, ENT_COMPAT, 'UTF-8') ;?>">
          </div>
          <div class="user-box">
            <input id="pass" type="password" name="" required="" >
            <label>Password</label>
            <button type="button" id="toggleButton" onclick="togglePasswordVisibility()">
              <i class="far fa-eye"></i>
            </button>
      <div class="forgot">
				<a rel="noopener noreferrer" href="fogotpass.html">Forgot Password ?</a>
			</div>
          </div>

              <span class="sigup">
                <p style="margin-top: 10px;" >Don't have an account? </p>
                  <button id="btn_signup"><a href="changepass.php" target="_blank" style="color:#e94801;font-size: 15px;"  >Change password</a></button>

              </span>
        </form>
            <center>
                <button id="btn_login" >
                  Login
                </button>
           </center>

      </div>
</body>

<script>
  function togglePasswordVisibility() {
    var passwordInput = document.getElementById('pass');
    var toggleButton = document.getElementById('toggleButton');

    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      toggleButton.innerHTML = '<i class="far fa-eye-slash"></i>';
    } else {
      passwordInput.type = 'password';
      toggleButton.innerHTML = '<i class="far fa-eye"></i>';
    }
  }

  // Check ID ,Pass 
  $("document").ready(function(){
    $('#btn_login').click(function(){
      var mail = $("#email").val();
      var password = $("#pass").val();
      if (mail == "" || password == "")
          {
            //nothing
          }
      else 
          {
            $("document").ready(function(){
              $.post("BE/login_backend.php", {email : mail, pass : password}, function(data){
                var result = Number(data);
                if ( result === 1)
                  {
                    location.href = "Capture.php";
                  }
                else if ( result === -1)
                  {
                    alert( "Your account has been blocked due to entering the wrong password too many times.");
                    alert( "Please contact to your manager to unblock account !")
                  }
                else 
                  {
                    alert( "Please check email and password");
                  };
              });
            });
          };
    });
  });
</script>
</html>
