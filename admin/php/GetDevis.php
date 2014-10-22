<?php 

				include 'server.php';
				$reponse = $bdd->query("SELECT COUNT( * ) AS Total
										FROM devis
										WHERE devis_new =1");

			$donnees = $reponse->fetchAll();
			
			$total=$donnees[0]['Total'];

			echo json_encode(array("number"=>"$total")); 


?>