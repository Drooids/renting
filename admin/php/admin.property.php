<?php session_start();
include('class.load.php');
$result = "" ;
foreach ($_GET as $key => $value) {
	
	$_GET[$key]=str_replace("'","\'",$value);
	$_GET[$key]=str_replace('"','\"',$value);
}
if(isset($_GET['action'])){
	if($_GET['action'] == 'save'){
			$portfolio = new portfolio($_GET['propertie']);
			if(!isset($_GET['service_portfolio']))
				$portfolio->save_one_data('service_portfolio','rent');
			if(!isset($_GET['furnished_portfolio']))
				$portfolio->save_one_data('furnished_portfolio',0);
			if(!isset($_GET['parking_portfolio']))
				$portfolio->save_one_data('parking_portfolio',0);
			if(!isset($_GET['pets_portfolio']))
				$portfolio->save_one_data('pets_portfolio',0);
			if(!isset($_GET['pool_portfolio']))
				$portfolio->save_one_data('pool_portfolio',0);
			if(!isset($_GET['link_adress_portfolio']))
				$portfolio->save_one_data('link_adress_portfolio',0);

		foreach ($_GET as $key => $value) {
			
			switch ($key) {
				case 'search_query':
					
					break;
				case 'action':
					
					break;
				case 'propertie':
					
					break;
				case 'chn_city':
					if($value == "")
						break;
					$value = explode('_', $value);
					$value = $value[1];
						switch ($value) {
							case 'hcmc':
								$portfolio->save_one_data('city_portfolio','Ho Chi Minh City');
								break;
							
							default:
								# code...
								break;
						}
					
					break;
				case 'chn_district':
					if($value == "")
						break;
					$value = explode('_', $value);
					$value = $value[2];
				if($value == "Phu Nhuan" || $value == "Go Vap" || $value == "Tan Binh" || $value == "Tan Phu" || $value == "Binh Thanh" || $value == "Thu Duc" || $value == "Bin Tan"){
					$value=$value." District";
				}else{
					$value="District ".$value;
				}
				$portfolio->save_one_data('district_portfolio',$value);
					break;
				case 'date_available_portfolio':
					$portfolio->save_one_data($key,$value);
					break;
				case 'service_portfolio':
					if($value == 'on')
						$value = "rent";
					$portfolio->save_one_data($key,$value);
					break;

				case 'furnished_portfolio':
					if($value == 'on')
						$value = 1;
					$portfolio->save_one_data($key,$value);
					break;
				case 'parking_portfolio':
					if($value == 'on')
						$value = 1;
					$portfolio->save_one_data($key,$value);
					break;
				case 'pets_portfolio':
					if($value == 'on')
						$value = 1;
					$portfolio->save_one_data($key,$value);
					break;
				case 'pool_portfolio':
					if($value == 'on')
						$value = 1;
					$portfolio->save_one_data($key,$value);
					break;
				case 'price_portfolio':
				 	$value = htmlspecialchars($value, ENT_QUOTES);
					$portfolio->save_one_data($key,preg_replace("/[^0-9]/","",$value));
					break;
				case 'type_portfolio':
					$portfolio->save_one_data($key,$value);
					break;
				case 'type_size_portfolio':
					$portfolio->save_one_data($key,preg_replace("/[^0-9]/","",$value));
					break;
				case 'lat_portfolio':
					$portfolio->save_one_data($key,$value);
					break;
				case 'lng_portfolio':
					$portfolio->save_one_data($key,$value);
					break;
				case 'bath_portfolio':
					if($value == "")
						$value = 0;
					$portfolio->save_one_data($key,$value);
					break;
				case 'bed_portfolio':
					if($value == "")
						$value = 0;
					$portfolio->save_one_data($key,$value);
					break;
				case 'adress_portfolio':
				 	$value = htmlspecialchars($value, ENT_QUOTES);
					$portfolio->save_one_data($key,$value);
					break;
				case 'link_adress_portfolio':
					if($value != 0){
						$portfolio_link = new portfolio($value);

							$portfolio->save_one_data('district_portfolio',$portfolio_link->district_portfolio);
							$portfolio->save_one_data('city_portfolio',$portfolio_link->city_portfolio);
							$portfolio->save_one_data('adress_portfolio',$portfolio_link->adress_portfolio);
							$portfolio->save_one_data('lat_portfolio',$portfolio_link->lat_portfolio);
							$portfolio->save_one_data('lng_portfolio',$portfolio_link->lng_portfolio);
							$portfolio->save_one_data($key,$value);
					}

						
					break;
				case 'nom_portfolio':
					 $value = htmlspecialchars($value, ENT_QUOTES);
					$portfolio->save_one_data($key,$value);
					break;
				case 'detail_portfolio':
					$portfolio->save_one_data($key,$value);
					break;
				case 'text_portfolio':
					$portfolio->save_one_data($key,$value);
					break;
				case 'link_gallery':
					$gallery = new gallery($portfolio->link_portfolio);
					$gallery->save_one_data('link_gallery',$value);
					break;
				case 'result_portfolio':
					$portfolio->save_one_data($key,$value);
					switch ($value) {
						case '0':
							# code...
							break;
						case '1':
							# code...
							break;
						case '2':
							# code...
							break;
						case '3':
							# code...
							break;
						
						default:
							# code...
							break;
					}
					break;


			}
		}
	}elseif($_GET['action'] == 'create'){
		//$portfolio = new portfolio('');
		//$portfolio->save_one_data('user_portfolio',$_GET['owner']);
		//echo $portfolio->id_portfolio;
	}
}else{
	echo "error";
}
		

?>