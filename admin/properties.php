<?php ob_start(); 
session_start();
include('php/class.load.php');
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		$user_right = $_SESSION['user_right'];
		
		if(!isset($_GET['id_portfolio']) )
			header('Location: index.php');
		if($user_right == 0)
			header('Location: index.php');


		$idCheck = $_GET['id_portfolio'];
		$reponse =$bdd->query("SELECT id_portfolio FROM portfolio WHERE user_id='$user_id' AND actif_portfolio <> 0");
		$reponse = $reponse->fetchAll();
		$tableCheck = array();
		foreach ($reponse as $key => $value) {
			array_push($tableCheck, $value['id_portfolio']);
		}
		if(!in_array($idCheck, $tableCheck))
			header('Location: index.php');

		
		$tuto = null;
		
		include('php/class.tutorial.php');
		$reponse =$bdd->query("SELECT id FROM tutorial WHERE user_id='$user_id'");
		$reponse = $reponse->fetchAll();
				if(count($reponse) != 0){
					$id =$reponse[0]['id'];
					
					$tutorial = new tutorial($id);
					if($tutorial->check(3) == false){
						$tuto = 3;
						
					}else{
						$tuto = 0;
						
					}
				}
	}else{
		header('Location: login.php');
	}	
 ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home - Saigon  1.0</title>
		
		<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		
	<!-- bootstrap framework-->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- todc-bootstrap -->
		<link rel="stylesheet" href="css/todc-bootstrap.min.css">
	<!-- font awesome -->        
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<!-- flag icon set -->        
		<link rel="stylesheet" href="img/flags/flags.css">
	<!-- retina ready -->
		<link rel="stylesheet" href="css/retina.css">	
	<!-- Intro Js CSS -->
		<link href="css/introjs.css" rel="stylesheet">
	<!-- aditional stylesheets -->
        <!-- fullcalendar -->
			<link rel="stylesheet" href="js/lib/fullcalendar/fullcalendar.css">
		<link rel="stylesheet" href="css/linecons/style.css">
			<!-- aditional stylesheets -->
		<!-- bootstrap switch -->
			<link rel="stylesheet" href="js/lib/bootstrap-switch/stylesheets/bootstrap-switch.css">
			<link rel="stylesheet" href="js/lib/bootstrap-switch/stylesheets/ebro_bootstrapSwitch.css">
	<!-- aditional stylesheets -->
		<!-- 2col multiselect -->
			<link rel="stylesheet" href="js/lib/multi-select/css/multi-select.css">
			<link rel="stylesheet" href="js/lib/multi-select/css/ebro_multi-select.css">
		<!-- select2 -->
			<link rel="stylesheet" href="js/lib/select2/select2.css">
			<link rel="stylesheet" href="js/lib/select2/ebro_select2.css">
			<link  rel="stylesheet" href="js/lib/dataTables/media/DT_bootstrap.css">
			<link rel="stylesheet" href="js/lib/dataTables/extras/TableTools/media/css/TableTools.css">

	<!-- ebro styles -->
		<link rel="stylesheet" href="css/style.css">
	<!-- ebro theme -->
		<link rel="stylesheet" href="css/theme/color_1.css" id="theme">
		<style type="text/css">
			  .ui-state-highlight { height: 90px; width:100%; line-height: 1.2em; border:2px dashed;}

		
		</style>
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="css/ie.css">
		<script src="js/ie/html5shiv.js"></script>
		<script src="js/ie/respond.min.js"></script>
		<script src="js/ie/excanvas.min.js"></script>
	<![endif]-->

	<!-- custom fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
			
	</head>
	<body class="boxed pattern_1 sidebar_hidden">
		
		<div id="wrapper_all">
			<header id="top_header">
				<div class="container">
					<div class="row">
						<div class="col-xs-6 col-sm-2">
							<a href="index.html" class="logo_main" title="Home - Saigon "><img src="img/logo_main.png" alt=""></a>
						</div>
						<?php include('widget/message.php'); ?>
					</div>
				</div>
			</header>						
			<?php include('widget/menu.php'); ?>
                
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
			<?php
						if(isset($_GET['id_portfolio'])){
							 $portfolio = new portfolio($_GET['id_portfolio']);
							 
							 $id_portfolio=$portfolio->id_portfolio;
							 $nom_portfolio=$portfolio->nom_portfolio;
							 $link_portfolio=$portfolio->link_portfolio;
							 $img_portfolio=$portfolio->img_portfolio;
							 $actif_portfolio=$portfolio->actif_portfolio;
							 $type_portfolio=$portfolio->type_portfolio;
							 $text_portfolio=$portfolio->text_portfolio;
							 $bath_portfolio=$portfolio->bath_portfolio;
							 $bed_portfolio=$portfolio->bed_portfolio;
							 $price_portfolio=$portfolio->price_portfolio;
							 $city_portfolio=$portfolio->city_portfolio;
							 $district_portfolio=$portfolio->district_portfolio;
							 $adress_portfolio=$portfolio->adress_portfolio;
							 $user_portfolio=$portfolio->user_portfolio;
							 $team_portfolio=$portfolio->team_portfolio;
							 $pool_portfolio=$portfolio->pool_portfolio;
							 $type_size_portfolio=$portfolio->type_size_portfolio;
							 $service_portfolio=$portfolio->service_portfolio;
							 $user_id=$portfolio->user_id;
							 $detail_portfolio=$portfolio->detail_portfolio;
							 $lat_portfolio=$portfolio->lat_portfolio;
							 $lng_portfolio=$portfolio->lng_portfolio;
							 $result_portfolio=$portfolio->result_portfolio;
							 $date_portfolio=$portfolio->date_portfolio;
							 $date_modification_portfolio=$portfolio->date_modification_portfolio;
							 $pets_portfolio=$portfolio->pets_portfolio;
							 $furnished_portfolio=$portfolio->furnished_portfolio;
							 $date_available_portfolio=$portfolio->date_available_portfolio;
							 $parking_portfolio = $portfolio->parking_portfolio;
							 $client=$portfolio->client;

							 $link_adress_portfolio =$portfolio->link_adress_portfolio;
							 //price
							 	if($service_portfolio == 'rent')
							 		$price_portfolio = $price_portfolio." $ / months";
							 	else
							 		$price_portfolio = $price_portfolio." $ ";
							 //furnished
							 	if($furnished_portfolio == 1)
							 		$furnished_portfolio="yes";
							 	else
							 		$furnished_portfolio="no";
							 //Pets
							 	if($pets_portfolio == 1)
							 		$pets_portfolio="yes";
							 	else
							 		$pets_portfolio="no";
							 //parking
							 	if($parking_portfolio == 1)
							 		$parking_portfolio="yes";
							 	else
							 		$parking_portfolio="no";
							 //pool
							 	if($pool_portfolio == 1)
							 		$pool_portfolio="yes";
							 	else
							 		$pool_portfolio="no";

						}else{
								 $id_portfolio="";
								 $nom_portfolio="";
								 $link_portfolio="";
								 $img_portfolio="";
								 $actif_portfolio="";
								 $type_portfolio="";
								 $text_portfolio="";
								 $bath_portfolio="";
								 $bed_portfolio="";
								 $price_portfolio="";
								 $city_portfolio="";
								 $district_portfolio="";
								 $adress_portfolio="Adress";
								 $user_portfolio="";
								 $team_portfolio="";
								 $pool_portfolio="";
								 $type_size_portfolio="";
								 $service_portfolio="";
								 $user_id="";
								 $detail_portfolio="";
								 $lat_portfolio="";
								 $lng_portfolio="";
								 $result_portfolio="";
								 $parking_portfolio="";
								 $date_portfolio="";
								 $date_modification_portfolio="";
								 $pets_portfolio="";
								 $furnished_portfolio="";
								 $date_available_portfolio="";
								 $client="";
								 $link_adress_portfolio ="";

						}
						


			?>			
						<!-- main content -->
		
		<div class="row">
				<div class="col-sm-12">
						<div class="user_heading">
							<div class="row">
								
								<div class="col-sm-12">
									<div class="user_heading_info">
										<div class="user_actions pull-right">
											<a href="#" class="edit_form" data-toggle="tooltip" data-placement="top auto" title="Edit propertie"><span class="icon-edit"></span></a>
											<a href="#" style='display:none;' class="edit_save save" data-toggle="tooltip" data-placement="top auto" title="Save propertie"><span class="icon-ok"></span></a>
											<a href="#" style='display:none;' class="edit_cancel" data-toggle="tooltip" data-placement="top auto" title="Cancel"><span class="icon-remove"></span></a>
										</div>
										<h1><?php echo $nom_portfolio;  ?></h1>
										<h2>Property</h2>
									</div>
								</div>
							</div>
						</div>
						<div class="row" style='border-top: 1px solid #E3E3E3;'>
							<div class="col-lg-2 col-sm-3" style='margin-top:15px;'>
								<div class="form-group">
									<div class="heading_a">Action(s)</div>
									<!--<p><a class="link_boxed " ><span class="label label-danger">4</span><span class=" icon-envelope"></span> Share</a></p>
									<p><a class="link_boxed"><span class=" icon-print"></span> Print</a></p>-->
								
									<?php
									if($actif_portfolio == '2'){
										echo"<p><a class='link_boxed view view_show tuto_3'  data-step='1' data-intro='Show the propertie on home-saigon.com' data-action='show' data-id='".$id_portfolio."'><span class=' icon-eye-open'></span> Enable (Show)</a></p>";
										echo"<p><a class='link_boxed view view_hide' style='display:none;' data-action='hide' data-id='".$id_portfolio."'><span class=' icon-eye-close'></span> Disable (Hide)</a></p>";
									}else{
										echo"<p><a class='link_boxed view view_hide tuto_3' data-action='hide' data-step='1' data-intro='Hide the propertie on home-saigon.com' data-id='".$id_portfolio."'><span class=' icon-eye-close'></span> Disable (Hide)</a></p>";
										echo"<p><a class='link_boxed view view_show' style='display:none;'  data-action='show' data-id='".$id_portfolio."'><span class=' icon-eye-open'></span> Enable (Show)</a></p>";
									}
									?>
									<p><a class='link_boxed view delete' data-action='delete' data-id='<?php echo $id_portfolio; ?>'><span class=' icon-trash'></span> Delete</a></p>
									

								</div>
							</div>
							<div class="col-lg-10 col-sm-9" style='margin-top:15px;'>
											<form class="form-horizontal user_form">
											 <input type="hidden" name="propertie" value="<?php echo $portfolio->id_portfolio;?>">
												<h3 class="heading_a">Informations</h3>
												<div class="form-group tuto_3" data-step='2' data-intro='Name of the property'>
													<label class="col-sm-2 control-label">Name</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $nom_portfolio; ?></p>
														<div class="hidden_control">
															<input type="text" name='nom_portfolio' class="form-control" value="<?php echo $nom_portfolio; ?>">
														</div>
													</div>
												</div>
												<div class="form-group tuto_3" data-step='3' data-intro='City and District of the property'>
													<label class="col-sm-2 control-label">Adress</label>
													<div class="col-sm-10 editable adress">
														<p class="form-control-static"><?php echo $city_portfolio; ?> - <?php echo $district_portfolio;?></p>
														<div class="hidden_control">
															 <div class="panel panel-default">
							                                                <div class="form-inline">
							                                                    <div class="row">
																					<div class="col-sm-6">
																						<select id="chn_city" name="chn_city" class="form-control">
																							<option value="">- City -</option>
																							<option value="chn_hcmc">Ho Chi Minh City</option>
																							<option value="chn_hanoi">Hanoi</option>
																							<option value="chn_danang">Danang</option>
																						</select>
																					</div>
																					<div class="col-sm-6">
																						<select id="chn_district" name="chn_district" class="form-control">
																							<option value="">- District -</option>
																							<option value="chn_hcmc_1" class="chn_hcmc">District 1</option>
																							<option value="chn_hcmc_2" class="chn_hcmc">District 2</option>
																							<option value="chn_hcmc_3" class="chn_hcmc">District 3</option>
																							<option value="chn_hcmc_4" class="chn_hcmc">District 4</option>
																							<option value="chn_hcmc_5" class="chn_hcmc">District 5</option>
																							<option value="chn_hcmc_6" class="chn_hcmc">District 6</option>
																							<option value="chn_hcmc_7" class="chn_hcmc">District 7</option>
																							<option value="chn_hcmc_8" class="chn_hcmc">District 8</option>
																							<option value="chn_hcmc_9" class="chn_hcmc">District 9</option>
																							<option value="chn_hcmc_10" class="chn_hcmc">District 10</option>
																							<option value="chn_hcmc_11" class="chn_hcmc">District 11</option>
																							<option value="chn_hcmc_12" class="chn_hcmc">District 12</option>
																							<option value="chn_hcmc_Go Vap" class="chn_hcmc">Go Vap District</option>
																							<option value="chn_hcmc_Tan Binh" class="chn_hcmc">Tan Binh District</option>
																							<option value="chn_hcmc_Tan Phu" class="chn_hcmc">Tan Phu District</option>
																							<option value="chn_hcmc_Binh Thanh" class="chn_hcmc">Binh Thanh District</option>
																							<option value="chn_hcmc_Phu Nhuan" class="chn_hcmc">Phu Nhuan District</option>
																							<option value="chn_hcmc_Thu Duc" class="chn_hcmc">Thu Duc District</option>
																							<option value="chn_hcmc_Bin Tan" class="chn_hcmc">Bin Tan District</option>
																						</select>
																					</div>
																					
																				</div>
							                                                </div>
					
							                                </div>
														</div>
													</div>
													

												</div>
												<div class="form-group adress tuto_3" data-step='4' data-intro='Adress of the property'>
													<label class="col-sm-2 control-label"></label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $adress_portfolio;  ?></p>
														<div class="hidden_control">
															<input type="text" name='adress_portfolio' class="form-control" onblur="if (this.value == '') {this.value = 'Adress';}"  value="<?php echo $adress_portfolio; ?>">
														</div>
													</div>
												</div>
												<div class="form-group tuto_3" data-step='5' data-intro='Chaine the property to another property (Example: 2 appartments of the same building)'>
													<label class="col-sm-2 control-label"></label>
													<div class="col-sm-10 editable"><?php
													$portfolio_link_result ="";
													if($link_adress_portfolio != 0){
														$portfolio_link = new portfolio($link_adress_portfolio);
														$portfolio_link_result = $portfolio_link->nom_portfolio." - n°".$portfolio_link->id_portfolio;
													}else{
														$portfolio_link_result = "none";
													}

													?>
														<p class="form-control-static">Chained to a other adress: <?php echo $portfolio_link_result;  ?></p>
														<div class="hidden_control">
																			<select id="link_adress_portfolio" name="link_adress_portfolio" class="form-control">
																				<option value='0'>- No Chaine -</option>
																				<?php
																					$reponse = $bdd->query("SELECT id_portfolio,nom_portfolio,adress_portfolio,city_portfolio,district_portfolio FROM portfolio WHERE user_id ='$portfolio->user_portfolio' AND link_adress_portfolio = 0 AND id_portfolio <> '$id_portfolio' ORDER BY id_portfolio DESC");
	   																				$reponse = $reponse->fetchAll();
	   																				foreach ($reponse as $key => $value) {
	   																					echo "<option value='".$value['id_portfolio']."'>n°".$value['id_portfolio']." ".$value['nom_portfolio']." - ".$value['adress_portfolio']." - ".$value['district_portfolio']."</option>";
	   																				}

																				?>
																			</select>
														</div>
													</div>
												</div>
												<div class="form-group tuto_3" data-step='6' data-intro='Number of Bedroom and Bathroom'>
													<label class="col-sm-2 control-label">Bed(s) / Bath(s)</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $bed_portfolio; ?> bed(s) / <?php echo $bath_portfolio; ?> bath(s)</p>
														<div class="hidden_control">
															<div class="panel panel-default">
				                                                <div class="form-inline">
				                                                    <div class="row">																		
																		<div class="col-sm-6">
																			<select id="bed_portfolio" name="bed_portfolio" class="form-control">
																				<option value="">- Beds -</option>
																				<option value="0" > 0 bed</option>
																				<option value="1" > 1 bed</option>
																				<?php if($type_portfolio != 'room'){ ?>
																				<option value="2" > 2 beds</option>
																				<option value="3" > 3 beds</option>
																				<option value="4" > 4 beds</option>
																				<option value="5" > 5+ beds</option>
																				<?php } ?>
																			</select>
																		</div>
																		<div class="col-sm-6">
																			<select id="bath_portfolio" name="bath_portfolio" class="form-control">
																				<option value="">- Baths -</option>
																				<option value="0" > 0 bath</option>
																				<option value="1" > 1 bath</option>
																				<?php if($type_portfolio != 'room'){ ?>
																				<option value="2" > 2 baths</option>
																				<option value="3" > 3 baths</option>
																				<option value="4" > 4 baths</option>
																				<option value="5" > 5+ baths</option>
																				<?php } ?>
																			</select>
																		</div>
																	</div>
				                                                </div>					
							                                </div>
														</div>
													</div>
												</div>
												<div class="form-group tuto_3" data-step='7' data-intro='Choose the date of availability of your property'>
													<label class="col-sm-2 control-label">Available</label>
													<div class="col-sm-6 editable">
														<p class="form-control-static"><?php echo $date_available_portfolio;  ?></p>
														<div class="hidden_control">
															<div class="panel panel-default">
																 <div class="input-group date ebro_datepicker" data-date-format="yyyy-mm-dd" >
				                                                    <input class="form-control" type="text" name="date_available_portfolio" value="<?php echo $date_available_portfolio;  ?>">
				                                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
				                                                </div>
															</div>														
														</div>
													</div>
												</div>
												<?php if($type_portfolio != 'room'){ ?>
												<div class="form-group tuto_3" data-step='8' data-intro='Choose the service: Rent or Sale'>
													<label class="col-sm-2 control-label">Service</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><span class='label label-default' style='font-size: 14px;height: 100%;line-height: 20px;'><?php echo $service_portfolio;  ?></span></p>
														<div class="hidden_control">
															<div class="make-switch switch-width-large" data-on-label="Rent" data-off-label="Sale">
															<?php 
																if($service_portfolio == 'rent'){
				                                                    echo"<input type='checkbox' name='service_portfolio' checked>";
																}elseif($service_portfolio == 'sale'){
																	echo"<input type='checkbox' name='service_portfolio' >";
																}else{
																	echo"<input type='checkbox' name='service_portfolio' checked>";
																}
															?>
			                                                </div>
														</div>
													</div>
												</div>
												<?php } ?>
												<div class="form-group tuto_3" data-step='9' data-intro='Is it the property Furnished ? ' >
													<label class="col-sm-2 control-label">Furnished</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><span class='label label-default' style='font-size: 14px;height: 100%;line-height: 20px;'><?php echo $furnished_portfolio;  ?></span></p>
														<div class="hidden_control">
															<div class="make-switch switch-width-large" data-on-label="Yes" data-off-label="No">
															<?php 
																if($furnished_portfolio == 'yes'){
				                                                    echo"<input type='checkbox' name='furnished_portfolio' checked>";
																}elseif($furnished_portfolio == 'no'){
																	echo"<input type='checkbox' name='furnished_portfolio' >";
																}else{
																	echo"<input type='checkbox' name='furnished_portfolio' >";
																}
															?>
			                                                </div>
														</div>
													</div>
												</div>
												<div class="form-group  tuto_3" data-step='10' data-intro='Any parking for a CAR ?'>
													<label class="col-sm-2 control-label">Parking</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><span class='label label-default' style='font-size: 14px;height: 100%;line-height: 20px;'><?php echo $parking_portfolio;  ?></span></p>
														<div class="hidden_control">
															<div class="make-switch switch-width-large" data-on-label="Yes" data-off-label="No">
															<?php 
																if($parking_portfolio == 'yes'){
				                                                    echo"<input type='checkbox' name='parking_portfolio' checked>";
																}elseif($parking_portfolio == 'no'){
																	echo"<input type='checkbox' name='parking_portfolio' >";
																}else{
																	echo"<input type='checkbox' name='parking_portfolio' >";
																}
															?>
			                                                </div>
														</div>
													</div>
												</div>
												<div class="form-group  tuto_3" data-step='11' data-intro='Some peoples have pets and wont leave them'>
													<label class="col-sm-2 control-label">Allow Pets</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><span class='label label-default' style='font-size: 14px;height: 100%;line-height: 20px;'><?php echo $pets_portfolio;  ?></span></p>
														<div class="hidden_control">
															<div class="make-switch switch-width-large" data-on-label="Yes" data-off-label="No">
															<?php 
																if($pets_portfolio == 'yes'){
				                                                    echo"<input type='checkbox' name='pets_portfolio' checked>";
																}elseif($pets_portfolio == 'no'){
																	echo"<input type='checkbox' name='pets_portfolio' >";
																}else{
																	echo"<input type='checkbox' name='pets_portfolio' >";
																}
															?>
			                                                </div>
														</div>
													</div>
												</div>
												<div class="form-group tuto_3" data-step='12' data-intro='Any swimming pool ?'>
													<label class="col-sm-2 control-label">Swimming pool</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><span class='label label-default' style='font-size: 14px;height: 100%;line-height: 20px;'><?php echo $pool_portfolio;  ?></span></p>
														<div class="hidden_control">
															<div class="make-switch switch-width-large" data-on-label="Yes" data-off-label="No">
															<?php 
																if($pool_portfolio == 'yes'){
				                                                    echo"<input type='checkbox' name='pool_portfolio' checked>";
																}elseif($pool_portfolio == 'no'){
																	echo"<input type='checkbox' name='pool_portfolio' >";
																}else{
																	echo"<input type='checkbox' name='pool_portfolio' >";
																}
															?>
			                                                </div>
														</div>
													</div>
												</div>
												<div class="form-group  tuto_3" data-step='13' data-intro='The price in Dollar($), the most important part. WE DONT ACCEPT FAKE !'>
													<label class="col-sm-2 control-label">Price</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $price_portfolio; ?></p>
														<div class="hidden_control">
															<input type="text" name ='price_portfolio' class="form-control" value="<?php echo $price_portfolio; ?>">
														</div>
													</div>
												</div>
												<div class="form-group tuto_3" data-step='14' data-intro='Size of the property in meter'>
													<label class="col-sm-2 control-label">Square</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $type_size_portfolio; ?> m</p>
														<div class="hidden_control">
															<input type="text" name ='type_size_portfolio' class="form-control" value="<?php echo $type_size_portfolio; ?> m">
														</div>
													</div>
												</div>
												
												<div class="form-group  tuto_3" data-step='15' data-intro='Type of the property.'>
													<label class="col-sm-2 control-label">Type</label>
													
													<div class="col-sm-10 editable">
														<p class="form-control-static"><span class='label label-default' style='font-size: 14px;height: 100%;line-height: 20px;'><?php echo $type_portfolio;  ?></span></p>
														<div class="hidden_control">
															<select id="type_portfolio" name="type_portfolio" class="form-control">
															<?php if($type_portfolio != 'room'){ ?>
																<option value="">- Type -</option>
																<option value="house" > House </option>
																<option value="appartment" > Appartment </option>
																<option value="land" > Land </option>
																<option value="office" > Office </option>
															<?php }else{ ?>
																<option value="room" > Room </option>
															<?php } ?>	
															</select>
														</div>
													</div>
													
												</div>
												
												<div class="form-group  tuto_3" data-step='16' data-intro='Google map ... Use your mouse to put your properties on the right place.'>
													<label class="col-sm-2 control-label">Google Map</label>
													<div class="col-sm-10 editable">
														<div id='mapDivFix' style='width:100%; height:300px; '></div>
														<div class="hidden_control">
															<div class="panel panel-default">
																<input type="hidden" id="lat_portfolio" name="lat_portfolio" value="<?php echo $portfolio->lat_portfolio; ?>">
																<input type="hidden" id="lng_portfolio" name="lng_portfolio" value="<?php echo $portfolio->lng_portfolio; ?>">

																<div id='mapDivChange' style='width:100%; height:300px; '></div>
															</div>														
														</div>
													</div>
												</div>
												<div class="form-group  tuto_3" data-step='17' data-intro='Text to display on the website. You have an exemple, if you follow this exemple (Text + List), your ranking will be improved '>
													<label class="col-sm-2 control-label">Text</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $text_portfolio;  ?></p>
														<div class="hidden_control">
															<div class="panel panel-default">
																<input type="hidden" class="text_portfolio" name='text_portfolio' value="<?php echo $text_portfolio;  ?>">
																<div id="text_portfolio"><?php echo $text_portfolio;  ?></div>
															</div>														
														</div>
													</div>
												</div>
												<div class="form-group tuto_3" data-step='18' data-intro='The gallery. Take nice picture and click on the button to upload them.'>
													<label class="col-sm-2 control-label">Gallery</label>
													<div class="col-sm-10 editable">
														<ul id='gallery_grid_fix'class="galMix list form-control-static" style=" ">
															<?php
																  if($portfolio->link_portfolio != ''){
									                                    $reponse = $bdd->query("SELECT id_gallery, nom_gallery,link_gallery FROM gallery where id_gallery='$portfolio->link_portfolio'");
									                                    $donnees2 = $reponse->fetchAll();
									                                    $id_gallery=$donnees2[0]['id_gallery'];
									                                    //On crée une objet gallery
									                                    if($donnees2[0]['link_gallery'] != ""){
									                                    	$object_gallery = new gallery($id_gallery);
									                                    if($object_gallery->link_gallery != ""){
									                                    	$link_gallery = explode(",", $object_gallery->link_gallery);
										                                    foreach ($link_gallery as $key => $value) {
										                                    	
										                                    	 $reponse = $bdd->query("SELECT nom_fichier,id_fichier,adresse_fichier FROM fichier where id_fichier = '$value' ");
																				 $photos = $reponse->fetchAll();

																				echo "<li class='mix  mix_all' data-timestamp='1379455200' data-id='".$photos[0]['id_fichier']."' style=' display: block; opacity: 1;'>";
																				echo "<a class='img-thumbnail img_wrapper gal_lightbox' href='".$photos[0]['adresse_fichier']."/".$photos[0]['nom_fichier']."'>";
																				echo "<img class='img-responsive' width='145' height='138' alt='' src='".$photos[0]['adresse_fichier']."/".$photos[0]['nom_fichier']."'>";
																				echo "</a>";
																				echo "<div class='meta name'>";
																				echo "<h2 class='gal_title'>Image ".$photos[0]['id_fichier']." </h2>";
																				echo "<span class='text-muted'>".$photos[0]['nom_fichier']."</span>";
																				echo "</div>";	
																				echo "</li>";
										                                    }
									                                    }
									                                    }
									                                    
									                                    
									                                              
									                                        
									                                }
															?>
																
																
															</ul>
														<div class="hidden_control">
												            <!-- ici on met la gallery -->
															<button class="btn btn-primary btn-lg btn-block " id='addPicture' type="button">Add/Remove pictures</button>
															<ul id="gallery_grid" class="galMix list" style=" ">
															<?php
																  if($portfolio->link_portfolio != ''){
									                                    $reponse = $bdd->query("SELECT id_gallery, nom_gallery,link_gallery FROM gallery where id_gallery='$portfolio->link_portfolio'");
									                                    $donnees2 = $reponse->fetchAll();
									                                    $id_gallery=$donnees2[0]['id_gallery'];
									                                    //On crée une objet gallery
									                                     if($donnees2[0]['link_gallery'] != ""){
									                                     	$object_gallery = new gallery($id_gallery);

									                                   	if($object_gallery->link_gallery != ""){
										                                    $link_gallery = explode(",", $object_gallery->link_gallery);
										                                    foreach ($link_gallery as $key => $value) {
										                                    	
										                                    	 $reponse = $bdd->query("SELECT nom_fichier,id_fichier,adresse_fichier FROM fichier where id_fichier = '$value' ");
																				 $photos = $reponse->fetchAll();

																				echo "<li class='mix  mix_all ui-state-default' data-timestamp='1379455200' data-id='".$photos[0]['id_fichier']."' style=' display: block; opacity: 1;'>";
																				echo "<a class='img-thumbnail img_wrapper gal_lightbox' href='".$photos[0]['adresse_fichier']."/".$photos[0]['nom_fichier']."'>";
																				echo "<img class='img-responsive' width='145' height='138' alt='' src='".$photos[0]['adresse_fichier']."/".$photos[0]['nom_fichier']."'>";
																				echo "</a>";
																				echo "<div class='meta name'>";
																				echo "<h2 class='gal_title'>Image ".$photos[0]['id_fichier']." </h2>";
																				echo "<span class='text-muted'>".$photos[0]['nom_fichier']."</span>";
																				echo "</div>";	
																				echo "</li>";
										                                    }
									                                	}
									                                     }
									                                    
									                                              
									                                        
									                                }
															?>
																
																
															</ul>	
															<input type="hidden" name="link_gallery" value ="<?php echo $object_gallery->link_gallery; ?>">
														</div>
													</div>
												</div>
												
												<!-- C'est les infos pour l'equipe et non pas pour le client -->
												<?php if($user_right == 0){ ?>
												<h3 class="heading_a">Information for the Team</h3>
												<div class="form-group">
													<label class="col-sm-2 control-label">Details</label>
													<div class="col-sm-10 editable">
														<div class="form-control-static"><?php echo $detail_portfolio;  ?></div>
														<div class="hidden_control">
															<div class="panel panel-default">
																<input type="hidden" class="detail_portfolio" name='detail_portfolio' value="<?php echo $detail_portfolio;  ?>">
																<div id="detail_portfolio"><?php echo $detail_portfolio;  ?></div>
															</div>														
														</div>
													</div>
												</div>
												<?php } ?>
												<div class="form-group">
													<label class="col-sm-2 control-label">Statut</label>
													<?php
														$statut = $portfolio->result_portfolio;
															switch ($statut) {
																case '0':
																	$statut = "<span class='label label-success' style='font-size: 14px;height: 100%;line-height: 20px;'>Ready</span>";
																	break;
																case '1':
																	$statut = "<span class='label label-warning' style='font-size: 14px;height: 100%;line-height: 20px;'>In process</span>";
																	break;
																case '2':
																	$statut = "<span class='label label-default' style='font-size: 14px;height: 100%;line-height: 20px;'>Rented</span>";
																	break;
																case '3':
																	$statut = "<span class='label label-default' style='font-size: 14px;height: 100%;line-height: 20px;'>Sold</span>";
																	break;
																
																default:
																	# code...
																	break;
															}

													?>
													<div class="col-sm-10 editable tuto_3" data-step='19' data-intro='Actual Statut of the property. Its very important to update.'>
														<p class="form-control-static"><?php echo $statut; ?></p>
														<div class="hidden_control">
															<select id="result_portfolio" name="result_portfolio" class="form-control">
																<option value="">- Statut -</option>
																<option value="0" > Ready </option>
																<option value="1" > In process </option>
																<option value="2" > Rented </option>
																<?php if($type_portfolio != 'room'){ ?>
																<option value="3" > Sold </option>
																<?php } ?>
															</select>
														</div>
													</div>
												</div>
												<div class="form_submit clearfix tuto_3" data-step='20' data-intro='Last Step. Click here to save your data' style="display:none" >
													<div class="row">
														<div class="col-sm-10 col-sm-offset-2">
															<button class="btn btn-primary btn-lg save">Save all data</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									
									</div>
								</div>
							</div>
							<!--
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">Historic of properties</h4>
									</div>
									<table id="" class="table dt_fixed_col table-striped table-condensed">
									<thead>
											<tr>
												<th>id</th>
												<th>Action</th>
												<th>Date</th>
												<th>Description</th>
											</tr>
										</thead>
										<tbody>
											<tr><td>1</td><td><span class='label label-success'>Visit</span></td><td>Today 3 PM</td><td> Nice visit with 2 french peoples interessting in thsi kind of propertyes.</td></tr>
											<tr><td>2</td><td><span class='label label-success'>Visit</span></td><td>yesterday 10 AM</td><td> Nice visit with 2 french peoples interessting in thsi kind of propertyes.</td></tr>
											<tr><td>3</td><td><span class='label label-success'>Visit</span></td><td>2013-11-02 3 PM</td><td> Nice visit with 2 french peoples interessting in thsi kind of propertyes.</td></tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						-->
						<!-- end main content -->
					</div>
				</div>

			<?php include('widget/dashboard.php'); ?>
			</section>
			<div id="footer_space"></div>
		</div>

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        &copy; 2013 Home Saigon by Rebmann Guillaume
                    </div>
                    <div class="col-sm-8">
                        <ul>
                            <li><a href="#">Dashboard</a></li>
                            <li>&middot;</li>
                            <li><a href="#">Terms of Service</a></li>
                            <li>&middot;</li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li>&middot;</li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-1 text-right">
                        <small class="text-muted">v1.0</small>
                    </div>
                </div>
            </div>
        </footer>
        
	<?php include('javascript_file.php'); ?>
	<script type="text/javascript" src="js/intro.js"></script> 
		<!-- bootstrap switch -->
			<script src="js/lib/bootstrap-switch/js/bootstrap-switch.min.js"></script>
		<!-- bootbox.js -->
			<script src="js/lib/bootbox/bootbox.min.js"></script>
		
			
		<!-- 2col multiselect -->
			<script src="js/lib/multi-select/js/jquery.multi-select.js"></script>
			<script src="js/jquery.quicksearch.js"></script>
		<!-- select2 -->
			<script src="js/lib/select2/select2.min.js"></script>
		<!-- chained selects -->
			<script src="js/lib/chained/jquery.chained.min.js"></script>
			<script src="js/lib/chained/jquery.chained.remote.min.js"></script>
		<!-- wysiwg -->
			<script src="js/lib/ckeditor/ckeditor.js"></script>
		<!-- datepicker -->
			<script src="js/lib/datepicker/js/bootstrap-datepicker.js"></script>
		<!-- datatables -->
            <script src="js/lib/dataTables/media/js/jquery.dataTables.min.js"></script>
		<!-- datatables column reorder -->
            <script src="js/lib/dataTables/extras/ColReorder/media/js/ColReorder.min.js"></script>
        <!-- datatable fixed columns -->
            <script src="js/lib/dataTables/extras/FixedColumns/media/js/FixedColumns.min.js"></script>
		<!-- datatables column toggle visibility -->
            <script src="js/lib/dataTables/extras/ColVis/media/js/ColVis.min.js"></script>
        <!-- datatable table tools -->
            <script src="js/lib/dataTables/extras/TableTools/media/js/TableTools.min.js"></script>
            <script src="js/lib/dataTables/extras/TableTools/media/js/ZeroClipboard.js"></script>
        <!-- datatable bootstrap style -->
            <script src="js/lib/dataTables/media/DT_bootstrap.js"></script>
            <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&amp;key=AIzaSyD3VSb2IYSKdPdcDWFffqh0pGy9S47Klzk"></script>
		<!-- fileupload widgets -->
			<script src="js/lib/jasny_plugins/bootstrap-fileupload.js"></script>
            <script type="text/javascript">
            jQuery(document).ready(function($) {
            	  $(function() {
									ebro_contact_list.init();
									ebro_datepicker.init();
									ebro_gallery.init();
									//ebro_validate.init();
									//ebro_validate.extended();
									ebro_portfolio.init();
									ebro_datatables.basic();
									ebro_datatables.fixed_col();
									ebro_datatables.colReorder_visibility();
									ebro_datatables.scroll();
									ebro_datatables.table_tools();
									ebro_google_map.init();
									ebro_portfolio.init();
									ebro_firstGallery.init();
									
									//* add placeholder to search input
							        $('.dataTables_filter input').each(function() {
							            $(this).attr("placeholder", "Search...");
							        });
								});

            	  				ebro_gallery ={
            	  					init:function(){
            	  						$( "#gallery_grid" ).sortable({ 
													    	placeholder: "ui-state-highlight",
													    	cursor: 'move',
													    	start: function( event, ui ) {
																   ebro_firstGallery.reset();	
																  },
														    stop: function(event,ui){
														    				var info='';
																			$('#gallery_grid li').each(function(index){
																				//alert(index);
																				var id_fichier = $(this).data('id');
																				if(index == 0){
																		  		 info = id_fichier;
																		  		//alert("hello");
																		  		}else{
																		  			info=info+','+id_fichier;
																		  		}
																			});
																			$('input[name=link_gallery]').attr('value',info);
																			ebro_firstGallery.init();										
																  }
													
														});
									    $( "#gallery_grid" ).disableSelection();
            	  					}
            	  				}

            	  				ebro_portfolio = {
									init: function() {
											var district='<?php echo $portfolio->district_portfolio; ?>';
											var city='<?php echo $portfolio->city_portfolio; ?>';
											var bed ='<?php echo $portfolio->bed_portfolio; ?>';
											var bath ='<?php echo $portfolio->bath_portfolio; ?>';
											var type ='<?php echo $portfolio->type_portfolio; ?>';
											var link_adress =<?php echo $portfolio->link_adress_portfolio; ?>;
											var result ='<?php echo $portfolio->result_portfolio; ?>';
												if(city == "Ho Chi Minh City")
													city = "hcmc";

											if(district != ""){
												$('#chn_district option').each(function(index){
												
													//alert(prefixe+" "+name_state);
													district = district.replace(" District","");
													district = district.replace("District ","");
													//alert("chn_"+city+"_"+district);
													if($(this).attr('value') == "chn_"+city+"_"+district){
														$(this).attr("selected",true);
													}
												});
											}
											if(city != ""){
												$('#chn_city option').each(function(index){
												
													//alert(prefixe+" "+name_state);
													if($(this).attr('value') == "chn_"+city){
														$(this).attr("selected",true);
													}
												});
											}
											if(bath != ""){
												$('select[name=bath_portfolio] option').each(function(index){
												
													//alert(prefixe+" "+name_state);
													if($(this).attr('value') == bath){
														$(this).attr("selected",true);
													}
												});
											}
											if(bed != ""){
												$('select[name=bed_portfolio] option').each(function(index){
												
													//alert(prefixe+" "+name_state);
													if($(this).attr('value') == bed){
														$(this).attr("selected",true);
													}
												});
											}
											if(type != ""){
												$('select[name=type_portfolio] option').each(function(index){
												
													//alert(prefixe+" "+name_state);
													if($(this).attr('value') == type){
														$(this).attr("selected",true);
													}
												});
											}
											if(link_adress != 0){
												$('select[name=link_adress_portfolio] option').each(function(index){
												
													//alert($(this).attr('value')+" - "+link_adress);
													if($(this).attr('value') == link_adress){
														$(this).attr("selected",true);
														if(link_adress_portfolio != 0)
															$('.adress').hide();
													}
												});
											}
											if(result != ""){
												$('select[name=result_portfolio] option').each(function(index){
												
													//alert(prefixe+" "+name_state);
													if($(this).attr('value') == result){
														$(this).attr("selected",true);
													}
												});
											}
											//* Chained
											if($('#chn_city').length && $('#chn_district').length) {
												$("#chn_district").chained("#chn_city");  
											}
											if($('#chn_adress').length && $('#chn_city').length) {
												//$("#chn_adress").chained("#chn_district");  
											}


									}
								}
            	  				ebro_datepicker = {
									init: function() {
										if($('.ebro_datepicker').length) {
											$('.ebro_datepicker').datepicker()
										}
										if( ($('#dpStart').length) && ($('#dpEnd').length) ) {
											$('#dpStart').datepicker().on('changeDate', function(e){
												$('#dpEnd').datepicker('setStartDate', e.date);
											});
											$('#dpEnd').datepicker().on('changeDate', function(e){
												$('#dpStart').datepicker('setEndDate', e.date)
											});
										}
									}
								};
							    ebro_contact_list = {
							        init: function() {
							            if($('#contact_list').length) {
											
											var $contact_list_header = $('#contact_list').find('h4').addClass('active_sect'),
												$contact_list_filter = $('#contact_list_filter');
											
											//* filters
											$contact_list_header.each(function() {
												var $this = $(this);
												$this.prepend('<i class="icon-angle-up">');
												$contact_list_filter.append('<option value="'+$this.data('contactFilter')+'">'+$this.text()+'</option>')
											})
											
											//* toggle sections
											$contact_list_header.on('click',function() {
												$this = $(this);
												
												if($this.hasClass('active_sect')) {
													$this.removeClass('active_sect').next('ul').stop().slideUp('200');
													$this.children('i').removeClass('icon-angle-up').addClass('icon-angle-down')
												} else {
													$this.addClass('active_sect').next('ul').stop().slideDown('200');
													$this.children('i').addClass('icon-angle-up').removeClass('icon-angle-down')
												}
											});
											
											//* contact list filter
											$contact_list_filter.on('change',function() {
												var this_val = $(this).val();
												
												if (this_val != 'filter_all') {
													var this_filter = $('#contact_list').find('[data-contact-filter='+this_val+']');
													$contact_list_header.each(function() {
														$this = $(this);
														if($this.data('contactFilter') == this_val) {
															$this.removeClass('active_sect').click();	
														} else {
															$this.addClass('active_sect').click();	
														}
													})	
												} else {
													$contact_list_header.each(function() {
														$(this).removeClass('active_sect').click();
													})
												}
											})
											
											ebro_contact_list.filter_list();
							            }
							        },
									filter_list: function() {
										//* quicksearch
										$('#contact_search').quicksearch('#contact_list li',{
											'delay': 100,
											'noResults': '.contact_list_no_result',
											'bind': 'keyup keydown',
											'hide': function () {
												$(this).hide();
												$('#contact_list > ul > li').removeClass('last_visible').filter(':visible:last').addClass('last_visible');
											},
											'show': function () {
												$(this).show();
												$('#contact_list > ul > li').removeClass('last_visible');
											}
										});
									}
							    };



								//* parsley validate
								ebro_validate = {
									init: function() {
										if($('#parsley_reg').length) {
											$('#parsley_reg').parsley({
												errors: {
													classHandler: function ( elem, isRadioOrCheckbox ) {
														if(isRadioOrCheckbox) {
															return $(elem).closest('.form_sep');
														}
													},
													container: function (element, isRadioOrCheckbox) {
														if(isRadioOrCheckbox) {
															return element.closest('.form_sep');
														}
													}
												}
											});
										}
									},
									extended: function() {
										//* 2col multiselect
										if($('#2col_multiselect').length) {
											$('#2col_multiselect').multiSelect();
										}
										//* select2
										if($('#s2_basic').length) {
											$('#s2_basic').select2({
												allowClear: true,
												placeholder: "Select..."
											});
											//* remove default form-controll class
											setTimeout(function() {
												$('.select2-container').each(function() {
													$(this).removeClass('form-control')
												})
											})
										}
										//* datepicker
										if($('.ebro_datepicker').length) {
											$('.ebro_datepicker').datepicker({
												autoclose: true
											}).on('changeDate', function(ev){
												//alert($(this).children('input').val());
												$(this).children('input').parsley( 'validate' );  
											})
										}
										//* iCheck
										if($('.icheck').length) {
											$('.icheck').iCheck({
												checkboxClass: 'icheckbox_minimal'
											}).on('ifChanged', function(event){
												$('.icheck[name="cust_checkbox"]').parsley( 'validate' );  
											});
										}
										if($('#parsley_ext').length) {
											
											//* workaround for multi selects null value
											$('#2col_multiselect,#s2_basic').append('<option disabled value=""/>').on('change',function() {
												if ($(this).val() === null ) {
													$(this).val("");
												}
											}).val('');
											
											$('#parsley_ext').parsley({
												validationMinlength: 0,
												errors: {
													classHandler: function ( elem, isRadioOrCheckbox ) {
														return $(elem).closest('.form_sep');
													},
													container: function (element, isRadioOrCheckbox) {
														return element.closest('.form_sep');
													}
												}
											});
										}
									}
								}
								

            	/* [ ---- Ebro Admin - datatables ---- ] */

			    			
				ebro_datatables = {
					//* basic example
			        basic: function() {
			            if($('#dt_basic').length) {
			                $('#dt_basic').dataTable({
			                    "sPaginationType": "bootstrap_full"
			                });
			            }
			        },
			        //* fixed columns
			        fixed_col: function() {
			            if($('.dt_fixed_col').length) {
			                var oTable = $('.dt_fixed_col').dataTable( {
								"sScrollX": "100%",
								"sScrollXInner": "150%",
								"bScrollCollapse": true
							} );
							new FixedColumns( oTable, {
								"iLeftColumns": 2,
								"iLeftWidth": 200
							} );
			            }
			        },
			        //* column reorder & toggle visibility
			        colReorder_visibility: function() {
			            if($('#dt_colVis_Reorder').length) {
			                $('#dt_colVis_Reorder').dataTable({
			                    "sPaginationType": "bootstrap",
			                    "sDom": "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
			                    "fnInitComplete": function(oSettings, json) {
			                        $('.ColVis_Button').addClass('btn btn-default btn-sm').html('Columns');
			                    }
			                });
			            }
			        },
			        //* horizontal scroll
			        scroll: function() {
			            if($('#dt_scroll').length) {
			                $('#dt_scroll').dataTable({
			                "sScrollX": "100%",
			                "sScrollXInner": '150%',
			                "sPaginationType": "bootstrap",
			                "bScrollCollapse": true 
			            });
			            }
			        },
			        //* column reorder & toggle visibility
			        table_tools: function() {
			            if($('#dt_table_tools').length) {
			                $('#dt_table_tools').dataTable({
								"sDom": "<'dt-top-row'Tlf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
			                    "oTableTools": {
			                        "aButtons": [
			                            "copy",
			                            "print",
			                            {
			                                "sExtends":    "collection",
			                                "sButtonText": 'Save <span class="caret" />',
			                                "aButtons":    [ "csv", "xls", "pdf" ]
			                            }
			                        ],
			                        "sSwfPath": "js/lib/dataTables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
			                    },
			                    "fnInitComplete": function(oSettings, json) {
			                        $(this).closest('#dt_table_tools_wrapper').find('.DTTT.btn-group').addClass('table_tools_group').children('a.btn').each(function(){
			                            $(this).addClass('btn-sm btn-default');
			                        });
			                    }
			                });
			            }
					}
				}
				//Editeur de texte
				if($('#detail_portfolio').length) { 
					var detailEditor = CKEDITOR.replace( 'detail_portfolio',
						CKEDITOR.tools.extend (
						{
							height: 200,
							extraPlugins: 'autogrow',
							autoGrow_maxHeight: 400
						})
					);
				}
				if($('#text_portfolio').length) { 
					var textEditor = CKEDITOR.replace( 'text_portfolio',
						CKEDITOR.tools.extend (
						{
							height: 200,
							extraPlugins: 'autogrow',
							autoGrow_maxHeight: 400
						})
					);
				}
				
									//* edit form
									$('.edit_form').click(function(e) {
										e.preventDefault();
										
										$('.user_form .editable p').hide();
										$('.edit_form').hide();
										$('.edit_save').show();
										$('.edit_cancel').show();
										//Fin de remplacement de l'icon
										$('.user_form .editable .form-control-static').hide();
										$('#mapDivFix').hide();
										$('.editable ul li').hide();
										$('.user_form .editable .hidden_control,.user_form .form_submit').show();
										$('#gallery_grid li').show();
										ebro_google_map_change.init();
									});
									
									
									$('.save').click(function(e){
										e.preventDefault();
										$('.edit_form').removeClass('save');
										var data = textEditor.getData();
										$(".text_portfolio").attr('value',data);
								<?php if($user_right == 0){ ?>		
										data = detailEditor.getData();
										$(".detail_portfolio").attr('value',data);
										//alert(data);
								<?php } ?>
										var data = $('form').serialize();		
										$.post('php/admin.property.php?action=save&'+data,function(result){
											result = result.trim();
											 location.reload();
										});		
										console.log(data);
										/*$.post('php/admin.ownerUpdate.php?action=update&'+data,function(result){
											 location.reload();
										});
										//return false;
										*/
									});
									$('.edit_cancel').click(function(e){
										e.preventDefault();
										location.reload();
									});
									$('.view').click(function(e){
										e.preventDefault();
										var id = $(this).data('id');
										var action = $(this).data('action');
										$.post('php/admin.portfolioAction.php',{id:id,action:action},function(e){
											if(action == 'delete')
												window.location ="index.php";
											else if(action == 'show'){
												$('.view_hide').show(); 
												$('.view_show').hide();
											}else if(action == 'hide'){
												$('.view_show').show();
												$('.view_hide').hide();
											}
										});
									});
									// Google Map sans drag
									ebro_google_map= {
										init:function(){
											var lat='<?php echo $portfolio->lat_portfolio; ?>';
											var lng='<?php echo $portfolio->lng_portfolio; ?>';
											var map = new google.maps.Map(document.getElementById("mapDivFix"), {
													      center: new google.maps.LatLng(lat,lng),
													      zoom: 15,
													      mapTypeId: google.maps.MapTypeId.ROADMAP,
													      scrollwheel: false 
													      //size:(42,18)
													    });
										    
										    //
										    // initialize marker
										    //
										    var image = 'img/gmap.png';
										    var marker = new google.maps.Marker({
													      position: map.getCenter(),
													      draggable: false,
													      map: map,
													      icon: image,
													      html:'<strong>It\'s</strong><span>Here</span>'
													    });
										 
										}
									}
									//Google map avec drag
									ebro_google_map_change= {
										init:function(){
											var lat='<?php echo $portfolio->lat_portfolio; ?>';
											var lng='<?php echo $portfolio->lng_portfolio; ?>';
											var map = new google.maps.Map(document.getElementById("mapDivChange"), {
													      center: new google.maps.LatLng(lat,lng),
													      zoom: 15,
													      mapTypeId: google.maps.MapTypeId.ROADMAP,
													      scrollwheel: false 
													      //size:(42,18)
													    });
										    
										    //
										    // initialize marker
										    //
										    var image = 'img/gmap.png';
										    var marker = new google.maps.Marker({
													      position: map.getCenter(),
													      draggable: true,
													      map: map,
													      icon: image,
													      html:'<strong>It\'s</strong><span>Here</span>'
													    });
										    //
										    // intercept map and marker movements
										    //
										    google.maps.event.addListener(map, "idle", function() {
																	      marker.setPosition(map.getCenter());
																	      //$('.longitude').html(map.getCenter().lng().toFixed(6));
																	      $('#lng_portfolio').attr('value',map.getCenter().lng().toFixed(6));
																	      //$('.latitude').html(map.getCenter().lat().toFixed(6));
																	      $('#lat_portfolio').attr('value',map.getCenter().lat().toFixed(6));
																	     
															   			 });
										    google.maps.event.addListener(marker, "dragend", function(mapEvent) {
																		      map.panTo(mapEvent.latLng);
																		    });
										}
									}
									
									$('#addPicture').on('click',function(e){
										e.preventDefault();
										var id_portfolio= '<?php echo $portfolio->id_portfolio; ?>';
										var win = window.open("uploader.php?id_portfolio="+id_portfolio, "Upload Gallery for property n°"+id_portfolio, 'location=0,status=0,scrollbars=1,width=800,height=500');
            
									});
									//Hide/show adress
									$('#link_adress_portfolio').on('change',function(){
										//alert('hello');
										if($(this).val() == 0)
											$('.adress').show();
										else
											$('.adress').hide();
									});

									ebro_firstGallery={
										init:function(){
											//alert($('li').first().data('id'));
											$('#gallery_grid_fix li').first().css('background-color','#D9EDF7');
											$('#gallery_grid li').first().css('background-color','#D9EDF7');
											//alert('hello');
										},
										reset:function(){
											$('#gallery_grid_fix li').first().css('background-color','#FFFFFF');
											$('#gallery_grid li').first().css('background-color','#FFFFFF');
										}
									}
												
							});
            </script>
            <script type="text/javascript">
	jQuery(document).ready(function($){
		var tuto = "<?php echo $tuto; ?>";
		if(tuto == 3){
			var tutoJS = introJs().setOption("showBullets",false).setOption("exitOnOverlayClick",false);
			var i =1;
			tutoJS.start(".tuto_3");
			tutoJS.onexit(function() {
			 $.post('php/admin.SetTutorial.php',{action:'done',tuto_num:3},function(){

			 });
			});
			tutoJS.oncomplete(function() {
			   $.post('php/admin.SetTutorial.php',{action:'done',tuto_num:3},function(){

			 });
			   
			});
			tutoJS.onbeforechange(function(e) {  
				  if(i == 1)
				  	$('.edit_form').trigger( "click" );
				  if(i ==20)
				  	$('.save').trigger( "click" );
				  i++;
				});
		}
		
		});
	</script>
	<!--[if lte IE 9]>
		<script src="js/ie/jquery.placeholder.js"></script>
		<script>
			$(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	
    
	</body>
</html>