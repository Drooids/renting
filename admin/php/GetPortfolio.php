<?php
include('php/class.portfolio.php');
$key = $_REQUEST['key'];
				include 'server.php';
if($key =="nothing"){
			$reponse = $bdd->query("SELECT id_portfolio
										FROM portfolio");

			
			$donnees = $reponse->fetchAll();
			for($k=0;$k<count($donnees);$k++){
				$id = $donnees[$k]['id_portfolio'];
				$object = new portfolio($id);



				$json[$k]=array(
					"id_portfolio"=>$object->id_portfolio,
					"nom_portfolio"=>$object->nom_portfolio,
					"text_portfolio"=>$object->text_portfolio,
					"link_portfolio"=>$object->link_portfolio,
					"img_portfolio"=>$object->img_portfolio,
					"actif_portfolio"=>$object->actif_portfolio,
					"type_portfolio"=>$object->type_portfolio,
					"price_portfolio"=>$object->price_portfolio,
					"full_adress"=>$object->city_portfolio.", ".$object->district_portfolio.", ".$object->adress_portfolio
					);

			}

}else{
		$reponse = $bdd->query("SELECT id_portfolio FROM portfolio where nom_portfolio like '$key%'");

			
			$donnees = $reponse->fetchAll();
			for($k=0;$k<count($donnees);$k++){
				$id = $donnees[$k]['id_portfolio'];
				$object = new portfolio($id);



				$json[$k]=array(
					"id_portfolio"=>$object->id_portfolio,
					"nom_portfolio"=>$object->nom_portfolio,
					"text_portfolio"=>$object->text_portfolio,
					"link_portfolio"=>$object->link_portfolio,
					"img_portfolio"=>$object->img_portfolio,
					"actif_portfolio"=>$object->actif_portfolio,
					"type_portfolio"=>$object->type_portfolio,
					"price_portfolio"=>$object->price_portfolio,
					"full_adress"=>$object->city_portfolio.", ".$object->district_portfolio.", ".$object->adress_portfolio
					);

			}


}

    			
			


			


					
			
			header("Content-Type: text/json");
					$json= json_encode($json); 
					echo $json; 



?>