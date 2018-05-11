
<?php
require('./PHPMailer-master/class.phpmailer.php');
require('./PHPMailer-master/class.smtp.php');

//original
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = false; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
//$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";

$mail->Port = 465; // or 587
$mail->IsHTML(true);

$mail->Username = "yourmail@gmail.com";
$mail->Password = "youpassword";
$mail->SetFrom("yourmail@gmail.com"); //sender 
$mail->Subject = "congrats";
$mail->Body = "hello,\n llll";
$mail->AddAddress("receiver@gmail.com"); //receiver

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }

?> 