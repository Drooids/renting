<?php
include 'server.php';

class filter {

	public $district;
	public $bed;
	public $bath;
	public $price_min;
	public $price_max;
	public $service;
	public $properties;
	public $available;
	public $furnished;
	public $pets;
	public $square_min;
	public $square_max;
	public $pool;
	public $sort;

	private $tableau = array();
	public $request;
	

	public function __construct()
		{
		   
		    $this->create();

		  }

	public function create()
	  {
	  	// On crée le filter qu'on sauvegardera dans la session
	 $this->tableau['district']="";
	 $this->tableau['bed']="";
	 $this->tableau['bath']="";
	 $this->tableau['price_min']="";
	 $this->tableau['price_max']="";
	 $this->tableau['service']="";
	 $this->tableau['properties']="";
	 $this->tableau['available']="";
	 $this->tableau['furnished']="";
	 $this->tableau['pets']="";
	 $this->tableau['square_min']="";
	 $this->tableau['square_max']="";
	 $this->tableau['pool']="";
	 $this->tableau['sort']="";

	  }

	 public function request(){
	 	$string = "SELECT * FROM portfolio WHERE 1 AND actif_portfolio = 1 ";
	 	foreach ($this->tableau as $key => $value) {
	 		//on supprime les cas où les variables sont nuls;
	 		if($value != ''){
	 			// maintenant on fait les selections
	 			switch ($key) {
	 				case 'district':
	 					$value_explode= explode(";", $value);
	 					$size =count($value_explode)-1;
	 					foreach ($value_explode as $key => $value) {
	 						if($key == 0)
	 							$string.=" AND ( district_portfolio ='".$value."'";
	 						else
	 							$string.=" OR district_portfolio = '".$value."'";
	 						if($key == $size)
	 							$string.=") ";
	 					}
	 					
	 					break;
	 				case 'bed':
	 					$value_explode= explode(";", $value);
	 					$size =count($value_explode)-1;
	 					foreach ($value_explode as $key => $value) {
	 						if($key == 0)
	 							$string.=" AND ( bed_portfolio ='".$value."'";
	 						else
	 							$string.=" OR bed_portfolio  ='".$value."'";
	 						if($key == $size)
	 							$string.=") ";
	 					}
	 					break;
	 				case 'bath':
	 					$value_explode= explode(";", $value);
	 					$size =count($value_explode)-1;
	 					foreach ($value_explode as $key => $value) {
	 						if($key == 0)
	 							$string.=" AND ( bath_portfolio ='".$value."'";
	 						else
	 							$string.=" OR bath_portfolio  ='".$value."'";
	 						if($key == $size)
	 							$string.=") ";
	 					}
	 					break;
	 				case 'price_min':
	 					$string.=" AND ( price_portfolio >= '".$value."'";
	 					break;
	 				case 'price_max':
	 					$string.=" AND price_portfolio <='".$value."' ) ";
	 					break;
	 				case 'square_min':
	 					$string.=" AND ( type_size_portfolio >= '".$value."'";
	 					break;
	 				case 'square_max':
	 					$string.=" AND type_size_portfolio <='".$value."' ) ";
	 					break;
	 				case 'service':
	 					$string.=" AND service_portfolio ='".$value."'";
	 					break;
	 				case 'properties':
	 					$string.=" AND type_portfolio ='".$value."'";
	 					break;
	 				case 'available':
	 					$value = date("Y-m-d", strtotime($value));
	 					$string.=" AND date_available_portfolio <'".$value."'";
	 					break;
	 				case 'furnished':
	 					$string.=" AND furnished_portfolio ='".$value."'";
	 					break;
	 				case 'pets':
	 					$string.=" AND pets_portfolio ='".$value."'";
	 					break;
	 				case 'parking':
	 					$string.=" AND parking_portfolio ='".$value."'";
	 					break;
	 				case 'pool':
	 					$string.=" AND pool_portfolio ='".$value."'";
	 					break;
	 				case 'sort':
	 						
			 				switch ($value) {
			 					case '1':
			 						$string.= " ORDER BY id_portfolio DESC";
			 						break;
			 					case '2':
			 						$string.= " ORDER BY price_portfolio DESC";
			 						break;
			 					case '3':
			 						$string.= " ORDER BY price_portfolio ";
			 						break;
			 					case '4':
			 						$string.= " ORDER BY nom_portfolio ";
			 						break;
			 					case '5':
			 						$string.= " ORDER BY nom_portfolio DESC";
			 						break;
			 					default:
			 						# code...
			 						break;
			 				}
						break;
	 				default:
	 					$string.=" ";
	 					break;
	 			}


	 		}
	 	}
	 	return $string;
	 }

	  

	  //obligatoire car j'ai crée un tableau pour la sauvegarde
	  public function AddVar($name, $val)
	  {
	  	if(array_key_exists($name, $this->tableau)){
	  		$this->$name = $val;
        	$this->tableau[$name]=$val;
        	
	  	}
	  }
		
	  public function affiche_test(){
	  	print_r($this->tableau);
	  }

	  public function request_limit($value){
	  	$request = $this->request();
	  	if($value != 0){
			$prev = ($value-1)*5;
			$next = $value*5;
			$string = " LIMIT ".$prev." , ".$next;
			$request .=$string;
		}
	  	
	  	
	  	return $request;
	  }

	  public function affiche_one_request($key){
	  	$value = $this->tableau[$key];
	  	return $value;
	  }



}
?>