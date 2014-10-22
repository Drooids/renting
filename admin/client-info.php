<?php session_start();
	if(isset($_SESSION['user']) && isset($_GET['owner'])){
		$owner_id = $_GET['owner'];
		$user = unserialize($_SESSION['user']);
		if($user->right > 0)
			header('Location: index.php');
		else
			$user_id =$user->user_id;

		include('php/class.load.php');
	}else{
		header('Location: login.html');
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
						$owner = new owner($_GET['owner']);
		?>			
						<!-- main content -->
			<div class="row">
				<div class="col-sm-3">
					<div class="box_stat box_pos">
						<img src="img/blank.png" alt="" class="img_ind">
						<h4><?php echo $owner->getAccount(); ?></h4>
						<small>Account</small>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="box_stat box_neg">
						<img src="img/blank.png" alt="" class="img_ind">
						<?php $reponse2 = $bdd->query("SELECT count(id_portfolio) as total FROM portfolio WHERE user_portfolio ='$owner_id' ORDER BY id_portfolio");
						$reponse2 = $reponse2->fetchAll();
						echo "<h4>".$reponse2[0]['total']."</h4>";
	   					?>
						
						<small>Number of properties</small>
					</div>
				</div>
		</div>
		<div class="row">
		
				<div class="col-sm-12">
					<div class="user_heading">
						<div class="row">
							
							<div class="col-sm-10">
								<div class="user_heading_info">
									<div class="user_actions pull-right">
										<a href="#" class="edit_form" data-toggle="tooltip" data-placement="top auto" title="Edit profile"><span class="icon-edit"></span></a>
										<a href="#" class="remove_user" data-toggle="tooltip" data-placement="top auto" title="Remove User"><span class="icon-remove"></span></a>
									</div>
									<h1><?php echo $owner->owner_lastname." ".$owner->owner_name;  ?></h1>
									<h2>Owner</h2>
								</div>
							</div>
						</div>
					</div>
					
					<!-- main content -->
					
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
											<form class="form-horizontal user_form">
											 <input type="hidden" name="owner" value="<?php echo $owner->id;?>">
												<h3 class="heading_a">General</h3>
												<div class="form-group">
													<label class="col-sm-2 control-label">Name</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $owner->owner_name; ?></p>
														<div class="hidden_control">
															<input type="text" name='owner_name' class="form-control" value="<?php echo $owner->owner_name; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Last name</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $owner->owner_lastname; ?></p>
														<div class="hidden_control">
															<input type="text" name ='owner_lastname' class="form-control" value="<?php echo $owner->owner_lastname; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Adress</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $owner->owner_adress; ?></p>
														<div class="hidden_control">
															<input type="text" name ='owner_adress' class="form-control" value="<?php echo $owner->owner_adress; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Nationality</label>
													<div class="col-sm-10 editable">
														<?php
														$nationality =$owner->owner_nationality;
															 	$reponse = $bdd->query("SELECT * FROM pays where prefixe = '$nationality'");
																$reponse = $reponse->fetchAll();
																$prefixe = $reponse[0]['prefixe'];
																$pays_name = $reponse[0]['name'];

														?>
														<p class="form-control-static inserNationality"><i class="flag-<?php echo $prefixe; ?>"></i><?php echo $pays_name; ?></p>
														<div class="hidden_control">
															<div class="sepH_a">
																<select id="s2_ext_value" class="form-control selectNationality" name='owner_nationality' >
																	<option value="AF">Afghanistan</option>
																	<option value="AX">Åland Islands</option>
																	<option value="AL">Albania</option>
																	<option value="DZ">Algeria</option>
																	<option value="AS">American Samoa</option>
																	<option value="AD">Andorra</option>
																	<option value="AO">Angola</option>
																	<option value="AI">Anguilla</option>
																	<option value="AQ">Antarctica</option>
																	<option value="AG">Antigua and Barbuda</option>
																	<option value="AR">Argentina</option>
																	<option value="AM">Armenia</option>
																	<option value="AW">Aruba</option>
																	<option value="AU">Australia</option>
																	<option value="AT">Austria</option>
																	<option value="AZ">Azerbaijan</option>
																	<option value="BS">Bahamas</option>
																	<option value="BH">Bahrain</option>
																	<option value="BD">Bangladesh</option>
																	<option value="BB">Barbados</option>
																	<option value="BY">Belarus</option>
																	<option value="BE">Belgium</option>
																	<option value="BZ">Belize</option>
																	<option value="BJ">Benin</option>
																	<option value="BM">Bermuda</option>
																	<option value="BT">Bhutan</option>
																	<option value="BO">Bolivia, Plurinational State of</option>
																	<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
																	<option value="BA">Bosnia and Herzegovina</option>
																	<option value="BW">Botswana</option>
																	<option value="BV">Bouvet Island</option>
																	<option value="BR">Brazil</option>
																	<option value="IO">British Indian Ocean Territory</option>
																	<option value="BN">Brunei Darussalam</option>
																	<option value="BG">Bulgaria</option>
																	<option value="BF">Burkina Faso</option>
																	<option value="BI">Burundi</option>
																	<option value="KH">Cambodia</option>
																	<option value="CM">Cameroon</option>
																	<option value="CA">Canada</option>
																	<option value="CV">Cape Verde</option>
																	<option value="KY">Cayman Islands</option>
																	<option value="CF">Central African Republic</option>
																	<option value="TD">Chad</option>
																	<option value="CL">Chile</option>
																	<option value="CN">China</option>
																	<option value="CX">Christmas Island</option>
																	<option value="CC">Cocos (Keeling) Islands</option>
																	<option value="CO">Colombia</option>
																	<option value="KM">Comoros</option>
																	<option value="CG">Congo</option>
																	<option value="CD">Congo, the Democratic Republic of the</option>
																	<option value="CK">Cook Islands</option>
																	<option value="CR">Costa Rica</option>
																	<option value="CI">Côte d'Ivoire</option>
																	<option value="HR">Croatia</option>
																	<option value="CU">Cuba</option>
																	<option value="CW">Curaçao</option>
																	<option value="CY">Cyprus</option>
																	<option value="CZ">Czech Republic</option>
																	<option value="DK">Denmark</option>
																	<option value="DJ">Djibouti</option>
																	<option value="DM">Dominica</option>
																	<option value="DO">Dominican Republic</option>
																	<option value="EC">Ecuador</option>
																	<option value="EG">Egypt</option>
																	<option value="SV">El Salvador</option>
																	<option value="GQ">Equatorial Guinea</option>
																	<option value="ER">Eritrea</option>
																	<option value="EE">Estonia</option>
																	<option value="ET">Ethiopia</option>
																	<option value="FK">Falkland Islands (Malvinas)</option>
																	<option value="FO">Faroe Islands</option>
																	<option value="FJ">Fiji</option>
																	<option value="FI">Finland</option>
																	<option value="FR">France</option>
																	<option value="GF">French Guiana</option>
																	<option value="PF">French Polynesia</option>
																	<option value="TF">French Southern Territories</option>
																	<option value="GA">Gabon</option>
																	<option value="GM">Gambia</option>
																	<option value="GE">Georgia</option>
																	<option value="DE">Germany</option>
																	<option value="GH">Ghana</option>
																	<option value="GI">Gibraltar</option>
																	<option value="GR">Greece</option>
																	<option value="GL">Greenland</option>
																	<option value="GD">Grenada</option>
																	<option value="GP">Guadeloupe</option>
																	<option value="GU">Guam</option>
																	<option value="GT">Guatemala</option>
																	<option value="GG">Guernsey</option>
																	<option value="GN">Guinea</option>
																	<option value="GW">Guinea-Bissau</option>
																	<option value="GY">Guyana</option>
																	<option value="HT">Haiti</option>
																	<option value="HM">Heard Island and McDonald Islands</option>
																	<option value="VA">Holy See (Vatican City State)</option>
																	<option value="HN">Honduras</option>
																	<option value="HK">Hong Kong</option>
																	<option value="HU">Hungary</option>
																	<option value="IS">Iceland</option>
																	<option value="IN">India</option>
																	<option value="ID">Indonesia</option>
																	<option value="IR">Iran, Islamic Republic of</option>
																	<option value="IQ">Iraq</option>
																	<option value="IE">Ireland</option>
																	<option value="IM">Isle of Man</option>
																	<option value="IL">Israel</option>
																	<option value="IT">Italy</option>
																	<option value="JM">Jamaica</option>
																	<option value="JP">Japan</option>
																	<option value="JE">Jersey</option>
																	<option value="JO">Jordan</option>
																	<option value="KZ">Kazakhstan</option>
																	<option value="KE">Kenya</option>
																	<option value="KI">Kiribati</option>
																	<option value="KP">Korea, Democratic People's Republic of</option>
																	<option value="KR">Korea, Republic of</option>
																	<option value="KW">Kuwait</option>
																	<option value="KG">Kyrgyzstan</option>
																	<option value="LA">Lao People's Democratic Republic</option>
																	<option value="LV">Latvia</option>
																	<option value="LB">Lebanon</option>
																	<option value="LS">Lesotho</option>
																	<option value="LR">Liberia</option>
																	<option value="LY">Libya</option>
																	<option value="LI">Liechtenstein</option>
																	<option value="LT">Lithuania</option>
																	<option value="LU">Luxembourg</option>
																	<option value="MO">Macao</option>
																	<option value="MK">Macedonia, the former Yugoslav Republic of</option>
																	<option value="MG">Madagascar</option>
																	<option value="MW">Malawi</option>
																	<option value="MY">Malaysia</option>
																	<option value="MV">Maldives</option>
																	<option value="ML">Mali</option>
																	<option value="MT">Malta</option>
																	<option value="MH">Marshall Islands</option>
																	<option value="MQ">Martinique</option>
																	<option value="MR">Mauritania</option>
																	<option value="MU">Mauritius</option>
																	<option value="YT">Mayotte</option>
																	<option value="MX">Mexico</option>
																	<option value="FM">Micronesia, Federated States of</option>
																	<option value="MD">Moldova, Republic of</option>
																	<option value="MC">Monaco</option>
																	<option value="MN">Mongolia</option>
																	<option value="ME">Montenegro</option>
																	<option value="MS">Montserrat</option>
																	<option value="MA">Morocco</option>
																	<option value="MZ">Mozambique</option>
																	<option value="MM">Myanmar</option>
																	<option value="NA">Namibia</option>
																	<option value="NR">Nauru</option>
																	<option value="NP">Nepal</option>
																	<option value="NL">Netherlands</option>
																	<option value="NC">New Caledonia</option>
																	<option value="NZ">New Zealand</option>
																	<option value="NI">Nicaragua</option>
																	<option value="NE">Niger</option>
																	<option value="NG">Nigeria</option>
																	<option value="NU">Niue</option>
																	<option value="NF">Norfolk Island</option>
																	<option value="MP">Northern Mariana Islands</option>
																	<option value="NO">Norway</option>
																	<option value="OM">Oman</option>
																	<option value="PK">Pakistan</option>
																	<option value="PW">Palau</option>
																	<option value="PS">Palestinian Territory, Occupied</option>
																	<option value="PA">Panama</option>
																	<option value="PG">Papua New Guinea</option>
																	<option value="PY">Paraguay</option>
																	<option value="PE">Peru</option>
																	<option value="PH">Philippines</option>
																	<option value="PN">Pitcairn</option>
																	<option value="PL">Poland</option>
																	<option value="PT">Portugal</option>
																	<option value="PR">Puerto Rico</option>
																	<option value="QA">Qatar</option>
																	<option value="RE">Réunion</option>
																	<option value="RO">Romania</option>
																	<option value="RU">Russian Federation</option>
																	<option value="RW">Rwanda</option>
																	<option value="BL">Saint Barthélemy</option>
																	<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
																	<option value="KN">Saint Kitts and Nevis</option>
																	<option value="LC">Saint Lucia</option>
																	<option value="MF">Saint Martin (French part)</option>
																	<option value="PM">Saint Pierre and Miquelon</option>
																	<option value="VC">Saint Vincent and the Grenadines</option>
																	<option value="WS">Samoa</option>
																	<option value="SM">San Marino</option>
																	<option value="ST">Sao Tome and Principe</option>
																	<option value="SA">Saudi Arabia</option>
																	<option value="SN">Senegal</option>
																	<option value="RS">Serbia</option>
																	<option value="SC">Seychelles</option>
																	<option value="SL">Sierra Leone</option>
																	<option value="SG">Singapore</option>
																	<option value="SX">Sint Maarten (Dutch part)</option>
																	<option value="SK">Slovakia</option>
																	<option value="SI">Slovenia</option>
																	<option value="SB">Solomon Islands</option>
																	<option value="SO">Somalia</option>
																	<option value="ZA">South Africa</option>
																	<option value="GS">South Georgia and the South Sandwich Islands</option>
																	<option value="SS">South Sudan</option>
																	<option value="ES">Spain</option>
																	<option value="LK">Sri Lanka</option>
																	<option value="SD">Sudan</option>
																	<option value="SR">Suriname</option>
																	<option value="SJ">Svalbard and Jan Mayen</option>
																	<option value="SZ">Swaziland</option>
																	<option value="SE">Sweden</option>
																	<option value="CH">Switzerland</option>
																	<option value="SY">Syrian Arab Republic</option>
																	<option value="TW">Taiwan, Province of China</option>
																	<option value="TJ">Tajikistan</option>
																	<option value="TZ">Tanzania, United Republic of</option>
																	<option value="TH">Thailand</option>
																	<option value="TL">Timor-Leste</option>
																	<option value="TG">Togo</option>
																	<option value="TK">Tokelau</option>
																	<option value="TO">Tonga</option>
																	<option value="TT">Trinidad and Tobago</option>
																	<option value="TN">Tunisia</option>
																	<option value="TR">Turkey</option>
																	<option value="TM">Turkmenistan</option>
																	<option value="TC">Turks and Caicos Islands</option>
																	<option value="TV">Tuvalu</option>
																	<option value="UG">Uganda</option>
																	<option value="UA">Ukraine</option>
																	<option value="AE">United Arab Emirates</option>
																	<option value="GB">United Kingdom</option>
																	<option value="US">United States</option>
																	<option value="UM">United States Minor Outlying Islands</option>
																	<option value="UY">Uruguay</option>
																	<option value="UZ">Uzbekistan</option>
																	<option value="VU">Vanuatu</option>
																	<option value="VE">Venezuela, Bolivarian Republic of</option>
																	<option value="VN">Viet Nam</option>
																	<option value="VG">Virgin Islands, British</option>
																	<option value="VI">Virgin Islands, U.S.</option>
																	<option value="WF">Wallis and Futuna</option>
																	<option value="EH">Western Sahara</option>
																	<option value="YE">Yemen</option>
																	<option value="ZM">Zambia</option>
																	<option value="ZW">Zimbabwe</option>	
																</select>
															</div>
														</div>
													</div>
												</div>
												<h3 class="heading_a">Contact info</h3>
												<div class="form-group">
													<label class="col-sm-2 control-label">Email</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $owner->owner_email; ?></p>
														<div class="hidden_control">
															<input type="text" name='owner_email' class="form-control" value="<?php echo $owner->owner_email; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Company</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $owner->owner_company; ?></p>
														<div class="hidden_control">
															<input type="text" name='owner_company' class="form-control" value="<?php echo $owner->owner_company; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Phone</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $owner->owner_phone; ?></p>
														<div class="hidden_control">
															<input type="text" name='owner_phone' class="form-control" value="<?php echo $owner->owner_phone; ?>">
														</div>
													</div>
												</div>
												<div class="form_submit clearfix" style="display:none">
													<div class="row">
														<div class="col-sm-10 col-sm-offset-2">
															<button class="btn btn-primary btn-lg save">Save all data</button>
														</div>
													</div>
												</div>
											</form>
										</div>
										<div class="col-sm-2">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">Action</h4>
												</div>
												<div class="panel-body"> 
													<p>
														<button class="btn btn-default btn-sm" type="button">Create Propertie</button>
													</p>
													<p>
														<button class="btn btn-default btn-sm" type="button">Get the Bill</button>
													</p>
													<p>
														<button class="btn btn-default btn-sm" type="button">Send Email</button>
													</p>
												</div>
											</div>
										</div>
						</div>
						
					</div>
					</div>
					<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">List of properties</h4>
									</div>
									<table id="" class=" dt_fixed_col table table-striped table-condensed">
										<thead>
											<tr>
												<th>id</th>
												<th>Name</th>
												<th>Adress</th>
												<th>District</th>
												<th>City</th>
												<th>Type</th>
												<th>Bed(s)/bath(s)</th>
												<th>Size</th>
												<th>Price</th>
												<th>Statut</th>
												<th>Date available</th>
												<th>Date added</th>
											</tr>
										</thead>
										<tbody>
										<?php
										$reponse = $bdd->query("SELECT * FROM portfolio WHERE user_portfolio ='$owner_id' ORDER BY id_portfolio");
	   									$reponse = $reponse->fetchAll();

										foreach ($reponse as $key => $value) {
											$portfolio = new portfolio($value['id_portfolio']);
											$id = $portfolio->id_portfolio;
											$name = $portfolio->nom_portfolio;

											$adress = $portfolio->adress_portfolio;
											$district = $portfolio->district_portfolio;
											$city = $portfolio->city_portfolio;

											$type = $portfolio->type_portfolio;
											$size = $portfolio->type_size_portfolio;
											$bath = $portfolio->bath_portfolio;
											$bed  = $portfolio->bed_portfolio;
											$price = $portfolio->price_portfolio;
											$statut = $portfolio->result_portfolio;
											switch ($statut) {
												case '0':
													$statut = "<span class='label label-success'>Ready</span>";
													break;
												case '0':
													$statut = "<span class='label label-warning'>In process</span>";
													break;
												case '0':
													$statut = "<span class='label label-default'>Rented</span>";
													break;
												case '0':
													$statut = "<span class='label label-default'>Sold</span>";
													break;
												
												default:
													# code...
													break;
											}
											$dateAvailable = $portfolio->date_available_portfolio;
											$datePortfolio = $portfolio->date_portfolio;

											$text = "<tr><td><a href='properties.php?id_portfolio=".$id."'>".$id."</a></td>";
											$text.="<td>".$name."</td>";
											$text.="<td>".$adress."</td>";
											$text.="<td>".$district."</td>";
											$text.="<td>".$city."</td>";
											$text.="<td>".$type."</td>";
											$text.="<td>".$bed." bed(s) / ".$bath." bath(s) </td>";
											$text.="<td>".$size."</td>";
											$text.="<td>".$price."</td>";
											$text.="<td>".$statut."</td>";
											$text.="<td>".$dateAvailable."</td>";
											$text.="<td>".$datePortfolio."</td></tr>";
											echo $text;
										}

										?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
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
												<th>Short name</th>
												<th>Long Name</th>
												<th>Calling Code</th>
												<th>ISO 2</th>
												<th>ccTLD</th>
												<th>UN Member</th>
											</tr>
										</thead>
										<tbody>
											<tr><td>1</td><td>Afghanistan</td><td>Islamic Republic of Afghanistan</td><td>93</td><td>AF</td><td>.af</td><td>yes</td></tr>
											<tr><td>2</td><td>Aland Islands</td><td>Åland Islands</td><td>358</td><td>AX</td><td>.ax</td><td>no</td></tr>
											<tr><td>3</td><td>Albania</td><td>Republic of Albania</td><td>355</td><td>AL</td><td>.al</td><td>yes</td></tr>
											<tr><td>4</td><td>Algeria</td><td>People's Democratic Republic of Algeria</td><td>213</td><td>DZ</td><td>.dz</td><td>yes</td></tr>
											<tr><td>5</td><td>American Samoa</td><td>American Samoa</td><td>1+684</td><td>AS</td><td>.as</td><td>no</td></tr>
											<tr><td>6</td><td>Andorra</td><td>Principality of Andorra</td><td>376</td><td>AD</td><td>.ad</td><td>yes</td></tr>
											<tr><td>7</td><td>Angola</td><td>Republic of Angola</td><td>244</td><td>AO</td><td>.ao</td><td>yes</td></tr>
											<tr><td>8</td><td>Anguilla</td><td>Anguilla</td><td>1+264</td><td>AI</td><td>.ai</td><td>no</td></tr>
											<tr><td>9</td><td>Antarctica</td><td>Antarctica</td><td>672</td><td>AQ</td><td>.aq</td><td>no</td></tr>
											<tr><td>10</td><td>Antigua and Barbuda</td><td>Antigua and Barbuda</td><td>1+268</td><td>AG</td><td>.ag</td><td>yes</td></tr>
											<tr><td>11</td><td>Argentina</td><td>Argentine Republic</td><td>54</td><td>AR</td><td>.ar</td><td>yes</td></tr>
											<tr><td>12</td><td>Armenia</td><td>Republic of Armenia</td><td>374</td><td>AM</td><td>.am</td><td>yes</td></tr>
											<tr><td>13</td><td>Aruba</td><td>Aruba</td><td>297</td><td>AW</td><td>.aw</td><td>no</td></tr>
											<tr><td>14</td><td>Australia</td><td>Commonwealth of Australia</td><td>61</td><td>AU</td><td>.au</td><td>yes</td></tr>
											<tr><td>15</td><td>Austria</td><td>Republic of Austria</td><td>43</td><td>AT</td><td>.at</td><td>yes</td></tr>
											<tr><td>16</td><td>Azerbaijan</td><td>Republic of Azerbaijan</td><td>994</td><td>AZ</td><td>.az</td><td>yes</td></tr>
											<tr><td>17</td><td>Bahamas</td><td>Commonwealth of The Bahamas</td><td>1+242</td><td>BS</td><td>.bs</td><td>yes</td></tr>
											<tr><td>18</td><td>Bahrain</td><td>Kingdom of Bahrain</td><td>973</td><td>BH</td><td>.bh</td><td>yes</td></tr>
											<tr><td>19</td><td>Bangladesh</td><td>People's Republic of Bangladesh</td><td>880</td><td>BD</td><td>.bd</td><td>yes</td></tr>
											<tr><td>20</td><td>Barbados</td><td>Barbados</td><td>1+246</td><td>BB</td><td>.bb</td><td>yes</td></tr>
											<tr><td>21</td><td>Belarus</td><td>Republic of Belarus</td><td>375</td><td>BY</td><td>.by</td><td>yes</td></tr>
											<tr><td>22</td><td>Belgium</td><td>Kingdom of Belgium</td><td>32</td><td>BE</td><td>.be</td><td>yes</td></tr>
											<tr><td>23</td><td>Belize</td><td>Belize</td><td>501</td><td>BZ</td><td>.bz</td><td>yes</td></tr>
											<tr><td>24</td><td>Benin</td><td>Republic of Benin</td><td>229</td><td>BJ</td><td>.bj</td><td>yes</td></tr>
											<tr><td>25</td><td>Bermuda</td><td>Bermuda Islands</td><td>1+441</td><td>BM</td><td>.bm</td><td>no</td></tr>
											<tr><td>26</td><td>Bhutan</td><td>Kingdom of Bhutan</td><td>975</td><td>BT</td><td>.bt</td><td>yes</td></tr>
											<tr><td>27</td><td>Bolivia</td><td>Plurinational State of Bolivia</td><td>591</td><td>BO</td><td>.bo</td><td>yes</td></tr>
											<tr><td>28</td><td>Bonaire, Sint Eustatius and Saba</td><td>Bonaire, Sint Eustatius and Saba</td><td>599</td><td>BQ</td><td>.bq</td><td>no</td></tr>
											<tr><td>29</td><td>Bosnia and Herzegovina</td><td>Bosnia and Herzegovina</td><td>387</td><td>BA</td><td>.ba</td><td>yes</td></tr>
											<tr><td>30</td><td>Botswana</td><td>Republic of Botswana</td><td>267</td><td>BW</td><td>.bw</td><td>yes</td></tr>
											<tr><td>31</td><td>Bouvet Island</td><td>Bouvet Island</td><td>NONE</td><td>BV</td><td>.bv</td><td>no</td></tr>
											<tr><td>32</td><td>Brazil</td><td>Federative Republic of Brazil</td><td>55</td><td>BR</td><td>.br</td><td>yes</td></tr>
											<tr><td>33</td><td>British Indian Ocean Territory</td><td>British Indian Ocean Territory</td><td>246</td><td>IO</td><td>.io</td><td>no</td></tr>
											<tr><td>34</td><td>Brunei</td><td>Brunei Darussalam</td><td>673</td><td>BN</td><td>.bn</td><td>yes</td></tr>
											<tr><td>35</td><td>Bulgaria</td><td>Republic of Bulgaria</td><td>359</td><td>BG</td><td>.bg</td><td>yes</td></tr>
											<tr><td>36</td><td>Burkina Faso</td><td>Burkina Faso</td><td>226</td><td>BF</td><td>.bf</td><td>yes</td></tr>
											<tr><td>37</td><td>Burundi</td><td>Republic of Burundi</td><td>257</td><td>BI</td><td>.bi</td><td>yes</td></tr>
											<tr><td>38</td><td>Cambodia</td><td>Kingdom of Cambodia</td><td>855</td><td>KH</td><td>.kh</td><td>yes</td></tr>
											<tr><td>39</td><td>Cameroon</td><td>Republic of Cameroon</td><td>237</td><td>CM</td><td>.cm</td><td>yes</td></tr>
											<tr><td>40</td><td>Canada</td><td>Canada</td><td>1</td><td>CA</td><td>.ca</td><td>yes</td></tr>
											<tr><td>41</td><td>Cape Verde</td><td>Republic of Cape Verde</td><td>238</td><td>CV</td><td>.cv</td><td>yes</td></tr>
											<tr><td>42</td><td>Cayman Islands</td><td>The Cayman Islands</td><td>1+345</td><td>KY</td><td>.ky</td><td>no</td></tr>
											<tr><td>43</td><td>Central African Republic</td><td>Central African Republic</td><td>236</td><td>CF</td><td>.cf</td><td>yes</td></tr>
											<tr><td>44</td><td>Chad</td><td>Republic of Chad</td><td>235</td><td>TD</td><td>.td</td><td>yes</td></tr>
											<tr><td>45</td><td>Chile</td><td>Republic of Chile</td><td>56</td><td>CL</td><td>.cl</td><td>yes</td></tr>
											<tr><td>46</td><td>China</td><td>People's Republic of China</td><td>86</td><td>CN</td><td>.cn</td><td>yes</td></tr>
											<tr><td>47</td><td>Christmas Island</td><td>Christmas Island</td><td>61</td><td>CX</td><td>.cx</td><td>no</td></tr>
											<tr><td>48</td><td>Cocos (Keeling) Islands</td><td>Cocos (Keeling) Islands</td><td>61</td><td>CC</td><td>.cc</td><td>no</td></tr>
											<tr><td>49</td><td>Colombia</td><td>Republic of Colombia</td><td>57</td><td>CO</td><td>.co</td><td>yes</td></tr>
											<tr><td>50</td><td>Comoros</td><td>Union of the Comoros</td><td>269</td><td>KM</td><td>.km</td><td>yes</td></tr>
											<tr><td>51</td><td>Congo</td><td>Republic of the Congo</td><td>242</td><td>CG</td><td>.cg</td><td>yes</td></tr>
											<tr><td>52</td><td>Cook Islands</td><td>Cook Islands</td><td>682</td><td>CK</td><td>.ck</td><td>some</td></tr>
											<tr><td>53</td><td>Costa Rica</td><td>Republic of Costa Rica</td><td>506</td><td>CR</td><td>.cr</td><td>yes</td></tr>
											<tr><td>54</td><td>Cote d'ivoire (Ivory Coast)</td><td>Republic of Côte D'Ivoire (Ivory Coast)</td><td>225</td><td>CI</td><td>.ci</td><td>yes</td></tr>
											<tr><td>55</td><td>Croatia</td><td>Republic of Croatia</td><td>385</td><td>HR</td><td>.hr</td><td>yes</td></tr>
											<tr><td>56</td><td>Cuba</td><td>Republic of Cuba</td><td>53</td><td>CU</td><td>.cu</td><td>yes</td></tr>
											<tr><td>57</td><td>Curacao</td><td>Curaçao</td><td>599</td><td>CW</td><td>.cw</td><td>no</td></tr>
											<tr><td>58</td><td>Cyprus</td><td>Republic of Cyprus</td><td>357</td><td>CY</td><td>.cy</td><td>yes</td></tr>
											<tr><td>59</td><td>Czech Republic</td><td>Czech Republic</td><td>420</td><td>CZ</td><td>.cz</td><td>yes</td></tr>
											<tr><td>60</td><td>Democratic Republic of the Congo</td><td>Democratic Republic of the Congo</td><td>243</td><td>CD</td><td>.cd</td><td>yes</td></tr>
											<tr><td>61</td><td>Denmark</td><td>Kingdom of Denmark</td><td>45</td><td>DK</td><td>.dk</td><td>yes</td></tr>
											<tr><td>62</td><td>Djibouti</td><td>Republic of Djibouti</td><td>253</td><td>DJ</td><td>.dj</td><td>yes</td></tr>
											<tr><td>63</td><td>Dominica</td><td>Commonwealth of Dominica</td><td>1+767</td><td>DM</td><td>.dm</td><td>yes</td></tr>
											<tr><td>64</td><td>Dominican Republic</td><td>Dominican Republic</td><td>1+809, 8</td><td>DO</td><td>.do</td><td>yes</td></tr>
											<tr><td>65</td><td>Ecuador</td><td>Republic of Ecuador</td><td>593</td><td>EC</td><td>.ec</td><td>yes</td></tr>
											<tr><td>66</td><td>Egypt</td><td>Arab Republic of Egypt</td><td>20</td><td>EG</td><td>.eg</td><td>yes</td></tr>
											<tr><td>67</td><td>El Salvador</td><td>Republic of El Salvador</td><td>503</td><td>SV</td><td>.sv</td><td>yes</td></tr>
											<tr><td>68</td><td>Equatorial Guinea</td><td>Republic of Equatorial Guinea</td><td>240</td><td>GQ</td><td>.gq</td><td>yes</td></tr>
											<tr><td>69</td><td>Eritrea</td><td>State of Eritrea</td><td>291</td><td>ER</td><td>.er</td><td>yes</td></tr>
											<tr><td>70</td><td>Estonia</td><td>Republic of Estonia</td><td>372</td><td>EE</td><td>.ee</td><td>yes</td></tr>
											<tr><td>71</td><td>Ethiopia</td><td>Federal Democratic Republic of Ethiopia</td><td>251</td><td>ET</td><td>.et</td><td>yes</td></tr>
											<tr><td>72</td><td>Falkland Islands (Malvinas)</td><td>The Falkland Islands (Malvinas)</td><td>500</td><td>FK</td><td>.fk</td><td>no</td></tr>
											<tr><td>73</td><td>Faroe Islands</td><td>The Faroe Islands</td><td>298</td><td>FO</td><td>.fo</td><td>no</td></tr>
											<tr><td>74</td><td>Fiji</td><td>Republic of Fiji</td><td>679</td><td>FJ</td><td>.fj</td><td>yes</td></tr>
											<tr><td>75</td><td>Finland</td><td>Republic of Finland</td><td>358</td><td>FI</td><td>.fi</td><td>yes</td></tr>
											<tr><td>76</td><td>France</td><td>French Republic</td><td>33</td><td>FR</td><td>.fr</td><td>yes</td></tr>
											<tr><td>77</td><td>French Guiana</td><td>French Guiana</td><td>594</td><td>GF</td><td>.gf</td><td>no</td></tr>
											<tr><td>78</td><td>French Polynesia</td><td>French Polynesia</td><td>689</td><td>PF</td><td>.pf</td><td>no</td></tr>
											<tr><td>79</td><td>French Southern Territories</td><td>French Southern Territories</td><td></td><td>TF</td><td>.tf</td><td>no</td></tr>
											<tr><td>80</td><td>Gabon</td><td>Gabonese Republic</td><td>241</td><td>GA</td><td>.ga</td><td>yes</td></tr>
											<tr><td>81</td><td>Gambia</td><td>Republic of The Gambia</td><td>220</td><td>GM</td><td>.gm</td><td>yes</td></tr>
											<tr><td>82</td><td>Georgia</td><td>Georgia</td><td>995</td><td>GE</td><td>.ge</td><td>yes</td></tr>
											<tr><td>83</td><td>Germany</td><td>Federal Republic of Germany</td><td>49</td><td>DE</td><td>.de</td><td>yes</td></tr>
											<tr><td>84</td><td>Ghana</td><td>Republic of Ghana</td><td>233</td><td>GH</td><td>.gh</td><td>yes</td></tr>
											<tr><td>85</td><td>Gibraltar</td><td>Gibraltar</td><td>350</td><td>GI</td><td>.gi</td><td>no</td></tr>
											<tr><td>86</td><td>Greece</td><td>Hellenic Republic</td><td>30</td><td>GR</td><td>.gr</td><td>yes</td></tr>
											<tr><td>87</td><td>Greenland</td><td>Greenland</td><td>299</td><td>GL</td><td>.gl</td><td>no</td></tr>
											<tr><td>88</td><td>Grenada</td><td>Grenada</td><td>1+473</td><td>GD</td><td>.gd</td><td>yes</td></tr>
											<tr><td>89</td><td>Guadaloupe</td><td>Guadeloupe</td><td>590</td><td>GP</td><td>.gp</td><td>no</td></tr>
											<tr><td>90</td><td>Guam</td><td>Guam</td><td>1+671</td><td>GU</td><td>.gu</td><td>no</td></tr>
											<tr><td>91</td><td>Guatemala</td><td>Republic of Guatemala</td><td>502</td><td>GT</td><td>.gt</td><td>yes</td></tr>
											<tr><td>92</td><td>Guernsey</td><td>Guernsey</td><td>44</td><td>GG</td><td>.gg</td><td>no</td></tr>
											<tr><td>93</td><td>Guinea</td><td>Republic of Guinea</td><td>224</td><td>GN</td><td>.gn</td><td>yes</td></tr>
											<tr><td>94</td><td>Guinea-Bissau</td><td>Republic of Guinea-Bissau</td><td>245</td><td>GW</td><td>.gw</td><td>yes</td></tr>
											<tr><td>95</td><td>Guyana</td><td>Co-operative Republic of Guyana</td><td>592</td><td>GY</td><td>.gy</td><td>yes</td></tr>
											<tr><td>96</td><td>Haiti</td><td>Republic of Haiti</td><td>509</td><td>HT</td><td>.ht</td><td>yes</td></tr>
											<tr><td>97</td><td>Heard Island and McDonald Islands</td><td>Heard Island and McDonald Islands</td><td>NONE</td><td>HM</td><td>.hm</td><td>no</td></tr>
											<tr><td>98</td><td>Honduras</td><td>Republic of Honduras</td><td>504</td><td>HN</td><td>.hn</td><td>yes</td></tr>
											<tr><td>99</td><td>Hong Kong</td><td>Hong Kong</td><td>852</td><td>HK</td><td>.hk</td><td>no</td></tr>
											<tr><td>100</td><td>Hungary</td><td>Hungary</td><td>36</td><td>HU</td><td>.hu</td><td>yes</td></tr>
											<tr><td>101</td><td>Iceland</td><td>Republic of Iceland</td><td>354</td><td>IS</td><td>.is</td><td>yes</td></tr>
											<tr><td>102</td><td>India</td><td>Republic of India</td><td>91</td><td>IN</td><td>.in</td><td>yes</td></tr>
											<tr><td>103</td><td>Indonesia</td><td>Republic of Indonesia</td><td>62</td><td>ID</td><td>.id</td><td>yes</td></tr>
											<tr><td>104</td><td>Iran</td><td>Islamic Republic of Iran</td><td>98</td><td>IR</td><td>.ir</td><td>yes</td></tr>
											<tr><td>105</td><td>Iraq</td><td>Republic of Iraq</td><td>964</td><td>IQ</td><td>.iq</td><td>yes</td></tr>
											<tr><td>106</td><td>Ireland</td><td>Ireland</td><td>353</td><td>IE</td><td>.ie</td><td>yes</td></tr>
											<tr><td>107</td><td>Isle of Man</td><td>Isle of Man</td><td>44</td><td>IM</td><td>.im</td><td>no</td></tr>
											<tr><td>108</td><td>Israel</td><td>State of Israel</td><td>972</td><td>IL</td><td>.il</td><td>yes</td></tr>
											<tr><td>109</td><td>Italy</td><td>Italian Republic</td><td>39</td><td>IT</td><td>.jm</td><td>yes</td></tr>
											<tr><td>110</td><td>Jamaica</td><td>Jamaica</td><td>1+876</td><td>JM</td><td>.jm</td><td>yes</td></tr>
											<tr><td>111</td><td>Japan</td><td>Japan</td><td>81</td><td>JP</td><td>.jp</td><td>yes</td></tr>
											<tr><td>112</td><td>Jersey</td><td>The Bailiwick of Jersey</td><td>44</td><td>JE</td><td>.je</td><td>no</td></tr>
											<tr><td>113</td><td>Jordan</td><td>Hashemite Kingdom of Jordan</td><td>962</td><td>JO</td><td>.jo</td><td>yes</td></tr>
											<tr><td>114</td><td>Kazakhstan</td><td>Republic of Kazakhstan</td><td>7</td><td>KZ</td><td>.kz</td><td>yes</td></tr>
											<tr><td>115</td><td>Kenya</td><td>Republic of Kenya</td><td>254</td><td>KE</td><td>.ke</td><td>yes</td></tr>
											<tr><td>116</td><td>Kiribati</td><td>Republic of Kiribati</td><td>686</td><td>KI</td><td>.ki</td><td>yes</td></tr>
											<tr><td>117</td><td>Kosovo</td><td>Republic of Kosovo</td><td>381</td><td>XK</td><td></td><td>some</td></tr>
											<tr><td>118</td><td>Kuwait</td><td>State of Kuwait</td><td>965</td><td>KW</td><td>.kw</td><td>yes</td></tr>
											<tr><td>119</td><td>Kyrgyzstan</td><td>Kyrgyz Republic</td><td>996</td><td>KG</td><td>.kg</td><td>yes</td></tr>
											<tr><td>120</td><td>Laos</td><td>Lao People's Democratic Republic</td><td>856</td><td>LA</td><td>.la</td><td>yes</td></tr>
											<tr><td>121</td><td>Latvia</td><td>Republic of Latvia</td><td>371</td><td>LV</td><td>.lv</td><td>yes</td></tr>
											<tr><td>122</td><td>Lebanon</td><td>Republic of Lebanon</td><td>961</td><td>LB</td><td>.lb</td><td>yes</td></tr>
											<tr><td>123</td><td>Lesotho</td><td>Kingdom of Lesotho</td><td>266</td><td>LS</td><td>.ls</td><td>yes</td></tr>
											<tr><td>124</td><td>Liberia</td><td>Republic of Liberia</td><td>231</td><td>LR</td><td>.lr</td><td>yes</td></tr>
											<tr><td>125</td><td>Libya</td><td>Libya</td><td>218</td><td>LY</td><td>.ly</td><td>yes</td></tr>
											<tr><td>126</td><td>Liechtenstein</td><td>Principality of Liechtenstein</td><td>423</td><td>LI</td><td>.li</td><td>yes</td></tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
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
            <script type="text/javascript">
            jQuery(document).ready(function($) {
            	  $(function() {
									ebro_contact_list.init();
								})

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
								ebro_validate.init();
								ebro_validate.extended();

            	/* [ ---- Ebro Admin - datatables ---- ] */

			    $(function() {
					ebro_datatables.basic();
					ebro_datatables.fixed_col();
					ebro_datatables.colReorder_visibility();
					ebro_datatables.scroll();
					ebro_datatables.table_tools();
					
					//* add placeholder to search input
			        $('.dataTables_filter input').each(function() {
			            $(this).attr("placeholder", "Search...");
			        })
				})
				
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

				  				var ownerCreateFlag =0;
							   $('body').on('click', '.owner-button', function(){
							    	if(ownerCreateFlag == 0){
							    		$('.owner-button').hide();
							    		$('.owner-see').show();
							    		ownerCreateFlag = 1;
							    	}else{
							    		$('.owner-see').hide();
							    		$('.owner-button').show();
							    		ownerCreateFlag = 0;
							    	}
							    });
							var nationality_small = <?php echo json_encode($prefixe); ?>;
							var nationality_big = <?php echo json_encode($pays_name); ?>;
								
								if(nationality_small != ""){
									//alert('hello');
											$('.selectNationality option').each(function(index){
											
												//alert(prefixe+" "+name_state);
												if($(this).attr('value') == nationality_small){
													$(this).attr("selected",true);
												}
											});
										}

							    function validateEmail(email) { 
						            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
						            return re.test(email);
						        } 


									//* edit form
									$('.edit_form').click(function(e) {
										e.preventDefault();
										
										$('.user_form .editable p').hide();
										$('.user_form .editable .hidden_control,.user_form .form_submit').show();
									});
									//* delete user
									$('.remove_user').click(function(e) {
										e.preventDefault();
										bootbox.dialog({
											message: '<div class="text-center lead">Are you sure?</div>',
											title: 'Deleting your account ?',
											buttons: {
												cancel: {
													label: "Cancel",
													className: "btn-link",
													callback: function() {
													}
												},
												confirm: {
													label: "Delete",
													className: "btn-primary",
													callback: function() {
														alert('User deleted!')
													}
												}
											}
										});
									});
									
									$('.save').click(function(e){
										e.preventDefault();
										var data = $('form').serialize();

										if(!validateEmail($("input[name='owner_email']").val())){
										                return false;
										            }					
										
										$.post('php/admin.ownerUpdate.php?action=update&'+data,function(result){
											 location.reload();
										});
										//return false;
									});

													// Flag systeme

													if($('#s2_ext_value').length) {
														
														function format(state) {
															//alert(state.id);
															if (!state.id) return state.text;
															return '<i class="flag-' + state.id + '"></i>' + state.text;
														}
														
														$('#s2_ext_value').select2({
															placeholder: "Select Country",
															formatResult: format,
															formatSelection: format,
															escapeMarkup: function(markup) { return markup; }
														});
														
														$("#s2_ext_us").click(function(e) { e.preventDefault(); $("#s2_ext_value").val("US").trigger("change"); });
														$("#s2_ext_br_gb").click(function(e) { e.preventDefault(); $("#s2_ext_value").val(["BR","GB"]).trigger("change"); });
													}
													//* remove default form-controll class
													setTimeout(function() {
														$('.select2-container').each(function() {
															$(this).removeClass('form-control')
														});
													});
												





														// fin du flag systeme
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