<?php
include('class.load.php');

	

	 $key = $_GET['key'];
	 $value = $_GET['value'];
	 
	 switch ($key) {
	 	
	 	default:
		 	if(isset($_GET['id'])){
		 		$client = new client($_GET['id']);
		 		if($client->save_one_data($key,$value)){
				 	echo 'ok';
				 }
		 	}
	 		
	 		break;
	 }
	 

?>