<?php

include 'server.php';
$max_id= $_REQUEST['max_id'];
$count = 0;

$reponse = $bdd->query("SELECT * FROM devis WHERE devis_id > '$max_id' ORDER BY devis_id DESC ");
$donnees = $reponse->fetchAll();
$count = count($donnees);
// A changer. Modifier le while qui est inutile. Plutot mettre un appel ajax toutes les 2/3 voir 5 sec pour verifier si il y a des news dans la BBD
while($count == 0){
	 usleep(10000);
	clearstatcache();
	$reponse = $bdd->query("SELECT * FROM devis WHERE devis_id > '$max_id' ORDER BY devis_id DESC ");
	$donnees = $reponse->fetchAll();
	$count = count($donnees);
}

$max_id = $donnees[0]['devis_id'];
$json=array('max_id'=>$max_id);
header("Content-Type: text/json");
$json= json_encode($json); 
echo $json;

?>