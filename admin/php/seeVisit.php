<?php session_start();


   include('class.visite.php');
   include('class.portfolio.php');
   include('class.client.php');
   include('class.user.php');

if(isset($_GET['id_visite'])){
	$id = $_GET['id_visite'];
	$client_id = $_SESSION['client_id'];

	$reponse = $bdd->query("SELECT * FROM visite WHERE id = '$id' AND clients ='$client_id'");
	$reponse = $reponse->fetchAll();

	if(count($reponse) != 0){
		$visite = new visite($id);
		

?>
				<div class="user_heading">
							<div class="row">
								
								<div class="col-sm-12">
									<div class="user_heading_info">
										<div class="user_actions pull-right">
											<a href="#"class="back" data-toggle="tooltip" data-placement="top auto" title="Back"><span class="icon-arrow-left"></span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
				<div class="col-lg-10 col-sm-9" style='margin-top:15px;'>
					<form class="form-horizontal">
					 
						<h3 class="heading_a">Informations of the Visite</h3>
					<?php if($visite->portfolio != 0){ 
							$portfolio = new portfolio($visite->portfolio);
						?>
						<div class="form-group " >
							<label class="col-sm-2 control-label">Adress</label>
							<div class="col-sm-10 editable">
								<div id='mapDivFix' style='width:100%; height:300px; '></div>
								<div class="hidden_control">
									<div class="panel panel-default">
										<input type="hidden" id="lat_portfolio" name="lat_portfolio" value="<?php echo $portfolio->lat_portfolio; ?>">
										<input type="hidden" id="lng_portfolio" name="lng_portfolio" value="<?php echo $portfolio->lng_portfolio; ?>">
									</div>														
								</div>
							</div>
						</div>
					<?php } ?>
						<div class="form-group" >
							<label class="col-sm-2 control-label">Agent</label>
							<div class="col-sm-6 editable">
								<p class="form-control-static"><?php 
									if($visite->user_id != 0){
										$user = new user($visite->user_id);
										echo $user->last_name." ".$user->name;
									}else{
										echo "No Agent Name";
									}


								?>

								</p>
								
							</div>
						</div>
						<div class="form-group" >
							<label class="col-sm-2 control-label">Phone</label>
							<div class="col-sm-6 editable">
								<p class="form-control-static"><?php 
									if($visite->user_id != 0){
										$user = new user($visite->user_id);
										if($user->phone != "")
											echo $user->phone;
										else
											echo "No phone";
									}else{
										echo "No Phone";
									}


								?>

								</p>
								
							</div>
						</div>
						<div class="form-group" >
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-6 editable">
								<p class="form-control-static"><?php 
									if($visite->user_id != 0){
										$user = new user($visite->user_id);
										if($user->email != "")
											echo $user->email;
										else
											echo "No Email";
									}else{
										echo "No Email";
									}


								?>

								</p>
								
							</div>
						</div>
						<div class="form-group" >
							<label class="col-sm-2 control-label">Date</label>
							<div class="col-sm-6 editable">
								<p class="form-control-static"><?php 
									echo $visite->date_visite;


								?>

								</p>
								
							</div>
						</div>
						


						</form>
					</div>









						<script type="text/javascript">
						<?php if($visite->portfolio != 0){
							$portfolio = new portfolio($visite->portfolio);
							 ?>
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
									ebro_google_map.init();
									<?php } ?>
								

									$('.back').click(function(){
											$('.calendarDiv').show();
											$('.visiteDiv').hide().html('');
									})
						</script>
												


	<?php }else{

	}
}
?>