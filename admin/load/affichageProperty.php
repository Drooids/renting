 <?php
    include('http://localhost/renting/management/php/class.load.php');
    if(isset($_SESSION['filter'])){
        $filter = unserialize($_SESSION['filter']); 
    }else{
        $filter = new filter();
        $_SESSION['filter'] = serialize($filter);
       
    }             
    $request = $filter->request();
                    //echo $info;
                    $reponse = $bdd->query($request);

                    $donnees = $reponse->fetchAll();
                    $total = count($donnees);
                    if($total >= 5)
                        $total = 5;
                    for($k=0;$k<$total;$k++){
                $id_portfolio=$donnees[$k]['id_portfolio'];
                $object = new portfolio();
                //echo $id_portfolio.'</br>';
                if($object->link_portfolio != ''){
                             $reponse = $bdd->query("SELECT id_gallery FROM gallery where id_gallery='$object->link_portfolio'");
                             $donnees2 = $reponse->fetchAll();
                             $id_gallery=$donnees2[0]['id_gallery'];
                             //Creatio nde la gallery
                             $object_gallery = new gallery($id_gallery);
                             $nom_fichier = $object_gallery->GetFirstImage();
                         }   


                    echo"<div class='re-item'>";           
                    echo"<div class='re-image'><a href='properties-details.php?id=".$object->id_portfolio."'><img src='management/upload/timthumb.php?src=http://localhost/renting/management/upload/uploads/".$img_portfolio."&w=218&h=125'  alt='' ></a></div>";
                    echo"<div class='re-short'>";              
                    echo"<div class='re-top'>";
                    echo"<h2><a href='properties-details.php?id=".$object->id_portfolio."'>".$object->nom_portfolio."</a></h2>";
                        if($object->service_portfolio =='rent')
                            echo"<span class='re-price'>$".$object->price_portfolio." / mo.</span>";
                        else
                            echo"<span class='re-price'>$".$object->price_portfolio." </span>";
                    echo"</div>";                
                    echo"<div class='re-descr'>".$object->text_portfolio;
                    echo"</div>";                
                    echo"<div class='re-bot'>";
                    echo"<a href='properties-details.php?id=".$object->id_portfolio."' class='link-more'>View Details</a>";
                    echo"<a href='properties-details.php?id=".$object->id_portfolio."' class='link-viewmap tooltip' title='View on Map'>View on Map</a>";
                    echo"<ul class='gallery' style='display:inline-block; width:10x; margin-left:0px; list-style:none;'>";
                                if($object->link_portfolio != ''){
                                    $reponse = $bdd->query("SELECT id_gallery,nom_gallery,link_gallery,img_gallery
                                        FROM gallery where id_gallery='$object->link_portfolio'");

            
                                        $donnees2 = $reponse->fetchAll();
                                        for($h=0;$h<count($donnees2);$h++){
                                            $id_gallery=$donnees2[$h]['id_gallery'];
                                            $nom_gallery=$donnees2[$h]['nom_gallery'];
                                            $link_gallery=$donnees2[$h]['link_gallery'];
                                            $img_gallery=$donnees2[$h]['img_gallery'];

                                            $link_gallery = explode(",", $link_gallery);
                                            
                                            $longueur=count($link_gallery);
                                            //echo "longueur: ".$longueur;
                                                for($j=0;$j<$longueur;$j++){
                                                    $id=$link_gallery[$j];
                                                    $reponse = $bdd->query("SELECT nom_fichier,id_fichier
                                                                            FROM fichier
                                                                            where id_fichier = '$id' ");

                                                
                                                    $donnees3 = $reponse->fetchAll();
                                                        if(count($donnees3) != 0){
                                                            $nom_fichier=$donnees3[0]['nom_fichier'];
                                                            $id_fichier=$donnees3[0]['id_fichier'];

                                                            if($j == 0){
                                                                  echo"<li style=''> <a href='management/upload/timthumb.php?src=http://localhost/renting/management/upload/uploads/".$nom_fichier."&w=500' rel='prettyPhoto[gallery".$k."]' class='link-viewimages' title='View Images'>View Images</a>";
                                                                  echo"</li>";
                                                            }else{
                                                                  echo"<li style='display:none;'> <a href='management/upload/timthumb.php?src=http://localhost/renting/management/upload/uploads/".$nom_fichier."&w=500' rel='prettyPhoto[gallery".$k."]' class='link-viewimages' title='View Images'>View Images</a>";
                                                                  echo"</li>";
                                                            }
                                                        }
                                                }
                                        }
                                }
                                   
                                echo "</ul >";
                    echo"</div>";
                    echo"</div>";
                    echo"<div class='clear'></div>";
                    echo"</div>";

            }

        ?>

        <script type="text/javascript">
          $(".gallery a[rel^='prettyPhoto']").prettyPhoto({});
        </script>