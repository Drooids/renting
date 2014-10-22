<?php
				 include 'class.load.php';
				 $user = unserialize($_SESSION['user']);
				 $user_id = $user->id;
				 //$client_id = $_GET['id'];
				 //$objet_client = new client($client_id);
				 

				 $user_right = $user->right;
				 $user_team = $user->info;

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
												
				 function affiche($string){
				 global $bdd;
				 								$reponse = $bdd->query($string);
												$donnees = $reponse->fetchAll();

											for($k=0;$k<count($donnees);$k++){

												$id=$donnees[$k]['id'];
												$objet=new client($id);

												echo"<tr class='gradeX'>";
												echo"<td style='text-align:center;'>".$objet->date_creation."</td>";
												echo"<td style='text-align:center;'>".$objet->last_name."</td>";
												echo"<td style='text-align:center;'>".$objet->name."</td>";
												echo"<td style='text-align:center;'>".$objet->name_company."</td>";
												echo"<td style='text-align:center;'>".$objet->email."</td>";
												echo"<td style=' max-width:200px; text-align:center;'>".$objet->phone."</td>";
												echo"<td style='width:200px; text-align:center;'>".$objet->language."</td>";
												echo"<td style='text-align:center;'>".$objet->status."</td>";
												echo"<td style='text-align:center;'> <a class=' modifier'  href='client_detail.php?id=".$id."' style='margin-right:20px;'>Manage</a><a href='#'  data-click='".$id."' class='delete ' >Delete</a></td>";
												
												echo"</tr>";
												
											}
				 }						

											?>
											<script>
			


			/* Table #example */
			
				$('.datatable').dataTable( {
					"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
					"sPaginationType": "bootstrap",
					
					"bDestroy": true
				});
				
		</script>