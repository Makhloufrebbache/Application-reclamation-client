<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Client.php';
require_once 'Modele/Wilayas.php';
require_once 'Modele/user.php';

class ControleurClient extends Controleur {

  private $wilaya;
  private $user;
  private $client;

  public function __construct() {
	$this->user           = new user();
	$this->client         = new clients();
	$this->wilaya         = new wilayas();
  }

  public function index() {
	  
	    $login = ""; 
		$user  = array();
	  if($this->requete->getSession()->existAttribut("login")){ //
	    $IdUser          =  $this->requete->getSession()->getAttribut("IdUser");
	    $user            = $this->user->getUsers($IdUser);
	    $login           = $this->requete->getSession()->getAttribut("login");
          }
		  
	    $wilayas         = $this->wilaya->getWilayas();
		$nb_wilayas      = $wilaya->rowCount();
		$wilayas         = $wilaya->fetchAll();
			
		$catClients      = $this->client->getCatClient();
		$nb_catClients   = $catClients ->rowCount();
		$catClients      = $catClients ->fetchAll();
			
		//Ajout d'un client
		 
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
	
    $this->genererVue(array( 'login'=>$login, 'user'=>$user, 'wilayas'=>$wilayas, 'catClients'=>$catClients, 'menuNum'=>3 ));
  }
  
}