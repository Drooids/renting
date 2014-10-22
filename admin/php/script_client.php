<?php
include('class.load.php');

if(isset($_GET['action'])){

	switch ($_GET['action']) {
		case 'create':
			$client = new client('');
			$name = $_GET['name'];
			$last_name = $_GET['last_name'];
			$phone = $_GET['phone'];
			$email = $_GET['email'];
			$language = $_GET['language'];
			$client->save_one_data('last_name',$last_name);
			$client->save_one_data('name',$name);
			$client->save_one_data('phone',$phone);
			echo "created";
			break;
		case 'delete':
			if(isset($_GET['id'])){
				$client = new client($_GET['id']);
				$client->delete();
				echo "deleted";
			}
			
			break;
		default:
			# code...
			break;
	}






}

?>