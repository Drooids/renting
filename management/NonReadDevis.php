<?php 

				$devis_id = $_REQUEST['id'];

				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    			$bdd = new PDO('mysql:host=localhost;dbname=easycom', 'root', '', $pdo_options);

    			$bdd->exec("UPDATE devis SET devis_new = 1 WHERE devis_id='$devis_id'");



?>