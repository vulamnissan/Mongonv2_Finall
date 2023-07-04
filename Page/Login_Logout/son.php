<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
$mailer = new PHPMailer(true);

$mailer->isSMTP();
$mailer->Host = 'localhost';
$mailer->SMTPAuth = true;
$mailer->Username = 'lamvuuet@gmail.com';
$mailer->Password = '23091998VuLam@';
$mailer->SMTPSecure = 'tls';
$mailer->Port = 587;

// Set the recipients, subject, and body of the email
$mailer->setFrom('lamvuuet@gmail.com', 'Le Quang Son');
$mailer->addAddress('lamvuuet@gmail.com');
$mailer -> isHTML(true);
$mailer->Subject = 'Hello from PHPMailer';
$mailer->Body = 'laMmaillllllll';
// echo $mailer->getSentMIMEMessage();
$mailer->presend();


try {
    // PHPMailer configuration and sending code here

    if ($mailer->send()) {
        echo 'Email sent successfully!';
    } else {
        echo 'Error sending email.';
    }
} catch (Exception $e) {
    echo 'An error occurred: ' . $e->getMessage();
}




