<div class="carusel_list carusel_small">
				<ul id="latest_properties" class="jcarousel-skin-tango">
                <?php
                // ici on aura le featured $featured
                 $reponse = $bdd->query("SELECT id_portfolio FROM portfolio WHERE actif_portfolio = 1 LIMIT 8");

            
            $donnees = $reponse->fetchAll();
            for($k=0;$k<count($donnees);$k++){
                $id_portfolio=$donnees[$k]['id_portfolio'];
                $object = new portfolio($id_portfolio);
                         $reponse = $bdd->query("SELECT id_gallery FROM gallery where id_gallery='$object->link_portfolio' ");
                         $donnees2 = $reponse->fetchAll();
                         $id_gallery=$donnees2[0]['id_gallery'];
                         //Creation de la gallery
                         $object_gallery = new gallery($id_gallery);
                         $nom_fichier = $object_gallery->GetFirstImage();
                $string="<li>";
                $string.="<div class='item_image'><a href='properties-details.php?id=".$object->id_portfolio."'><img src='admin/upload/uploads/timthumb.php?src=".$object->id_portfolio."/".$nom_fichier."&w=218&h=125' width='218' height='125' alt=''></a></div>";
                $string.="<div class='item_name'><a href='properties-details.php?id=".$object->id_portfolio."'>".$object->bed_portfolio." beds, ".$object->bath_portfolio." baths, $".$object->price_portfolio."</a></div>";
                $string.="</li>";
                echo $string;
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