<?php 
include('class.load.php');
				
	
				include 'server.php';

				$id = $_REQUEST['id_gallery'];
				$object = new gallery($id);
				
    		
				$json=array(
					"id_gallery"=>$object->id_gallery,
					"nom_gallery"=>$object->nom_gallery,
					"link_gallery"=>$object->link_gallery,
					"img_gallery"=>$object->img_gallery
					);

			
			


			


					
			
			header("Content-Type: text/json");
					$json= json_encode($json); 
					echo $json; 

?>