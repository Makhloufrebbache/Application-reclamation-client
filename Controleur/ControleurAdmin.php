<?php
require_once 'Controleur/ControleurSecurise.php';
require_once 'Modele/nous.php';
require_once 'Modele/user.php';

class ControleurAdmin extends ControleurSecurise{
	
	private $nous;
	private $users;
	private $user;
	
	public function __construct(){
		//Instanciation des différentes classes
		$this->nous        = new nous();
		$this->user        = new user();
		$this->users       = new user();
	}
		
	public function index(){
        $login             = $this->requete->getSession()->getAttribut("login");
		$IdUser            =  $this->requete->getSession()->getAttribut("IdUser");
	    $user              = $this->user->getUsers($IdUser);
		
	   if($user  != array() && $user['USER_TYPE'] == "SuperAdmin") {	  
         $this->genererVue(array( 'user'=>$user), "Vue/gabaritAd.php");
		}else{
			 $this->rediriger("accueil");
	}	
}
		
	/********************************************************************/
	                    //Actions Users
    /********************************************************************/
		
	//Renvoi la liste des users 	
	public function users(){
        $login          = $this->requete->getSession()->getAttribut("login");
		$users               = $this->users->getAllusers();
		$nb_users            = $users->rowCount();
		$connected_users     = $this->users->getConnectedusers();
		$nb_connected_users  = $connected_users->rowCount();
        $this->genererVue(array('nb_users'=>$nb_users, 'users'=>$users, 'nb_connected_users'=>$nb_connected_users), "Vue/gabaritAd.php");
		}
		
	//Ajout et modification d'un user	
	public function usersadd(){
		$USER_ID        = NULL;
		$USER_NOM       = "";
	    $USER_PRENOM    = "";
	    $USER_LOGIN     = "";
		$USER_MDP       = "";
	    $USER_TYPE      = "";
		$user  = array('USER_ID'=>$USER_ID, 'USER_NOM'=>$USER_NOM, 'USER_PRENOM'=>$USER_PRENOM, 'USER_LOGIN'=>$USER_LOGIN, 'USER_MDP'=>$USER_MDP, 'USER_TYPE'=>$USER_TYPE);
		
	if($this->requete->existeParametre("id")){
	  $USER_ID = intval($this->requete->getParametre("id"));
	  $user    = $users = $this->users->getUserAdmin($USER_ID);
	}
		
	if($this->requete->existeParametre("USER_NOM")){
	   if($this->requete->existeParametre("idHidden"))
	   $USER_ID          = $this->requete->getParametre("idHidden");
	   
       $USER_NOM    = $this->requete->getParametre("USER_NOM");
	   if($this->requete->existeParametre("USER_PRENOM"))
       $USER_PRENOM       = $this->requete->getParametre("USER_PRENOM");
	  if($this->requete->existeParametre("USER_LOGIN"))
       $USER_LOGIN        = $this->requete->getParametre("USER_LOGIN");
	  if($this->requete->existeParametre("USER_MDP"))
       $USER_MDP        = $this->requete->getParametre("USER_MDP");
	  if($this->requete->existeParametre("USER_TYPE"))
       $USER_TYPE        = $this->requete->getParametre("USER_TYPE");
   

	   
	   if($USER_ID == NULL){
	   $this->users->addUser($USER_NOM, $USER_PRENOM, $USER_LOGIN, $USER_MDP, $USER_TYPE);
	   }else{
	   $this->users->updateUser($USER_NOM, $USER_PRENOM, $USER_LOGIN, $USER_MDP, $USER_TYPE, $USER_ID);
	   }
		$this->rediriger("admin/users");
	   exit();
	}
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('user'=>$user, 'login' => $login), "Vue/gabaritAd.php");
		}
		
	//Desactiver un utilisateur	
	public function userbloc(){
		if($this->requete->existeParametre("id")){
		$USER_ID = $this->requete->getParametre("id");
		$this->users->blocUser($USER_ID);	
			}
		$this->rediriger("admin/users");
		}
		
	//Activer un utilisateur	
	public function useractif(){
		if($this->requete->existeParametre("id")){
		$USER_ID = $this->requete->getParametre("id");
		$this->users->actifUser($USER_ID);	
			}
		$this->rediriger("admin/users");
		}
		
	//Supprimer un utilisateur	
	public function userdel(){
		if($this->requete->existeParametre("id")){
		$USER_ID = $this->requete->getParametre("id");
		$this->users->delUser($USER_ID);	
			}
		$this->rediriger("admin/users");
		}
		
		
	
}