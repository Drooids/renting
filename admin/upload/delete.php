<?php
				$nom_fichier = $_REQUEST['nom_fichier'];
				include 'server.php';

				$reponse = $bdd->query("SELECT option_fichier,id_fichier FROM fichier WHERE nom_fichier ='$nom_fichier' ");
				$donnees = $reponse->fetchAll();
				//$v='1';

				if(count($donnees) == 0){
					//echo $v;
				}else{
					if($donnees[0]['option_fichier'] != '-1'){

						$id_fichier=$donnees[0]['id_fichier'];

						$bdd->exec("DELETE FROM fichier WHERE nom_fichier ='$nom_fichier'");

						// Portfolio
	    				$bdd->exec("UPDATE portfolio SET img_portfolio = 'sample-image-250x150.png' WHERE img_portfolio='$nom_fichier'");
						

						// Gallery
						$reponse = $bdd->query("SELECT id_gallery,link_gallery FROM gallery");
						$donnees = $reponse->fetchAll();

						for($k=0; $k<count($donnees);$k++){
							$link_gallery=$donnees[$k]['link_gallery'];
							$id_gallery=$donnees[$k]['id_gallery'];

							$link_gallery = explode(",", $link_gallery);
							/*foreach (array_keys($link_gallery, $id_fichier) as $key) {
									    unset($link_gallery[$key]);
									}*/
							$flag = 0;
							for($i=0; $i<count($link_gallery); $i++){
								if($link_gallery[$i] != $id_fichier || $link_gallery[$i] == ''){
										if($flag == 0){
											$link=$link_gallery[$i];
											//echo $link;
											$flag=1;
										}else{
											$link=$link.','.$link_gallery[$i];
										}
										
									}
								}
							$bdd->exec("UPDATE gallery SET  link_gallery ='$link' WHERE id_gallery='$id_gallery'");
						}
						

						// Article

						$bdd->exec("UPDATE article SET  img_article ='sample-image-250x150.png' WHERE img_article='$nom_fichier'");


						//$v=$v.'2';
						$myFile = "uploads/".$nom_fichier;
						unlink($myFile);
				}
				//$v=$v.'3';
				//echo $v;
				}
				
    			

?>