<?php

				include("server.php");

				$id = $_REQUEST['id'];
				
				$autre = $_REQUEST['autre'];

				

				if($autre == "lu"){
					$lu = $_REQUEST['lu'];
					$bdd->exec("UPDATE devis SET devis_lu = '$lu' WHERE devis_id='$id'");
				}elseif($autre == "delete"){
					$bdd->exec("DELETE FROM devis
							WHERE devis_id ='$id'");
				}else{

				}
				echo"hello";

?>