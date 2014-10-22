<?php 


				$id = $_REQUEST['id'];
				$text =htmlentities($_REQUEST['text'], ENT_NOQUOTES,'UTF-8');
				$img = $_REQUEST['img'];
				$titre =htmlentities($_REQUEST['titre'], ENT_NOQUOTES,'UTF-8');
				$option = $_REQUEST['option'];
				$autre = $_REQUEST['autre'];
				$actif = $_REQUEST['actif'];
				

				include 'server.php';

				if($autre=='delete'){
						$bdd->exec("DELETE FROM article
							WHERE id_article ='$id'");
				}elseif($autre=='new'){
						$bdd->exec("INSERT INTO article (titre_article,img_article,text_article)
								 			VALUES ('$titre','sample-image-250x150.png','Veuillez rentrer votre texte ici')");
				}elseif($autre=='img'){
					$img = explode("/", $img );
					$longueur=count($img)-1;
					$img=$img[$longueur];
					
						$bdd->exec("UPDATE article SET img_article = '$img' WHERE id_article='$id'");
				}
				elseif($autre=='contact'){
					$bdd->exec("UPDATE article SET  actif_article ='$actif', text_article = '$text', link_article='$option' WHERE id_article='$id'");
				}else{
					if($img == false || $img ==''){
						if($actif != '')
							$bdd->exec("UPDATE article SET  actif_article ='$actif' WHERE id_article='$id'");
						if($option != '')
							$bdd->exec("UPDATE article SET  option_article ='$option' WHERE id_article='$id'");

						$bdd->exec("UPDATE article SET titre_article = '$titre',  text_article='$text' WHERE id_article='$id'");
					}else{

						$img = explode("/", $img );
						$longueur=count($img)-1;
						$img=$img[$longueur];

						if($actif != '')
							$bdd->exec("UPDATE article SET  actif_article ='$actif' WHERE id_article='$id'");
						if($option != '')
							$bdd->exec("UPDATE article SET  option_article ='$option' WHERE id_article='$id'");

						$bdd->exec("UPDATE article SET img_article = '$img',  titre_article = '$titre',  text_article='$text' WHERE id_article='$id'");
					}
					
				}
				



			
    						
				
    			


?>