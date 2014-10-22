<?php
include 'server.php';

  
	

class agency {

  	public $id;
	public $name;
	public $name_company;
	public $email;
	public $adress;
	public $director;
	public $phone;
	public $language;
	public $date_modification;
	public $date_creation;

	//private data
	public $team;

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
	   	$reponse = $bdd->query("SELECT * FROM agency where id = '$donnees'");
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
	   				case 'name':
	   					$this->tableau['name']=$value;
	   					$this->name=$value;
	   					break;
	   				case 'email':
	   					$this->tableau['email']=$value;
	   					$this->email=$value;
	   					break;
	   				case 'name_company':
	   					$this->tableau['name_company']=$value;
	   					$this->name_company=$value;
	   					break;
	   				case 'adress':
	   					$this->tableau['adress']=$value;
	   					$this->adress=$value;
	   					break;
	   				case 'director':
	   					$this->tableau['director']=$value;
	   					$this->director=$value;
	   					break;
	   				case 'phone':
	   					$this->tableau['phone']=$value;
	   					$this->phone=$value;
	   					break;
	   				case 'language':
	   					$this->tableau['language']=$value;
	   					$this->language=$value;
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
	   	// Ajout de la team
	   	$id = $this->id;
	   	$reponse = $bdd->query("SELECT * FROM users where team_user = '$id'");
	   	$reponse = $reponse->fetchAll();
	   	$data ="";
	   	$total = count($reponse);
	   	echo "nombre de resultat: ".$total."</br>";
	   for($i=0; $i<$total; $i++) {
	   		
	   				
	   				if(($total-1) == $i){
	   					$data.=$reponse[$i]['user_id'];
	   				}else{
	   					$data.=$reponse[$i]['user_id'].";";
	   				}
	   			

	   		
	   	}
	   	$this->team=$data;

	  }

	  public function create()
	  {
	  	global $bdd;
	  	// On crée la gallery qui va avec l'objet
	  	$this->current_user_id=$_SESSION['user_id'];
	  	

	  	$date = date('Y/m/d H:i:s');
	    $bdd->exec("INSERT INTO agency (name,date_creation)
								 VALUES ('New Agency','$date')");

	    $reponse = $bdd->query("SELECT id FROM agency ORDER BY id DESC LIMIT 1");
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
	  	if($bdd->exec("UPDATE agency SET ".$name." = '$data' WHERE id ='$id'")){
	  		
	  		return true;
	  	}else{
	  		return false;
	  	}
	  		
	  }

	 


}

?>