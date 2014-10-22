
                        <?php   


                        if(isset($_GET['district'])){
                            $district = $_GET['district'];
                            $service = $_GET['service'];
                            $price = $_GET['price'];
                           
                           
                        }else{
                            $district='';
                            $service='';
                            $price='';
                        }
                            include("server.php");

                            $reponse = $bdd->query("SELECT count(id_portfolio) as total FROM portfolio WHERE bed_portfolio = '1' ".$district.$service.$price);
                                        $donnees = $reponse->fetchAll();
                                        $bed_1=$donnees[0]['total'];

                            $reponse = $bdd->query("SELECT count(id_portfolio) as total FROM portfolio WHERE bed_portfolio = '2' ".$district.$service.$price);
                                        $donnees = $reponse->fetchAll();
                                        $bed_2=$donnees[0]['total'];

                            $reponse = $bdd->query("SELECT count(id_portfolio) as total FROM portfolio WHERE bed_portfolio = '3' ".$district.$service.$price);
                                        $donnees = $reponse->fetchAll();
                                        $bed_3=$donnees[0]['total'];

                            $reponse = $bdd->query("SELECT count(id_portfolio) as total FROM portfolio WHERE bed_portfolio = '4' ".$district.$service.$price);
                                        $donnees = $reponse->fetchAll();
                                        $bed_4=$donnees[0]['total'];

                            $reponse = $bdd->query("SELECT count(id_portfolio) as total FROM portfolio WHERE bed_portfolio = '5' ".$district.$service.$price);
                                        $donnees = $reponse->fetchAll();
                                        $bed_5=$donnees[0]['total'];


                                         $json = array(
                                            'bed_1'=>$bed_1,
                                            'bed_2'=>$bed_2,
                                            'bed_3'=>$bed_3,
                                            'bed_4'=>$bed_4,
                                            'bed_5'=>$bed_5
                                            );

                                        header("Content-Type: text/json");
                                        $json= json_encode($json); 
                                        echo $json; 
                        ?>
                        