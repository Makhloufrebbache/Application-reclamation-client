<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/user.php';

class ControleurAccueil extends Controleur { 
  private $user;
  public function __construct() {
	$this->user = new user();
	}
  public function index() {
	  $login = ""; 
		$user  = array();
	if($this->requete->getSession()->existAttribut("login")){ 
  //Récupérer l'id de l'utilisatereur 
	  $IdUser   =  $this->requete->getSession()->getAttribut("IdUser");
  //Récupérer l'utilisateur de l'id en question 
	  $user     = $this->user->getUsers($IdUser);
	  $login    = $this->requete->getSession()->getAttribut("login");
  }
  //Verifier s'il s'agit de la premiere connexion et de rediriger l'utilisateur à modifier son mot de passe
  if($user["pwupdated"]=="N"){
    $this->rediriger("pwupdate");
    exit();
  }
  //Passer les variable à la vue
    $this->genererVue(array('login'=>$login, 'user'=>$user));
  } 
  
}