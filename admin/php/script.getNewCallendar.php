<?php header("Content-Type: text/json"); 
include('class.load.php');
include('class.visite.php');
$id = $_GET['id'];

$reponse = $bdd->query("SELECT id FROM visite WHERE clients = '$id' AND statut = '' LIMIT 1");
$reponse = $reponse->fetchAll();


if(count($reponse) != 0){
	$id=$reponse[0]['id'];
	$visite = new visite($id);
	$visite->save_one_data('statut','see');                  
                               
}else{
	$id= '';
}

 								$json = array('id'=>$id);
                            	echo json_encode($json);



?>