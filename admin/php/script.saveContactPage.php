<?php session_start();
include("class.load.php");
require 'class.phpmailer.php';
// var local a créer dans unficheir special
$username = "contact@home-saigon.com";
$password = "homesaigon_puf";
$from = "contact@home-saigon.com";
$reply = "contact@home-saigon.com";
		

$yourname=	htmlspecialchars($_REQUEST['yourname'], ENT_QUOTES);
$number =	htmlspecialchars($_REQUEST['number'], ENT_QUOTES);
$url=	htmlspecialchars($_REQUEST['url'], ENT_QUOTES);
$text=	htmlspecialchars($_REQUEST['message'], ENT_QUOTES);		
						
				//$text =htmlentities($_REQUEST['text'], ENT_NOQUOTES,'UTF-8');
						$date = date('Y/m/d H:i:s');

						$message="<p>Name: ".$yourname."</p>";
						$message.="<p>Date: ".$date."</p>";
						$message.="<p>Email: ".$_REQUEST['email']."</p>";
						$message.="<p>Phone: ".$number."</p>";
						$message.="<p>Url: ".$url."</p>";
						$message.="</br><p>Message: ".$text."</p>";

						send_email($username,$password,$from,'guillaume.rebmann33@gmail.com','no-reply@home-saigon.com','Contact',$message,'');

						//Function envoi
	function send_email($username,$password,$from,$to,$reply,$subject,$message,$file){

		date_default_timezone_set('Etc/UTC');
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug  = 0;
		$mail->Debugoutput = 'html';
		$mail->Host       = 'smtp1.servage.net';
		$mail->Port       = 25;
		$mail->SMTPAuth   = true;
		$mail->Username   = $username;
		$mail->Password   = $password;
		$mail->SetFrom($from, 'Home Saigon Contact Page');
		$mail->AddReplyTo($reply,$reply);
		$mail->AddAddress($to, 'Contact Home Saigon');
		$mail->Subject = $subject;
		$mail->MsgHTML($message);
			if(!$mail->Send()) {
					//$this->user=$_SESSION['user_id'];	
			  echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			  echo $message;
			}
	}

				

?>