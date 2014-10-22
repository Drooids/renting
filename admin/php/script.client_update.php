<?php session_start();
include('class.load.php');

if(isset($_GET['user'])){
	if($_GET['user'] == 1){
		$id = $_SESSION['client_id'];
		$last_name = $_GET['last_name'];
		$name = $_GET['name'];
		$nationality = $_GET['nationality'];
		$skype = $_GET['skype'];
		$phone = $_GET['phone'];
		$email = $_GET['email'];
		
		if(isset($_GET['newsletter']))
			$newsletter = 1;
		else
			$newsletter = 0;

		$client = new client($id);
		$client->save_one_data('last_name',$last_name);
		$client->save_one_data('name',$name);
		$client->save_one_data('nationality',$nationality);
		$client->save_one_data('skype',$skype);
		$client->save_one_data('phone',$phone);
		$client->save_one_data('email',$email);
		$client->save_one_data('newsletter',$newsletter);


	}else{

	}




}

?>