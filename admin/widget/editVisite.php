<?php session_start();

if (!class_exists('visite')) {
   include('./php/class.visite.php');
   include('./php/class.portfolio.php');
   //echo "included";
}
if(isset($_GET['id_visite'])){
	$id = $_GET['id_visite'];
	$user_id = $_SESSION['user_id'];

	$reponse = $bdd->query("SELECT * FROM visite WHERE id = '$id' AND user_id ='$user_id'");
	$reponse = $reponse->fetchAll();

	if(count($reponse) != 0){
		$visite = new visite($id);
		$portfolio = new portfolio($visite->portfolio);

?>
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
												


	<?php }else{

	}
}
?>