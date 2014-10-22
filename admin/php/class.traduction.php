<?php
include('server.php');

class traduction {
	public $id;
	public $original;
	public $type;
	public $name;
	//translation
	public $FR;
	public $US;
	public $VN;

	public $date_creation;
	public $date_modification;
	public $link_id;

	private $tableau = array();


	public function __construct($donnees)
		{
		   
		   if($donnees == '')
		      $this->create();
		    else
		      $this->getObject($donnees);

		  }

	public function getObject($donnees)
	  {
	  	// On crée le filter qu'on sauvegardera dans la session
	 	global $bdd;
	   	$reponse = $bdd->query("SELECT * FROM traduction where id = '$donnees'");
	   	$reponse = $reponse->fetchAll();
	   	//print_r($reponse[0]);
	   	foreach ($reponse[0] as $key => $value) {
	   		if(!is_int($key)){
	   			//echo "Key: ".$key." Value: ".$value."</br>";
	   			switch ($key) {
	   				case 'id':
	   					$this->tableau['id']=$value;
	   					$this->id=$value;
	   					break;
	   				case 'original':
	   					$this->tableau['original']=$value;
	   					$this->original=$value;
	   					break;
	   				case 'name':
	   					$this->tableau['name']=$value;
	   					$this->name=$value;
	   					break;
	   				case 'type':
	   					$this->tableau['type']=$value;
	   					$this->type=$value;
	   					break;
	   				case 'FR':
	   					$this->tableau['FR']=$value;
	   					$this->FR=$value;
	   					break;
	   				case 'US':
	   					$this->tableau['US']=$value;
	   					$this->US=$value;
	   					break;
	   				case 'VN':
	   					$this->tableau['VN']=$value;
	   					$this->VN=$value;
	   					break;
	   				case 'link_id':
	   					$this->tableau['link_id']=$value;
	   					$this->link_id=$value;
	   					break;
	   				case 'date_modification':
	   					$this->tableau['date_modification']=$value;
	   					$this->date_modification=$value;
	   					break;
	   				case 'date_creation':
	   					$this->tableau['date_creation']=$value;
	   					$this->date_creation=$value;
	   					break;
	   			

	   				default:
	   					# code...
	   					break;
	   			}
	   		
	   		}
	   		
	   	}

	  }

	  public function create()
	  {
	  	global $bdd;
	  	// On crée la gallery qui va avec l'objet
	  	//$this->current_user_id=$_SESSION['user_id'];
	  	

	  	$date = date('Y/m/d H:i:s');
	    $bdd->exec("INSERT INTO traduction (name,date_creation)
								 VALUES ('new traduction','$date')");

	    $reponse = $bdd->query("SELECT id FROM traduction ORDER BY id DESC LIMIT 1");
	   	$id = $reponse->fetchAll();
	   	$id = $id[0]['id'];

	   	$this->getObject($id);
	   

	  }

	  //obligatoire car j'ai crée un tableau pour la sauvegarde
	  public function AddVar($name, $val)
	  {
	  	if(array_key_exists($name, $this->tableau)){
	  		$this->$name = $val;
        	$this->tableau[$name]=$val;
        	
	  	}
	  }
		
	  public function save_one_data($name,$data)
	  {
	  	global $bdd;
	  	$id=$this->id;
	  		// On ne peut pas modifier la clés
		if($name == 'id')
			return false;
		
		$this->AddVar($name,$data);
		$date = date('Y/m/d H:i:s');

	  	if($bdd->exec("UPDATE traduction SET ".$name." = '$data' WHERE id ='$id'")){
	  		$bdd->exec("UPDATE traduction SET date_modification = '$date' WHERE id ='$id'");
	  		return true;
	  	}else{
	  		return false;
	  	}
	  		
	  }
}
//$traduction = new traduction('');
?>