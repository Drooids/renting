<?php session_start();
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		$user_right = $_SESSION['user_right'];

		if($user_right > 0)
			header('Location: index.php');
		
		
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
		<!-- linecons -->        
			<link rel="stylesheet" href="css/linecons/style.css">
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
						
						<!-- main content -->
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Add Owner(s)</h4>
                                    </div>
                                    <div class="panel-body">
                                    <div class='owner-button'>
                                    	<div class="col-sm-3">
											<button class="btn btn-default" >Create</button>
										</div>
                                    </div>
                                    <div class='owner-create' style='display:none;'>
										<form action="#" id="parsley_reg">
											<div class="form_sep">
												<label for="reg_input_name" class="req">Name</label>
												<input type="text" id="reg_input_name" name="reg_input_name" class="form-control" data-required="true">
											</div>
											<div class="form_sep">
												<label for="reg_input_lastname" class="req">Last Name</label>
												<input type="text" id="reg_input_lastname" name="reg_input_lastname" class="form-control" data-required="true">
											</div>
											<div class="form_sep">
												<label for="reg_input_adress" class="req">Adress</label>
												<input type="text" id="reg_input_adress" name="reg_input_adress" class="form-control" data-required="true">
											</div>
											<div class="form_sep">
												<label for="reg_input_company" >Company name</label>
												<input type="text" id="reg_input_company" name="reg_input_company" class="form-control" >
											</div>
											<div class="form_sep">
												<label for="reg_input_email" class="req">Email</label>
												<input type="text" id="reg_input_email" name="reg_input_email" data-trigger="change" class="form-control" data-required="true" data-type="email">
											</div>
											<div class="form_sep">
												<label for="reg_input_phone" class="req">Phone</label>
												<input type="text" id="reg_input_phone" name="reg_input_phone" class="form-control" data-required="true">
											</div>
											<div class="form_sep">
												<label for="reg_textarea_message" >Commentary</label>
												<textarea name="reg_textarea_message" id="reg_textarea_message" cols="30" rows="4" class="form-control" data-minlength="40"></textarea>
											</div>
											<div class="form_sep">
											<label for="s2_ext_value" >Nationality</label>
                                                <div class="sepH_a">
													<select id="s2_ext_value" class="form-control" >
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
											<div class="form_sep">
												<button class="btn btn-default" id='createClient' type="submit">Create</button>
											</div>
										</form>
									</div>
                                    </div>
                                </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title pull-left">Owner List</h4>
										<input type="text" class="pull-right input-small form-control" placeholder="Find..." id="contact_search">
										<!--<select name="contact_list_filter" id="contact_list_filter" class="pull-right input-small form-control">
											<option value="filter_all">-- All --</option>
										</select>-->
									</div>
									<div id="contact_list" class="contact_list">
										<ul>
											<li> 
												<!--<h4 data-contact-filter="company_1">Company 1</h4>-->
												<ul>
													<?php
														$reponse = $bdd->query("SELECT * FROM owner ORDER BY owner_lastname");
	   													$reponse = $reponse->fetchAll();
	   													foreach ($reponse as $key => $value) {
	   														$owner = $value['id'];
	   															$reponse2 = $bdd->query("SELECT * FROM portfolio WHERE user_portfolio ='$owner' ORDER BY id_portfolio");
	   															$reponse2 = $reponse2->fetchAll();
	   															$text ="";
	   															foreach ($reponse2 as $key2 => $value2) {
	   																$text.="<a href='properties.php?id_portfolio=".$value2['id_portfolio']."'>".$value2['id_portfolio']."</a> ";
	   															}
	   														echo "<li><div class='media'>";
	   														echo "<img alt='' src='img/avatars/avatar_18.jpg' class='media-object img-thumbnail pull-left'>";
	   														echo "<div class='media-body'>";
	   														echo "<p class='contact_list_username'><a href='owner-info.php?owner=".$value['id']."'>".$value['owner_lastname']." ".$value['owner_name']."</a></p>";
	   														echo "<p class='contact_list_info'><span class='muted'>Phone:</span>".$value['owner_phone']."</p>";
	   														echo "<p class='contact_list_info'><span class='muted'>Email:</span>".$value['owner_email']."</p>";
	   														echo "<p class='contact_list_info'><span class='muted'>Properties:</span>".$text."</p>";
	   														echo "</div>";
	   														echo "</div></li>";
	   													}
													?>
												</ul>
											</li>
											
										</ul>
									</div>
									<div class="contact_list_no_result">
										<div class="alert alert-error text-center">
											No contacts to display.
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End main conntent -->

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
		<script src="js/jquery.quicksearch.js"></script>
		<!-- select2 -->
		<script src="js/lib/select2/select2.min.js"></script>
		<script src="js/lib/parsley/parsley.min.js"></script>
		<script type="text/javascript">
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
								ebro_select2 = {
									init: function() {
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
											}).val("AU").trigger("change");
											
											$("#s2_ext_us").click(function(e) { e.preventDefault(); $("#s2_ext_value").val("US").trigger("change"); });
											$("#s2_ext_br_gb").click(function(e) { e.preventDefault(); $("#s2_ext_value").val(["BR","GB"]).trigger("change"); });
										}
										//* remove default form-controll class
										setTimeout(function() {
											$('.select2-container').each(function() {
												$(this).removeClass('form-control')
											})
										})
									}
								}

								ebro_select2.init();

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


							    var ownerCreateFlag =0;
							   $('body').on('click', '.owner-button', function(){
							    	if(ownerCreateFlag == 0){
							    		$('.owner-button').hide();
							    		$('.owner-create').show();
							    		ownerCreateFlag = 1;
							    	}else{
							    		$('.owner-create').hide();
							    		$('.owner-button').show();
							    		ownerCreateFlag = 0;
							    	}
							    });
							   $('body').on('click','#createClient',function(){
							   		 if ( $('#parsley_reg').parsley('validate') ) {
								            $.post("php/admin.client.php?action=create", $('#parsley_reg').serialize(),function(result){
								            	var result =result.trim();
								            	alert(result);
								            });       
								        }
								        $('.owner-create').hide();
							    		$('.owner-button').show();
							    		ownerCreateFlag = 0;
								        return false;
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