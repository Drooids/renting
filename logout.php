<?php

//1. find the session
session_start();
//2. Unset all varialbes 
$_SESSION['client_id'] = null;

//redirect
header('location: index.php');



?>