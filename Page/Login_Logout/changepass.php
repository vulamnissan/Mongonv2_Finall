<!DOCTYPE html>
<html>
<head>
<title>CHANGE PASSWORD</title>
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="changepass.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://raubaca.neocities.org/codepen/base.css'><link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="overlay"></div>
    <div class="login-box" style="height: 500px;">
 
            <center>
                <h1>METER MONGON</h1>
            </center>

          <div class="user-box">
            <input id="email" type="text" name="" required="">
            <label>Email</label>
          </div>
          <div class="user-box">
            <input id="old_pass" type="password" name="" required="">
            <label>Old password</label>
            <button type="button" id="toggleButton" onclick="togglePasswordVisibility()">
              <i class="far fa-eye"></i>
            </button>
          </div>
          <div class="user-box">
            <input id="new_pass" type="password" name="" required="">
            <label>New Password</label>
            <button type="button" id="toggleButton_cf" onclick="togglePasswordVisibility_cf()">
              <i class="far fa-eye"></i>
            </button>
          </div>
            <center>
                <button id="btn_signup2"  >
                    CHANGE
                </button>
           </center>

      </div>
</body>
<!-- JAVASCRIPT -->
<script src ="changepass.js"></script>
<script>
    $("document").ready(function(){
      $('#btn_signup2').click(function() {
        var email = $("#email").val();
        var pass_old = $("#old_pass").val();
        var pass_new = $("#new_pass").val();
        
        if (email == "" || pass_old == "" || pass_new == "")
        {
          alert("Please fill full information!")
        }
        else 
        {
          $("document").ready(function(){
            $.post("BE/BE_changepass.php", {email: email,old_pass: pass_old,new_pass: pass_new}, function(data){
              alert(data);

            });
          });
        };
      });
    });
</script>



</html>