<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$name = htmlspecialchars($_GET["name"]);
$email = htmlspecialchars($_GET["email"]);
$subject = htmlspecialchars($_GET["subject"]);
$message = $_GET["message"];

try {
    //Server settings
    $mail->CharSet = "UTF-8";
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'compass-cz0i.mail.protection.outlook.com';                   //Set the SMTP server to send through
    $mail->SMTPAuth   = false;                                   //Enable SMTP authentication
    //$mail->Username   = 'adam.satrapa@com-pass.cz';                  //SMTP username
    //$mail->Password   = 'Candat007';                           //SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('postmaster@com-pass.cz');
    $mail->addAddress('adam.satrapa@com-pass.cz');     //Add a recipient
    //$mail->addReplyTo($email, $name);
    //$mail->addCC('josef.budina@gmail.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
    //echo json_encode('OK');
} catch (Exception $e) {
    //echo json_encode("ERR");
}