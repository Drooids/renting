<?php session_start();
include('class.load.php');

if(isset($_POST['action'])){
	switch ($_POST['action']) {
		case 'delete':
			$object = new portfolio($_POST['id']);
			$object->save_one_data('actif_portfolio',0);
			$object->save_one_data('nom_portfolio','Not Available.');
			break;
		case 'hide':
			$object = new portfolio($_POST['id']);
			$object->save_one_data('actif_portfolio',2);
			break;
		case 'show':
			$object = new portfolio($_POST['id']);
			$object->save_one_data('actif_portfolio',1);
			break;
		
		default:
			# code...
			break;
	}
}


?>