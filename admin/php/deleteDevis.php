<?php 

				$devis_id = $_REQUEST['id'];

				include 'server.php';

    			$bdd->exec("UPDATE devis SET devis_lu = 1, devis_new = 0 WHERE devis_id='$devis_id'");



?>