<?php session_start();
include('class.load.php');
include('class.visite.php');

if(isset($_GET['user_id'])){

	if($_GET['user_id'] == 0)
		return false;

	$start = $_GET['start'];
	$end = $_GET['end'];
	$user_id = $_GET['user_id'];
	$json = array();

$reponse = $bdd->query("SELECT * FROM visite WHERE user_ID ='$user_id' AND date_visite_timestamp > '$start' AND date_visite_timestamp < '$end'");
$reponse = $reponse->fetchAll();

	foreach ($reponse as $key => $value) {
		if($value['portfolio'] == 0){
			$title ="No Title";
		}else{
			
			$object = new portfolio($value['portfolio']);
			$title = $object->nom_portfolio." ".$object->district_portfolio;
		}
		
		$start_visite = strtotime($value['date_visite']);
		$end_visite = strtotime("+2 hours", strtotime($value['date_visite']));
		$table = array(
				'id' => $value['id'],
				'title' => $title,
				'start' => date('c', $start_visite),
				'end'=> date('c', $end_visite),
				'url' => $value['id'],
				'allDay'=>false,
				'ignoreTimezone'=>true
			);
		array_push($json, $table);
	}

	echo json_encode($json);

}elseif(isset($_GET['client_id'])){
		$start = $_GET['start'];
	$end = $_GET['end'];
	$client_id = $_GET['client_id'];
	$json = array();
$reponse = $bdd->query("SELECT * FROM visite WHERE clients ='$client_id' AND date_visite_timestamp > '$start' AND date_visite_timestamp < '$end'");
$reponse = $reponse->fetchAll();

	foreach ($reponse as $key => $value) {
		if($value['portfolio'] == 0){
			$title ="No Title";
		}else{
			$user = new user($value['user_id']);
			if($user->last_name != ''){
				$name =$user->last_name." ".$user->name;
			}
			else{
				$name = $user->username;
			}
			$object = new portfolio($value['portfolio']);
			$title = $object->nom_portfolio." ".$object->district_portfolio." with ".$name;
		}
		
		$start_visite = strtotime($value['date_visite']);
		$end_visite = strtotime("+2 hours", strtotime($value['date_visite']));
		$table = array(
				'id' => $value['id'],
				'title' => $title,
				'start' => date('c', $start_visite),
				'end'=> date('c', $end_visite),
				'url' => $value['id'],
				'allDay'=>false,
				'ignoreTimezone'=>true
			);
		array_push($json, $table);
	}

	echo json_encode($json);
}

?>