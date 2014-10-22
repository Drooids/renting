<?php
$pass = $_REQUEST['pass'];

$pass = md5($pass);
echo $pass;
?>