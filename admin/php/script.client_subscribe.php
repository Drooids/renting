<?php session_start();
include('class.load.php');
include('Send_test.php');
if(isset($_GET['email']) && isset($_GET['pwd']) && isset($_GET['name']) && isset($_GET['lastname'])){
	if(strlen($_GET['pwd']) >5){
		$email = $_GET['email'];
		$reponse = $bdd->query("SELECT id,email FROM client WHERE email='$email' LIMIT 1");
		$donnees = $reponse->fetchAll();
			if($donnees[0]['email']==$_GET['email']){
				 echo "already";
			}else{
				$client = new client('');
				$client->save_one_data('email',$_GET['email']);
				$client->save_one_data('name',$_GET['name']);
				$client->save_one_data('last_name',$_GET['lastname']);
					$password = md5($_GET['pwd']);
				$client->save_one_data('password',$password);
				$_SESSION['client_id'] = $client->id;
				
				$email = new email('Subscription on Home-Saigon');
				$email->add_text("<h2>Hey ".$client->last_name." ".$client->name.",</h2><p>Glad you decide to use HOME-SAIGON.</p><p>Here are the benefits from being a member of our community:</br>- save as favorites the offers that you find interesting and find them in your account.</br>- contact the vendors and schedule meetings</br>- get access to the panoramic view of the property</br>- receive alerts of new goods matching your criteria</br>- any questions about Saigon or anything else</br>Contact us we will be happy to help you.</p><p>AND MORE TO COME </p><p>Hope you will find your new home and enjoy your experience with HOME-SAIGON.</p><p>Thanks,</p><p>Julien </br>Co-founder</p>");
				$message = $email->affiche();

				send_email('julien@home-saigon.com','homesaigonemail','julien@home-saigon.com',$client->email,'contact@home-saigon.com','Subscription on Home-Saigon Admin',$message,'');

				echo "ok";
			}
	}else{
		echo "error";
	}
}else{
	echo "error";
}

?>

