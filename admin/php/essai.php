<?php
include('class.load.php');

$portfolio = new portfolio(114);
$portfolio->save_one_data('nom_portfolio','Salut les mecs');

echo $portfolio->nom_portfolio;
?>