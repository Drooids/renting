<article class="span12 data-block nested">

						<div class="data-container">
							<header>
								<h2>Management</h2>
								<ul class="data-header-actions tabs">
									<li class="demoTabs active"><a href="#one">Client</a></li>
									<li class="demoTabs"><a href="#two">Locataire</a></li>
									<li class="demoTabs "><a href="#three">Proprietaire</a></li>
								</ul>
							</header>
							<section class="tab-content">
							
								<!-- Tab #one -->
								<div class="tab-pane active" id="one">
								<!-- Second level tabs -->
									<div class="tabbable tabs-left">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#client_1" data-toggle="tab">Client 1 (20/08/13)</a></li>
											<li><a href="#client_2" data-toggle="tab">Client 2 (18/08/13)</a></li>
											<li><a href="#client_3" data-toggle="tab">Client 3 (16/08/13)</a></li>
											<li><a href="#client_4" data-toggle="tab">Client 4 (15/08/13)</a></li>
											<li><a href="#client_5" data-toggle="tab">Client 5 (13/08/13)</a></li>
										</ul>
										<div class="tab-note">
											<ul class="unstyled"><li><span class="icon-plus"></span> New client</li></ul>
										</div>
										<div class="tab-content">
<!-- ICI commence le client ! -->
											<div class="tab-pane active" id="client_1">
											<?php include("gestion_widget_client.php"); ?>
											</div>	
<!-- ICI termine le client -->
											<div class="tab-pane" id="client_2">
											<?php include("gestion_widget_client.php"); ?>
											</div>
										</div>
									</div>
									<!-- Second level tabs -->
								</div>
								<!-- /Tab #one -->
								
								<!-- Tab #two -->
								<div class="tab-pane " id="two">
								
									<!-- Second level tabs -->
									<div class="tabbable tabs-left">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#loc_1" data-toggle="tab">Locataire 1</a></li>
											<li><a href="#loc_2" data-toggle="tab">Locataire 2</a></li>
										</ul>
										<div class="tab-note">
											<p>Liste des locataires</p>
										</div>
										<div class="tab-content">
											<div class="tab-pane active" id="loc_1">
												<h3>Locataire 1</h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse felis a leo tempor elementum. Nunc odio quam, imperdiet sit amet imperdiet non, ultricies ut ligula. In feugiat rhoncus nunc non sagittis. Nam non quam quam, ut imperdiet lectus. Phasellus vestibulum metus egestas arcu gravida ut interdum lorem mollis. Praesent ut est mi, at ornare nisl. Vestibulum tincidunt ornare ullamcorper.</p>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse felis a leo tempor elementum. Nunc odio quam, imperdiet sit amet imperdiet non, ultricies ut ligula. In feugiat rhoncus nunc non sagittis. Nam non quam quam, ut imperdiet lectus. Phasellus vestibulum metus egestas arcu gravida ut interdum lorem mollis. Praesent ut est mi, at ornare nisl. Vestibulum tincidunt ornare ullamcorper.</p>
											</div>
											<div class="tab-pane" id="loc_2">
												<h3>Locataire 2</h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse felis a leo tempor elementum. Nunc odio quam, imperdiet sit amet imperdiet non, ultricies ut ligula. In feugiat rhoncus nunc non sagittis. Nam non quam quam, ut imperdiet lectus. Phasellus vestibulum metus egestas arcu gravida ut interdum lorem mollis. Praesent ut est mi, at ornare nisl. Vestibulum tincidunt ornare ullamcorper.</p>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse felis a leo tempor elementum. Nunc odio quam, imperdiet sit amet imperdiet non, ultricies ut ligula. In feugiat rhoncus nunc non sagittis. Nam non quam quam, ut imperdiet lectus. Phasellus vestibulum metus egestas arcu gravida ut interdum lorem mollis. Praesent ut est mi, at ornare nisl. Vestibulum tincidunt ornare ullamcorper.</p>
											</div>
										</div>
									</div>
									<!-- Second level tabs -->
										
								</div>
								<!-- /Tab #two -->
								
								<!-- Tab #three -->
								<div class="tab-pane " id="three">
								
									<!-- Second level tabs -->
									<div class="tabbable tabs-left">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#prop_1" data-toggle="tab">Proprietaire 1</a></li>
											<li><a href="#prop_2" data-toggle="tab">Proprietaire 2</a></li>
										</ul>
										<div class="tab-note">
											<p>Liste des Proprietaires</p>
										</div>
										<div class="tab-content">
											<div class="tab-pane active" id="prop_1">
											<?php include("gestion_widget_proprio.php"); ?>
											</div>
											<div class="tab-pane" id="prop_2">
											<?php include("gestion_widget_proprio.php"); ?>
											</div>
										</div>
									</div>
									<!-- Second level tabs -->
										
								</div>
								<!-- /Tab #three -->
							</section>
						</div>
					</article>

