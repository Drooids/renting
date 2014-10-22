<?php session_start();
include('class.load.php');
require 'class.phpmailer.php';
// var local a créer dans unficheir special
$username = "contact@home-saigon.com";
$password = "homesaigon_puf";
$from = "contact@home-saigon.com";
$reply = "contact@home-saigon.com";


switch ($_POST['action']) {
	case 'check':
		 $file_handle = fopen("email.html", "w+");
		 fwrite($file_handle,check($_POST['subject'],$_POST['text'])); 
 		 fclose($file_handle);
		break;
	case 'send':
		$emails = explode(',', $_POST['emails']);
		foreach ($emails as $key => $value) {
			send_email($username,$password,$from,$value,$reply,$_POST['subject'],check($_POST['subject'],$_POST['text']),'');
		}
		
		break;
	
	default:
		# code...
		break;
}

//Function save
	function check($subject,$text){
		$email = new email($subject);
		$email->add_text($text);
		$result = $email->affiche();
		return $result;
	}
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
		$mail->SetFrom($from, 'Home Saigon Agency');
		$mail->AddReplyTo($reply, 'Home Saigon Agency');
		$mail->AddAddress($to, 'Rebmann Guillaume');
		$mail->Subject = $subject;
		$mail->MsgHTML($message);
			if(!$mail->Send()) {
					//$this->user=$_SESSION['user_id'];	
			  echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			  echo "ok";
			}
	}
?>