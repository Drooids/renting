<?php
	include('class.load.php');
	$is_ajax = $_REQUEST['is_ajax'];
	if(isset($is_ajax) && $is_ajax)
	{
		$username = $_REQUEST['login_username'];
		$password = md5($_REQUEST['login_password']);
		
		
				 include 'server.php';
				 
			$reponse = $bdd->query("SELECT username,right_user,team_user,user_id,email_pro,email_pass,email_box,smtp_port,smtp_host
						              FROM users
						              WHERE username='$username'
						              AND password='$password'
						              LIMIT 1");

			$donnees = $reponse->fetchAll();
			if($donnees[0]['username']==$username)
			{
				$user = new user($donnees[0]['user_id']);
				$_SESSION['user'] = serialize($user);

			 $_SESSION['username'] = $donnees[0]['username'];
			 $_SESSION['right_user'] = $donnees[0]['right_user'];
			 $_SESSION['team_user'] = $donnees[0]['team_user'];
			 $_SESSION['user_id'] = $donnees[0]['user_id'];
			 $_SESSION['email_pro'] = $donnees[0]['email_pro'];
			 $_SESSION['email_pass'] = $donnees[0]['email_pass'];
			 $_SESSION['email_box'] = $donnees[0]['email_box'];
			 $_SESSION['smtp_port'] = $donnees[0]['smtp_port'];
			 $_SESSION['smtp_host'] = $donnees[0]['smtp_host'];
            
            	echo"success";
			}else{
				echo"error";
			}		
			
}	

	
	
?>