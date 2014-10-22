<?php
include 'server.php';

  
	

class history {

  	public $id;
  	public $user;

	public $info;
	public $client;
	public $agency;
	public $portfolio;

	
	
	public $date_creation;
	public $ip;
	
	
	
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
	   	$reponse = $bdd->query("SELECT * FROM history where id = '$donnees'");
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
	   				case 'info':
	   					$this->tableau['info']=$value;
	   					$this->info=$value;
	   					break;
	   				case 'user':
	   					$this->tableau['user']=$value;
	   					$this->user=$value;
	   					break;
	   				case 'client':
	   					$this->tableau['client']=$value;
	   					$this->client=$value;
	   					break;
	   				case 'agency':
	   					$this->tableau['agency']=$value;
	   					$this->agency=$value;
	   					break;
	   				case 'portfolio':
	   					$this->tableau['portfolio']=$value;
	   					$this->portfolio=$value;
	   					break;
	   				case 'date_creation':
	   					$this->tableau['date_creation']=$value;
	   					$this->date_creation=$value;
	   					break;
	   				case 'ip':
	   					$this->tableau['ip']=$value;
	   					$this->ip=$value;
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
	  	$this->user=$_SESSION['user_id'];
	  	
	  	$ip = $_SERVER["REMOTE_ADDR"];
	  	$date = date('Y/m/d H:i:s');
	    $bdd->exec("INSERT INTO history (user,date_creation,ip)
								 VALUES ('$this->user','$date','$ip')");

	    $reponse = $bdd->query("SELECT id FROM history ORDER BY id DESC LIMIT 1");
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
	  	if($bdd->exec("UPDATE history SET ".$name." = '$data' WHERE id ='$id'")){
	  		
	  		return true;
	  	}else{
	  		return false;
	  	}
	  		
	  }

	 


}

?>