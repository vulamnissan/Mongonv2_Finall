<?php

  include "../Translation_Request/BE/MySql.php";
  $db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
  $qr= new Query("mongonv2");
  // Create Capture
  $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789zxcvbnmlkjhgfdsaqwertyuiop';
  function generate_string($input, $strength = 5) 
      {
          $input_length = strlen($input);
          $random_string = '';
          for($i = 0; $i < $strength; $i++) 
              {
                  $random_character = $input[mt_rand(0, $input_length - 1)];
                  $random_string .= $random_character;
              }
          return $random_string;
      }
  $string_length = 6;
  $captcha_string = generate_string($permitted_chars, $string_length);
  $_SESSION['capture'.$_SESSION['ID']] = $captcha_string;
  $capture = $captcha_string;

  //SENDMAIL
  $mail_sender = "email";
  $name_receiver = $_SESSION['name'];
  $mail_receiver = "email";
  include "../../Page/send_mail.php";
  $subject = 'EIW LOGIN CAPTURE';
  $htmlBody = 'Thank for login website .'.'<br><br>' . 'Your capture : <h1>'.$capture.'</h1>';
  Send_Mail($subject,$htmlBody,$mail_sender,$mail_receiver);

?>
<!DOCTYPE html>
<html>
<head>
<title>eMail Confirm</title>
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="overlay"></div>
    <div class="login-box">
            <center>
                <h1>METER MONGON</h1>
            </center>
          <div class="user-box">
            <input id="capture" type="text" name="" required = "" >
            <label>Capture</label>
          </div>
            <center>
                <button id="btn_login" >
                  Verify
                </button>
           </center>
      </div>
</body>
<script>
    $("document").ready(function(){
      $('#btn_login').click(function() {
        var capture_code = $("#capture").val();
        var token = $("#token").val();

        if (capture_code == "" )
              {
                alert("Please input capture !")
              }
        else
            {
              $("document").ready(function(){
                $.post("BE/capture_check.php", {capture_code : capture_code, token: token}, function(data){
                  var result = Number(data);
                  if ( result == 1)
                      {
                        location.href = "../home/home.php";
                      }
                  else if(result == -1)
                      {
                        alert( "Token is not valid. The path is insecure. Please check the path before entering the Capture !");
                      }
                  else 
                      {
                        alert( "Please input capture agains !");
                      };

                });
              });
            };
      });
    });
</script>
</html>
