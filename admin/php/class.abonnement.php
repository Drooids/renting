<?php
include 'server.php';

class abonnement {

	public $id;
	public $date_start;
	public $date_start_timestamp;
	public $date_end;
	public $date_end_timestamp;
	public $offer;
	// Only if we need to add some option public $option;

	public $date_creation;
	public $user_id;
	public $active;

	private $tableau = array();
	public $request;

	public function __construct($donnees)
		{
		   
		   if($donnees == '')
		      $this->create();
		    else
		      $this->getObject($donnees);

		  }
	//Debut get Object
	public function getObject($donnees)
	  {
	  	global $bdd;
	   	$reponse = $bdd->query("SELECT * FROM abonnement where id = '$donnees'");
	   	$reponse = $reponse->fetchAll();

	   	if(count($reponse) != 0 ){
			   	foreach ($reponse[0] as $key => $value) {
			   		if(!is_int($key)){
			   			
			   			switch ($key) {
			   				case 'id':
			   					$this->tableau['id']=$value;
			   					$this->id=$value;
			   					break;
			   				case 'date_start':
			   					$this->tableau['date_start']=$value;
			   					$this->date_start=$value;
			   					break;
			   				case 'date_start_timestamp':
			   					$this->tableau['date_start_timestamp']=$value;
			   					$this->date_start_timestamp=$value;
			   					break;
			   				case 'date_end':
			   					$this->tableau['date_end']=$value;
			   					$this->date_end=$value;
			   					break;
			   				case 'date_end_timestamp':
			   					$this->tableau['date_end_timestamp']=$value;
			   					$this->date_end_timestamp=$value;
			   					break;
			   				case 'offer':
			   					$this->tableau['offer']=$value;
			   					$this->offer=$value;
			   					break;
			   				case 'date_creation':
			   					$this->tableau['date_creation']=$value;
			   					$this->date_creation=$value;
			   					break;
			   				case 'user_id':
			   					$this->tableau['user_id']=$value;
			   					$this->user_id=$value;
			   					break;
			   				case 'active':
			   					$this->tableau['active']=$value;
			   					$this->active=$value;
			   					break;
			   				

			   				default:
			   					# code...
			   					break;
			   			}
			   		
			   		}
			   	}
	   	}



	  }

	  // Fin Get Object

	 // Debut create
	  public function create()
	  {
	  	global $bdd;
	  	// On crée la gallery qui va avec l'objet
	  	//$this->current_user_id=$_SESSION['user_id'];
	  	

	  	$date = date('Y/m/d H:i:s');
	    $bdd->exec("INSERT INTO abonnement (date_creation)
								 VALUES ('$date')");

	    $reponse = $bdd->query("SELECT id FROM client ORDER BY id DESC LIMIT 1");
	   	$id = $reponse->fetchAll();
	   	$id = $id[0]['id'];

	   	$this->getObject($id);
	   	
	   

	  }
	 // Fin Create
}



?>