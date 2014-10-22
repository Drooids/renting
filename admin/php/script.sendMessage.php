<?php header("Content-Type: text/json"); 
include('class.load.php');
include('class.message.php');

if(isset($_GET['action'])){

	switch ($_GET['action']) {
		case 'ClientToAdmin':
			$user = 'client';
			$message_from = $_POST['message_from'];
			$type = $_POST['type'];
			$content = $_POST['content'];
			$date = date_create();
            $today = date_timestamp_get($date);

			$message = new message('');
			$message->save_one_data('user',$user);
			$message->save_one_data('message_from',$message_from);
			$message->save_one_data('message_to',0);
			$message->save_one_data('type',$type);
			$message->save_one_data('content',$content);
			$message->save_one_data('message_timestamp',$today);
			//Different Data
				$client = new client($message_from);
				$photo = $client->photo;
			if($photo == "")
				$photo = "empty-profile.png";
			//Link photo
			if($message->type == 'devis'){
				$portfolio = new portfolio($message->link_id);
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
			$result = array();
			$json = array(
                    'id'=>$message->id,
                    'message_from'=>$message->message_from,
                    'message_to'=>0,
                    'link_id'=>$message->link_id,
                    'date'=>date("d M Y ", strtotime($message->date_creation)),
                    'message_timestamp'=>strtotime($message->date_creation),
                    'content'=>$message->content,
                    'type'=>$message->type,
                    'user'=>$message->user,
                    'photo'=>$photo,
                    'link_photo'=>$link_photo
                    );
			array_push($result,$json);
			echo json_encode($result); 
			break;
		case 'ClientToUser':
			$user = 'client';
			$message_from = $_POST['message_from'];
			$message_to = $_POST['message_to'];
			$type = $_POST['type'];
			$content = $_POST['content'];
			$date = date_create();
            $today = date_timestamp_get($date);

			$message = new message('');
			$message->save_one_data('user',$user);
			$message->save_one_data('message_from',$message_from);
			$message->save_one_data('message_to',$message_to);
			$message->save_one_data('type',$type);
			$message->save_one_data('content',$content);
			$message->save_one_data('message_timestamp',$today);
			//Different Data
				$client = new client($message_from);
				$photo = $client->photo;
			if($photo == "")
				$photo = "empty-profile.png";
			//Link photo
			if($message->type == 'devis'){
				$portfolio = new portfolio($message->link_id);
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
			$result = array();
			$json = array(
                    'id'=>$message->id,
                    'message_from'=>$message->message_from,
                    'message_to'=>$message->message_to,
                    'link_id'=>$message->link_id,
                    'date'=>date("d M Y ", strtotime($message->date_creation)),
                    'message_timestamp'=>strtotime($message->date_creation),
                    'content'=>$message->content,
                    'type'=>$message->type,
                    'user'=>$message->user,
                    'photo'=>$photo,
                    'link_photo'=>$link_photo
                    );
			array_push($result,$json);
			echo json_encode($result); 
			break;
		case 'AdminToClient':
			$user = $_POST['user'];
			$message_from = 0;
			$message_to = $_POST['message_to'];
			$type = $_POST['type'];
			$content = $_POST['content'];
			$date = date_create();
            $today = date_timestamp_get($date);

			$message = new message('');
			$message->save_one_data('user',$user);
			$message->save_one_data('message_from',$message_from);
			$message->save_one_data('message_to',$message_to);
			$message->save_one_data('type',$type);
			$message->save_one_data('content',$content);
			$message->save_one_data('message_timestamp',$today);

			//Different Data
			if($message_from != 0){
				$user = new user($message_from);
				$photo = $user->photo;
			}else{
				$photo ="";
			}
				
			
			if($photo == "")
				$photo = "empty-profile.png";
			//Link photo
			if($message->type == 'devis'){
				$portfolio = new portfolio($message->link_id);
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
			$result = array();
			$json = array(
                    'id'=>$message->id,
                    'message_from'=>$message_from,
                    'message_to'=>$message->message_to,
                    'link_id'=>$message->link_id,
                    'date'=>date("d M Y ", strtotime($message->date_creation)),
                    'message_timestamp'=>strtotime($message->date_creation),
                    'content'=>$message->content,
                    'type'=>$message->type,
                    'user'=>$message->user,
                    'photo'=>$photo,
                    'link_photo'=>$link_photo
                    );
			array_push($result,$json);
			echo json_encode($result); 
			break;
		case 'AdminToUser':
			$user = $_POST['user'];
			$message_from = 0;
			$message_to = $_POST['message_to'];
			$type = $_POST['type'];
			$content = $_POST['content'];
			$date = date_create();
            $today = date_timestamp_get($date);

			$message = new message('');
			$message->save_one_data('user',$user);
			$message->save_one_data('message_from',$message_from);
			$message->save_one_data('message_to',$message_to);
			$message->save_one_data('type',$type);
			$message->save_one_data('content',$content);
			$message->save_one_data('message_timestamp',$today);

			//Different Data
			if($message_from != 0){
				$user = new user($message_from);
				$photo = $user->photo;
			}else{
				$photo ="";
			}
			
			if($photo == "")
				$photo = "empty-profile.png";
			//Link photo
			if($message->type == 'devis'){
				$portfolio = new portfolio($message->link_id);
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
			$result = array();
			$json = array(
                    'id'=>$message->id,
                    'message_from'=>0,
                    'message_to'=>$message->message_to,
                    'link_id'=>$message->link_id,
                    'date'=>date("d M Y ", strtotime($message->date_creation)),
                    'message_timestamp'=>strtotime($message->date_creation),
                    'content'=>$message->content,
                    'type'=>$message->type,
                    'user'=>$message->user,
                    'photo'=>$photo,
                    'link_photo'=>$link_photo
                    );
			array_push($result,$json);
			echo json_encode($result); 
			break;
		case 'UserToClient':
			$user = $_POST['user'];
			$message_from = $_POST['message_from'];
			$message_to = $_POST['message_to'];
			$type = $_POST['type'];
			$content = $_POST['content'];
			$date = date_create();
            $today = date_timestamp_get($date);

			$message = new message('');
			$message->save_one_data('user',$user);
			$message->save_one_data('message_from',$message_from);
			$message->save_one_data('message_to',$message_to);
			$message->save_one_data('type',$type);
			$message->save_one_data('content',$content);
			$message->save_one_data('message_timestamp',$today);

			//Different Data
				$user = new user($message_from);
				$photo = $user->photo;
			
			if($photo == "")
				$photo = "empty-profile.png";
			//Link photo
			if($message->type == 'devis'){
				$portfolio = new portfolio($message->link_id);
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
			$result = array();
			$json = array(
                    'id'=>$message->id,
                    'message_from'=>$message->message_from,
                    'message_to'=>$message->message_to,
                    'link_id'=>$message->link_id,
                    'date'=>date("d M Y ", strtotime($message->date_creation)),
                    'message_timestamp'=>strtotime($message->date_creation),
                    'content'=>$message->content,
                    'type'=>$message->type,
                    'user'=>$message->user,
                    'photo'=>$photo,
                    'link_photo'=>$link_photo
                    );
			array_push($result,$json);
			echo json_encode($result); 
			break;
		case 'UserToAdmin':
			$user = $_POST['user'];
			$message_from = $_POST['message_from'];
			$message_to = 0;
			$type = $_POST['type'];
			$content = $_POST['content'];
			$date = date_create();
            $today = date_timestamp_get($date);

			$message = new message('');
			$message->save_one_data('user',$user);
			$message->save_one_data('message_from',$message_from);
			$message->save_one_data('message_to',$message_to);
			$message->save_one_data('type',$type);
			$message->save_one_data('content',$content);
			$message->save_one_data('message_timestamp',$today);

			//Different Data
				$user = new user($message_from);
				$photo = $user->photo;
			
			if($photo == "")
				$photo = "empty-profile.png";
			//Link photo
			if($message->type == 'devis'){
				$portfolio = new portfolio($message->link_id);
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
			$result = array();
			$json = array(
                    'id'=>$message->id,
                    'message_from'=>$message_from,
                    'message_to'=>0,
                    'link_id'=>$message->link_id,
                    'date'=>date("d M Y ", strtotime($message->date_creation)),
                    'message_timestamp'=>strtotime($message->date_creation),
                    'content'=>$message->content,
                    'type'=>$message->type,
                    'user'=>$message->user,
                    'photo'=>$photo,
                    'link_photo'=>$link_photo
                    );
			array_push($result,$json);
			echo json_encode($result); 
			break;
		default:
			# code...
			break;
	}




}

?>