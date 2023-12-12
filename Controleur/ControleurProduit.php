<?php
//A faire l'ajout des produit se fait manuellement
require_once 'Framework/Controleur.php';
require_once 'Modele/user.php';
require_once 'Modele/produits.php';
class ControleurProduit extends Controleur {

  private $user;
  private $produit;
  public function __construct() {
	$this->user           = new user();
  $this->produit          = new produits();
  }

  public function index() {
	  
	  $login = ""; 
		$user  = array();
	  if($this->requete->getSession()->existAttribut("login")){ //
	    $IdUser   =  $this->requete->getSession()->getAttribut("IdUser");
	    $user     = $this->user->getUsers($IdUser);
	    $login    = $this->requete->getSession()->getAttribut("login");
      }else{
		  $this->rediriger("index.php");		
      }

      //Ajout d'une catégorie défaut

	    $this->genererVue(array('login'=>$login, 'user'=>$user, 'menuNum'=>5));
		}
  
}