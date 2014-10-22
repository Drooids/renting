<?php header("Content-Type: text/json");
include('class.load.php');
if(isset($_GET['district'])){
                            $filter = new filter();
                           foreach ($_GET as $key => $val) {
                                    switch ($key) {
                                    case 'district':
                                        $filter->AddVar('district', $val);
                                        break;
                                    case 'bed':
                                        $filter->AddVar('bed', $val);
                                        break;
                                    case 'bath':
                                        $filter->AddVar('bath', $val);
                                        break;
                                    case 'price':
                                        $val = explode(';',$val);
                                        if(count($val) != 1){
                                            $filter->AddVar('price_min', $val[0]);
                                            $filter->AddVar('price_max', $val[1]);
                                        }
                                        break;
                                    case 'service':
                                        $filter->AddVar('service', $val);
                                        break;
                                    case 'properties':
                                        $filter->AddVar('properties', $val);
                                        break;
                                    case 'available':
                                        $filter->AddVar('available', $val);
                                        break;
                                    case 'furnished':
                                        $filter->AddVar('furnished', $val);
                                        break;
                                    case 'pets':
                                        $filter->AddVar('pets', $val);
                                        break;
                                    case 'pool':
                                        if($val == 0){
                                            $filter->AddVar('pool', 0);
                                        }
                                        elseif($val == 1){
                                            $filter->AddVar('pool', 1);
                                        }
                                    case 'square':
                                        $val = explode(';',$val);
                                        if(count($val) != 1){
                                            $filter->AddVar('square_min', $val[0]);
                                            $filter->AddVar('square_max', $val[1]);
                                        }
                                        break;
                                    case 'sort':
                                        $filter->AddVar('sort', $val);
                                        break;
                                    case 'parking':
                                        $filter->AddVar('parking', $val);
                                        break;
                                    
                                    default:
                                        # code...
                                        break;
                                }
                            }
                           
                           
                        }
                        // 1 bed
                        $filter->addVar('bed',1);
                        $request = $filter->request();
                        $reponse = $bdd->query($request);
                        $donnees = $reponse->fetchAll();
                        $bed_1 = count($donnees);  
                        // 2 bed
                        $filter->addVar('bed',2);
                        $request = $filter->request();
                        $reponse = $bdd->query($request);
                        $donnees = $reponse->fetchAll();
                        $bed_2 = count($donnees);  
                        // 3 bed
                        $filter->addVar('bed',3);
                        $request = $filter->request();
                        $reponse = $bdd->query($request);
                        $donnees = $reponse->fetchAll();
                        $bed_3 = count($donnees);  
                        // 4 bed
                        $filter->addVar('bed',4);
                        $request = $filter->request();
                        $reponse = $bdd->query($request);
                        $donnees = $reponse->fetchAll();
                        $bed_4 = count($donnees); 
                        // 5 bed
                        $filter->addVar('bed',5);
                        $request = $filter->request();
                        $reponse = $bdd->query($request);
                        $donnees = $reponse->fetchAll();
                        $bed_5 = count($donnees);  

                                         $json = array(
                                            'bed_1'=>$bed_1,
                                            'bed_2'=>$bed_2,
                                            'bed_3'=>$bed_3,
                                            'bed_4'=>$bed_4,
                                            'bed_5'=>$bed_5
                                            );

                                        
                                        $json= json_encode($json); 
                                        echo $json; 
                        ?>