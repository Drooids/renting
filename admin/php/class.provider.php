<?php
include 'server.php';

  
	

class provider {

  	public $id;
	public $client_id;
	public $provider_name;
	public $provider_id;
	
	
	//private data
	

	private $tableau = array();
	public $request;

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
	   	$reponse = $bdd->query("SELECT * FROM provider where id = '$donnees'");
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
	   				case 'provider_name':
	   					$this->tableau['provider_name']=$value;
	   					$this->provider_name=$value;
	   					break;
	   				case 'provider_id':
	   					$this->tableau['provider_id']=$value;
	   					$this->provider_id=$value;
	   					break;
	   				case 'client_id':
	   					$this->tableau['client_id']=$value;
	   					$this->client_id=$value;
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
	    $bdd->exec("INSERT INTO provider (provider_name)
								 VALUES ('New Provider')");

	    $reponse = $bdd->query("SELECT id FROM provider ORDER BY id DESC LIMIT 1");
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
	  	if($bdd->exec("UPDATE provider SET ".$name." = '$data' WHERE id ='$id'")){
	  		return true;
	  	}else{
	  		return false;
	  	}
	  		
	  }

	  


}

?>