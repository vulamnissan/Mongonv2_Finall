
<?php

//====================== Gui capture========================

$capture = "12345";
$name_receiver = "KNT19203@gmail.com";
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
