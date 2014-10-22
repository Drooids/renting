<?php
include 'server.php';

  
	

class owner {

  	public $id;
	public $owner_name;
	public $owner_lastname;
		public $owner_company;
		public $owner_adress;
		public $owner_comment;
	public $owner_email;
	public $owner_phone;
	public $owner_nationality;
	public $owner_date_modification;
	public $owner_date_creation;
		public $owner_delete;
	public $owner_userid;
	public $statut;
	
	
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
	   	$reponse = $bdd->query("SELECT * FROM owner where id = '$donnees'");
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
	   				case 'owner_name':
	   					$this->tableau['owner_name']=$value;
	   					$this->owner_name=$value;
	   					break;
	   				case 'owner_lastname':
	   					$this->tableau['owner_lastname']=$value;
	   					$this->owner_lastname=$value;
	   					break;
	   				case 'owner_email':
	   					$this->tableau['owner_email']=$value;
	   					$this->owner_email=$value;
	   					break;
	   				case 'owner_company':
	   					$this->tableau['owner_company']=$value;
	   					$this->owner_company=$value;
	   					break;
	   				case 'owner_adress':
	   					$this->tableau['owner_adress']=$value;
	   					$this->owner_adress=$value;
	   					break;
	   				case 'owner_nationality':
	   					$this->tableau['owner_nationality']=$value;
	   					$this->owner_nationality=$value;
	   					break;
	   				case 'owner_phone':
	   					$this->tableau['owner_phone']=$value;
	   					$this->owner_phone=$value;
	   					break;
	   				case 'owner_date_modification':
	   					$this->tableau['owner_date_modification']=$value;
	   					$this->owner_date_modification=$value;
	   					break;
	   				case 'owner_date_creation':
	   					$this->tableau['owner_date_creation']=$value;
	   					$this->owner_date_creation=$value;
	   					break;
	   				case 'owner_delete':
	   					$this->tableau['owner_delete']=$value;
	   					$this->owner_delete=$value;
	   					break;
	   				case 'owner_comment':
	   					$this->tableau['owner_comment']=$value;
	   					$this->owner_comment=$value;
	   					break;
	   				case 'owner_userid':
	   					$this->tableau['owner_userid']=$value;
	   					$this->owner_userid=$value;
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
	    $bdd->exec("INSERT INTO owner (owner_delete,owner_date_creation)
								 VALUES (0,'$date')");

	    $reponse = $bdd->query("SELECT id FROM owner ORDER BY id DESC LIMIT 1");
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
	  	if($bdd->exec("UPDATE owner SET ".$name." = '$data' WHERE id ='$id'")){
	  		return true;
	  	}else{
	  		return false;
	  	}
	  		
	  }

	  public function getAccount(){
	  	echo "1 000$";
	  }
	  /*public function get_user_right(){
	  	global $bdd;
	  	$id=$this->user_id;

	  	$user = new user($id);
	  	return $user->right;
	  }

	  public function get_user_info(){
	  	global $bdd;
	  	$id=$this->user_id;

	  	$user = new user($id);
	  	return $user->info;
	  }*/

	  public function delete(){
	  	global $bdd;
	  	$this->save_one_data('owner_delete',1);
	  }


}
?>