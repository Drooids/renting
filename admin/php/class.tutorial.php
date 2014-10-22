<?php
include 'server.php';

class tutorial {
	public $id;
	public $tuto_1;
	public $tuto_2;
	public $tuto_3;
	public $tuto_4;
	public $tuto_5;
	public $tuto_6;
	public $tuto_7;
	public $tuto_8;
	public $tuto_9;
	public $tuto_10;

	public $user_id;
	public $date_creation;


	private $tableau = array();
	public $request;

	public function __construct($donnees)
		{
		   
		   if($donnees == 'create')
		      $this->create();
		    else
		      $this->getObject($donnees);

		  }

	public function getObject($donnees)
	  {
	  	global $bdd;
	   	$reponse = $bdd->query("SELECT * FROM tutorial where id = '$donnees'");
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

	  public function create()
	  {
	  	global $bdd;
	  	// On crée la gallery qui va avec l'objet
	  	//$this->current_user_id=$_SESSION['user_id'];
	  	

	  	$date = date('Y/m/d H:i:s');
	    $bdd->exec("INSERT INTO tutorial (date_creation)
								 VALUES ('$date')");

	    $reponse = $bdd->query("SELECT id FROM tutorial ORDER BY id DESC LIMIT 1");
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
	  	if($bdd->exec("UPDATE tutorial SET ".$name." = '$data' WHERE id ='$id'")){
	  		return true;
	  	}else{
	  		return false;
	  	}
	  		
	  }

	  public function check($num){
	  	switch ($num) {
	  		case '1':
	  			if($this->tuto_1== 1)
	  				return true;
	  			else
	  				return false;
	  			break;
	  		case '2':
	  			if($this->tuto_2 == 1)
	  				return true;
	  			else
	  				return false;
	  			break;
	  		case '3':
	  			if($this->tuto_3 == 1)
	  				return true;
	  			else
	  				return false;
	  			break;
	  		case '4':
	  			if($this->tuto_4 == 1)
	  				return true;
	  			else
	  				return false;
	  			break;
	  		case '5':
	  			if($this->tuto_5 == 1)
	  				return true;
	  			else
	  				return false;
	  			break;
	  		case '6':
	  			if($this->tuto_6 == 1)
	  				return true;
	  			else
	  				return false;
	  			break;
	  		case '7':
	  			if($this->tuto_7 == 1)
	  				return true;
	  			else
	  				return false;
	  			break;
	  		case '8':
	  			if($this->tuto_8 == 1)
	  				return true;
	  			else
	  				return false;
	  			break;
	  		case '9':
	  			if($this->tuto_9 == 1)
	  				return true;
	  			else
	  				return false;
	  			break;
	  		case '10':
	  			if($this->tuto_10 == 1)
	  				return true;
	  			else
	  				return false;
	  			break;
	  		
	  		default:
	  			# code...
	  			break;
	  	}
	  }

}


?>