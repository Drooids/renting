<?php

include("server.php");

				$email = $_REQUEST['email'];
				$type = $_REQUEST['newsletter'];
				$date = date('Y/m/d H:i:s');

				if($type == 'new'){
					$bdd->exec("INSERT INTO newsletter ( email_newsletter,date_newsletter ) VALUES ('$email','$date')");
				}

?>