<?php 

				
					$key = $_REQUEST['key'];
				include 'server.php';

	$reponse = $bdd->query("SELECT id_portfolio,nom_portfolio,link_portfolio,img_portfolio,type_portfolio
										FROM portfolio where id_portfolio ='$key'");

			
			$donnees = $reponse->fetchAll();

			for($k=0;$k<count($donnees);$k++){
				
				$id_portfolio=$donnees[$k]['id_portfolio'];
				$nom_portfolio=$donnees[$k]['nom_portfolio'];
				$link_portfolio=$donnees[$k]['link_portfolio'];
				$img_portfolio=$donnees[$k]['img_portfolio'];
				$type_portfolio=$donnees[$k]['type_portfolio'];

				$json[$k]=array(
					"id_portfolio"=>$id_portfolio,
					"nom_portfolio"=>$nom_portfolio,
					"link_portfolio"=>$link_portfolio,
					"img_portfolio"=>$img_portfolio,
					"type_portfolio"=>$type_portfolio
					);

			}



					
			
			header("Content-Type: text/json");
					$json= json_encode($json); 
					echo $json; 

?>