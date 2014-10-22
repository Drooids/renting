<?php session_start();
include('class.load.php');
include('class.tutorial.php');
if(isset($_POST['action'])){

	switch ($_POST['action']) {
		case 'done':
			if(isset($_POST['tuto_num'])){
				$user_id = $_SESSION['user_id'];
				$reponse =$bdd->query("SELECT id FROM tutorial WHERE user_id='$user_id'");
				$reponse = $reponse->fetchAll();
				if(count($reponse) != 0){
					$id =$reponse[0]['id'];
					$tuto_num = $_POST['tuto_num'];
					$tutorial = new tutorial($id);
					$tutorial->save_one_data('tuto_'.$tuto_num,1);
				}
			}
			break;
		case 'ready':
			if(isset($_POST['tuto_num'])){
				$user_id = $_SESSION['user_id'];
				$reponse =$bdd->query("SELECT id FROM tutorial WHERE user_id='$user_id'");
				$reponse = $reponse->fetchAll();
				if(count($reponse) != 0){
					$id =$reponse[0]['id'];
					$tuto_num = $_POST['tuto_num'];
					$tutorial = new tutorial($id);
					$tutorial->save_one_data('tuto_'.$tuto_num,0);
				}
				

			}
			break;
		case 'init':
			if(isset($_POST['tuto_num'])){
				$user_id = $_SESSION['user_id'];
				$reponse =$bdd->query("SELECT id FROM tutorial WHERE user_id='$user_id'");
				$reponse = $reponse->fetchAll();
				if(count($reponse) != 0){
					$id =$reponse[0]['id'];

					$tutorial = new tutorial($id);
					for ($i=1; $i < 11; $i++) { 
						$tutorial->save_one_data('tuto_'.$i,0);
					}
				}

			}
			break;
		
		default:
			# code...
			break;
	}
	
}


?>