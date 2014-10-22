<?php
				$id_fichier = $_REQUEST['id_fichier'];
				$id_gallery = $_REQUEST['id_gallery'];
				include 'server.php';

				
					//echo"salut 3";
				
					$reponse = $bdd->query("SELECT link_gallery
										FROM gallery
										where id_gallery = '$id_gallery' ");
					$donnees = $reponse->fetchAll();


				if($donnees[0]['link_gallery'] == ""){
					$link_gallery=$id_fichier;
				}else{
					$link_gallery = $donnees[0]['link_gallery'];
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
						
						
					}
					//echo $link;
					$bdd->exec("UPDATE gallery SET  link_gallery ='$link' WHERE id_gallery='$id_gallery'");
				
    			

?>