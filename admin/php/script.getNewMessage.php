<?php header("Content-Type: text/json"); 
include('class.load.php');
$id = $_GET['id'];

$reponse = $bdd->query("SELECT count(id) AS total FROM message WHERE message_to = '$id' AND message_read = 0");
$reponse = $reponse->fetchAll();


                           
                                $json = array('total'=>$reponse[0]['total']);
                            	echo json_encode($json);


?>