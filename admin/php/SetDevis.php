<?php session_start();

include("class.load.php");
include("class.message.php");
				$other = $_REQUEST['other'];
				
			if($other == 'devis'){

					if($_REQUEST['connected'] == 1){
						$id = $_REQUEST['id'];
						$client = new client($_SESSION['client_id']);
						$email = $_REQUEST['email'];
						$phone = $_REQUEST['phone'];
						$content = $_REQUEST['message'];
				//$text =htmlentities($_REQUEST['text'], ENT_NOQUOTES,'UTF-8');
						$contact_type = $_REQUEST['contact_type'];
						$newsletter = $_REQUEST['newsletter'];
						$date = date('Y/m/d H:i:s');
						$bdd->exec("INSERT INTO devis (devis_info,devis_type_id,devis_text,date,devis_phone,devis_email,devis_newsletter,devis_lu,devis_checked,devis_contact_type)
								 VALUES ($id,$client->id,'$content','$date','$phone','$email',$newsletter,0,0,'client')");

						$portfolio = new portfolio($id);
						$user_id = $portfolio->user_id;
            			$today = date_timestamp_get(date_create());

						$message = new message('');
						$message->save_one_data('user','client');
						$message->save_one_data('message_from',$_SESSION['client_id']);
						$message->save_one_data('message_to',$user_id);
						$message->save_one_data('link_id',$id);
						$message->save_one_data('type','devis');
						$message->save_one_data('content',$content);
						$message->save_one_data('message_timestamp',$today);

					}
					/*else{
						$id = $_REQUEST['id'];
						$email = $_REQUEST['email'];
						$phone = $_REQUEST['phone'];
						$message = $_REQUEST['message'];
				//$text =htmlentities($_REQUEST['text'], ENT_NOQUOTES,'UTF-8');
						$contact_type = $_REQUEST['contact_type'];
						$firstname = $_REQUEST['firstname'];
						$lastname = $_REQUEST['lastname'];
						$newsletter = $_REQUEST['newsletter'];
						$date = date('Y/m/d H:i:s');
							$client = new client('');
							$client->save_one_data('email',$email);
							$client->save_one_data('name',$firstname);
							$client->save_one_data('last_name',$lastname);
							$client->save_one_data('phone',$phone);
							$client->save_one_data('newsletter',$newsletter);
						$bdd->exec("INSERT INTO devis (devis_info,devis_type_id,devis_text,date,devis_phone,devis_email,devis_newsletter,devis_lu,devis_checked,devis_contact_type)
								 VALUES ($id,$client->id,'$message','$date','$phone','$email',$newsletter,0,0,'client')");

						
					}*/
				

			}
				

?>