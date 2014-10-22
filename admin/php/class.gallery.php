<?php

class gallery {

	//Var public
	public $id_gallery;
	public $nom_gallery;
	public $link_gallery;
	public $img_gallery;

	public $option_fichier;
	public $text_gallery;
	public $user_id;

	// Info a part
	private $tableau = array();
	private $current_user_id;


	public function __construct($donnees)
		{
		    if($donnees == '')
		      $this->create();
		    else
		      $this->getObject($donnees);

		  	
		  	
		  }

	private function create(){
		$this->current_user_id=$_SESSION['user_id'];
		global $bdd;
		$bdd->exec("INSERT INTO gallery (nom_gallery,img_gallery,user_id)
					VALUES ('nom_gallery','sample-image-250x150.png','$this->user_id ')");
		$reponse = $bdd->query("SELECT id_gallery FROM gallery ORDER BY id_gallery DESC");
			$gallery = $reponse->fetchAll();
			$id_gallery_new = $gallery[0]['id_gallery'];
			//Une fois l'objet crée dns la base de donnée, on le recrée pour l'utiliser.
			$this->getObject($id_gallery_new);
	}

	 public function getObject($donnees)
	  {
	  	global $bdd;
	   	$reponse = $bdd->query("SELECT * FROM gallery where id_gallery = '$donnees'");
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

	   public function save_one_data($name,$data)
	  {
	  	global $bdd;
	  	$id=$this->id_gallery;
	  		// On ne peut pas modifier la clés
		if($name == 'id_portfolio')
			return false;
		
	  	
	  	if($bdd->exec("UPDATE gallery SET ".$name." = '$data' WHERE id_gallery='$id'"))
	  		return true;
	  	else
	  		return false;
	  }

	  public function save_all_data()
	  {
	  	global $bdd;
	  	$id=$this->id_gallery;
	  	$tableau=$this->tableau;
	  		// On ne peut pas modifier la clés
		
			

		foreach ($tableau as $key => $value) {
			if($key != 'id_gallery')
				$this->save_one_data($key,$value);
		}
	  	
	  	
	  	
	  }
	  
	  //obligatoire car j'ai crée un tableau pour la sauvegarde
	  public function AddVar($name, $val)
	  {
	  	if(array_key_exists($name, $this->tableau)){
	  		$this->$name = $val;
        	$this->tableau[$name]=$val;

	  	}
	  }

	  public function Delete($donnees){
	  	global $bdd;
	  	$bdd->exec("DELETE FROM gallery WHERE id_gallery ='$donnees'");
	  }

	  public function GetFirstImage(){
	  	global $bdd;
	  	
	  	$link_gallery = explode(",", $this->link_gallery );
		$id_img=$link_gallery[0];
		$reponse2 = $bdd->query("SELECT nom_fichier FROM fichier WHERE id_fichier='$id_img'");
		$donnees2 = $reponse2->fetchAll();
						if(count($donnees2) !=0){
							$img_gallery=$donnees2[0]['nom_fichier'];
							$this->save_one_data('img_gallery',$img_gallery);
						}else{
							$img_gallery="sample-image-250x150.png";
						}
			
	  
			return $img_gallery;
	  }

}
?>