<?php
include('server.php');
$user_team = 1;
$string = "SELECT * FROM portfolio WHERE  actif_portfolio = 1 AND (";

				 		$info = $bdd->query("SELECT DISTINCT user_id FROM users WHERE team_user ='$user_team' ");
				 		$donnees = $info->fetchAll();
						for($k=0;$k<count($donnees);$k++){
							if($k == 0)
								$string.=" user_id =".$donnees[$k]['user_id'];
							else
								$string.=" OR user_id =".$donnees[$k]['user_id'];

						}
						$string.=" )";
echo $string;

?>