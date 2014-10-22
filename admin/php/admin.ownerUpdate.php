<?php session_start();
include('class.load.php');
include('class.owner.php');
if(isset($_GET['action'])){
	if($_GET['action'] == 'update'){
		$id = $_GET['owner'];
		$last_name = $_GET['owner_lastname'];
		$name = $_GET['owner_name'];
		$nationality = $_GET['owner_nationality'];
		$adress = $_GET['owner_adress'];
		$phone = $_GET['owner_phone'];
		$email = $_GET['owner_email'];
		$company = $_GET['owner_company'];
		//$comment = $_GET['owner_comment'];

		$owner = new owner($id);
		$owner->save_one_data('owner_lastname',$last_name);
		$owner->save_one_data('owner_name',$name);
		$owner->save_one_data('owner_nationality',$nationality);
		$owner->save_one_data('owner_adress',$adress);
		$owner->save_one_data('owner_phone',$phone);
		$owner->save_one_data('owner_email',$email);
		$owner->save_one_data('owner_company',$company);


	}else{

	}
}
?>