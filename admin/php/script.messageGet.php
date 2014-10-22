<?php header("Content-Type: text/json"); 
session_start();
include('class.load.php');
include('class.message.php');

if(isset($_REQUEST['user_id']))
	$target_id = $_REQUEST['user_id'];
else
	$target_id = 0;

$client_id = $_REQUEST['client_id'];

$donnees = 0;


		
		if($target_id == 0){
		 $reponse = $bdd->query("SELECT * FROM message WHERE message_from = 0 AND user = 'admin' AND message_read = 0 AND message_to = '$client_id' ORDER BY date_creation");
			
		}else{
		 $reponse = $bdd->query("SELECT * FROM message WHERE message_from = '$target_id' AND user = 'user' AND message_read = 0 AND message_to ='$client_id' ORDER BY date_creation");
			
		}

   	$reponse = $reponse->fetchAll();
	$result = array();
	if(count($reponse) != 0){
		foreach ($reponse as $key => $value) {
			$message = new message($value['id']);
			$message->save_one_data('message_read',1);
			//photo
			if($message->user == 'admin' || $message->user == 'user'){
				if($value['message_from'] != 0){
					$user = new user($message->message_from);
					$photo = $user->photo;
				}else{
					$photo = "empty-profile.png";
				}
				
			}
			else{
				$user = new client($message->message_from);
				$photo = $client->photo;
			}
			if($photo == "")
				$photo = "empty-profile.png";
			//Link photo
			if($value['type'] == 'devis'){
				$portfolio = new portfolio($value['link_id']);
				$link_portfolio = $portfolio->link_portfolio;
				$reponse2 = $bdd->query("SELECT id_gallery,nom_gallery,link_gallery,img_gallery
										FROM gallery where id_gallery='$link_portfolio'");
				$donnees = $reponse2->fetchAll();

    			$link_gallery = explode(",", $donnees[0]['link_gallery']);
    			$id=$link_gallery[0];
                $reponse2 = $bdd->query("SELECT nom_fichier,id_fichier
                                        FROM fichier
                                        where id_fichier = '$id' ");

    
       			$donnees = $reponse2->fetchAll();
        		$link_photo=$donnees[0]['nom_fichier'];
            	
			}
			else{
				$link_photo ="";
			}
		$json = array(
                    'id'=>$value['id'],
                    'message_from'=>$value['message_from'],
                    'message_to'=>$value['message_to'],
                    'link_id'=>$value['link_id'],
                    'date'=>date("d M Y ", strtotime($value['date_creation'])),
                    'message_timestamp'=>strtotime($value['date_creation']),
                    'content'=>$value['content'],
                    'type'=>$value['type'],
                    'user'=>$value['user'],
                    'photo'=>$photo,
                    'link_photo'=>$link_photo
                    );
		array_push($result,$json);
		}
	}
	
echo json_encode($result); 


?>