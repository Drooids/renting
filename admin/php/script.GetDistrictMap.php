<?php header("Content-Type: text/json"); 
session_start();
include('class.load.php');

$filter = unserialize($_SESSION['filter']); 
$district = $filter->district;
$district = explode(';', $district);

echo json_encode($district);
?>