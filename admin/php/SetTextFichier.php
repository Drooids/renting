<?php 


				$id = $_REQUEST['id'];
				$text =htmlentities($_REQUEST['text'], ENT_NOQUOTES,'UTF-8');
				$titre =htmlentities($_REQUEST['titre'], ENT_NOQUOTES,'UTF-8');
				
				
				
				

				include 'server.php';

					$img = explode("/", $img );
					$longueur=count($img)-1;
					$img=$img[$longueur];
					
						$bdd->exec("UPDATE fichier SET text_fichier = '$text', titre_fichier = '$titre' WHERE id_fichier='$id'");

				?>
