<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);
$out = "";
printArray($_POST);
function printArray($array){
    global $out;
    foreach ($array as $key => $value){
        $out .= $key.": ".$value."<br>";
    } 
}    
echo $out;


try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 993;

    $mail->Username = '23962c9dd0659a'; // YOUR gmail email
    $mail->Password = '03e81db076ea9f'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('info@mailtrap.io', 'Sender Name');
    $mail->addAddress('recipient1@mailtrap.io', 'Receiver Name');
    $mail->addReplyTo('info@mailtrap.io', 'Taylor'); // to set the reply to
    $mail->addCC('cc1@example.com', 'Elena');
    $mail->addBCC('bcc1@example.com', 'Alex');

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "Send email using Gmail SMTP and PHPMailer";
    $mail->Body = $out;
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

    $mail->send();
    echo "Email message sent.";
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
?>