<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/user.php';
require_once 'Modele/categorieClient.php';

class ControleurCategorieclient extends Controleur {

  private $user;
  private $catclient;

  public function __construct() {
	$this->user           = new user();
	$this->catclient      = new catclient();

  }

  public function index() {
	  
	    $login = ""; 
		$user  = array();
	  if($this->requete->getSession()->existAttribut("login")){ //
	    $IdUser   =  $this->requete->getSession()->getAttribut("IdUser");
	    $user      = $this->user->getUsers($IdUser);
	    $login      = $this->requete->getSession()->getAttribut("login");
        //var_dump($user);
        	}else{//Si l'utilisateur n'est pas connecter il sera vers la page d'acceuil
		$this->rediriger("index.php");}
		//Ajout d'une catégorie client
		$Code             = "";
		$Designation      = "";
		$msg                = "";
		if($this->requete->existeParametre("Code")){ //Recupération de Forms Data
       $Code       = $this->requete->getParametre("Code");
	   if($this->requete->existeParametre("Designation"))
       $Designation       = $this->requete->getParametre("Designation");
	   // Insersion effective de la ligne
	   $this->catclient ->addcatClient($Code, $Designation);
	    $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="opacity: 1;">
  <strong>Success!</strong> réclamation insérée.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
 </div>';
		}
		
    $this->genererVue(array('login'=>$login, 'user'=>$user, 'msg'=>$msg, 'menuNum'=>4));
  }
  
  }