<?php session_start();
include('php/class.load.php');
$id = $_SESSION['client_id'];

$client = new client($id);
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home Saigon - My Profile</title>
		
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
	<body class="boxed pattern_1 sidebar_narrow">
		
		<div id="wrapper_all">						
                
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
						
						<!-- main content -->
						<div class="row">
							<div class="col-sm-12">
								<div class="user_heading">
									<div class="row">
										<div class="col-sm-2 hidden-xs">
											<img src="img/user_avatar_lg.png" alt="" class="img-thumbnail user_avatar">
										</div>
										<div class="col-sm-10">
											<div class="user_heading_info">
												<div class="user_actions pull-right">
													<a href="#" class="edit_form" data-toggle="tooltip" data-placement="top auto" title="Edit profile"><span class="icon-edit"></span></a>
													<a href="#" class="remove_user" data-toggle="tooltip" data-placement="top auto" title="Remove User"><span class="icon-remove"></span></a>
												</div>
												<h1><?php echo $client->last_name." ".$client->name;  ?></h1>
												<h2>Costumer</h2>
											</div>
										</div>
									</div>
								</div>
								<div class="user_content">
									<div class="row">
										<div class="col-sm-10 col-sm-offset-2">
											<form class="form-horizontal user_form">
											 <input type="hidden" name="user" value="1">
												<h3 class="heading_a">General</h3>
												<div class="form-group">
													<label class="col-sm-2 control-label">Name</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $client->name; ?></p>
														<div class="hidden_control">
															<input type="text" name='name' class="form-control" value="<?php echo $client->name; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Last name</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $client->last_name; ?></p>
														<div class="hidden_control">
															<input type="text" name ='last_name' class="form-control" value="<?php echo $client->last_name; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Nationality</label>
													<div class="col-sm-10 editable">
														<?php
														$nationality =$client->nationality;
															 	$reponse = $bdd->query("SELECT * FROM pays where prefixe = '$nationality'");
																$reponse = $reponse->fetchAll();
																$prefixe = $nationality;
																$pays_name = $reponse[0]['name'];

														?>
														<p class="form-control-static inserNationality"><i class="flag-<?php echo $prefixe; ?>"></i><?php echo $pays_name; ?></p>
														<div class="hidden_control">
															<div class="sepH_a">
																<select id="s2_ext_value" class="form-control selectNationality" name='nationality' >
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
														<p class="form-control-static"><?php echo $client->email; ?></p>
														<div class="hidden_control">
															<input type="text" name='email' class="form-control" value="<?php echo $client->email; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Phone</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $client->phone; ?></p>
														<div class="hidden_control">
															<input type="text" name='phone' class="form-control" value="<?php echo $client->phone; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Skype</label>
													<div class="col-sm-10 editable">
														<p class="form-control-static"><?php echo $client->skype; ?></p>
														<div class="hidden_control">
															<input type="text" name='skype' class="form-control" value="<?php echo $client->skype; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Newsletter</label>
													<div class="col-sm-10 editable">
													<?php 
														$newsletter = $client->newsletter; 
														if($newsletter == 1){
													?>
													<p class="form-control-static"><span class="label label-success">Yes</span></p>
														<div class="hidden_control">
															<div class="make-switch switch-small switch-theme" data-on-label="Yes" data-off-label="No">
																<input type="checkbox" name='newsletter' checked >
															</div>
														</div>
													<?php
														}else{

													?>
													<p class="form-control-static"><span class="label label-success">No</span></p>
														<div class="hidden_control">
															<div class="make-switch switch-small switch-theme" data-on-label="Yes" data-off-label="No">
																<input type="checkbox" name='newsletter' >
															</div>
														</div>
													<?php
													}

													?>
														
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
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

				<nav id="sidebar">
					<ul id="icon_nav_v" class="side_ico_nav">
						<li>
							<a href="#" title="Dashboard"><i class="icon-home"></i></a>
						</li>
						<li>             
							<a href="#" title="Content"><i class="icon-edit"></i></a>
						</li>
						<li>             
							<a href="#" title="Users"><i class="icon-group"></i></a>
						</li>
						<li>             
							<a href="#"><i class="icon-tasks"></i></a>
						</li>
						<li class="active">             
							<a href="#"><i class="icon-beaker"></i></a>
						</li>
						<li>             
							<a href="#"><i class="icon-book"></i></a>
						</li>
						<li>             
							<a href="#"><i class="icon-tag"></i></a>
						</li>
						<li>             
							<a href="#"><i class="icon-wrench"></i></a>
						</li>
					</ul>
				</nav>
			</section>
			<div id="footer_space"></div>
		</div>

      
        
	<!-- jQuery -->
		<script src="js/jquery.min.js"></script>
	<!-- bootstrap framework -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- jQuery resize event -->
		<script src="js/jquery.ba-resize.min.js"></script>
	<!-- jquery cookie -->
		<script src="js/jquery_cookie.min.js"></script>
	<!-- retina ready -->
		<script src="js/retina.min.js"></script>
	<!-- tinyNav -->
		<script src="js/tinynav.js"></script>
	<!-- sticky sidebar -->
		<script src="js/jquery.sticky.js"></script>
	<!-- Navgoco -->
		<script src="js/lib/navgoco/jquery.navgoco.min.js"></script>
	<!-- jMenu -->
		<script src="js/lib/jMenu/js/jMenu.jquery.js"></script>
	<!-- typeahead -->
        <script src="js/lib/typeahead.js/typeahead.min.js"></script>
        <script src="js/lib/typeahead.js/hogan-2.0.0.js"></script>
	
		<script src="js/ebro_common.js"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) {

			


			var nationality_small = <?php echo json_encode($prefixe); ?>;
			var nationality_big = <?php echo json_encode($pays_name); ?>;
			if(nationality_small != ""){
				$('.selectNationality option').each(function(index){
				
					//alert(prefixe+" "+name_state);
					if($(this).attr('value') == nationality_small){
						$(this).attr("selected",true);
					}
				});
			}

		});



		/* [ ---- Home-Saigon Admin - user profile ---- ] */

		    $(function() {
		    
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

					if(!validateEmail($("input[name='email']").val())){
					                return false;
					            }					
					
					$.post('php/script.client_update.php?'+data,function(result){
						 location.reload();
					});
					//return false;
				});
				// Flag systeme


			if($('#s2_basic').length) {
				$('#s2_basic').select2({
					allowClear: true,
					placeholder: "Select..."
				});
			}
			if($('#s2_multi_value').length) {
				$('#s2_multi_value').select2({
					placeholder: "Select..."
				});
			}
			if($('#s2_tokenization').length) {
				$('#s2_tokenization').select2({
					placeholder: "Select...",
					tags:["red", "green", "blue", "black", "orange", "white"],
					tokenSeparators: [",", " "]
				});
			}
			if($('#s2_ext_value').length) {
				
				function format(state) {
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