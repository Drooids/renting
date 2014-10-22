<?php
function calcDist($lat1,$lon1,$lat2,$lon2) {
  if ($lat1==$lat2 && $lon1==$lon2) return 0;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lon1-$lon2));
  $dist = acos($dist); 
  $dist = rad2deg($dist);
  //debug("dist($lat1,$lon1,$lat2,$lon2)=$dist");
  if ($dist>0) return $dist * 111190;
  return 0;
  }

  include('server.php');


   $reponse = $bdd->query("SELECT id_portfolio,nom_portfolio,link_portfolio,img_portfolio,type_portfolio,actif_portfolio,text_portfolio,
                        bath_portfolio,bed_portfolio,price_portfolio,parking_portfolio,city_portfolio,district_portfolio,adress_portfolio,user_portfolio,
                        team_portfolio,pool_portfolio,type_size_portfolio,service_portfolio,detail_portfolio,gps_portfolio
                                        FROM portfolio where id_portfolio != 26");

   			 $donnees = $reponse->fetchAll();
   			
            for($k=0;$k<count($donnees);$k++){
            	$essai[$k][0]=$donnees[$k]['id_portfolio'];
            	$essai[$k][1]=$donnees[$k]['nom_portfolio'];
            	$essai[$k][2]=$donnees[$k]['gps_portfolio'];
            	//$essai.push($data);

            }
            echo $essai[2];



?>