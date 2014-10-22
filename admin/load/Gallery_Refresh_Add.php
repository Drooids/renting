<?php

include('server.php');

$size= $_REQUEST['size'];
$gallery= $_REQUEST['gallery'];
$reponse = $bdd->query("SELECT link_gallery FROM gallery where id_gallery='$gallery'");
$donnees = $reponse->fetchAll();

 				$link_gallery=$donnees[0]['link_gallery'];
				$link_gallery = explode(",", $link_gallery);
				$longueur=count($link_gallery);

while($size == $longueur){
	 usleep(10000);
	clearstatcache();
	$reponse = $bdd->query("SELECT link_gallery FROM gallery where id_gallery='$gallery'");
 	$donnees = $reponse->fetchAll();

 				$link_gallery=$donnees[0]['link_gallery'];
				$link_gallery = explode(",", $link_gallery);
				$longueur=count($link_gallery);
}


$json=array('size'=>$longueur);
header("Content-Type: text/json");
$json= json_encode($json); 
echo $json;
?>