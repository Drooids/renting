<?php session_start();
include('class.load.php');
include('class.owner.php');
include('class.tutorial.php');
include('Send_test.php');

if(isset($_GET['action'])){
	$email = $_GET['register_email'];
	$name = $_GET['register_name'];
	$lastName = $_GET['register_lastname'];
	$phone = $_GET['register_phone'];
	$adress = $_GET['register_address'];
	$password = $_GET['register_password'];
	$offer = $_GET['register_offer'];
	$offer_duration = 1;
	// On verifie qu'un compte n'existe pas deja.
	$reponse = $bdd->query("SELECT user_id FROM users WHERE email = '$email'");
	$donnees = $reponse->fetchAll();
	if(count($donnees) == 0){
		$user = new user('create');
		$user->save_one_data('last_name',$lastName);
		$user->save_one_data('name',$name);
		$user->save_one_data('phone',$phone);
		$user->save_one_data('adress',$adress);
		$user->save_one_data('email',$email);
		$user->save_one_data('username',$email);
		$user->save_one_data('password',md5($password));
		$user->save_one_data('offer',$offer);
		switch ($offer) {
			case 'free':
				$offer = 99;
				break;
			case 'basic':
				$offer = 1;
				break;
			case 'pro':
				$offer = 2;
				break;
			
			default:
				$offer = null;
				break;
		}
		$user->save_one_data('right',$offer);
			//Start Date
			$date = date('Y/m/d H:i:s');
		$user->save_one_data('date_start',$date);
		$user->save_one_data('date_start_timestamp',strtotime($date));
			//End Date
			$date = date('Y/m/d H:i:s', strtotime("+".$offer_duration." month"));
		$user->save_one_data('date_end',$date);
		$user->save_one_data('date_end_timestamp',strtotime($date));
		$user->save_one_data('active',1);


				$tutorial = new tutorial('create');
				$tutorial->save_one_data('user_id',$user->id);

		$owner = new owner('');
		$owner->save_one_data('owner_lastname',$lastName);
		$owner->save_one_data('owner_name',$name);
		$owner->save_one_data('owner_adress',$adress);
		$owner->save_one_data('owner_phone',$phone);
		$owner->save_one_data('owner_email',$email);
		$owner->save_one_data('owner_userid',$user->id);
		//Envoyer l'email d'inscription
		$email = new email('Subscription on Home-Saigon Admin');
		$email->add_text("<h2>WELCOME ".$user->last_name." ".$user->name.",</h2><p>AWESOME ! You decided to join us and we will do everything to provide you the best experience using our service.</p><p>After agreeing with our Terms&Conditions, proceeding with the payment (if you are asked for) you'll be able to start.</br>You will be guided through the process and can find help/supports anytime you want by clicking on <a href='http://home-saigon.com/contact.php' > This link </a>in your account page.</p><p>Thanks for trusting us.</p><p>It's time to start a tremendous collaboration.</p><p>Julien Houbin</p><p>Co-founder of Home-Saigon</p>");
		$message = $email->affiche();

		send_email('julien@home-saigon.com','homesaigonemail','julien@home-saigon.com',$user->email,'contact@home-saigon.com','Subscription on Home-Saigon Admin',$message,'');


		echo "An email has been sent to you !";


	}




}




?>