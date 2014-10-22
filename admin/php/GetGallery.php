<?php 
include('class.load.php');
$user_id = $_SESSION['user_id'];
				
				$key = $_REQUEST['key'];
				//$user_id = $_REQUEST['user_id'];
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
									$add=$add." WHERE user_id = '$user_id_team' ";
								}else{
									$add=$add." OR user_id = '$user_id_team' ";
								}

							}
					}else{
						$add = " WHERE user_id = '$user_id'";
					}


					//echo $add;

if($key =="nothing"){
	$reponse = $bdd->query("SELECT id_gallery FROM gallery".$add);
	$donnees = $reponse->fetchAll();

	for($k=0;$k<count($donnees);$k++){
				$id_gallery=$donnees[$k]['id_gallery'];
				$object = new gallery($id_gallery);

				if($object->link_gallery !=''){
					$img_gallery=$object->GetFirstImage();
				}else
				{
					$img_gallery="sample-image-250x150.png";
				}
				 		

				$json[$k]=array(
					"id_gallery"=>$object->id_gallery,
					"nom_gallery"=>$object->nom_gallery,
					"link_gallery"=>$object->link_gallery,
					"img_gallery"=>$img_gallery
					);

	}
}else{
	$reponse = $bdd->query("SELECT id_gallery,nom_gallery,link_gallery,img_gallery
										FROM gallery where nom_gallery LIKE '$key%'".$add);
$donnees = $reponse->fetchAll();

	for($k=0;$k<count($donnees);$k++){
				$id_gallery=$donnees[$k]['id_gallery'];
				$object = new gallery($id_gallery);

				if($object->link_gallery !=''){
					$img_gallery=$object->GetFirstImage();
				}else
				{
					$img_gallery="sample-image-250x150.png";
				}
				 		

				$json[$k]=array(
					"id_gallery"=>$object->id_gallery,
					"nom_gallery"=>$object->nom_gallery,
					"link_gallery"=>$object->link_gallery,
					"img_gallery"=>$img_gallery
					);

	}
}
    			
			


			


					
			
			header("Content-Type: text/json");
					$json= json_encode($json); 
					echo $json; 

?>