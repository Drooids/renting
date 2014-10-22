<?php
// This is the data for the SQL connect (Change when the server change)
// The other script "server.php" include this one.
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=localhost;dbname=renting', 'root', 'root', $pdo_options);
    			
?>	