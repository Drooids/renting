<?php 
include 'class.load.php';

if(isset($_REQUEST['result_change'])){
				$id = $_REQUEST['id'];
				$value = $_REQUEST['result_change'];
				//creation de l'objet
				$object = new portfolio($id);
				//action
				$object->AddVar('result_portfolio',$value);
				$object->save_all_data();
			}

?>