<?php
				 include 'class.load.php';
				 $user = unserialize($_SESSION['user']);
				 $user_id = $user->id;
				 $user_right = $user->right;
				 $user_team = $user->info;
				 $id = $_GET['id'];
				 /*
				 if($user_right == 1){
				 	$agency = new agency($user_team);
					$team = $agency->team;
					$team = explode(";", $team);
					$request_team ="";
					//$total_team = count($team);
					foreach ($team as $key => $value) {
						$request_team.=" AND user_id = '$value' ";
					}
				 	affiche("SELECT * FROM client WHERE delete_client = 'no' ".$request_team);
				 }elseif($user_right == 2){
				 		
				 	affiche("SELECT * FROM client WHERE delete_client = 'no' AND user_id = '$user_id'");
				 }else{
				 	affiche("SELECT * FROM client WHERE delete_client = 'no' ");
				 }
				 */
				$reponse = $bdd->query("SELECT * FROM portfolio WHERE client = '$id' ");
				$donnees = $reponse->fetchAll();
				$text = "";
				for($k=0;$k<count($donnees);$k++){
					$id_portfolio=$donnees[$k]['id_portfolio'];
					$text.="OR portfolio ='$id_portfolio' ";
				}

				 affiche("SELECT * FROM history WHERE client = '$id' ".$text." ORDER BY date_creation ");

												
				 function affiche($string){
				 global $bdd;
				 								$reponse = $bdd->query($string);
												$donnees = $reponse->fetchAll();

											for($k=0;$k<count($donnees);$k++){

												$id=$donnees[$k]['id'];
												$objet=new history($id);

												echo"<tr class='gradeX'>";
												echo"<td style='text-align:center;'>".$objet->date_creation."</td>";
												echo"<td style='text-align:center;'>".$objet->info."</td>";
												echo"</tr>";
												
											}
				 }						

											?>
											<script>
			


			/* Table #example */
			
				$('.datatable').dataTable( {
					"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
					"sPaginationType": "bootstrap",
					"aaSorting": [[ 0, "desc" ]],
					"bDestroy": true
				});
				
		</script>