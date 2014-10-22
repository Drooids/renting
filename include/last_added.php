<h2>Latest added Properties</h2>
        
        	<div class="carusel_list">
				<ul id="latest_properties" class="jcarousel-skin-tango">
                <?php
        $reponse = $bdd->query("SELECT id_portfolio FROM portfolio LIMIT 8");

            
            $donnees = $reponse->fetchAll();
            for($k=0;$k<count($donnees);$k++){
                $id_portfolio=$donnees[$k]['id_portfolio'];
                $object = new portfolio($id_portfolio);
                         $reponse = $bdd->query("SELECT id_gallery FROM gallery where id_gallery='$object->link_portfolio'");
                         $donnees2 = $reponse->fetchAll();
                         $id_gallery=$donnees2[0]['id_gallery'];
                         //Creation de la gallery
                         $object_gallery = new gallery($id_gallery);
                         $nom_fichier = $object_gallery->GetFirstImage();

                
                        //Salle de bain et toillet
                    $bed_portfolio=$object->bed_portfolio;
                    $bath_portfolio=$object->bath_portfolio;
                if($bath_portfolio == 'more')
                    $bath_portfolio='5+';
                
                if($bed_portfolio == 'more')
                    $bed_portfolio='5+';
               
                       
                         
                echo"<li>";
                    echo"<div class='item_image'><a href='properties-details.php?id=".$object->id_portfolio."'><img src='admin/upload/uploads/".$nom_fichier."' width='218' height='125' alt=''></a></div>";
                    echo"<div class='item_row item_type'><span>Property Type:</span> <a href='#'><strong>".$object->service_portfolio."</strong></a></div>";
                    if($object->service_portfolio == 'rent')
                        echo"<div class='item_row item_price'><span>Asking Price:</span> <strong>$".$object->price_portfolio."/months</strong></div>";
                    else
                        echo"<div class='item_row item_price'><span>Asking Price:</span> <strong>$".$object->price_portfolio."</strong></div>";


                    echo"<div class='item_row item_rooms'><span>Rooms:</span> <strong>".$object->bed_portfolio." beds, ".$object->bath_portfolio." baths</strong></div>";
                    echo"<div class='item_row item_location'><span>City / Town:</span> <strong>".$object->city_portfolio.", ".$object->district_portfolio."</strong></div>";
                    echo"<div class='item_row item_view'><a href='properties-details.php?id=".$object->id_portfolio."' class='btn_view'>view property</a></div>";
               echo"</li>";
               
            }

        ?>					
        
                </ul>
			</div>

			<script>
                jQuery(document).ready(function($) {
                    $('#latest_properties').jcarousel({
                        easing: 'easeOutBack',
                        animation: 600,
						scroll: 1
                        });
                    });
            </script>
   		