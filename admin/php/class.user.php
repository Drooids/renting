<?php
include 'server.php';

class user {

	public $id;
	public $username;
	public $name;
	public $last_name;
	public $photo;
	public $job;
	public $email;
	public $phone;
	public $company;
	public $password;
	public $adress;
	public $nationality;
	public $date_creation;
		public $last_connection;
	
	// For the abonnement
		public $offer;
		public $date_start;
		public $date_start_timestamp;
		public $date_end;
		public $date_end_timestamp;
		public $active;
	
	//Agency or gorupe of user
	public $info;
	//Right of the personne (working with the $info)
	public $right;
	
	//private data
	

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
	  	// On crée le filter qu'on sauvegardera dans la session
	 	global $bdd;
	   	$reponse = $bdd->query("SELECT * FROM users where user_id = '$donnees'");
	   	$reponse = $reponse->fetchAll();
	   	//print_r($reponse[0]);
	   	foreach ($reponse[0] as $key => $value) {
	   		if(!is_int($key)){
	   			//echo "Key: ".$key." Value: ".$value."</br>";
	   			switch ($key) {
	   				case 'user_id':
	   					$this->tableau['id']=$value;
	   					$this->id=$value;
	   					break;
	   				case 'username':
	   					$this->tableau['username']=$value;
	   					$this->username=$value;
	   					break;
	   				case 'password':
	   					$this->tableau['password']=$value;
	   					$this->password=$value;
	   					break;
	   				case 'email':
	   					$this->tableau['email']=$value;
	   					$this->email=$value;
	   					break;
	   				case 'prenom':
	   					$this->tableau['name']=$value;
	   					$this->name=$value;
	   					break;
	   				case 'nom':
	   					$this->tableau['last_name']=$value;
	   					$this->last_name=$value;
	   					break;
	   				case 'adress':
	   					$this->tableau['adress']=$value;
	   					$this->adress=$value;
	   					break;
	   				case 'photo':
	   					$this->tableau['photo']=$value;
	   					$this->photo=$value;
	   					break;
	   				case 'phone':
	   					$this->tableau['phone']=$value;
	   					$this->phone=$value;
	   					break;
	   				case 'job':
	   					$this->tableau['job']=$value;
	   					$this->job=$value;
	   					break;
	   				case 'nationality':
	   					$this->tableau['nationality']=$value;
	   					$this->nationality=$value;
	   					break;
	   				case 'company':
	   					$this->tableau['company']=$value;
	   					$this->company=$value;
	   					break;
	   				case 'last_connection':
	   					$this->tableau['last_connection']=$value;
	   					$this->last_connection=$value;
	   					break;
	   				case 'right_user':
	   					$this->tableau['right']=$value;
	   					$this->right=$value;
	   					break;
	   				case 'team_user':
	   					$this->tableau['info']=$value;
	   					$this->info=$value;
	   					break;
	   				case 'date_creation':
	   					$this->tableau['date_creation']=$value;
	   					$this->date_creation=$value;
	   					break;
	   					// Abonnement
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

	 
	  public function create()
	  {
	  	global $bdd;
	  	// On crée la gallery qui va avec l'objet
	  	//$this->current_user_id=$_SESSION['user_id'];
	  	

	  	$date = date('Y/m/d H:i:s');
	    $bdd->exec("INSERT INTO users (email, date_creation) VALUES ('hello','$date')");

	    $reponse = $bdd->query("SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1");
	   	$id = $reponse->fetchAll();
	   	$id = $id[0]['user_id'];

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
		if($name == 'user_id')
			return false;
		
		$this->AddVar($name,$data);
	  	$name = $this->remplace_key($name);
	  	if($bdd->exec("UPDATE users SET ".$name." = '$data' WHERE user_id ='$id'")){
	  		
	  		//$_SESSION['user'] = serialize($this);
	  		return true;
	  	}else{
	  		return false;
	  	}
	  		
	  }

	  //When u forget ur password
	  public function new_password(){
	  	global $bdd;
	  	$length=6;
	  	$key = '';
    	$keys = array_merge(range(0, 9), range('a', 'z'));

	    for ($i = 0; $i < $length; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }
	    	$crypted = md5($key);
    	$bdd->exec("UPDATE users SET password = '$crypted' WHERE user_id='$this->id'");
    		$essai = new email("New Password");
			$essai->add_text("Dear ".$this->last_name.",<br><br> This is your new password. Please change it when you.<br><br>");
			$essai->add_text("Password: ".$key);
			$message = $essai->affiche();
    	send_email('contact@home-saigon.com','homesaigon_puf','contact@home-saigon.com',$this->email,'contact@home-saigon.com','New Password',$message,'');
    		
	  }
	  //Chenge the password
	  public function change_password($key){
	  	global $bdd;
	  	
	    	$crypted = md5($key);
    	$bdd->exec("UPDATE users SET password = '$crypted' WHERE user_id='$this->id'");
    		$essai = new email("New Password");
			$essai->add_text("Dear ".$this->last_name.",<br><br> This is your new password. Please change it when you.<br><br>");
			$essai->add_text("Password: ".$key);
			$message = $essai->affiche();
    	send_email('contact@home-saigon.com','homesaigon_puf','contact@home-saigon.com',$this->email,'contact@home-saigon.com','New Password',$message,'');
    		
	  }

	  public function remplace_key($key){
	  	switch ($key) {
	   				case 'id':
	   					$value = "user_id";
	   					break;
	   				case 'username':
	   					$value = "username";
	   					break;
	   				case 'password':
	   					$value = "password";
	   					break;
	   				case 'email':
	   					$value = "email";
	   					break;
	   				case 'name':
	   					$value = "prenom";
	   					break;
	   				case 'last_name':
	   					$value = "nom";
	   					break;
	   				case 'photo':
	   					$value = "photo";
	   					break;
	   				case 'adress':
	   					$value = "adress";
	   					break;
	   				case 'phone':
	   					$value = "phone";
	   					break;
	   				case 'job':
	   					$value = "job";
	   					break;
	   				case 'company':
	   					$value = "company";
	   					break;
	   				case 'nationality':
	   					$value = "nationality";
	   					break;
	   				case 'right':
	   					$value = "right_user";
	   					break;
	   				case 'info':
	   					$value = "team_user";
	   					break;
	   				case 'date_creation':
	   					$value = "date_creation";
	   					break;
	   				case 'active':
	   					$value = "active";
	   					break;
	   				case 'offer':
	   					$value = "offer";
	   					break;
	   				case 'date_start':
	   					$value = "date_start";
	   					break;
	   				case 'date_end':
	   					$value = "date_end";
	   					break;
	   				case 'date_start_timestamp':
	   					$value = "date_start_timestamp";
	   					break;
	   				case 'date_end_timestamp':
	   					$value = "date_end_timestamp";
	   					break;
	   				case 'last_connection':
	   					$value = "last_connection";
	   					break;
	   				
	   				default:
	   					$value=$key;
	   					break;
	   			}
	   			return $value;
	  } 


	  public function verif_password($pass){
	  	if(md5($pass) == $this->password){
	  		return true;
	  	}else{
	  		return false;
	  	}
	  }

	 

}
 //Pour enregistrer les dernieres activitées
	if(isset($_SESSION['user_id'])){
		$userLast = new user($_SESSION['user_id']);
		$timestamp = date_timestamp_get(date_create());
			$userLast->save_one_data('last_connection',$timestamp);
	}
?>