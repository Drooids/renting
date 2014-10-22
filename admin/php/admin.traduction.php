<?php
include('class.load.php');
include('class.traduction.php');

switch ($_POST['action']) {
	case 'change':
		$id = $_POST['id'];
		$langue = $_POST['langue'];
		$text = $_POST['text'];

		$traduction = new traduction($id);
		$traduction->save_one_data($langue,$text);
		echo "The text in :".$langue." has been changed for the id: ".$id;
		break;
	
	default:
		# code...
		break;
}

?>