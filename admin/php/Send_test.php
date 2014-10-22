<?php
//include('class.load.php');
require 'class.phpmailer.php';




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
$mail->Host       = 'smtp1.servage.net';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port       = 25;
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
$mail->AddAddress($to, 'Houbin Julien');
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
//$mail->MsgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->MsgHTML($message);
//Attach an image file
//$mail->AddAttachment('images/phpmailer-mini.gif');

//Send the message, check for errors
	if(!$mail->Send()) {
			$this->user=$_SESSION['user_id'];
			
			
	  echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  echo "Message sent!";
	}
}/*
$essai = new email("Projet d'agence immobiliere");
$essai->add_text("Madame Laurence,<br><br>Je me permet de vous contacter non pas parce que je suis à la recherche d'un appartement mais car je travaille sur un projet d'agence immobilière.<br><br>Nous sommes deux étudiants en informatiques, nous connaissons donc très bien tout ce qui concerne les dernières technologies du marché.Voici quelques photos de notre projet (Site internet, Application mobile). ");
$essai->add_dual_image('http://www.home-saigon.com/images/2nd.png','http://www.home-saigon.com/images/accueil.png');
$essai->add_text("Notre projet ne s'étend pas uniquement sur Saigon. Nous visons Hanoi, Da Nang ainsi que Nha Trang.<br>Malheureusement, nous n'avons pas d'expérience dans l'immobilier et sommes à la recherche d'un partenaire, non pas pour le financement du projet mais pour apporter l'expérience ainsi que la licence nécessaire à la création d'une agence immobilière au Vietnam.<br><br>Veuillez agréer mes sincères salutation.");

$message = $essai->affiche();

send_email('contact@home-saigon.com','homesaigon_puf','contact@home-saigon.com','guillaume.rebmann33@gmail.com','contact@home-saigon.com','hello the world',$message,'');
*/
//echo $message;
?>

