<?php 
include 'class.load.php';

			if(isset($_REQUEST['gallery_change'])){
				$id = $_REQUEST['id'];
				$gallery = $_REQUEST['gallery_change'];
				//creation de l'objet
				$object = new portfolio($id);
				//action
				$object->AddVar('link_portfolio',$gallery);
				$object->save_all_data();
			}

?>