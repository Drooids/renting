<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ebro Admin Template v1.0</title>
		
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
	<body class="boxed pattern_1 sidebar_narrow sidebar_hidden">
		
		<div id="wrapper_all">
			<header id="top_header">
				<div class="container">
					<div class="row">
						<div class="col-xs-6 col-sm-2">
							<a href="dashboard1.html" class="logo_main" title="Ebro Admin Template:"><img src="img/logo_main.png" alt=""></a>
						</div>
						<div class="col-sm-push-4 col-sm-3 text-right hidden-xs">
							<div class="notification_dropdown dropdown">
								<a href="#" class="notification_icon dropdown-toggle" data-toggle="dropdown">
									<span class="label label-danger">8</span>
									<i class="icon-comment-alt icon-2x"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<div class="dropdown_heading">Comments</div>
										<div class="dropdown_content">
											<ul class="dropdown_items">
												<li>
													<h3><span class="small_info">12:43</span><a href="#">Lorem ipsum dolor&hellip;</a></h3>
													<p>Lorem ipsum dolor sit amet&hellip;</p>
												</li>
												<li>
													<h3><span class="small_info">Today</span><a href="#">Lorem ipsum dolor&hellip;</a></h3>
													<p>Lorem ipsum dolor sit amet&hellip;</p>
												</li>
												<li>
													<h3><span class="small_info">14 Aug</span><a href="#">Lorem ipsum dolor&hellip;</a></h3>
													<p>Lorem ipsum dolor sit amet&hellip;</p>
												</li>
											</ul>
										</div>
										<div class="dropdown_footer"><a href="#" class="btn btn-sm btn-default">Show all</a></div>
									</li>
								</ul>
							</div>
							<div class="notification_separator"></div>
							<div class="notification_dropdown dropdown">
								<a href="#" class="notification_icon dropdown-toggle" data-toggle="dropdown">
									<span class="label label-danger">12</span>
									<i class="icon-envelope-alt icon-2x"></i>
								</a>
								<ul class="dropdown-menu dropdown-menu-wide">
									<li>
										<div class="dropdown_heading">Messages</div>
										<div class="dropdown_content">
											<ul class="dropdown_items">
												<li>
													<h3><a href="#">Lorem ipsum dolor sit amet</a></h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
													<p class="large_info">Sean Walter, 24.05.2014</p>
													<i class="icon-exclamation-sign indicator"></i>
												</li>
												<li>
													<h3><a href="#">Lorem ipsum dolor&hellip;</a></h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aliquam assumenda&hellip;</p>
													<p class="large_info">Sean Walter, 24.05.2014</p>
												</li>
												<li>
													<h3><a href="#">Lorem ipsum dolor&hellip;</a></h3>
													<p>Lorem ipsum dolor sit amet, consectetur&hellip;</p>
													<p class="large_info">Sean Walter, 24.05.2014</p>
													<i class="icon-exclamation-sign indicator"></i>
												</li>
											</ul>
										</div>
										<div class="dropdown_footer">
											<a href="#" class="btn btn-sm btn-default">Show all</a>
											<div class="pull-right dropdown_actions">
												<a href="#"><i class="icon-refresh"></i></a>
												<a href="#"><i class="icon-cog"></i></a>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-xs-6 col-sm-push-4 col-sm-3">
							<div class="pull-right dropdown">
								<a href="#" class="user_info dropdown-toggle" title="Jonathan Hay" data-toggle="dropdown">
									<img src="img/user_avatar.png" alt="">
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="user_profile.html">Profile</a></li>
									<li><a href="javascript:void(0)">Another action</a></li>
									<li><a href="login_page.html">Log Out</a></li>
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-sm-pull-6 col-sm-4">
							<form class="main_search">
								<input type="text" id="search_query" name="search_query" class="typeahead form-control">
								<button type="submit" class="btn btn-primary btn-xs"><i class="icon-search icon-white"></i></button>
							</form> 
						</div>
					</div>
				</div>
			</header>						
			
			<!-- mobile navigation -->
			<nav id="mobile_navigation"></nav>
			
			<section id="breadcrumbs">
				<div class="container">
					<ul>
						<li><a href="#">Ebro Admin</a></li>
						<li><a href="#">Other Pages</a></li>
						<li><span>Chat</span></li>						
					</ul>
				</div>
			</section>
                
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
						
						<!-- main content -->
						<div class="chat_app">
							<div class="row">
								<div class="col-sm-8 col-md-9">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title pull-left">Chatroom</h4>
											<div class="btn-group btn-group-sm pull-right">
												<button class="btn btn-default" type="button" data-toggle="tooltip" data-container="body" data-title="New Chat"><span class="icon-comments"></span></button>
												<button class="btn btn-default" type="button" data-toggle="tooltip" data-container="body" data-title="Settings"><span class="icon-cog"></span></button>
												<button class="btn btn-default" type="button" data-toggle="tooltip" data-container="body" data-title="Close Chat"><span class="icon-remove"></span></button>
											</div>
										</div>
										<div class="chat_messages">
																						<div class="chat_message ch_right">
												<img alt="" src="img/avatars/avatar_18.jpg" class="img-thumbnail">
												<div class="chat_message_body">
													<p>Aliquam alias itaque quaerat. Consequatur fugit quaerat unde earum ex repudiandae sint. Nostrum impedit ut aut illo et qui. Eum sed mollitia dolor commodi.</p>
													<p class="chat_message_date">19:39:19, 14.06.13</p>
												</div>
											</div>
											<div class="chat_message">
												<img alt="" src="img/avatars/avatar_14.jpg" class="img-thumbnail">
												<div class="chat_message_body">
													<p>Eligendi ea rem sint aut. Sed ipsa illum dolores explicabo amet corporis officiis. Neque quos nihil aliquam perspiciatis ut. Harum voluptatum asperiores eos hic enim itaque. Et autem soluta aut nemo.</p>
													<p class="chat_message_date">18:49:14, 12.05.12</p>
												</div>
											</div>
											<div class="chat_message ch_right">
												<img alt="" src="img/avatars/avatar_12.jpg" class="img-thumbnail">
												<div class="chat_message_body">
													<p>Incidunt molestiae dolores nemo possimus. Inventore sint quasi aperiam aut voluptatem. Aspernatur consequuntur explicabo voluptatem consequatur sed est sunt.</p>
													<p class="chat_message_date">15:58:45, 24.03.84</p>
												</div>
											</div>
											<div class="chat_message">
												<img alt="" src="img/avatars/avatar_10.jpg" class="img-thumbnail">
												<div class="chat_message_body">
													<p>Et odio magni voluptatem. Dolorem rerum dolorem dolor ut consequuntur et impedit delectus. Vel minima harum dolorem reiciendis commodi. Eum ea reiciendis magni dolores et ad.</p>
													<p class="chat_message_date">13:48:18, 23.05.13</p>
												</div>
											</div>
											<div class="chat_message ch_right">
												<img alt="" src="img/avatars/avatar_18.jpg" class="img-thumbnail">
												<div class="chat_message_body">
													<p>Sit adipisci vero perferendis hic voluptatem consequatur et. Eligendi beatae delectus voluptas eum quo. Praesentium odio neque earum aspernatur qui neque aperiam. Ea enim reiciendis occaecati consequatur id consequuntur laborum.</p>
													<p class="chat_message_date">06:44:50, 23.06.94</p>
												</div>
											</div>
											<div class="chat_message">
												<img alt="" src="img/avatars/avatar_19.jpg" class="img-thumbnail">
												<div class="chat_message_body">
													<p>Impedit eligendi corporis laboriosam repellendus sint nam minus quis. Voluptatem eius dignissimos dolorem rerum et. Inventore aut velit eligendi. Labore qui sint tempora atque dolor ea cumque. Sed consectetur impedit nulla ea nostrum rem quia distinctio.</p>
													<p class="chat_message_date">16:33:46, 19.08.75</p>
												</div>
											</div>
											<div class="chat_message ch_right">
												<img alt="" src="img/avatars/avatar_19.jpg" class="img-thumbnail">
												<div class="chat_message_body">
													<p>Commodi iusto dolor aspernatur maxime eos fugit id quo. Laboriosam impedit beatae eos voluptatibus aut ducimus non. Ut dolorum voluptate maiores eius vitae commodi.</p>
													<p class="chat_message_date">00:17:36, 01.02.10</p>
												</div>
											</div>
											<div class="chat_message">
												<img alt="" src="img/avatars/avatar_8.jpg" class="img-thumbnail">
												<div class="chat_message_body">
													<p>Distinctio non nostrum ullam quae doloremque ea. Quaerat distinctio ut qui distinctio. Voluptatem repudiandae esse unde amet consequatur. Repudiandae sint quos sit eveniet est voluptates.</p>
													<p class="chat_message_date">11:23:30, 03.09.07</p>
												</div>
											</div>
											<div class="chat_message ch_right">
												<img alt="" src="img/avatars/avatar_16.jpg" class="img-thumbnail">
												<div class="chat_message_body">
													<p>Totam aliquam vel impedit rerum. Sapiente id nulla rem error. Omnis earum quis aliquid fugiat quo vitae.</p>
													<p class="chat_message_date">17:56:04, 20.09.00</p>
												</div>
											</div>
											<div class="chat_message">
												<img alt="" src="img/avatars/avatar_11.jpg" class="img-thumbnail">
												<div class="chat_message_body">
													<p>Et incidunt corporis culpa aut non ipsa quidem. Necessitatibus molestiae non fugiat. Quam est praesentium amet eum vel ut odit numquam. Voluptate et voluptate odit numquam voluptate. Sed tenetur laboriosam animi enim.</p>
													<p class="chat_message_date">20:34:39, 20.03.91</p>
												</div>
											</div>
											<div class="chat_message ch_right">
												<img alt="" src="img/avatars/avatar_8.jpg" class="img-thumbnail">
												<div class="chat_message_body">
													<p>Vel veniam quas odit aperiam modi repellat est sint. Et numquam non aliquam odit. Reiciendis autem beatae laudantium necessitatibus. Provident laborum consequatur laborum.</p>
													<p class="chat_message_date">12:02:44, 24.11.92</p>
												</div>
											</div>
										</div>
										<div class="panel-footer">
											<div class="chat_submit">
												<div class="input-group">
													<input type="text" class="form-control input-lg" placeholder="Add a message...">
													<span class="input-group-btn">
														<button class="btn btn-primary btn-lg" type="button"><span class="icon-comments"></span></button>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-4 col-md-3 chat_users">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title pull-left">Contacts (12)</h4>
											<button class="btn btn-default btn-sm pull-right" type="button"><span class="icon-refresh"></span></button>
										</div>
										<table class="table table-striped">
											<tbody>
																								<tr>
													<td>
														<a href="#">
															<span class="stat stat_offline"></span>
															Eldred Bernier III															
														</a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#">
															<span class="stat stat_busy"></span>
															Lon Goodwin															
														</a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#">
															<span class="stat stat_offline"></span>
															Enid Schoen															
														</a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#">
															<span class="stat stat_busy"></span>
															Alvah Beier															
														</a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#">
															<span class="stat stat_busy"></span>
															Jerrell Hilpert															
														</a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#">
															<span class="stat stat_busy"></span>
															Hailee Roob															
														</a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#">
															<span class="stat stat_offline"></span>
															Melvin Roberts															
														</a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#">
															<span class="stat stat_busy"></span>
															Mrs. Amely Blick															
														</a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#">
															<span class="stat stat_online"></span>
															Mr. Curtis Dicki DVM															
														</a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#">
															<span class="stat stat_offline"></span>
															Miss Abelardo Kutch III															
														</a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#">
															<span class="stat stat_busy"></span>
															Mossie Harber															
														</a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#">
															<span class="stat stat_busy"></span>
															Gustave Hermiston															
														</a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="#">
															<span class="stat stat_online"></span>
															Mr. Tiara Kub															
														</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

				
			</section>
			<div id="footer_space"></div>
		</div>

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        &copy; 2013 Your Company
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