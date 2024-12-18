<?php

$subject = htmlspecialchars($_GET["subject"]);
$message = $_GET["message"];

$to = "ondrej.busta@com-pass.cz";
$headers = "from: postmaster@com-pass.cz \n";
$headers .= "X-mailer: phpWebmail \n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

if(mail($to, $subject, $message, $headers)) {
    echo json_encode('OK');
}
else
{
    echo json_encode("ERR");
}