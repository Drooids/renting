<?php
include 'server.php';

class portfolio {

	public $id_portfolio;
	public $nom_portfolio;
	public $link_portfolio;
	public $img_portfolio;
	public $actif_portfolio;
	public $type_portfolio;
	public $text_portfolio;
	public $bath_portfolio;
	public $bed_portfolio;
	public $price_portfolio;
	public $city_portfolio;
	public $district_portfolio;
	public $adress_portfolio;
	public $user_portfolio;
	public $team_portfolio;
	public $pool_portfolio;
	public $parking_portfolio;
	public $type_size_portfolio;
	public $service_portfolio;
	public $user_id;
	public $detail_portfolio;
	public $lat_portfolio;
	public $lng_portfolio;
	public $result_portfolio;
	public $date_portfolio;
	public $date_modification_portfolio;
	public $pets_portfolio;
	public $furnished_portfolio;
	public $date_available_portfolio;
	public $client;
	public $video_portfolio;

	public $link_adress_portfolio;

	private $tableau = array();
	private $current_user_id;

	public function __construct($donnees)
		{
		    if($donnees == 'create')
		      $this->create();
		    else
		      $this->getObject($donnees);

		  	
		  	
		  }

	public function create()
	  {
	  	global $bdd;
	  	// On crée la gallery qui va avec l'objet
	  	$this->current_user_id=$_SESSION['user_id'];
	  	$bdd->exec("INSERT INTO gallery (nom_gallery,img_gallery,user_id)
								 			VALUES ('nom_gallery','sample-image-250x150.png','$this->current_user_id')");

					$reponse = $bdd->query("SELECT id_gallery FROM gallery ORDER BY id_gallery DESC");
					$gallery = $reponse->fetchAll();
					$id_gallery_new = $gallery[0]['id_gallery'];
		$object_gallery = new gallery($id_gallery_new);
		$object_gallery->save_one_data('nom_gallery','gallery-'.$id_gallery_new);
		$text ="<p>&nbsp;Impeccable home with 6 bedrooms plus an office, ideally located in a cul-de-sac on a 10,000+ sqft lot, is highly upgraded &amp; wonderfully maintained. An entertainer&#39;s delight, this home features a pool with slide, in-ground spa, fire pit, sprawling grass area &amp; two large patios. Downstairs guest bedroom suite has private bath &amp; separate office. Kitchen with granite counters, upgraded cabinets, stainless steel appliances, large center.</p><ul><li><strong>Amenities:</strong> Hot Tub, Inground Pool, Patio/Deck, Kitchen Facilities, Pool - Outdoor, Curb, Pool-In Ground, Sidewalk</li><li><strong>Basement:</strong> No Basement</li><li><strong>Exterior:</strong> Stucco</li><li><strong>Fireplace:</strong> 2 Fireplaces</li><li><strong>Flooring:</strong> Mixed</li><li><strong>Garage:</strong> 3 Car Garage</li><li><strong>Air Conditioning:</strong> A/C</li><li><strong>Heat:</strong> Other</li><li><strong>Lot Size:</strong> Under 1/2 Acre</li><li><strong>Road Type:</strong> Private Road</li><li><strong>Rooms:</strong> Den/Study, Eat-in Kitchen, Family Room, Formal Dining Room, Formal Living Room, Reading Room, Laundry Room, Cinema</li><li><strong>Roof:</strong> Cement Tiles</li><li><strong>Sewer: </strong>City System</li><li><strong>Style:</strong> Modern, Mediterranean</li><li><strong>Water:</strong> City System</li><li><strong>Zoning:</strong> Residential</li></ul>";
		$date = date('Y/m/d H:i:s');
	    $bdd->exec("INSERT INTO portfolio (nom_portfolio,actif_portfolio,text_portfolio,img_portfolio,link_portfolio,type_portfolio,bed_portfolio,
	    								bath_portfolio,parking_portfolio,pool_portfolio,service_portfolio,user_id,date_portfolio,date_available_portfolio,lat_portfolio,lng_portfolio,city_portfolio)
								 VALUES ('Name Property',1,'$text','sample-image-250x150.png','$id_gallery_new','appartment','1','1','0','0','rent','$this->current_user_id','$date','$date','10.771549','106.698310','hcmc')");

	    $reponse = $bdd->query("SELECT id_portfolio FROM portfolio ORDER BY id_portfolio DESC LIMIT 1");
	   	$id = $reponse->fetchAll();
	   	$id = $id[0]['id_portfolio'];

	   	$this->getObject($id);
	   	$history = new history('');
	   	$history->save_one_data('portfolio',$id);
	  }

	 public function getObject($donnees)
	  {
	  	global $bdd;
	   	$reponse = $bdd->query("SELECT * FROM portfolio where id_portfolio = '$donnees'");
	   	$reponse = $reponse->fetchAll();
	   	//print_r($reponse[0]);
	   	foreach ($reponse[0] as $key => $value) {
	   		if(!is_int($key)){
	   			//echo "Key: ".$key." Value: ".$value."</br>";
	   			$this->tableau[$key]=$value;
	   			$this->$key=$value;
	   		//echo $this->_.$key;
	   		}
	   		
	   	}

	  }

	  public function save_one_data($name,$data)
	  {
	  	global $bdd;
	  	$id=$this->id_portfolio;
	  		// On ne peut pas modifier la clés
		if($name == 'id_portfolio')
			return false;
		
	  	
	  	if($bdd->exec("UPDATE portfolio SET ".$name." = '$data' WHERE id_portfolio='$id'")){
	  	/*	$history = new history('');
	   		$history->save_one_data('portfolio',$id);
	   		$history->save_one_data('info',"Update of: '".$name."' for: ".$data);
	   	*/
	   		return true;
	  	}else{
	  		return false;
	  	}
	  		
	  }

	  public function save_all_data()
	  {
	  	global $bdd;
	  	$id=$this->id_portfolio;
	  	$tableau=$this->tableau;

 		// On ne peut pas modifier la clés
		
			

		foreach ($tableau as $key => $value) {
			if($key != 'id_portfolio'){
				$this->save_one_data($key,$value);
			}
				
		}
	  	$history = new history('');
	   		$history->save_one_data('portfolio',$id);
	   		$history->save_one_data('info',"Update of the property");
	  	
	  	
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



}
/*
*
*  ICI JE TESTE
*
*
*/
/*
$hello = new portfolio('77');
$hello->AddVar('nom_portfolio','hello the world');
$hello->AddVar('type_portfolio','house');
$hello->save_all_data();
echo $hello->nom_portfolio;
*/
?>