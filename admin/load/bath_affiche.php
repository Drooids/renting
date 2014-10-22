<?php   
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
                        // 1 bath
                        $filter->addVar('bath',1);
                        $request = $filter->request();
                        $reponse = $bdd->query($request);
                        $donnees = $reponse->fetchAll();
                        $bath_1 = count($donnees);  
                        // 2 bath
                        $filter->addVar('bath',2);
                        $request = $filter->request();
                        $reponse = $bdd->query($request);
                        $donnees = $reponse->fetchAll();
                        $bath_2 = count($donnees);  
                        // 3 bath
                        $filter->addVar('bath',3);
                        $request = $filter->request();
                        $reponse = $bdd->query($request);
                        $donnees = $reponse->fetchAll();
                        $bath_3 = count($donnees);  
                        // 4 bath
                        $filter->addVar('bath',4);
                        $request = $filter->request();
                        $reponse = $bdd->query($request);
                        $donnees = $reponse->fetchAll();
                        $bath_4 = count($donnees); 
                        // 5 bath
                        $filter->addVar('bath',5);
                        $request = $filter->request();
                        $reponse = $bdd->query($request);
                        $donnees = $reponse->fetchAll();
                        $bath_5 = count($donnees);  

                                         $json = array(
                                            'bath_1'=>$bath_1,
                                            'bath_2'=>$bath_2,
                                            'bath_3'=>$bath_3,
                                            'bath_4'=>$bath_4,
                                            'bath_5'=>$bath_5
                                            );

                                        header("Content-Type: text/json");
                                        $json= json_encode($json); 
                                        echo $json; 
                        ?>
                        