<?php
include('server.php');

$request = $_REQUEST['request'];

 					$reponse = $bdd->query($request);

                    $donnees = $reponse->fetchAll();
                    $total = count($donnees);

                     $json = array('total'=>$total);

                                        header("Content-Type: text/json");
                                        $json= json_encode($json); 
                                        echo $json; 

?>