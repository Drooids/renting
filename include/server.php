<?php
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=mysql1091.servage.net;dbname=guillaume_puf', 'guillaume_puf', 'Homesaigon', $pdo_options);

?>