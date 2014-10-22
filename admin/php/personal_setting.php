<?php
	include('class.load.php');

	 $user = unserialize($_SESSION['user']); 

	 $key = $_GET['key'];
	 $value = $_GET['value'];
	 
	 switch ($key) {
	 	case 'password':
	 		if($user->change_password($value)){
	 			echo 'ok';
	 		}
	 		break;
	 	
	 	default:
	 		if($user->save_one_data($key,$value)){
			 	echo 'ok';
			 }
	 		break;
	 }
	 


?>