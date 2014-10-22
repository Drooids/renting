<?php

class client {
public $_nom;
private $_prenom;
private $_id;
private $_email;

public function __construct($donnees)
  {
    if($donnees == '')
      $this->create($donnees);
    else
      $this->recuperation($donnees);
  }


 public function create($donnees)
  {
    $this->_nom='Rebmann';
    $this->_prenom='Guillaume';
    $this->_id='1';
    $this->_email='guigui@gmail.com';
  }
// GETTERS //

 public function nom()
  {
    return $this->_nom;
  }

  public function prenom()
  {
    return $this->_prenom;
  }

  public function id()
  {
    return $this->_id;
  }

  public function email()
  {
    return $this->_email;
  }
}
$hello = new client('');
echo $hello->_nom;
$hello->_nom = 'rebmann 1234';
echo $hello->_nom;
//echo $hello->$nom;
?>