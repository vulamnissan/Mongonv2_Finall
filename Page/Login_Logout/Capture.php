<?php
  session_start();
  // Create Capture
  $id = 1;
  $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789zxcvbnmlkjhgfdsaqwertyuiop';
        function generate_string($input, $strength = 5) {
            $input_length = strlen($input);
            $random_string = '';
            for($i = 0; $i < $strength; $i++) {
                $random_character = $input[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            }
            return $random_string;
        }
        $string_length = 6;
    $captcha_string = generate_string($permitted_chars, $string_length);
    include "BE/connect_database.php";
    $db = connect_db('localhost','mongonv2','root','');
    // get data from database
    $sql = "UPDATE user SET user.capcha = '".$captcha_string."' WHERE user.id = " . $id;
    // $sql_user = "SELECT * FROM user WHERE user.id =" . $_COOKIE['ID'];
    $update_status = $db -> query($sql);
    // echo $_COOKIE['ID'];
    $_SESSION['capture'.$_COOKIE['ID']] =  $captcha_string;
    // echo $_SESSION['capture'.$_COOKIE['ID']];
    // echo $update_status;

    // $to = 'lamvuuet@gmail.com';
    // $subject = 'Test Email';
    // $message = 'This is a test email.';
    // $headers = 'From: sender@example.com' . "\r\n" . 'Reply-To: sender@example.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    // if (mail($to, $subject, $message, $headers)) {
    //    echo 'Email sent successfully.';} 
    // else { 
    //   echo 'Failed to send email.';}
    $capture = $captcha_string;
    $name_receiver = $_COOKIE['name'];
    $mail_receiver = "lamvuuet@gmail.com";
    
    // mail to manager
    $subject = "Capture login : ";
    $body = "To: ".$name_receiver. "
            \n Capture : ".$capture."
            ";
    $emailDraft = "mailto:?subject=" . $string = str_replace("+", " ", urlencode($subject)) . "&body=" . $string1 = str_replace("+", " ", urlencode($body)) . "&to=" . $mail_receiver;
    
    // Open the email draft in Outlook
    $command = 'open "' . $emailDraft . '"';
    shell_exec($command); 
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
        <form autocomplete="off">
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
        // alert(capture_code);
        if (capture_code == "" )
        {
          alert("Please input capture !")
        }
        else 
        {
          $("document").ready(function(){
            // alert(capture_code);
            $.post("BE/capture_check.php", {capture_code : capture_code}, function(data){
              var result = Number(data);
              if ( result == 1){
                location.href = "../home/home.php";
              }
              else {
                alert( "Please input capture agains !");
              };

            });
          });
        };
      });
    });
</script>
</html>