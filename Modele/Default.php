<?php
require_once 'Framework/Modele.php';

class Defaut extends Modele{
		   
	//Ajouter un défaut
		public function addDefaut($Defaut,$Code_Categorie){
      $sql = "INSERT INTO dp521_defaut (Defaut, Code_Categorie) values(?,?)";
      $this->executerRequete($sql, array($Defaut, $Code_Categorie ));
		}
	//Renvoi tous les defauts
	public function getDefauts(){
		$sql='SELECT Code_Defaut, Defaut FROM dp521_defaut ORDER BY Code_Defaut ASC ';
		$defauts = $this->executerRequete($sql);
		return $defauts;
		}
		
	//Renvoi une catégorie de défaut
	public function getDefaut($code){
		$sql='SELECT Defaut FROM dp521_defaut WHERE Code_Defaut=? ';
		$defaut = $this->executerRequete($sql, array($code));
		$defaut = $defaut->fetch();
		return $defaut;
		}
			
}
