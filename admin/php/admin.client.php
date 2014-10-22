<?php session_start();
include('class.load.php');

if(isset($_GET['action'])){
	switch ($_GET['action']) {
		case 'create':
			$date = date('Y/m/d H:i:s');
			$name = $_POST['reg_input_name'];  
			$lastname = $_POST['reg_input_lastname']; 
			$adress = $_POST['reg_input_adress']; 
			$company = $_POST['reg_input_company']; 
			$email = $_POST['reg_input_email'];
			$phone = $_POST['reg_input_phone']; 
			$message = $_POST['reg_textarea_message']; 
			$nationality = $_POST['s2_ext_value'];

			$reponse = $bdd->query("SELECT owner_email FROM owner where owner_email = '$email'");
	   		$reponse = $reponse->fetchAll();
	   		if(count($reponse) == 0){
	   			$owner = new owner('');
				$owner->save_one_data('owner_name',$name);
				$owner->save_one_data('owner_lastname',$lastname);
				$owner->save_one_data('owner_adress',$adress);
				$owner->save_one_data('owner_company',$company);
				$owner->save_one_data('owner_email',$email);
				$owner->save_one_data('owner_phone',$phone);
				$owner->save_one_data('owner_comment',$message);
				$owner->save_one_data('owner_nationality',$nationality);
				$owner->save_one_data('owner_date_modification',$date);
				$owner->save_one_data('owner_userid',$_SESSION['user_id']);
				echo "created";
	   		}else{
	   			echo "already";
	   		}
			
			break;
		
		default:
			# code...
			break;
	}
}

?>