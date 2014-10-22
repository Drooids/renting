<?php 

				$devis_id = $_REQUEST['id'];

				include 'server.php';

    			$bdd->exec("UPDATE devis SET devis_new = 1 WHERE devis_id='$devis_id'");



?>