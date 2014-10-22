<?php

//1. find the session
session_start();
//2. Unset all varialbes 
$_SESSION['user_right'] = null;
$_SESSION['user_id'] = null;


//redirect
header('location: ../login.php');



?>