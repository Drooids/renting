<?php 

				
				
				include 'server.php';

	$reponse = $bdd->query("SELECT id_gallery,nom_gallery,link_gallery,img_gallery
										FROM gallery WHERE option_fichier = 'accueil' ");

			
			$donnees = $reponse->fetchAll();
			if (count($donnees) > 0){
					$link_gallery=$donnees[0]['link_gallery'];
					$id_gallery=$donnees[0]['id_gallery'];
					//echo $link_gallery;
					$link_gallery = explode(",", $link_gallery );
						$longueur=count($link_gallery);
						
						//$img=$img[$longueur];
				
					for($k=0;$k<$longueur;$k++){ 
						$id=$link_gallery[$k];
						//echo $id;
						$reponse = $bdd->query("SELECT nom_fichier,id_fichier,link_fichier
										FROM fichier where id_fichier = '$id'");
						$donnees = $reponse->fetchAll();

						$img= $donnees[0]['nom_fichier'];

					$json[$k]=array(
						"img_gallery"=>$img,
						"id_gallery"=>$id_gallery
						);

					}
			}else{
				$json ='null';
			}
				

    			
			


			


					
			
			header("Content-Type: text/json");
					$json= json_encode($json); 
					echo $json; 

?>