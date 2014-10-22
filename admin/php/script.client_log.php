<?php ob_start();
session_start();
include('server.php');
include('class.client.php');
include('class.provider.php');
include('Send_test.php');
include('class.email.php');
$config_file_path = 'hybridauth/config.php';
 
require_once( "hybridauth/Hybrid/Auth.php" );


if(isset($_GET['log']) && isset($_GET['pwd'])){
	$email = $_GET['log'];
	$password = $_GET['pwd'];
	$password = md5($password);
	$reponse = $bdd->query("SELECT id,email,password FROM client WHERE email='$email' AND password='$password' LIMIT 1");
	$donnees = $reponse->fetchAll();
			if($donnees[0]['email']==$email)
			{
				$id = $donnees[0]['id'];
				$_SESSION['client_id'] = $id;
            
            	echo"success";
			}else{
				echo"error";
			}	
}elseif( isset($_REQUEST["provider"]) ){ 
		
		$provider_name = $_REQUEST["provider"];
 
		try{
			// initialize Hybrid_Auth with a given file
			$hybridauth = new Hybrid_Auth( $config_file_path );
		}
		catch( Exception $e ){
			echo "Error: please try again!";
			echo "Original error message: " . $e->getMessage();
		}
 
		# and that's it!
		# beyond that, its up to you sign-in the user if he already exist on your database
		# or sign-up the user if not.
		# the following pseudocode is provided only as an example:
 		if( isset( $_REQUEST["redirect_to_idp"] ) ){
			$adapter = $hybridauth->authenticate($provider_name);
			$user_profile = $adapter->getUserProfile();
			$provider_id = $user_profile->identifier;
			$reponse = $bdd->query("SELECT id,client_id,provider_id,provider_name FROM provider WHERE provider_name='$provider_name' AND provider_id ='$provider_id' LIMIT 1");
			$donnees = $reponse->fetchAll();
 			 if(count($donnees) != 0){
 			 	
 			 	$providerClient = new provider($donnees[0]['id']);
 			 	$client = new client($providerClient->client_id);
 			 	$client->save_one_data('photo',$user_profile->photoURL);
 			 	$_SESSION['client_id'] = $client->id;
 			 	//$reponse = $bdd->query("SELECT id FROM client WHERE id ='$providerClient->id' LIMIT 1");
				//$donnees = $reponse->fetchAll();
 			 	$result=1;
 			 }else{ // Le client ne sais jamais connecté avant
 			 	$providerClient = new provider('');
 			 	$providerClient->save_one_data('provider_id',$provider_id);
 			 	$providerClient->save_one_data('provider_name',$provider_name);
 			 		//On verifie si un client utilise le meme email.
 			 		$reponse = $bdd->query("SELECT id,email FROM client WHERE email = '$user_profile->email' LIMIT 1");
					$donnees = $reponse->fetchAll();
					if(count($donnees) != 0){
						$providerClient->save_one_data('client_id',$donnees[0]['id']);
						$client = new client($donnees[0]['id']);
						$client->save_one_data('photo',$user_profile->photoURL);
						$_SESSION['client_id'] = $client->id;
						$result=2;
					}else{
						$client = new client('');
		 			 	$client->save_one_data('name',$user_profile->firstName);
		 			 	$client->save_one_data('last_name',$user_profile->lastName);
		 			 	$client->save_one_data('email',$user_profile->email);
		 			 	$client->save_one_data('nationality',$user_profile->language);
		 			 	$client->save_one_data('photo',$user_profile->photoURL);
		 			 	$providerClient->save_one_data('client_id',$client->id);
		 			 	$_SESSION['client_id'] = $client->id;
		 			 	
						$email = new email('Subscription on Home-Saigon');
						$email->add_text("<h2>Hey ".$client->last_name." ".$client->name.",</h2><p>Glad you decide to use HOME-SAIGON !</p><p>Here are the benefits from being a member of our community:</br>- save as favorites the offers that you find interesting and find them in your account.</br>- contact the vendors and schedule meetings</br>- get access to the panoramic view of the property</br>- receive alerts of new goods matching your criteria</br>- any questions about Saigon or anything else?! Contact us we will be happy to help you.</p><p>AND MORE TO COME </p><p>Hope you will find your new home and enjoy your experience with HOME-SAIGON.</p><p>Thanks,</p><p>Julien </br>Co-founder</p>");
						$message = $email->affiche();

						send_email('julien@home-saigon.com','homesaigonemail','julien@home-saigon.com',$client->email,'contact@home-saigon.com','Subscription on Home-Saigon Admin',$message,'');

		 			 	$_SESSION['client_id'] = $client->id;
		 			 	$result=3;
		 			 	if($provider_name == "facebook"){
		 			 		 $adapter->setUserStatus(
								    array(
								       "message" => "I just subscribe on the website: Home-saigon.com. The best Real Estate agency in Ho Chi Minh City", // status or message content
								       "link"    => "http://home-saigon.com", // webpage link
								       "picture" => "http://home-saigon.com/images/logoFB.png", // a picture link
								    )
								  ); 
		 			 	}
					}

 			 	//echo"0";
 			 	/*$client = new client('');
 			 	$client->save_one_data('provider_id',$provider_id);
 			 	$client->save_one_data('provider_name',$provider_name);
 			 	$client->save_one_data('name',$user_profile->firstName);
 			 	$client->save_one_data('last_name',$user_profile->lastName);
 			 	$client->save_one_data('email',$user_profile->email);
 			 	$_SESSION['client_id'] = $client->id;
 			 	*/
 			 }
 			 
 			echo "<script type='text/javascript'> function changeParent() { window.opener.document.getElementById('email_provider').value ='".$user_profile->email."';window.opener.document.getElementById('name_provider').value ='".$provider_name."'; window.opener.document.getElementById('connected_provider').value ='".$result."'; window.close();} changeParent(); </script>";
				
		// if user exist on database, then same as before
			/*if( $user_exist ){ 
				$_SESSION["user_connected"] = true;
				//redirect_to("http://www.home-saigon.com");
			}*/
		}
		else{
			// here we display a "loading view" while tryin to redirect the user to the provider
		?>
		<table width="100%" border="0">
		  <tr>
		    <td align="center" height="190px" valign="middle"><img src="../source/fancybox_loading.gif" /></td>
		  </tr>
		  <tr>
		    <td align="center"><br /><h3>Loading...</h3><br /></td> 
		  </tr>
		  <tr>
		    <td align="center">Contacting <b><?php echo ucfirst( strtolower( strip_tags( $provider_name ) ) ) ; ?></b>. Please wait.</td> 
		  </tr> 
		</table>
		<script>
			setTimeout(function(){window.location.href = window.location.href + "&redirect_to_idp=1";},1000);
		</script>
		<?php  
		}
		
}else{
		echo"probleme de code";
}


?>