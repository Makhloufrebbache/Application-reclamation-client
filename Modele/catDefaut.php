<?php
require_once 'Framework/Modele.php';

class catDefaut extends Modele{
		   
	//Ajouter une catégorie de défaut
		public function addcategorieDefaut($Designation){
      $sql = "INSERT INTO dp521_categorie_defauts (Designation) values(?)";
      $this->executerRequete($sql, array($Designation));
		}
   //Renvoi toutes catégories de défaut
	public function getCatdefauts(){
		$sql='SELECT Code, Designation FROM dp521_categorie_defauts ORDER BY Code ASC ';
		$catdefauts = $this->executerRequete($sql);
		return $catdefauts;
		}
	
	//Renvoi d'une catégorie de défaut
	public function getCatdefaut($code){
		$sql='SELECT Code, Designation FROM dp521_categorie_defauts WHERE Code =?  ';
		$catdefaut = $this->executerRequete($sql,array($code));
		$catdefaut = $catdefaut->fetch();
		return $catdefaut;
		}	
		
}
