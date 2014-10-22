<?php 


				include 'server.php';
				$reponse = $bdd->query("SELECT devis_id,devis_text,devis_sujet,date,devis_email,devis_lu,devis_new
										FROM devis where devis_lu=0
										ORDER BY devis_id  DESC");

			
			$donnees = $reponse->fetchAll();
			for($k=0;$k<count($donnees);$k++){
					$devis_id=$donnees[$k]['devis_id'];
					$devis_text=$donnees[$k]['devis_text'];
					$devis_sujet=$donnees[$k]['devis_sujet'];
					$date=$donnees[$k]['date'];
					$devis_email=$donnees[$k]['devis_email'];
					$devis_lu=$donnees[$k]['devis_lu'];
					$devis_new=$donnees[$k]['devis_new'];


					if($devis_id==''){
						$devis_id='&nbsp;';
					}
					if($devis_text==''){
						$devis_text='&nbsp;';
					}
					if($devis_sujet==''){
						$devis_sujet='&nbsp;';
					}
					if($date==''){
						$date='&nbsp;';
					}
					if($devis_email==''){
						$devis_email='&nbsp;';
					}


					$json[]=array(
					"devis_id"=>$devis_id,
					"devis_text"=>$devis_text,
					"devis_sujet"=>$devis_sujet,
					"date"=>$date,
					"devis_email"=>$devis_email,
					"devis_lu"=>$devis_lu,
					"devis_new"=>$devis_new
					);


					
			}
			header("Content-Type: text/json");
					$json= json_encode($json); 
					echo $json; 
			


?>