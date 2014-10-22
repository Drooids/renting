<?php 
include('class.load.php');

				$id = $_REQUEST['id'];
				$nom = $_REQUEST['nom'];
				$img = $_REQUEST['img'];
				$link = $_REQUEST['link'];
				$autre = $_REQUEST['autre'];

				if($autre=='delete'){
						$object = new gallery($id);
						$object->Delete();
				}elseif($autre=='new'){
						$object = new gallery('');
						$object->AddVar('nom_gallery','$nom');
						$object->save_all_data();
				}elseif($autre=='img'){
					$img = explode("/", $img );
					$longueur=count($img)-1;
					$img=$img[$longueur];
						$object = new gallery($id);
						$object->AddVar('img_gallery','$img');
						$object->save_all_data();
				}elseif($autre=='accueil'){
						// on change l'ancien
						$bdd->exec("UPDATE gallery SET option_fichier = '' WHERE option_fichier='accueil'");

						$object = new gallery($id);
						$object->AddVar('option_fichier','accueil');
						$object->save_all_data();
					
				}elseif($autre=='sortable'){
						$object = new gallery($id);
						$object->AddVar('link_gallery',$link);
						$object->save_all_data();
					
						
				}else{
					if($img == false){
						$object = new gallery($id);
						$object->AddVar('nom_gallery',$nom);
						$object->AddVar('link_gallery',$link);
						$object->save_all_data();

				}else{
					$img = explode("/", $img );
					$longueur=count($img)-1;
					$img=$img[$longueur];
						$object = new gallery($id);
						$object->AddVar('nom_gallery',$nom);
						$object->AddVar('link_gallery',$link);
						$object->AddVar('img_gallery',$img);
						$object->save_all_data();

				}
					
				}

				if(isset($_REQUEST['return_id'])){

					$reponse = $bdd->query("SELECT id_gallery,nom_gallery,link_gallery,img_gallery
										FROM gallery ORDER BY id_gallery DESC");

			
					$donnees = $reponse->fetchAll();

			
				$id_gallery=$donnees[0]['id_gallery'];
				
					$json=array("id_gallery"=>$id_gallery);
					header("Content-Type: text/json");
					$json= json_encode($json); 
					echo $json; 
				}
				



			
    						
				
    			


?>