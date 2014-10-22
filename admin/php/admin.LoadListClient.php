<?php session_start();
include('class.load.php');
include('class.message.php');

$user_id = $_SESSION['user_id'];
$user_right = $_SESSION['user_right'];

if($user_right == 0){
	$reponse = $bdd->query("SELECT * FROM client ORDER BY last_name DESC");
	$reponse = $reponse->fetchAll();

}else{
	$reponse = $bdd->query("SELECT DISTINCT message_from as id FROM message WHERE (message_to = '$user_id' AND message_to <> 0) ORDER BY message_timestamp");
	$reponse = $reponse->fetchAll();

}
											
//Online
											if($user_right != 0){
													echo"<tr >";
													echo"<td ><a href='#' data-id='0' class='userId '><span class='stat stat_online'></span>Home-Saigon Staff</a></td>";
													echo"</tr>";
												}

											foreach ($reponse as $key => $value) {
												if($value['id'] != 0){
													$client = new client($value['id']);
													$current_time   = time();
	    
													$different = $current_time - $client->last_connection;
													if($different < 300){
															$reponse2 = $bdd->query("SELECT count(id) AS total FROM message WHERE message_to = '$user_id' AND user <> 'user' AND message_read = 0");
								                            $reponse2 = $reponse2->fetchAll();
								                            if($reponse2[0]['total'] != 0){
								                                $messagetotal ="<em style='color:red;'>".$reponse2[0]['total']." new(s)</em>";
								                            }else{
								                            	$messagetotal = "";
								                            }
														echo"<tr >";
														echo"<td ><a href='#' data-id='".$client->id."' class='clientId '><span class='stat stat_online'></span>".$client->last_name." ".$client->name." ".$messagetotal."</a></td>";
														echo"</tr>";
													}
												}

												
											}

											
											// Offline
											foreach ($reponse as $key => $value) {
												
													// User
													if($value['id'] != 0){
														$client = new client($value['id']);
														$current_time   = time();
	    
														$different = $current_time - $client->last_connection;
														if($different >= 300){
																$reponse2 = $bdd->query("SELECT count(id) AS total FROM message WHERE message_to = '$user_id' AND user <> 'user' AND message_read = 0");
									                            $reponse2 = $reponse2->fetchAll();
									                            if($reponse2[0]['total'] != 0){
									                                $messagetotal ="<em style='color:red;'>".$reponse2[0]['total']." new(s)</em>";
									                            }else{
									                            	$messagetotal = "";
									                            }
															echo"<tr>";
															echo"<td><a href='#' data-id='".$client->id."' class='clientId'><span class='stat stat_offline'></span>".$client->last_name." ".$client->name." ".$messagetotal."</a></td>";
															echo"</tr>";
														}
													}
												
												
												
											}



?>