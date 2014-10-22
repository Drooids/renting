<?php 
		$user_id = $_SESSION['user_id'];
		$user_right = $_SESSION['user_right'];

		
if (!class_exists('message')) {
   include('./php/class.message.php');
   //echo "included";
}
if (!class_exists('user')) {
   include('./php/class.user.php');
   //echo "included";
}
$user = new user($_SESSION['user_id']);
	function time_passed($timestamp){
    //type cast, current time, difference in timestamps
    $timestamp      = (int) $timestamp;
    $current_time   = time();
    $diff           = $current_time - $timestamp;
    
    //intervals in seconds
    $intervals      = array (
        'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
    );
    
    //now we just find the difference
    if ($diff == 0)
    {
        return 'just now';
    }    

    if ($diff < 60)
    {
        return $diff == 1 ? $diff . ' second ago' : $diff . ' seconds ago';
    }        

    if ($diff >= 60 && $diff < $intervals['hour'])
    {
        $diff = floor($diff/$intervals['minute']);
        return $diff == 1 ? $diff . ' minute ago' : $diff . ' minutes ago';
    }        

    if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
    {
        $diff = floor($diff/$intervals['hour']);
        return $diff == 1 ? $diff . ' hour ago' : $diff . ' hours ago';
    }    

    if ($diff >= $intervals['day'] && $diff < $intervals['week'])
    {
        $diff = floor($diff/$intervals['day']);
        return $diff == 1 ? $diff . ' day ago' : $diff . ' days ago';
    }    

    if ($diff >= $intervals['week'] && $diff < $intervals['month'])
    {
        $diff = floor($diff/$intervals['week']);
        return $diff == 1 ? $diff . ' week ago' : $diff . ' weeks ago';
    }    

    if ($diff >= $intervals['month'] && $diff < $intervals['year'])
    {
        $diff = floor($diff/$intervals['month']);
        return $diff == 1 ? $diff . ' month ago' : $diff . ' months ago';
    }    

    if ($diff >= $intervals['year'])
    {
        $diff = floor($diff/$intervals['year']);
        return $diff == 1 ? $diff . ' year ago' : $diff . ' years ago';
    }
}
//if($user_right == 0){
//	$reponse = $bdd->query("SELECT  message_from,user FROM message WHERE message_to = 0 GROUP BY message_from ORDER BY message_timestamp");
//}else{
	$reponse = $bdd->query("SELECT DISTINCT message_from,user FROM message WHERE message_to = '$user_id' GROUP BY message_from ORDER BY message_timestamp");
//}
	
	$reponse = $reponse->fetchAll();
	
											
?>
<div class="col-sm-push-4 col-sm-3 text-right hidden-xs">
							
							<!--<div class="notification_separator"></div>
							<div class="notification_dropdown dropdown">
								<a href="#" class="notification_icon dropdown-toggle" data-toggle="dropdown">
									<span class="label label-danger">0</span>
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
							</div> -->
						</div>
					<div class="col-xs-6 col-sm-push-4 col-sm-3">
							<div class="pull-right dropdown">
								<a href="#" class="user_info dropdown-toggle" title="<?php echo $user->username; ?>" data-toggle="dropdown">
									<img src="<?php if($user->photo != '') {echo $user->photo;}else{echo 'empty-profile.png';} ?>" alt="">
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="user-info.php">Profile</a></li>
									
									<li><a href="php/logout.php">Log Out</a></li>
								</ul>
							</div>
						</div>
						