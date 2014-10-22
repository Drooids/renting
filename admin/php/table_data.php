<?php
				 include 'class.load.php';
				 $user = unserialize($_SESSION['user']);
				 $user_id = $user->id;
				 //$client_id = $_GET['id'];
				 //$objet_client = new client($client_id);

				 $user_right = $user->right;
				 $user_team = $user->info;

				 if($user_right == 0){
				 
				 	affiche("SELECT * FROM portfolio ");
				 }elseif($user_right == 1){
				 		
				 	affiche(get_team());
				 }else{

				 }
												
				 function affiche($string){
				 global $bdd;
				 								$reponse = $bdd->query($string);
												$donnees = $reponse->fetchAll();

											for($k=0;$k<count($donnees);$k++){

												$id_portfolio=$donnees[$k]['id_portfolio'];
												$objet=new portfolio($id_portfolio);

												echo"<tr class='gradeX'>";
												echo"<td style='text-align:center;'>".$objet->date_portfolio."</td>";
												if($objet->actif_portfolio == 1)
													echo"<td style='text-align:center;'>".$objet->date_available_portfolio."</td>";
												else
													echo"<td style='text-align:center;'> None </td>";
												echo"<td style='text-align:center;'>".$objet->nom_portfolio."</td>";
												echo"<td style='text-align:center;'>".$objet->service_portfolio."</td>";
												echo"<td style='text-align:center;'>".$objet->type_portfolio."</td>";
												echo"<td style=' max-width:200px; text-align:center;'>".$objet->district_portfolio."</td>";
												echo"<td style='width:200px; text-align:center;'>".$objet->adress_portfolio."</td>";
												echo"<td style='text-align:center;'>".$objet->bed_portfolio."</td>";
												echo"<td style='text-align:center;'>".$objet->bath_portfolio."</td>";
												

												if($objet->service_portfolio =='rent'){
													echo"<td style='text-align:center;'>$ ".$objet->price_portfolio."/months</td>";
												}else{
													echo"<td style='text-align:center;'>$ ".$objet->price_portfolio."</td>";
												}
												echo"<td style='text-align:center;'>".$objet->type_size_portfolio."</td>";
												echo"<td style='text-align:center;'> <a class=' modifier'  href='portfolio-modif.php?id=".$id_portfolio."' style='margin-right:20px;'>Modify</a><a href='#'  data-click='".$id_portfolio."' class='delete ' >Delete</a></td>";
												
												echo"</tr>";
												
											}
				 }						

				function get_team(){
				global $bdd;
						$string = "SELECT * FROM portfolio WHERE  (";

				 		$info = $bdd->query("SELECT DISTINCT user_id FROM users WHERE team_user ='$user_team' ");
				 		$donnees = $info->fetchAll();
						for($k=0;$k<count($donnees);$k++){
							if($k == 0)
								$string.=" user_id =".$donnees[$k]['user_id'];
							else
								$string.=" OR user_id =".$donnees[$k]['user_id'];

						}
						$string.=" )";
				}		


											?>
											<script>
			


			/* Table #example */
			
				$('.datatable').dataTable( {
					"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
					"sPaginationType": "bootstrap",
					"oLanguage": {
						"sLengthMenu": "_MENU_ records per page"
					},
					"bDestroy": true
				});
				
		</script>