<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/user.php';
//Modification de mot de passe par l'utilisateur
class ControleurPwupdate extends Controleur{
	private $user;

    public function __construct(){
    $this->user        = new user();
	}
		
	public function index(){
	if($this->requete->getSession()->existAttribut("login")){ 
	$USER_ID   =  $this->requete->getSession()->getAttribut("IdUser");
	$user      = $this->user->getUsers($USER_ID);
    }else {
    $this->rediriger("index.php");
    }
          
	if($this->requete->existeParametre("USER_MDP")){
	$USER_MDP        = $this->requete->getParametre("USER_MDP");
	$this->user->updatePw($USER_MDP, $USER_ID);
	$this->rediriger("./");
	exit();
	}
        $this->genererVue(array('user'=>$user, 'login' => $login));
 } 
		
}