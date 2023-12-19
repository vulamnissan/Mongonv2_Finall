<!DOCTYPE html>
<html>
<head>
<title>SIGUP</title>
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="changepass.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://raubaca.neocities.org/codepen/base.css'><link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="overlay"></div>
    <div class="login-box" style="height: 790px;">
 
            <center>
                <h1>METER MONGON</h1>
            </center>

          <div class="user-box">
            <input id="name" type="text" name="" required="">
            <label>Name</label>
          </div>

          <div class="user-box">
            <input id="company" type="text" name="" required="">
            <label>Company</label>
          </div>

          <div class="user-box">
            <input id="sect" type="text" name="" required="">
            <label>Sect</label>
          </div>

          <div class="user-box">
            <label>Type Account</label>
            <select name="type_acount" id="type_acount" style="margin-top: 45px; margin-bottom: 30px; height: 39px; width: 395px">
              <option value="adm">Admin</option>
              <option value="manager">Manager</option>
              <option value="user">User</option>
              <option value="translator">Translator</option>
              <option value="validator">Validator</option>
            </select>   
          </div>

          <div class="user-box">
            <input id="email" type="text" name="" required="">
            <label>Email</label>
          </div>
          <div class="user-box">
            <input id="pass" type="password" name="" required="">
            <label>Password</label>
            <button type="button" id="toggleButton" onclick="togglePasswordVisibility()">
              <i class="far fa-eye"></i>
            </button>
          </div>
          <div class="user-box">
            <input id="confirm_pass" type="password" name="" required="">
            <label>Confirm Password</label>
            <button type="button" id="toggleButton_cf" onclick="togglePasswordVisibility_cf()">
              <i class="far fa-eye"></i>
            </button>
          </div>
            <center>
                <button id="btn_signup2"  >
                    Sign Up
                </button>
           </center>

      </div>
</body>
<!-- JAVASCRIPT -->
<script src ="sigup.js"></script>




</html>