<?php 
		$user_id = $_SESSION['user_id'];
		$user_right = $_SESSION['user_right'];

if (!class_exists('client')) {
   include('./php/class.client.php');
   //echo "included";
}
?>
<nav id="top_navigation">
				<div class="container">
					<ul id="icon_nav_h" class="top_ico_nav clearfix">

						<li class='tuto_1' data-step="1" data-intro="It's this page. The main page with all the data analysis">
							<a href="index.php">
								<i class="icon-home icon-2x"></i>
								<span class="menu_label">Home</span>
							</a>
						</li>
						<?php
							//if($user_right == 0){
						?>
							<!--<li>             
								<a href="owner.php">
									<span class="label label-danger">2</span>
									<i class="icon-group icon-2x"></i>
									<span class="menu_label">Owner</span>
								</a>
							</li>
							-->
						<?php
							//}else{
						?>
							<li class='tuto_1' data-step="2" data-intro="On this page, u can check all your properties">             
								<a href="listProperties.php">
									<span class="label label-danger">
										<?php 
											$reponse = $bdd->query("SELECT count(id_portfolio) AS total FROM portfolio WHERE user_ID ='$user_id' AND actif_portfolio <> 0");
								   			$reponse = $reponse->fetchAll();
								   			$total = $reponse[0]['total'];
								   			echo $total;
										?>
									</span>
									<i class="icon-group icon-2x"></i>
									<span class="menu_label">Propertie(s)</span>
								</a>
							</li>
						<?php
							//}
						?>
						
						<li class='tuto_1' data-step="3" data-intro="This is your TimeTable to organize visites with your clients">             
							<a href="calendar.php">
								<i class="icon-calendar icon-2x"></i>
								<span class="menu_label">Calendar</span>
							</a>
						</li>
						<li >             
							<a href="chat.php">
							
										<?php 
										$reponse = $bdd->query("SELECT DISTINCT message_from,user FROM message WHERE message_to = '$user_id' GROUP BY message_from ORDER BY message_timestamp");
										$reponse = $reponse->fetchAll();
											$total = 0;
											$timestamp = strtotime('yesterday midnight');
												foreach ($reponse as $key => $value) {
													switch ($value['user']) {
														case 'client':
															$labelclient = new client($value['message_from']);
															$reponse1 = $bdd->query("SELECT COUNT(message_from) AS total FROM message WHERE message_from ='$labelclient->id' AND user='client' AND message_read = 0 AND message_to ='$user_id' ");
															
															break;
														case 'user':
															$labeluser = new user($value['message_from']);
															$reponse1 = $bdd->query("SELECT COUNT(message_from) AS total FROM message WHERE message_from ='$labeluser->id' AND user='user' AND message_read = 0 AND message_to ='$user_id'  ");
															
															break;
														case 'admin':
															
															$reponse1 = $bdd->query("SELECT COUNT(message_from) AS total FROM message WHERE message_from ='0' AND user='admin' AND message_read = 0 AND message_to ='$user_id'  ");
															
															break;
														
														default:
															# code...
															break;
													}
															$reponse1 = $reponse1->fetchAll();
															$total += $reponse1[0]['total'];
														}
														if($total != 0)
								   			echo "<span class='label label-danger'>".$total."</span>";
										?>
									
								<i class="icon-envelope-alt icon-2x"></i>
								<span class="menu_label">Message(s)</span>
							</a>
						</li>
						
					<?php
					//if($user_right == 0){
					?>
					<!--	<li>             
							<a href="#">
								<span class="label label-success">$2 347</span>
								<i class="icon-tags icon-2x"></i>
								<span class="menu_label">Finance</span>
							</a>
						</li>
						<li>             
							<a href="client.php">
								<span class="label label-danger">12</span>
								<i class="icon-group icon-2x"></i>
								<span class="menu_label">Clients</span>
							</a>
						</li>
						<li>             
							<a href="#">
								<span class="label label-danger">4</span>
								<i class="icon-group icon-2x"></i>
								<span class="menu_label">Locataires</span>
							</a>
						</li>
						
						
						<li>             
							<a href="newsletter.php">
								<i class="icon-envelope icon-2x"></i>
								<span class="menu_label">Newsletter</span>
							</a>
						</li>
						<li>             
							<a href="text.php">
								<i class="icon-wrench icon-2x"></i>
								<span class="menu_label">text</span>
							</a>
						</li>

						-->
					<?php
					//	}
					?>
					</ul>
				</div>
			</nav>
			<!-- mobile navigation -->
			<nav id="mobile_navigation"></nav>
			