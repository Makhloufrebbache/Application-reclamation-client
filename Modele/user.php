<?php

require_once 'Framework/Modele.php';

class user extends Modele{
  //Verifier si l'utilisateur existe et actif
  public function connecter($login, $mdp){
		$sql = "select USER_ID from USER where USER_LOGIN=? and USER_MDP=? and USER_ACTIF=?";
		$user = $this->executerRequete($sql, array($login, $mdp, "Y"));
		return($user->rowCount() == 1);		
		}
  //Renvoi la liste des utilisateur	
	public function getUser($login, $mdp){
		$sql = "select USER_ID as IdUser, USER_NOM as USER_NOM, USER_PRENOM as USER_PRENOM, USER_LOGIN as login, USER_MDP as mdp, USER_MAIL as email, USER_TYPE as USER_TYPE, USER_SERV_CODE as serv_code, pwupdated as pwupdated, connected as connected from USER where USER_LOGIN=? and USER_MDP=? and USER_SUPP=? ";
		$user = $this->executerRequete($sql, array($login, $mdp, "N"));
		if($user->rowCount() == 1){
			return($user->fetch()); //Acces à la premiere du resultat
		}else{
			throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
		}		
		}
	//Renvoi un utilisateur de ID passé en paramètre.	
	public function getUsers($USER_ID){
		$sql = "select USER_ID as IdUser, USER_NOM as USER_NOM, USER_PRENOM as USER_PRENOM, USER_LOGIN as login, USER_MDP as mdp, USER_MAIL as email, USER_TYPE as USER_TYPE, USER_SERV_CODE as serv_code, pwupdated as pwupdated, connected as connected from USER where USER_ID =?";
		$user = $this->executerRequete($sql, array($USER_ID));
		if($user->rowCount() == 1){
			return($user->fetch()); //Acces à la premiere du resultat
			}else{
			throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
			}		
		}
		
	public function getUserAdmin($USER_ID){
		$sql = "select USER_ID, USER_NOM, USER_PRENOM, USER_LOGIN, USER_MDP, USER_TYPE, USER_SERV_CODE, USER_ACTIF, USER_DATE, USER_SUPP, pwupdated, connected from USER where USER_ID =?";
		$user = $this->executerRequete($sql, array($USER_ID));
		if($user->rowCount() == 1){
		return($user->fetch()); //Acces à la premiere du resultat
		}else{
		throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
		}		
	}
	//Renvoi tout les utilisateurs	
	public function getAllusers(){
		$sql = "select USER_ID, USER_NOM, USER_PRENOM, USER_LOGIN, USER_MDP, USER_TYPE, USER_SERV_CODE, USER_ACTIF, USER_DATE, USER_SUPP, pwupdated, connected from USER ";
		$users = $this->executerRequete($sql);
		return $users;	
	}
	//Renvoi les utilisateurs connectés	
	public function getConnectedusers(){
		$sql = "select USER_ID, USER_NOM, USER_PRENOM, USER_LOGIN, USER_MDP, USER_TYPE, USER_SERV_CODE, USER_ACTIF, USER_DATE, USER_SUPP, pwupdated, connected from USER where connected =?";
		$users = $this->executerRequete($sql, array('Y'));
		return $users;	
	}
	//Ajouter un utilisateur	
	public function addUser($USER_NOM, $USER_PRENOM, $USER_LOGIN, $USER_MDP, $USER_TYPE){
      $sql = "INSERT INTO USER (USER_NOM, USER_PRENOM, USER_LOGIN, USER_MDP, USER_TYPE, USER_DATE) values(?, ?, ?, ?, ?, ?)";
	  $date = date("Y-m-d");
	  $USER_MDP=$USER_MDP;
      $this->executerRequete($sql, array($USER_NOM, $USER_PRENOM, $USER_LOGIN, $USER_MDP, $USER_TYPE, $date));
	}
	//Activer un utilisateur
	public function actifUser($USER_ID){
      $sql = "update USER
	          set    USER_ACTIF=?
			  where  USER_ID=? ";
      $this->executerRequete($sql, array("Y", $USER_ID));
	}
  	//Bloquer un utilisateur
	public function blocUser($USER_ID){
      $sql = "update USER
	          set    USER_ACTIF=?
			  where  USER_ID=? ";
      $this->executerRequete($sql, array("N", $USER_ID));
	}
  	//Mettre à jours un utilisateur
	public function updateUser($USER_NOM, $USER_PRENOM, $USER_LOGIN, $USER_MDP, $USER_TYPE, $USER_ID){
      $sql = "update USER
	          set    USER_NOM=?, USER_PRENOM=?, USER_LOGIN=?, USER_MDP=?, USER_TYPE=?
			  where  USER_ID=? ";
	  $USER_MDP=$USER_MDP;
      $this->executerRequete($sql, array($USER_NOM, $USER_PRENOM, $USER_LOGIN, $USER_MDP, $USER_TYPE, $USER_ID));
	}
	//Mettre à jour le mot de passe.	
	public function updatePw($USER_MDP, $USER_ID){
      $sql = "update USER
	          set    USER_MDP=?, pwupdated=?
			  where  USER_ID=? ";
      $this->executerRequete($sql, array($USER_MDP, "Y", $USER_ID));
		}
	//Supprimer un utilisateur		
	public function delUser($USER_ID){
      $sql = "delete from USER
			  where  USER_ID=? ";
      $this->executerRequete($sql, array($USER_ID));
		}
		
	//Mettre à jours le champs "connected" à "Y", quand l'utilisateur se connectes.
	public function connectUser($USER_ID){
      $sql = "update USER
	          set    connected=?
			  where  USER_ID=? ";
      $this->executerRequete($sql, array("Y", $USER_ID));
		}
		
	//Mettre à jours le champs "connected" à "N", quand l'utilisateur se déconnectes.
	public function disconnectUser($USER_ID){
      $sql = "update USER
	          set    connected=?
			  where  USER_ID=? ";
      $this->executerRequete($sql, array("N", $USER_ID));
		}
	
	}