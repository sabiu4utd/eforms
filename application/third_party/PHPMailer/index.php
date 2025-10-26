<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->SMTPAuth = true;
$mail->Username = 'noreply@fubk.edu.ng';
$mail->Password = 'noreply123456';
$receipient = "abdulhakeembrhm@gmail.com";

$mail->setFrom('noreply@fubk.edu.ng', 'FUBK Auth');
$mail->addReplyTo('noreply@fubk.edu.ng', 'FUBK Auth');
$mail->addAddress($receipient, 'Abdulhakeem Ibrahim');

$mail->Subject = 'PHPMailer GMail SMTP test';

$mail->msgHTML("Hello World");


if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}