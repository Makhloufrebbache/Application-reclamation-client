<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/user.php';

class ControleurConnexion extends Controleur
{
	private $user;
	public function __construct(){
	$this->user = new User();
	}
  public function index(){
	    $login = ""; 
      if($this->requete->getSession()->existAttribut("login"))
	    $login = $this->requete->getSession()->getAttribut("login");
      $this->genererVue(array('login'=>$login), $template="Vue/gabaritV.php");	
    }
  //Connexion d'un utilisateur
    public function connecter(){
      if ($this->requete->existeParametre("login") && $this->requete->existeParametre("mdp")) {
          //Récupérer le login et le mot de passe.
           $login = $this->requete->getParametre("login");
           $mdp = $this->requete->getParametre("mdp");
        if ($this->user->connecter($login, $mdp)) {// vérifier que le user existe est actif 
          //Récupérer les information de l'utilisateur
            $admin_user = $this->user->getUser($login, $mdp);
            $this->requete->getSession()->setAttribut("IdUser", $admin_user['IdUser']); 
            $this->requete->getSession()->setAttribut("login", $admin_user['login']);
            $this->requete->getSession()->setAttribut("USER_TYPE", $admin_user['USER_TYPE']);
			      $this->requete->getSession()->setAttribut("serv_code", $admin_user['serv_code']);
			      $this->requete->getSession()->setAttribut("pwupdated", $admin_user['pwupdated']);
			      $this->requete->getSession()->setAttribut("connected", $admin_user['connected']);
			      $this->requete->getSession()->setAttribut("email", $admin_user['email']);
			      $this->user->connectUser($admin_user['IdUser']);//Connecter l'utilisateur de l'ID en question
            $this->rediriger("../"); 
        }
       
      }
       else
          throw new Exception("Action impossible : login ou mot de passe non défini");
        }
	//Déconnexion d'un utilisateur
  public function deconnecter(){ 
    $IdUser   =  $this->requete->getSession()->getAttribut("IdUser");  
    $this->user->disconnectUser($IdUser);
    $this->requete->getSession()->destroy();
    $this->rediriger("../"); 
  }
}