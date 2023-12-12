<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/user.php';
require_once 'Modele/Default.php';

class ControleurDefaut extends Controleur {
    private $user;
    private $defaut;

    public function __construct() {
	$this->user        = new user();
	$this->defaut      = new Defaut();
  }
  public function index() {
	  
	    $login = ""; 
		$user  = array();
	  if($this->requete->getSession()->existAttribut("login")){ 
	    $IdUser   =  $this->requete->getSession()->getAttribut("IdUser");
	    $user     = $this->user->getUsers($IdUser);
	    $login    = $this->requete->getSession()->getAttribut("login");
      }else{
		$this->rediriger("index.php");		
      }
    //Ajout d'une catégorie défaut
	    $Defaut             = "";
		$Code_Categorie     = "";
		$msg                = "";
		if($this->requete->existeParametre("Defaut")){//Recupération de Forms Data
       
        $Defaut             = $this->requete->getParametre("Defaut");
	   if($this->requete->existeParametre("Code_Categorie"))
	    $Code_Categorie     = $this->requete->getParametre("Code_Categorie");
	   
	// Insersion effective de la ligne
	   $this->defaut ->addDefaut($Defaut, $Code_Categorie);
	    $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="opacity: 1;">
               <strong>Success!</strong> réclamation insérée.
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
                </div>';
		}
		
    $this->genererVue(array('login'=>$login, 'user'=>$user, 'msg'=>$msg, 'menuNum'=>6));
  }
  
  }