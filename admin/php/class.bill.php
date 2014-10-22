<?php

class bill {

	static $tax =0.18;

	public $id;
	public $client_id;
	public $total;
	public $statut;
	public $date_creation;
	public $date_limit;
	public $date_modification;

	//private
	public $chiffre;
	public $benefice;


	public function __construct($donnees)
		{
		   
		   if($donnees == '')
		      $this->create();
		    else
		      $this->getObject($donnees);

		  }

	public function getObject($donnees)
	  {
	  

	  }

	public function create()
	  {
	  

	  }

	public function get_benefice($bonus){
		if($this->statut == 'paid'){
			$result = $this->total;
			$result = $result-$bonus;
			$result = $result-($result*$this->tax);
		}else{
			$result=0;
		}
		

		$this->benefice=$result;
		return result

	}

	public function get_tax($bonus){
		$result = $this->total;
		$result = $result*$this->tax;

		return result

	}

	public function get_benefice($bonus){
		$result = $this->total;

		return result

	}
}

?>