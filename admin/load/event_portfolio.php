<?php

include 'server.php';
$max_id= $_REQUEST['max_id_port'];
$count = 0;

$reponse = $bdd->query("SELECT * FROM portfolio WHERE id_portfolio > '$max_id' ORDER BY id_portfolio DESC ");
$donnees = $reponse->fetchAll();
$count = count($donnees);

while($count == 0){
	sleep(3);
	$reponse = $bdd->query("SELECT * FROM portfolio WHERE id_portfolio > '$max_id' ORDER BY id_portfolio DESC ");
	$donnees = $reponse->fetchAll();
	$count = count($donnees);
}

$max_id = $donnees[0]['id_portfolio'];
$json=array('max_id_port'=>$max_id);
header("Content-Type: text/json");
$json= json_encode($json); 
echo $json;

?>