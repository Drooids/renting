<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name=viewport content="initial-scale=1, minimum-scale=1, width=device-width">
	<title>Home Saigon Admin Login</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/todc-bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/theme/color_1.css" id="theme">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<style>
		body {padding:80px 0 0}
		textarea, input[type="password"], input[type="text"], input[type="submit"] {-webkit-appearance: none}
		.navbar-brand {font:300 15px/18px 'Roboto', sans-serif}
		.login_wrapper {position:relative;width:380px;margin:0 auto}
		.login_panel {background:#f8f8f8;padding:20px;-webkit-box-shadow: 0 0 0 4px #ededed;-moz-box-shadow: 0 0 0 4px #ededed;box-shadow: 0 0 0 4px #ededed;border:1px solid #ddd;position:relative}
		.login_head {margin-bottom:20px}
		.login_head h1 {margin:0;font:300 20px/24px 'Roboto', sans-serif}
		.login_submit {padding:10px 0}
		.login_panel label a {font-size:11px;margin-right:4px}
		
		@media (max-width: 767px) {
			body {padding-top:40px}
			.navbar {display:none}
			.login_wrapper {width:100%;padding:0 20px}
		}
	</style>
	<!--[if lt IE 9]>
		<script src="js/ie/html5shiv.js"></script>
		<script src="js/ie/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<header class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Home Saigon</a>
			</div>
			<div class="pull-right">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#" class="login_toggle">Log In</a></li>
					<li><a href="#" class="register_toggle">Sign Up</a></li>
					<li><a href="#">Help</a></li>
				</ul>
			</div>
		</div>
    </header>

	<div class="login_wrapper">
		<div class="login_panel log_section">
			<div class="login_head">
				<h1>Log In to Home Saigon Admin</h1>
			</div>
			<form action="dashboard1.html" id="login_form">
				<div class="form-group">
					<label for="login_username">Email</label>
					<input type="text" id="login_username" name="login_username" class="form-control input-lg" data-required="true" data-minlength="2" data-required-message="Please enter a valid Username" value="Username" >
				</div>
				<div class="form-group">
					<label for="login_password">Password <a href="#" class="pull-right">Forgot password?</a></label>
					<input type="password" id="login_password" name="login_password" class="form-control input-lg" data-required="true" data-minlength="3" data-minlength-message="Password should have at least 3 characters." data-required-message="Please enter a valid Password" value="Password">
					<label class="checkbox"><input type="checkbox" name="login_remember" id="login_remember"> Remember me</label>
				</div>
				<div class="login_submit">
					<button class="btn btn-primary btn-block btn-lg">Log In</button>
				</div>
			</form>
		</div>
		<div class="login_panel reg_section" style="display:none">
			<div class="col-sm-12">
								<form id="wizard_a" action="#">
									
									<h4>Account</h4>
									<fieldset>
										<div class="row">
											<div class="col-sm-3">
												<div class="step_info">
													<h4>Account</h4>
													<p>Choose your account type</p>
												</div>
											</div>
											<div class="col-sm-9">
												<div class="form_sep">
													<label for="register_offer">Offer</label>
													<select id="register_offer" name='register_offer' class="form-control">
														<option value='basic'>BASIC (1 Appart/House + 10 Room)</option>
													</select>
												</div>
												<div class="form_sep">
													<label for="register_email" class="req">Email</label>
													<input id="register_email" name="register_email" type="text" class="form-control" data-type='email' data-required="true">
												</div>

												<div class="form_sep">
													<div class="form-group">
														<label for="register_password" class="req">Password</label>
														<input id="register_password" name="register_password" type="password" class="form-control" data-required="true" data-minlength="6" >
													</div>
													<label for="register_confirm" class="req">Confirm Password</label>
													<input id="register_confirm" name="register_confirm" type="password" class="form-control" data-equalto="#register_password" data-required="true" data-minlength="6">
												</div>
											</div>
										</div>
									</fieldset>
									
									<h4>Profile</h4>
									<fieldset>
										<div class="row">
											<div class="col-sm-9">
												<div class="step_info">
													<h4>Profile</h4>
													<p>Important informations about you</p>
											</div>
											<div class="col-sm-9">
												<div class="form_sep">
													<label for="register_name" class="req">First name</label>
													<input id="register_name" name="register_name" type="text" class="form-control" data-required="true">
												</div>
												<div class="form_sep">
													<label for="register_lastname" class="req">Last name</label>
													<input id="register_lastname" name="register_lastname" type="text" class="form-control" data-required="true" >
												</div>
												<div class="form_sep">
													<label for="register_phone" class="req">Phone</label>
													<input id="register_phone" name="register_phone" type="text" class="form-control" data-required="true" >
												</div>
												<div class="form_sep">
													<label for="register_address">Address</label>
													<input id="register_address" name="register_address" type="text" class="form-control">
												</div>  
											</div>
										</div>
									</fieldset>
									
									<h4>Terms & Conditions</h4>
									<fieldset>
										<div class="sepH_c">
<p>If you use <strong>Home-Saigon</strong>, you are regarded as having accepted the following General Terms and Conditions, which include our Privacy Policy and Discussion Forum Rules where relevant, so please read and abide by them.</p>

	<h3>Intellectual Property</h3>
	<p><strong>1.</strong> This Site is owned and operated by <strong>home-saigon</strong> Limited (also referred to in these Terms as "we" and "us") and the information and materials appearing on the Website are dedicated to its users, any unauthorized use of the content of the website can lead you to prosecution.</p>
	<p><strong>2.</strong> All software used on the Website and all Content included on it (including, without limitation, Website design, text, graphics, audio and video, and the selection and arrangement of the Content) is the property of us or our suppliers and is protected by international copyright laws.</p>
	<p><strong>3.</strong> None of the Content may be downloaded, copied, reproduced, republished, posted, transmitted, stored, sold or distributed without the prior written permission of the copyright holder, except that you may download one copy of extracts from the Website on any single computer for personal, non-commercial, home use only, provided that all copyright and proprietary notices are kept intact.</p>
	<p><strong>4.</strong> You are prohibited from modifying any of the Content or using any of the Content for any purpose other than as set out in these Terms (including, without limitation, on any other website or computer network). Requests to republish any of the Content and to use quotations or extracts from any part of our website or blog should be addressed to: admin@home-saigon.com</p>
	<p><strong>5.</strong> The Penguin name and logos are registered trademarks.</p>

	<h3>Links to Third Party Web Sites</h3>
	<p><strong>6.</strong> This Website may have links to other Internet websites that are controlled and maintained by third parties.
	 These websites may be operated by one of our divisions, associated or sister companies, or may display our name or brand or refer to us in some way.
	  These links are included solely for your convenience and do not constitute any endorsement by us of the websites linked or referred to.
	   We have no control over the content of any such websites.</p>

	<h3>Material you submit</h3>
	<p><strong>7.</strong> By communicating with this Website, you confirm that you:  
	(a) have all necessary legal rights, including, without limitation, intellectual property rights, to the material and information you transmit or send to this Website;  
	(b) take full responsibility for any material you transmit or send to this Website;  
	(c) will not transmit or send to this Website any unlawful, confidential, defamatory, obscene,
	 threatening, sexually or racially offensive, abusive, harmful or otherwise objectionable material; 
	 and  (d) subject to the Website's Privacy Policy, you authorize <strong>home-saigon</strong>, 
	 so far as the law permits, to use any such information and/or materials as it sees fit,
	  in any territory, in any media, in perpetuity.</p>

	<h3>Liability Disclaimer</h3>
	<p><strong>8.</strong> We provide this Website in good faith and do not make any representations or warranties of any kind, express or implied, in relation to any part, or all, of this Website or its Content, nor in relation to any part or all of any website to which this Website has a link. We hereby exclude all warranties and representations to the extent permitted by law. We give no guarantee that the activities and offers made available on this Website will always function as intended or that this Website will be free from infection by viruses or anything else that may be harmful or destructive.</p>
	<p><strong>9.</strong> To the extent permitted by law, we hereby disclaim all liability, however it may arise, in connection with any loss and/or damage that may occur in relation to, use of, or inability to use, or action taken or refrained from being taken as a result of using, all or any part of this Website or its Content, or any website to which this Website is linked.</p>

	<h3>Changes to these Conditions of Use</h3>
	<p><strong>10.</strong> We reserve the right to add or change these Terms and our Privacy Policy and Discussion Forum Rules where relevant, and agree to ensure that a note of the date and clause number of any such amendments will be included as part of these Terms. Any changes will be posted to the Website and it is your responsibility to ensure, from time to time, that you are aware of any such changes. Changes will become effective 24 hours after first posting and you will be deemed to have accepted any change if you continue to access the Website after that time.</p>

	<h3>Severance</h3>
	<p><strong>11.</strong> If any of these Terms is held by a court of law in any territory to be invalid, illegal or otherwise unenforceable, then, to the extent that it is held to be so, and with regard to the relevant territory only, that provision shall be severed and deleted from these Terms, provided that the remaining provisions of these Terms shall remain binding and enforceable and the severed provision shall also remain so in all other territories.</p>

	<h3>Business Rules of Home-Saigon</h3>
	<p><strong>12.</strong> Payments are not refundable. If you are asked to pay for the fees (other than Room) you agree to pay this fee for the use of <strong>home-saigon</strong> for a month. We do not guarantee you will actually rent your property, we will not proceed at any refund if you succeed to rent the property thanks to another service, if you rent the property within less than a month.</p>

	<p><strong>13.</strong> Rights of suspension. We keep the right to suspend your account if required. An unauthorized post, a complain about your service or a offer that doesn’t match the actual property are among the reason allowing us to suspend your account. </p>
	If it would happen, you would receive an email explaining the reason of the suspension and inviting you to contact us in the shortest term to solve this situation. 
	We will always be professional in our offer and invite you to proceed in the same way.  

	<p><strong>14.</strong> <strong>home-saigon</strong> cannot be held responsible for the behavior of customers or absence of them at a meeting. It is your responsibility or the responsibility of your team to manage your contacts, potential clients and clients.</p>

	<h3>The Blog of Home-Saigon</h3>
	<p><strong>15.</strong> <strong>home-saigon</strong> does not vet and is not responsible for any information which is posted on the Blog of Home-Saigon (together known as the "Public Areas"). Any content, recommendation or other information within the Public Areas is viewed and used by you at your own risk and <strong>home-saigon</strong> does not warrant, in any respect, the accuracy or reliability of any of the information posted in the Public Areas. The views expressed in the Public Areas are those of the individuals and are not necessarily those of <strong>home-saigon</strong>.</p>
	<p><strong>home-saigon</strong> does not necessarily moderate content before it is posted but retains the right to delete, move, edit, update or otherwise alter content in any way, at our discretion and without notice.</p>

	<p>By posting your comments or materials on the Public Areas, you grant us a non-exclusive, perpetual, royalty-free, world-wide licence to use, reproduce, modify, adapt, translate, publish, distribute to third party websites and display any content you submit to us in any format now known or later developed.</p>
	<p>If you do not want to grant us these rights, please do not submit your comments or materials to us.</p>
	<p>You may use the Public Areas only to post content that is proper and appropriate to such areas and you must not do any of the following:  * post unlawful, defamatory, obscene, threatening, offensive, harmful or otherwise objectionable content (this includes text, graphics, video, programs or audio);  </p>
	<p><strong>* </strong> any author attributions, legal notices or proprietary designations or labels in any content that is posted;  </p>
	<p><strong>* </strong> falsify the origin or source of content that is posted;  </p>
	<p><strong>* </strong> post content in a language other than English;  </p>
	<p><strong>* </strong> post content that violates the legal rights of others, in particular, material that contains the intellectual property rights of third parties unless you have obtained all necessary licences and consents to use such content;  </p>
	<p><strong>* </strong> advertise, promote or offer to sell any goods or services;  </p>
	<p><strong>* </strong>contribute content with the intention of committing or promoting an illegal act;  </p>
	<p><strong>* </strong> use inappropriate (e.g. vulgar or offensive) user names;  </p>
	<p><strong>* </strong>post content that contains viruses or that may damage <strong>home-saigon</strong>'s or another user's computer;  </p>
	<p><strong>* </strong> reveal any personal information about yourself or anyone else (for example, email address, telephone number or postal address).</p>
	<p><strong>home-saigon</strong>, shall be entitled at any time to delete, remove, or suspend the whole or any part of the Public Areas or any content posted on them without notice and without incurring any liability. </p>

	<p>If you find objectionable or offensive material in the Public Areas please let us know as soon as possible by emailing admin@home-saigon.com.</p>

										</p>
										</div>
										<div><label for="register_acceptTerms" class="checkbox inline"><input id="register_acceptTerms" name="register_acceptTerms" type="checkbox" data-required="true"> I agree with the Terms and Conditions.</label></div>
									</fieldset>
									
								</form>
							</div>
		</div>
	</div>
	
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
	<!-- jquery steps -->
			<script src="js/lib/jquery-steps/jquery.steps.min.js"></script>
	<!-- jquery cookie -->
			<script src="js/jquery_cookie.min.js"></script>
			<script src="js/lib/parsley/parsley.min.js"></script>
	<script>
	ChatLoader = { // Le chat Loader est modifié pour les iFrames
					init:function(){
						//alert(parent.length);
						if(parent.length)
							parent.$('body').append("<div class='DivChatLoaderImg'></div>");
						else
							$('body').append("<div class='DivChatLoaderImg'></div>");
					},
					showLoader: function(){
						var loader = "<div  class='ChatLoaderImg' style='position:fixed; background-color: black; opacity:0.5;position:fixed;left:0;bottom:0;width:100%;height:100%;z-index:500; overflow-y:hidden;'><img src='img/loader.gif' style='display: block;margin-left: auto;margin-right: auto; margin-top:20%;'></div></div>";
						if(parent.length){
							parent.$('.DivChatLoaderImg').html(loader);
							parent.$('html, body').css({'overflow': 'hidden','height': '100%'});
						}else{
							$('.DivChatLoaderImg').html(loader);
							$('html, body').css({'overflow': 'hidden','height': '100%'});
						}
						
					},
					hideLoader: function(){
						if(parent.length){
							parent.$('.DivChatLoaderImg').html("");
							parent.$('html, body').css({'overflow': 'auto','height': 'auto'});
						}else{
							$('.DivChatLoaderImg').html("");
							$('html, body').css({'overflow': 'auto','height': 'auto'});
						}
						
					}
				}

		$(function() {
		
		ChatLoader.init();
			//* validation
			$('#login_form').parsley({
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
			
			//* change form
			$('.form_toggle').on('click',function(e){
				$('.login_panel').slideToggle(function() {
					if($('.log_section').is(':visible')) {
						$('.login_toggle').closest('li').addClass('active').siblings('li').removeClass('active');
					} else {
						$('.register_toggle').closest('li').addClass('active').siblings('li').removeClass('active');
					}
				});
				e.preventDefault();
			});
			
			$('.login_toggle').on('click',function(e){
				if($('.log_section').is(':hidden')) {
					$('.reg_section').slideUp();
					$('.log_section').slideDown();
					$(this).closest('li').addClass('active').siblings('li').removeClass('active');
				}
				e.preventDefault();
			});
			$('.register_toggle').on('click',function(e){
				if($('.reg_section').is(':hidden')) {
					$('.log_section').slideUp();
					$('.reg_section').slideDown();
					$(this).closest('li').addClass('active').siblings('li').removeClass('active');
					$('.login_wrapper').css('width','600px');
					ebro_wizard.setHeight();
				}
				e.preventDefault();
			});
			
			// set theme from cookie
			if($.cookie('ebro_color') != undefined) {
				$('#theme').attr('href','css/theme/'+$.cookie('ebro_color')+'.css');
			}
			$('.btn-lg').on('click',function(){
				 if ( $('#login_form').parsley('validate') ) {
								            $.post("php/admin.login.php", $('#login_form').serialize(),function(result){
								            	var result =result.trim();
								            	if(result == "success")
								            		window.location.href = "index.php";
								            });       
								        }
				return false;
			});
			$(function() {
		ebro_wizard.init();
	});
	
	ebro_wizard = {
		init: function() {
			if($('#wizard_a').length) {
				var wizard_form = $('#wizard_a');
				//* wizard
				wizard_form.steps({
					headerTag: "h4",
					bodyTag: "fieldset",
					transitionEffect: "slideLeft",
					labels: {
						next: "Next",
						previous: "Previous",
						finish: "<i class=\"icon-ok\"></i> Submit"
					},
					titleTemplate: "<span class=\"number\">#index#</span> #title#",
					onStepChanging: function (event, currentIndex, newIndex) {
						
						// Allways allow previous action even if the current form is not valid!
						if (currentIndex > newIndex) {
							return true;
						}


                        var isFormValid = true;
						wizard_form.find('.body').filter(':visible').find('.parsley-validated').each(function() {
                            $(this).parsley('validate');
                            isFormValid = $(this).parsley("isValid");
                        });
                        return isFormValid;
					},
					onStepChanged: function (event, currentIndex, priorIndex) {
						//* resize wizard step to fit error messages
                        ebro_wizard.setHeight();
					},
					onFinishing: function (event, currentIndex) {
						var isFormValid = true;
						wizard_form.find('.body').filter(':visible').find('.parsley-validated').each(function() {
                            $(this).parsley('validate');
                            isFormValid = $(this).parsley("isValid");
                        });
                        return isFormValid;
					},
					onFinished: function (event, currentIndex) {
						var data =wizard_form.serialize();
						ChatLoader.showLoader();
						$.post('php/admin.signup.php?action=signup&'+data,function(e){
							e = e.trim();
							ChatLoader.hideLoader();
							window.location ='login.php';
						});
						console.log(wizard_form.serialize());
						//alert("Submitted!");
                        //* uncomment the following to submit form
                        //wizard_form.submit();
					}
				});
				//* validate
				wizard_form.parsley({
                    errors: {
						classHandler: function ( elem, isRadioOrCheckbox ) {
							if(isRadioOrCheckbox) {
								return $(elem).closest('div');
							}
						},
						container: function (element, isRadioOrCheckbox) {
							if(isRadioOrCheckbox) {
								return element.closest('div');
							}
						}
					},
					listeners: {
						onFieldError: function ( elem, constraints, ParsleyField ) {
							//* resize wizard step to fit error messages
                            ebro_wizard.setHeight();
						},
						onFieldSuccess: function ( elem, constraints, ParsleyField ) {
							//* resize wizard step to fit error messages
                            ebro_wizard.setHeight();
						}
					}
				});
				
                //* resize wizard step
				ebro_wizard.setHeight();
				
			}
		},
		setHeight: function() {
			setTimeout(function() {
				var cur_height = $('#wizard_a .body.current').filter(':visible').outerHeight();
				$('#wizard_a > .content').height(cur_height);
			},300);
		}
	}
//Affichage du signup grace à la redireciton
		<?php if(isset($_GET['action'])){
				if($_GET['action'] == 'signup'){
			 ?>
				if($('.reg_section').is(':hidden')) {
					$('.log_section').slideUp();
					$('.reg_section').slideDown();
					$('.register_toggle').closest('li').addClass('active').siblings('li').removeClass('active');
					$('.login_wrapper').css('width','600px');
					ebro_wizard.setHeight();
				}

	<?php 		}
			} 
		?>
		});
	</script>
</body>
</html>