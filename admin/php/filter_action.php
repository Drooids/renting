<?php session_start();
include('class.load.php');
if(isset($_SESSION['filter'])){
    $filter = unserialize($_SESSION['filter']); 
}else{
    $filter = new filter();
    $_SESSION['filter'] = serialize($filter);
   
}
if(isset($_GET['action'])){
	if($_GET['action'] == 'affiche'){
		$request = $filter->request();
		//echo 'hello';
	}elseif($_GET['action'] == 'widget'){
		
		foreach ($_GET as $key => $val) {
				switch ($key) {
				case 'district':
					$filter->AddVar('district', $val);
					break;
				case 'bed':
					if($val == 0){
						$filter->AddVar('bed', "1;2;3;4;5");
					}else{
						$filter->AddVar('bed', $val);	
					}
					break;
				case 'bath':
					if($val == 0){
						$filter->AddVar('bath',"1;2;3;4;5");
					}else{
						$filter->AddVar('bath', $val);	
					}
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
					if($val == 'rent'){
						//$filter->AddVar('furnished','');
						//$filter->AddVar('pets','');
					}
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
				case 'pool':
					if($val == 0){
						$filter->AddVar('pool', 0);
					}
					elseif($val == 1){
						$filter->AddVar('pool', 1);
					}

				
				default:
					# code...
					break;
			}
		}

		switch ($_GET['properties']) {
			case 'room':
				$filter->AddVar('bath', 1);
				$filter->AddVar('bed', 1);
				$filter->AddVar('service', 'rent');	
				$filter->AddVar('pool', '');	
				$filter->AddVar('pets', '');

				break;
			case 'land':
				$filter->AddVar('bath', '');
				$filter->AddVar('bed', '');
				$filter->AddVar('service', 'sale');	
				$filter->AddVar('pool', '');	
				$filter->AddVar('furnished', '');
				$filter->AddVar('pets', '');
				
				break;
			case 'office':
				$filter->AddVar('bath', '');
				$filter->AddVar('bed', '');
				$filter->AddVar('service', 'rent');	
				$filter->AddVar('pool', '');
				$filter->AddVar('pets', '');
				break;
			
			default:
				# code...
				break;
		}
		
		$_SESSION['filter'] = serialize($filter);
		 $request = $filter->request();
		 $reponse = $bdd->query($request);
		 $donnees = $reponse->fetchAll();
	     $total = count($donnees);
	     echo $total;
	}
}

?>