<?php session_start();
include('class.load.php');

$user_id = $_SESSION['user_id'];
$user_right = $_SESSION['user_right'];
//Compte les Appart/Maison
$reponse = $bdd->query("SELECT count(id_portfolio) AS total FROM portfolio WHERE user_id ='$user_id' AND type_portfolio <> 'room' AND actif_portfolio <> 0 ");
$reponse = $reponse->fetchAll();
$total = $reponse[0]['total'];
switch ($user_right) {
	case '0':
			$propertie = new portfolio('create');
			echo $propertie->id_portfolio;
		break;
	case '1':
		$max = 1;
		checkPropertie($max,$total);
		break;
	case '2':
		$max = 5;
		checkPropertie($max,$total);
		break;
	case '99':
		
		break;
	
	default:
		# code...
		break;
}

function checkPropertie($max,$total){
	global $bdd;
	global $user_id;
		$result = $max - $total;
		if($result > 0){
			$propertie = new portfolio('create');
			$reponse = $bdd->query("SELECT id FROM owner WHERE owner_userid ='$user_id'");
			$reponse = $reponse->fetchAll();
			if(count($reponse) != 0)
				$propertie->save_one_data('user_portfolio',$reponse[0]['id']);
			echo $propertie->id_portfolio;
		}else{
			echo "error";
		}
}

?>