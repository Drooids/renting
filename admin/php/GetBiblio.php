<?php session_start(); 
$user_id = $_SESSION['user_id'];
				

				$json = '';
				$add = '';
				include 'server.php';

				$reponse = $bdd->query("SELECT right_user,team_user FROM users WHERE user_id = '$user_id' ");

				$donnees = $reponse->fetchAll();
					$right_user=$donnees[0]['right_user'];
					$team_user=$donnees[0]['team_user'];

					if($right_user == 0){

					}elseif($right_user == 1){
							$reponse = $bdd->query("SELECT user_id FROM users WHERE team_user = '$team_user'");
							$donnees = $reponse->fetchAll();
							for($k=0;$k<count($donnees);$k++){
								$user_id_team=$donnees[$k]['user_id'];
								if($k == 0){
									$add=$add." AND  user_id = '$user_id_team' ";
								}else{
									$add=$add." OR user_id = '$user_id_team' ";
								}

							}
					}else{
						$add = " AND user_id = '$user_id'";
					}

    			$reponse = $bdd->query("SELECT id_fichier,nom_fichier,adresse_fichier,type_fichier
										FROM fichier
										where actif_fichier = 1 AND option_fichier !=1 AND option_fichier !=-1 ".$add);

			
			$donnees = $reponse->fetchAll();
			for($k=0;$k<count($donnees);$k++){
				$id_fichier=$donnees[$k]['id_fichier'];
				$nom_fichier=$donnees[$k]['nom_fichier'];
				$adresse_fichier=$donnees[$k]['adresse_fichier'];
				$type_fichier=$donnees[$k]['type_fichier'];

				$json[$k]=array(
					"id_fichier"=>$id_fichier,
					"nom_fichier"=>$nom_fichier,
					"adresse_fichier"=>$adresse_fichier,
					"type_fichier"=>$type_fichier
					);

			}
			


			


					
			
			header("Content-Type: text/json");
					$json= json_encode($json); 
					echo $json; 

?>