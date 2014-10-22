
						<div class="row">
							<div class="col-sm-3">
								<div class="box_stat box_pos">
									<img src="img/blank.png" alt="" class="img_ind">
									<h4>1 045$</h4>
									<small>Renting (7 days)</small>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="box_stat box_neg">
									<img src="img/blank.png" alt="" class="img_ind">
									<h4>5 000$</h4>
									<small>Sale (7 days)</small>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="box_stat box_neg">
									<img src="img/blank.png" alt="" class="img_ind">
									<h4>34</h4>
									<small>New users (7 days)</small>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="box_stat peity_chart">
									<div class="peity_wrapper">
										<div class="peity_bar_down">9,6,7,4,6,3</div>
									</div>
									<h4>135</h4>
									<small>Visit (24h)</small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">Visitor</h4>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-8">
												<div id="world_map_vector" style="width:100%;height:300px">
													<script>
														countries_data = {
															"US": 2320,
															"BR": 1945,
															"IN": 1779,
															"AU": 1486,
															"TR": 1024,
															"CN": 753
														};  
													</script>
												</div>
											</div>
											<div class="col-sm-4">
												<table class="table table-striped">
													<thead>
														<tr>
															<th>Country</th>
															<th class="col_small col_center">Visits</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><a href="#">United States</a></td>
															<td class="col_center">2320</td>
														</tr>
														<tr>
															<td><a href="#">Brazil</a></td>
															<td class="col_center">1945</td>
														</tr>
														<tr>
															<td><a href="#">India</a></td>
															<td class="col_center">1779</td>
														</tr>
														<tr>
															<td><a href="#">Australia</a></td>
															<td class="col_center">1486</td>
														</tr>
														<tr>
															<td><a href="#">Turkey</a></td>
															<td class="col_center">1024</td>
														</tr>
														<tr>
															<td><a href="#">China</a></td>
															<td class="col_center">753</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<?php include('new_user.php'); ?>

						<?php include('calendar.php'); ?>