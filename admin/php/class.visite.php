<?php
include 'server.php';

  
	

class visite {

  	public $id;
	public $date_visite;
		public $date_visite_timestamp;
		public $comment;
		public $actif_visite;
		public $statut;
	public $clients;
	public $portfolio;
	public $date_creation;
	public $user_id;
	public $available;
	public $date_modification;
	
	
	//private data
	

	private $tableau = array();
	public $request;

	public function __construct($donnees)
		{
		   
		   if($donnees != '')
		      $this->getObject($donnees);
		    else
		      $this->create($donnees);

		  }

	public function getObject($donnees)
	  {
	  	// On crée le filter qu'on sauvegardera dans la session
	 	global $bdd;
	   	$reponse = $bdd->query("SELECT * FROM visite where id = '$donnees'");
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
	   				case 'date_visite':
	   					$this->tableau['date_visite']=$value;
	   					$this->date_visite=$value;
	   					break;
	   				case 'clients':
	   					$this->tableau['clients']=$value;
	   					$this->clients=$value;
	   					break;
	   				case 'portfolio':
	   					$this->tableau['portfolio']=$value;
	   					$this->portfolio=$value;
	   					break;
	   				case 'actif_visite':
	   					$this->tableau['actif_visite']=$value;
	   					$this->actif_visite=$value;
	   					break;
	   				case 'date_visite_timestamp':
	   					$this->tableau['date_visite_timestamp']=$value;
	   					$this->date_visite_timestamp=$value;
	   					break;
	   				case 'statut':
	   					$this->tableau['statut']=$value;
	   					$this->statut=$value;
	   					break;
	   				case 'comment':
	   					$this->tableau['comment']=$value;
	   					$this->comment=$value;
	   					break;
	   				case 'date_creation':
	   					$this->tableau['date_creation']=$value;
	   					$this->date_creation=$value;
	   					break;
	   				case 'user_id':
	   					$this->tableau['user_id']=$value;
	   					$this->user_id=$value;
	   					break;
	   				case 'date_modification':
	   					$this->tableau['date_modification']=$value;
	   					$this->date_modification=$value;
	   					break;
	   				case 'available':
	   					$this->tableau['available']=$value;
	   					$this->available=$value;
	   					break;
	   				

	   				default:
	   					# code...
	   					break;
	   			}
	   		
	   		}
	   		
	   	}

	  }

	  public function create($donnees)
	  {
	  	global $bdd;
	  	// On crée la gallery qui va avec l'objet
	  	//$this->current_user_id=$_SESSION['user_id'];
	  	

	  	$date = date('Y/m/d H:i:s');
	    $bdd->exec("INSERT INTO visite (clients,date_creation,available)
								 VALUES ('$donnees','$date','yes')");

	    $reponse = $bdd->query("SELECT id FROM visite ORDER BY id DESC LIMIT 1");
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
	  	if($bdd->exec("UPDATE visite SET ".$name." = '$data' WHERE id ='$id'")){
	  		return true;
	  	}else{
	  		return false;
	  	}
	  		
	  }

	  

	  public function delete(){
	  	global $bdd;
	  	$this->save_one_data('available','no');
	  	$date = date('Y/m/d H:i:s');
	  	$this->save_one_data('date_modification',$date);
	  	
	  }


}

?>