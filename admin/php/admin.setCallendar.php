<?php session_start();
if(!isset($_SESSION['user_id']))
		return false;


include('class.load.php');
include('class.visite.php');
if(isset($_GET['action']) && isset($_SESSION['user_id'])){
$user_id = $_SESSION['user_id'];
	switch ($_GET['action']) {
		case 'create':
			//Init
			$visit_date = $_GET['visit_date'];
			$visite_time = $_GET['visite_time'];
			$visite_client = $_GET['visite_client'];
			$visite_property = $_GET['visite_property'];
			$visite_comment = $_GET['visit_comment'];
			//Changement
			$date_visite_timestamp = strtotime($visit_date." ".$visite_time);
			$date_visite = date("Y/m/d H:i:s",$date_visite_timestamp);
			$now = date("Y/m/d H:i:s");
			//echo strtotime('now')." and ".strtotime($dateDeVisite);
			$property = new portfolio($visite_property);

			$visite = new visite('');

			$visite->save_one_data('date_visite',$date_visite);
			$visite->save_one_data('date_visite_timestamp',$date_visite_timestamp);
			$visite->save_one_data('available',1);
			$visite->save_one_data('date_modification',$now);
			$visite->save_one_data('actif_visite',1);
			$visite->save_one_data('clients',$visite_client);
			$visite->save_one_data('comment',$visite_comment);
			$visite->save_one_data('portfolio',$visite_property);
			$visite->save_one_data('user_id',$user_id);
			echo $visite->id;
			//visit_date=&hour=03&minute=15&meridian=PM&visite_time=03%3A15+PM&visite_client=empty&visite_property=empty
			break;
		case 'delete':
			$id =$_GET['id'];
			$reponse = $bdd->query("SELECT * FROM visite WHERE id = '$id' AND user_id ='$user_id'");
			$reponse = $reponse->fetchAll();

			if(count($reponse) != 0){
				$bdd->exec("DELETE FROM visite WHERE id='$id'");
				echo $id;

			}
			break;
		case 'change':
			$id = $_GET['id'];
			$start = $_GET['start'];
			$reponse = $bdd->query("SELECT * FROM visite WHERE id = '$id' AND user_id ='$user_id'");
			$reponse = $reponse->fetchAll();

			if(count($reponse) != 0){
				$visite = new visite($id);
				$date_visite_timestamp = strtotime($start);
				$date_visite_timestamp = $date_visite_timestamp+3600*6;
				$date_visite = date("Y/m/d H:i:s",$date_visite_timestamp);
				$now = date("Y/m/d H:i:s");
				//echo strtotime('now')." and ".strtotime($dateDeVisite);
				

				$visite->save_one_data('date_visite',$date_visite);
				$visite->save_one_data('date_visite_timestamp',$date_visite_timestamp);
				$visite->save_one_data('date_modification',$now);
			}
			break;
		default:
			# code...
			break;
	}
}



?>