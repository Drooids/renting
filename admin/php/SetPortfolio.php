<?php 
include 'class.load.php';

				//Voici la liste de toutes les variables !
				$user_id = $_SESSION['user_id'];
				$id = $_REQUEST['id'];
				$nom = $_REQUEST['nom'];
				$text = $_REQUEST['text'];
				$detail = $_REQUEST['detail'];
				//$text =htmlentities($_REQUEST['text'], ENT_NOQUOTES,'UTF-8');
				$type = $_REQUEST['type'];
				$img = $_REQUEST['img'];
				$link = $_REQUEST['link'];
				$checked = $_REQUEST['actif'];

				$bed = $_REQUEST['bed'];
				$bath = $_REQUEST['bath'];
				$pool = $_REQUEST['pool'];
				$parking = $_REQUEST['parking'];
				$price = $_REQUEST['price'];
				$service = $_REQUEST['service'];
					$pets = $_REQUEST['pets'];
					$furnished = $_REQUEST['furnished'];
				
				$available_date = $_REQUEST['available_date'];
			
				$city = $_REQUEST['city'];
				$adress = $_REQUEST['adress'];
				$district = $_REQUEST['district'];

				$date = date('Y/m/d H:i:s');
				$gps = $_REQUEST['gps'];
				list($lat, $lng) = explode(',', $gps);
				
//$id = $_REQUEST['id'];
$autre = $_REQUEST['autre'];
	if($autre == 'new'){
		
		//Creation de l'objet
		$object = new portfolio('');
		//action
		$object->AddVar('nom_portfolio',$nom);
		$object->save_all_data();


	}elseif($autre=='delete'){
		
		//Creation de l'objet
		$object = new portfolio($id);
		//action
		$object->AddVar('actif_portfolio',0);
		$object->AddVar('date_modification_portfolio',$date);
		$object->save_all_data();
	}elseif($autre =='img'){
		// creation de l'objet
		$object = new portfolio($id);
		//action
		$object->AddVar('img_portfolio',$img);
		$object->AddVar('date_modification_portfolio',$date);
		$object->save_all_data();	
		
	}else{
	
		
		if($img == false){
			$object = new portfolio($id);
			$object->AddVar('nom_portfolio',$nom);
			$object->AddVar('date_available_portfolio',$available_date);
			$object->AddVar('pets_portfolio',$pets);
			$object->AddVar('furnished_portfolio',$furnished);
			$object->AddVar('date_modification_portfolio',$date);
			$object->AddVar('link_portfolio',$link);
			$object->AddVar('text_portfolio',$text);
			$object->AddVar('actif_portfolio',1);
			$object->AddVar('type_portfolio',$type);
			$object->AddVar('bed_portfolio',$bed);
			$object->AddVar('bath_portfolio',$bath);
			$object->AddVar('result_portfolio',$checked);
			$object->AddVar('parking_portfolio',$parking);
			$object->AddVar('service_portfolio',$service);
			$object->AddVar('pool_portfolio',$pool);
			$object->AddVar('city_portfolio',$city);
			$object->AddVar('adress_portfolio',$adress);
			$object->AddVar('district_portfolio',$district);
			$object->AddVar('price_portfolio',$price);
			$object->AddVar('user_id',$user_id);
			$object->AddVar('detail_portfolio',$detail);
			$object->AddVar('lat_portfolio',$lat);
			$object->AddVar('lng_portfolio',$lng);
			$object->AddVar('date_modification_portfolio',$date);
			$object->save_all_data();

		}else{
			$img = $_REQUEST['img'];
					$img = explode("/", $img );
					$longueur=count($img)-1;
			$img=$img[$longueur];

			$object = new portfolio($id);
			$object->AddVar('nom_portfolio',$nom);
			$object->AddVar('date_available_portfolio',$available_date);
			$object->AddVar('pets_portfolio',$pets);
			$object->AddVar('img_portfolio',$img);
			$object->AddVar('furnished_portfolio',$furnished);
			$object->AddVar('date_modification_portfolio',$date);
			$object->AddVar('link_portfolio',$link);
			$object->AddVar('text_portfolio',$text);
			$object->AddVar('actif_portfolio',1);
			$object->AddVar('type_portfolio',$type);
			$object->AddVar('bed_portfolio',$bed);
			$object->AddVar('bath_portfolio',$bath);
			$object->AddVar('result_portfolio',$checked);
			$object->AddVar('parking_portfolio',$parking);
			$object->AddVar('service_portfolio',$service);
			$object->AddVar('pool_portfolio',$pool);
			$object->AddVar('city_portfolio',$city);
			$object->AddVar('adress_portfolio',$adress);
			$object->AddVar('district_portfolio',$district);
			$object->AddVar('price_portfolio',$price);
			$object->AddVar('user_id',$user_id);
			$object->AddVar('detail_portfolio',$detail);
			$object->AddVar('lat_portfolio',$lat);
			$object->AddVar('lng_portfolio',$lng);
			$object->AddVar('date_modification_portfolio',$date);
			$object->save_all_data();
		}

	}




?>