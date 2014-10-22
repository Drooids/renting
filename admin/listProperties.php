<?php ob_start();
session_start();
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		$user_right = $_SESSION['user_right'];
		if($user_right == 0)
			header('Location: index.php');
		$tuto = null;
		include('php/class.load.php');
		include('php/class.tutorial.php');
		$reponse =$bdd->query("SELECT id FROM tutorial WHERE user_id='$user_id'");
		$reponse = $reponse->fetchAll();
				if(count($reponse) != 0){
					$id =$reponse[0]['id'];
					
					$tutorial = new tutorial($id);
					if($tutorial->check(2) == false){
						$tuto = 2;
						
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
							<!-- Colonne de gauche -->
		<div class="col-lg-2 col-sm-3">
			<div class="form-group">
				<div class="heading_a">Action(s)</div>
				<?php
				$reponse = $bdd->query("SELECT count(id_portfolio) AS total FROM portfolio WHERE user_ID ='$user_id' AND type_portfolio <>'room' AND actif_portfolio <> 0 ");
	   			$reponse = $reponse->fetchAll();
	   			$total = $reponse[0]['total'];
	   			echo "<p>";
	   			switch ($user_right) {
	   				case 0:
	   					echo "<button class='btn btn-primary propertie'><span class='icon-edit'></span> Propertie</button>";
	   					break;
	   				case 1:
	   					$max =1;
	   					if($total == 0) 
	   						echo "<button data-step='2' data-intro='Click here to create a propertie (If you need more, you can upgrade your account)' class='btn btn-primary propertie tuto_2'><span class='icon-edit'></span> Propertie (".$max." Left)</button>";
	   					else
	   						echo "<button data-step='2' data-intro='Click here to create a propertie (If you need more, you can upgrade your account)' class='btn btn-primary propertie tuto_2' disabled='disabled' ><span class='icon-edit'></span> Propertie (0 Left)</button>";
	   					break;
	   				case 2:
	   					$max = 5;
	   					$result = $max-$total;
	   					if($total == 0)
	   						echo "<button data-step='2' data-intro='Click here to create a propertie (If you need more, you can upgrade your account)' class='btn btn-primary propertie tuto_2'><span class='icon-edit'></span> Propertie (".$max." Left)</button>";
	   					else
	   						echo "<button data-step='2' data-intro='Click here to create a propertie (If you need more, you can upgrade your account)' class='btn btn-primary propertie tuto_2' disabled='disabled' ><span class='icon-edit'></span> Propertie (".$result." Left)</button>";
	   					
	   					break;
	   				
	   				default:
	   					# code...
	   					break;
	   			}
	   			echo "</p>";

	   			$reponse = $bdd->query("SELECT count(id_portfolio) AS total FROM portfolio WHERE user_ID ='$user_id' AND type_portfolio = 'room' AND actif_portfolio <> 0 ");
	   			$reponse = $reponse->fetchAll();
	   			$total = $reponse[0]['total'];
	   			echo "<p>";
	   			switch ($user_right) {
	   				case 0:
	   					echo "<button class='btn btn-primary room'><span class='icon-edit'></span> Room </button>";
	   					break;
	   				case 1:
	   					$max = 10;
	   					$result = $max-$total;
	   					if($total == 0)
	   						echo "<button data-step='3' data-intro='Click here to create a Room (If you need more, you can upgrade your account)' class='tuto_2 btn btn-primary room'><span class='icon-edit'></span> Room (".$max." Left)</button>";
	   					elseif($result > 0)
	   						echo "<button data-step='3' data-intro='Click here to create a Room (If you need more, you can upgrade your account)' class='tuto_2 btn btn-primary room' ><span class='icon-edit'></span> Room (".$result."Left)</button>";
	   					else
	   						echo "<button data-step='3' data-intro='Click here to create a Room (If you need more, you can upgrade your account)' class='tuto_2 btn btn-primary room' disabled='disabled' ><span class='icon-edit'></span> Room (0 Left)</button>";
	   					
	   					break;
	   				case 2:
	   					$max = 200;
	   					$result = $max-$total;
	   					if($total == 0)
	   						echo "<button data-step='3' data-intro='Click here to create a Room ' class='tuto_2 btn btn-primary room'><span class='icon-edit'></span> Room (".$max." Left)</button>";
	   					elseif($result > 0)
	   						echo "<button data-step='3' data-intro='Click here to create a Room ' class='tuto_2 btn btn-primary room' ><span class='icon-edit'></span> Room (".$result."Left)</button>";
	   					else
	   						echo "<button data-step='3' data-intro='Click here to create a Room ' class='tuto_2 btn btn-primary room' disabled='disabled' ><span class='icon-edit'></span> Room (0 Left)</button>";
	   					
	   					break;
	   				case 99:
	   					$max =3;
	   					$result = $max-$total;
	   					if($total == 0)
	   						echo "<button  data-step='3' data-intro='Click here to create a Room (If you need more, you can upgrade your account)' class='tuto_2 btn btn-primary room'><span class='icon-edit'></span> Room (".$max." Left)</button>";
	   					elseif($result > 0)
	   						echo "<button data-step='3' data-intro='Click here to create a Room (If you need more, you can upgrade your account)' class='tuto_2 btn btn-primary room' ><span class='icon-edit'></span> Room (".$result."Left)</button>";
	   					else
	   						echo "<button data-step='3' data-intro='Click here to create a Room (If you need more, you can upgrade your account)' class='tuto_2 btn btn-primary room' disabled='disabled' ><span class='icon-edit'></span> Room (".$result." Left)</button>";
	   					break;

	   				default:
	   					# code...
	   					break;
	   			}
				echo "</p>";
				?>
			</div>
		</div>
		<!-- Fin de la colonne de gauche -->
					<!-- Debut de la colonne de droite -->
							<div class="col-lg-10 col-sm-9">
								<div class="panel panel-default tuto_2" data-step='1' data-intro='This is the view to see all your properties & rooms. '>
									<div class="panel-heading">
										<h4 class="panel-title pull-left">Propertie(s) List</h4>
										<input type="text" class="pull-right input-small form-control" placeholder="Find..." id="contact_search">
										<!--<select name="contact_list_filter" id="contact_list_filter" class="pull-right input-small form-control">
											<option value="filter_all">-- All --</option>
										</select>-->
									</div>
									<div id="contact_list" class="contact_list" style='width-min:200px;'>
										<ul>
											<li> 
												<!--<h4 data-contact-filter="company_1">Company 1</h4>-->
												<ul>
													<?php
														$reponse = $bdd->query("SELECT * FROM portfolio WHERE user_ID ='$user_id' AND actif_portfolio <> 0");
	   													$reponse = $reponse->fetchAll();
	   													foreach ($reponse as $key => $value) {

	   														$id_portfolio =$value['id_portfolio'];

		   												 	 $object = new portfolio($id_portfolio);
									                         $reponse = $bdd->query("SELECT id_gallery FROM gallery where id_gallery='$object->link_portfolio'");
									                         $donnees2 = $reponse->fetchAll();
									                         $id_gallery=$donnees2[0]['id_gallery'];
									                         //Creation de la gallery
									                         $object_gallery = new gallery($id_gallery);
									                         $nom_fichier = $object_gallery->GetFirstImage();

	   														echo "<li><div class='media'>";
	   														echo "<img alt='' src='upload/uploads/".$id_portfolio."/".$nom_fichier."' width='150px' height='150px' class='media-object img-thumbnail pull-left'>";
	   														echo "<div class='media-body'>";
	   														echo "<p class='contact_list_username'><a href='properties.php?id_portfolio=".$value['id_portfolio']."'>".$value['nom_portfolio']." ".$value['district_portfolio']."</a></p>";
	   														//Bath
	   														if($value['bath_portfolio'] == 5)
	   															$bath = "5+";
	   														else
	   															$bath = $value['bath_portfolio'];
	   														//Bed
	   														if($value['bed_portfolio'] == 5)
	   															$bed = "5+";
	   														else
	   															$bed = $value['bed_portfolio'];
	   														echo "<p class='contact_list_info'><span class='muted'>Type:</span> <span class='label label-success'>".$value['type_portfolio']."</span></p>";
	   														echo "<p class='contact_list_info'><span class='muted'>Bath:</span> ".$bath."</p>";
	   														echo "<p class='contact_list_info'><span class='muted'>Beds:</span> ".$bed."</p>";
	   														echo "<p class='contact_list_info'><span class='muted'>Price:</span> ".$value['price_portfolio']."</p>";
	   														echo "</div>";
	   														echo "</div></li>";
	   													}
	   													if(count($reponse) == 0)
	   														echo "<div class='alert alert-error text-center'>No Propertie(s) to display.</div>";
													?>
												</ul>
											</li>
											
										</ul>
									</div>
									<div class="contact_list_no_result">
										<div class="alert alert-error text-center">
											No Propertie(s) to display.
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
	<script type="text/javascript" src="js/intro.js"></script>   
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


							    
							   $('body').on('click', '.propertie', function(){
							    	$.post('php/script.createPropertie.php',function(result){
							    		result = result.trim();
							    		if(result == 'error'){
							    			alert('error');
							    		}else{
							    			window.location = "properties.php?id_portfolio="+result
							    		}

							    	});
							    });

							   $('body').on('click', '.room', function(){
							    	$.post('php/script.createRoom.php',function(result){
							    		result = result.trim();
							    		if(result == 'error'){
							    			alert('error');
							    		}else{
							    			window.location = "properties.php?id_portfolio="+result
							    		}

							    	});
							    });
							   
						</script>
	<script type="text/javascript">
	jQuery(document).ready(function($){
		var tuto = "<?php echo $tuto; ?>";
		if(tuto == 2){
			var tutoJS = introJs().setOption("showBullets",false);
			var i =1;
			tutoJS.start(".tuto_2");
			tutoJS.onexit(function() {
			 $.post('php/admin.SetTutorial.php',{action:'done',tuto_num:2},function(){

			 });
			});
			tutoJS.oncomplete(function() {
			   $.post('php/admin.SetTutorial.php',{action:'done',tuto_num:2},function(){

			 });
			   
			});
			tutoJS.onbeforechange(function(e) {  
				  if(i == 3)
				  	tutoJS.exit();
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