
<?php
require('./PHPMailer-master/class.phpmailer.php');
require('./PHPMailer-master/class.smtp.php');

//original
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
//$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "yourmail@gmail.com";
$mail->Password = "yourpasswrod";
$mail->SetFrom("yourmail@gmail.com"); //sender 
$mail->Subject = "congrats";
$mail->Body = "hello,\n welcome to aour automated mail sending service";
$mail->AddAddress("receiver@gmail.com"); //receiver

echo"<hr color=green>";

 if(!$mail->Send()) {
	echo "<hr color=red>" ;
	//header("Location:./home1.php");
    echo "Mailer Error: " . $mail->ErrorInfo;
//	header("Location:./home1.php");
 } else {
    echo "Message has been sent";
	//header("Location:./home1.php");
 }

?> 