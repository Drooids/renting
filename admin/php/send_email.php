<?php
session_start();
require 'class.phpmailer.php';
if( isset($_REQUEST['from']) == true && isset($_REQUEST['from_nom']) == true && isset($_REQUEST['to']) == true && isset($_REQUEST['to_nom']) == true && isset($_REQUEST['reply']) == true && isset($_REQUEST['subject']) == true && isset($_REQUEST['message']) == true){
	$username = $_SESSION['email_pro'];
	$password = $_SESSION['email_pass'];
	$from=$_REQUEST['from'];
		$from_nom=$_REQUEST['from_nom'];
	$to=$_REQUEST['to'];
		$to_nom=$_REQUEST['to_nom'];
	$reply=$_REQUEST['reply'];
	$subject=$_REQUEST['subject'];
	$message=$_REQUEST['message'];

	send_email($username,$password,$from,$to,$reply,$subject,$message,'');
}



function send_email($username,$password,$from,$to,$reply,$subject,$message,$file){

date_default_timezone_set('Etc/UTC');
//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->IsSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug  = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host       = $_SESSION['smtp_host'];
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port       = $_SESSION['port'];
//Whether to use SMTP authentication
$mail->SMTPAuth   = true;
//Pour gmail
//$mail->SMTPSecure = 'ssl';
//Username to use for SMTP authentication
$mail->Username   = $username;
//Password to use for SMTP authentication
$mail->Password   = $password;
//Set who the message is to be sent from
$mail->SetFrom($from, 'Home Saigon Agency');
//Set an alternative reply-to address
$mail->AddReplyTo($reply, 'Home Saigon Agency');
//Set who the message is to be sent to
$mail->AddAddress($to, 'Rebmann Guillaume');
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
//$mail->MsgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = $message;
//Attach an image file
//$mail->AddAttachment('images/phpmailer-mini.gif');

//Send the message, check for errors
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
}


?>