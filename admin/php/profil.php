<?php 

				$username = $_REQUEST['username'];

				include 'server.php';

    			$reponse = $bdd->query("SELECT prenom,nom,photo
										FROM users
										where username = '$username'");

			
			$donnees = $reponse->fetchAll();
			$prenom=$donnees[0]['prenom'];
			$nom=$donnees[0]['nom'];
			$photo=$donnees[0]['photo'];



?>