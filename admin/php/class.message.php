<?php
include('server.php');

class message {
	public $id;
	public $content;
	public $message_from;
	public $message_to;
	public $user;
	
	public $type;
	public $link_id;

	public $read;
	public $message_timestamp;
	public $date_creation;
	public $date_modification;

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
	   	$reponse = $bdd->query("SELECT * FROM message where id = '$donnees'");
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
	   				case 'content':
	   					$this->tableau['content']=$value;
	   					$this->content=$value;
	   					break;
	   				case 'message_to':
	   					$this->tableau['message_to']=$value;
	   					$this->message_to=$value;
	   					break;
	   				case 'message_from':
	   					$this->tableau['message_from']=$value;
	   					$this->message_from=$value;
	   					break;
	   				case 'type':
	   					$this->tableau['type']=$value;
	   					$this->type=$value;
	   					break;
	   				case 'user':
	   					$this->tableau['user']=$value;
	   					$this->user=$value;
	   					break;

	   				case 'link_id':
	   					$this->tableau['link_id']=$value;
	   					$this->link_id=$value;
	   					break;
	   				case 'message_timestamp':
	   					$this->tableau['message_timestamp']=$value;
	   					$this->message_timestamp=$value;
	   					break;
	   				case 'read':
	   					$this->tableau['read']=$value;
	   					$this->read=$value;
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
	    $bdd->exec("INSERT INTO message (content,date_creation)
								 VALUES ('New content','$date')");

	    $reponse = $bdd->query("SELECT id FROM message ORDER BY id DESC LIMIT 1");
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

	  	if($bdd->exec("UPDATE message SET ".$name." = '$data' WHERE id ='$id'")){
	  		
	  		return true;
	  	}else{
	  		return false;
	  	}
	  		
	  }
}
?>