<?php
include 'server.php';

  
	

class client {

  	public $id;
	public $name;
	public $last_name;
	public $name_company;
	public $adress;
	public $job;
	public $email;
	public $phone;
	public $photo;
		public $nationality;
		public $skype;
		public $newsletter;
	public $language;
	public $favoris;
	public $password;

	public $date_modification;
	public $date_creation;
	public $last_connection;
	public $delete_client;

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
	   	$reponse = $bdd->query("SELECT * FROM client where id = '$donnees'");
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
	   				case 'token':
	   					$this->tableau['token']=$value;
	   					$this->token=$value;
	   					break;
	   				case 'last_name':
	   					$this->tableau['last_name']=$value;
	   					$this->last_name=$value;
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
	   				case 'job':
	   					$this->tableau['job']=$value;
	   					$this->job=$value;
	   					break;
	   				case 'password':
	   					$this->tableau['password']=$value;
	   					$this->password=$value;
	   					break;
	   				case 'nationality':
	   					$this->tableau['nationality']=$value;
	   					$this->nationality=$value;
	   					break;
	   				case 'skype':
	   					$this->tableau['skype']=$value;
	   					$this->skype=$value;
	   					break;
	   				case 'newsletter':
	   					$this->tableau['newsletter']=$value;
	   					$this->newsletter=$value;
	   					break;
	   				case 'phone':
	   					$this->tableau['phone']=$value;
	   					$this->phone=$value;
	   					break;
	   				case 'photo':
	   					$this->tableau['photo']=$value;
	   					$this->photo=$value;
	   					break;
	   				case 'language':
	   					$this->tableau['language']=$value;
	   					$this->language=$value;
	   					break;
	   				case 'statut':
	   					$this->tableau['statut']=$value;
	   					$this->statut=$value;
	   					break;
	   				case 'favoris':
	   					$this->tableau['favoris']=$value;
	   					$this->favoris=$value;
	   					break;
	   				case 'date_modification':
	   					$this->tableau['date_modification']=$value;
	   					$this->date_modification=$value;
	   					break;
	   				case 'date_creation':
	   					$this->tableau['date_creation']=$value;
	   					$this->date_creation=$value;
	   					break;
	   				case 'delete_client':
	   					$this->tableau['delete_client']=$value;
	   					$this->delete_client=$value;
	   					break;
	   				case 'last_connection':
	   					$this->tableau['last_connection']=$value;
	   					$this->last_connection=$value;
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
	    $bdd->exec("INSERT INTO client (name,date_creation)
								 VALUES ('New Client','$date')");

	    $reponse = $bdd->query("SELECT id FROM client ORDER BY id DESC LIMIT 1");
	   	$id = $reponse->fetchAll();
	   	$id = $id[0]['id'];

	   	$this->getObject($id);
	   	$token = md5($id.''.$date);
	   	$this->save_one_data('token',$token);
	   

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
	  	if($bdd->exec("UPDATE client SET ".$name." = '$data' WHERE id ='$id'")){
	  		return true;
	  	}else{
	  		return false;
	  	}
	  		
	  }

	  public function get_user_right(){
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
	  }

	  public function delete(){
	  	global $bdd;
	  	$this->save_one_data('delete_client','yes');
	  }


}

	//Pour enregistrer les dernieres activitées
	if(isset($_SESSION['client_id'])){
		$client = new client($_SESSION['client_id']);
		$timestamp = date_timestamp_get(date_create());
			$client->save_one_data('last_connection',$timestamp);
	}

?>