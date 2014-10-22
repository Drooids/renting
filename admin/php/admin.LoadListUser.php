<?php session_start();
include('class.load.php');
include('class.message.php');

$user_id = $_SESSION['user_id'];
$user_right = $_SESSION['user_right'];

if($user_right == 0){
									
										$reponse = $bdd->query("SELECT DISTINCT user_id AS id FROM users WHERE user_id <> '$user_id'  ORDER BY user_id");
										$reponse = $reponse->fetchAll();

	   										$timestamp = strtotime('yesterday midnight');
	   										//Online
												foreach ($reponse as $key => $value) {
													if($value['id'] != 0){
														$userList = new user($value['id']);
														$current_time   = time();
		    
														$different = $current_time - $userList->last_connection;
														if($different < 300){
															if($userList->last_name == "")
																$name = $userList->username;
															else
																$name = $userList->last_name." ".$userList->name;
															echo"<tr >";
															echo"<td class=><a href='#' data-id='".$userList->id."' data-right='".$userList->right."' class='userId'><span class='stat stat_online'></span>".$name."</a></td>";
															echo"</tr>";
														}
													}

													
												}

											
											// Offline
												foreach ($reponse as $key => $value) {
													
														// User
														if($value['id'] != 0){
															$userList = new user($value['id']);
															$current_time   = time();
		    
															$different = $current_time - $userList->last_connection;
															if($different >= 300){
																if($userList->last_name == "")
																	$name = $userList->username;
																else
																	$name = $userList->last_name." ".$userList->name;
																echo"<tr>";
																echo"<td><a href='#' data-id='".$userList->id."' data-right='".$userList->right."' class='userId'><span class='stat stat_offline'></span>".$name."</a></td>";
																echo"</tr>";
															}
														}
													
													
													
												}
											
											
			}
?>

