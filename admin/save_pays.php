<?php
include('php/class.load.php');

	$prefixe = $_POST['prefixe'];
	$name_state = $_POST['name_state'];

	 $bdd->exec("INSERT INTO pays (name,prefixe) VALUES ('$name_state','$prefixe')");

?>