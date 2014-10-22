<?php
				 include 'server.php';
				 $user_id = $_REQUEST['user_id'];

				 if($user_id == 3){
				 	$reponse = $bdd->query("SELECT id_portfolio,nom_portfolio,link_portfolio,img_portfolio,type_portfolio,actif_portfolio,text_portfolio,
               			bath_portfolio,bed_portfolio,price_portfolio,parking_portfolio,city_portfolio,district_portfolio,adress_portfolio,user_portfolio,detail_portfolio,
               			team_portfolio,pool_portfolio,type_size_portfolio,service_portfolio,lat_portfolio,lng_portfolio,date_portfolio
										FROM portfolio WHERE actif_portfolio = 1");
				 }else{
				 	$reponse = $bdd->query("SELECT id_portfolio,nom_portfolio,link_portfolio,img_portfolio,type_portfolio,actif_portfolio,text_portfolio,
               			bath_portfolio,bed_portfolio,price_portfolio,parking_portfolio,city_portfolio,district_portfolio,adress_portfolio,user_portfolio,detail_portfolio,
               			team_portfolio,pool_portfolio,type_size_portfolio,service_portfolio,lat_portfolio,lng_portfolio,date_portfolio
										FROM portfolio WHERE user_id ='$user_id' AND actif_portfolio = 1");
				 }
												

												$donnees = $reponse->fetchAll();

											for($k=0;$k<count($donnees);$k++){

												$link_portfolio=$donnees[$k]['link_portfolio'];
												$nom_portfolio=$donnees[$k]['nom_portfolio'];
												$img_portfolio=$donnees[$k]['img_portfolio'];
												$id_portfolio=$donnees[$k]['id_portfolio'];
												
												
												$price_portfolio=$donnees[$k]['price_portfolio'];
												$text_portfolio=$donnees[$k]['text_portfolio'];
												$detail_portfolio=$donnees[$k]['detail_portfolio'];

												$district_portfolio=$donnees[$k]['district_portfolio'];
												$adress_portfolio=$donnees[$k]['adress_portfolio'];
												$city_portfolio=$donnees[$k]['city_portfolio'];
												
												
												$service_portfolio=$donnees[$k]['service_portfolio'];
												
												$date_portfolio=$donnees[$k]['date_portfolio'];
												$lat_portfolio=$donnees[$k]['lat_portfolio'];
												$lng_portfolio=$donnees[$k]['lng_portfolio'];

												
                                        if($link_portfolio != ''){
                                        	$reponse = $bdd->query("SELECT id_gallery,nom_gallery,link_gallery,img_gallery
                                        		FROM gallery where id_gallery='$link_portfolio'");

            
                                        $donnees2 = $reponse->fetchAll();

                                        	 	$id_gallery=$donnees2[0]['id_gallery'];
                                            	$nom_gallery=$donnees2[0]['nom_gallery'];
                                            	$link_gallery=$donnees2[0]['link_gallery'];
                                          		$img_gallery=$donnees2[0]['img_gallery'];
												$link_gallery = explode(",", $link_gallery);
                                            
                                            if(count($link_gallery) != 0){
                                            	$id=$link_gallery[0];
                                            }else{
                                            	$id='';
                                            }
                                            //echo "longueur: ".$longueur;
                                            
                                                if($id != ''){
                                                	$reponse = $bdd->query("SELECT nom_fichier,id_fichier
                                                                        FROM fichier
                                                                        where id_fichier = '$id' ");

                                            
	                                                $donnees3 = $reponse->fetchAll();
	                                                if(count($donnees3) != 0){
	                                                    $nom_fichier=$donnees3[0]['nom_fichier'];
	                                                    $id_fichier=$donnees3[0]['id_fichier'];
													}else{
														$nom_fichier='';
														$id_fichier='';
													}
                                                }else{
                                                	$nom_fichier='sample-image-250x150.png';
													$id_fichier='0';
                                                }
                                                

                                        }else{
                                        			$nom_fichier='sample-image-250x150.png';
													$id_fichier='0';
                                        }
                                           

												echo"<tr class='gradeX'>";
												echo"<td>".$date_portfolio."</td>";
												echo"<td>".$nom_portfolio."</td>";
												echo"<td>".$service_portfolio."</td>";
												echo"<td><a class='btn btn-alt btn-primary increase'  href='#' style='float:right;margin-right:5px;'>Maximize</a> <a class='btn btn-alt btn-primary modifier'  href='portfolio-modif.php?id=".$id_portfolio."' style='float:right;margin-right:5px;'>Modify</a><a href='#' style='float:right; margin-right:10px;' data-click='".$id_portfolio."' class='btn btn-alt btn-primary delete  btn-danger' >Delete</a>";
														echo"<div class='affiche' style='display:none; margin-top:30px;'>";
														echo $adress_portfolio.", ".$district_portfolio.", ".$city_portfolio;
														echo"<ul class='thumbnails' style='margin-top:20px;'>";
														echo"<li class='span4'>";
														echo"<ul class='thumbnail-actions'>";
														echo"</ul>";
														echo"<span class='thumbnail'><img alt='Image 30' src='upload/uploads/".$nom_fichier."' width='300px' height='200px'></span>";
														echo"</li>";
														echo"</ul>";
														echo $text_portfolio;
														echo"</br></br>";
														echo $detail_portfolio;

														echo"</div>";
															echo"</td>";
												if($service_portfolio =='rent'){
													echo"<td>$ ".$price_portfolio."/months</td>";
												}else{
													echo"<td>$ ".$price_portfolio."</td>";
												}
												
												echo"</tr>";
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