<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/nous.php';
require_once 'Modele/user.php';

class ControleurNous extends Controleur {
   private $nous;
   private $user;

  public function __construct() {
    $this->nous       = new nous(); 
	  $this->user       = new user();
  }

  public function index() {
	  $login = ""; 
		$user  = array();
	  if($this->requete->getSession()->existAttribut("login")){ 
	  $IdUser   =  $this->requete->getSession()->getAttribut("IdUser");
	  $user     = $this->user->getUsers($IdUser);
	  $login     = $this->requete->getSession()->getAttribut("login");
  
    }
  //Verifier s'il s'agit de la premiere connexion 
    if($user["pwupdated"]=="N"){
    $this->rediriger("pwupdate");
    exit();
    }
    $nous       = $this->nous->getNous();
	  $nous       = $nous->fetch();		
		//Envoyer les variables à la vue
    $this->genererVue(array('nous'=>$nous, 'login'=>$login, 'user'=>$user, 'menuNum'=>8));
  }
}