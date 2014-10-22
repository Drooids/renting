<?php session_start();
include('class.load.php');
if(isset($_GET['action'])){
	if($_GET['action'] == 'update'){
		$id = $_GET['user'];
		$last_name = $_GET['user_lastname'];
		$name = $_GET['user_name'];
		$nationality = $_GET['user_nationality'];
		$adress = $_GET['user_adress'];
		$phone = $_GET['user_phone'];
		$email = $_GET['user_email'];
		$company = $_GET['user_company'];
		//$comment = $_GET['comment'];

		$user = new user($id);
		$user->save_one_data('last_name',$last_name);
		$user->save_one_data('name',$name);
		$user->save_one_data('nationality',$nationality);
		$user->save_one_data('adress',$adress);
		$user->save_one_data('phone',$phone);
		$user->save_one_data('email',$email);
		$user->save_one_data('company',$company);


	}else{

	}
}
?>