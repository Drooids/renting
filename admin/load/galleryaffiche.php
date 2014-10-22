<?php
										include 'server.php';
$gallery=$_GET['gallery'];
										$reponse = $bdd->query("SELECT id_gallery,nom_gallery,link_gallery,img_gallery
										FROM gallery where id_gallery='$gallery'");

			
										$donnees = $reponse->fetchAll();
										for($k=0;$k<count($donnees);$k++){
											$id_gallery=$donnees[$k]['id_gallery'];
											$nom_gallery=$donnees[$k]['nom_gallery'];
											$link_gallery=$donnees[$k]['link_gallery'];
											$img_gallery=$donnees[$k]['img_gallery'];

											$link_gallery = explode(",", $link_gallery);
											
											$longueur=count($link_gallery);
											//echo "longueur: ".$longueur;
											for($j=0;$j<$longueur;$j++){
												$id=$link_gallery[$j];
												$reponse = $bdd->query("SELECT nom_fichier,id_fichier
																		FROM fichier
																		where id_fichier = '$id' ");

											
												$donnees = $reponse->fetchAll();
												if(count($donnees) != 0){
													$nom_fichier=$donnees[0]['nom_fichier'];
													$id_fichier=$donnees[0]['id_fichier'];

													
													//if($)
													echo"<li class='span3 ui-state-default info' style='overflow:hidden;' data-click='".$id_fichier."'>";
										   			//str+="<input id='"+data[i].id_gallery +"' type='checkbox' value='option'>";
										   			echo"<ul class='thumbnail-actions'>";
													//echo"<li><a href='#' class='edit' title='Edit photo' data-click='".$id_fichier."'><span class='icon-pencil'></span></a></li>";
													//str+="<li><a href='upload/download.php?filename="+dataSplited[i].nom_fichier+"' title='Download photo'><span class='icon-download'></span></a></li>";
													echo"<li><a class='delete' id='href-".$id_fichier."' href='".$nom_fichier."' data-click='".$id_fichier."'  title='Delete photo'><span class='icon-trash'></span></a></li>";
													echo"</ul>";
													echo"<a class='thumbnail' ><img alt='Image 34' src='upload/uploads/".$nom_fichier."' style='width:200px;height:200px;'  ></a>";
													echo"</li>";
													}
													
											}

								

										}
									?>

								