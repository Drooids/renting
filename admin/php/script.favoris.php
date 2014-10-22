<?php session_start();
include('class.load.php');

if(isset($_SESSION['client_id'])){


	$client_id = $_SESSION['client_id'];
	$id_portfolio = $_POST['id'];
	if($_POST['action'] == 'add'){
		$date = date('Y/m/d H:i:s');
		$bdd->exec("INSERT INTO favoris (client_id,portfolio_id,date_creation) VALUES ('$client_id','$id_portfolio','$date')");
		echo "added";
	}else{
		$date = date('Y/m/d H:i:s');
		$bdd->exec("DELETE FROM favoris WHERE client_id ='$client_id' AND portfolio_id = '$id_portfolio'");
		echo "deleted";
	}
	

}else{
	echo "No client id";
}

?>