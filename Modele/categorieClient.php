<?php
require_once 'Framework/Modele.php';

class catClient extends Modele{
		   
	   //Ajouter une catégorie de client
		public function addcatClient($Code,$Designation){
      $sql = "INSERT INTO dp521_categorie_clt (Code, Designation) values(?,?)";
      $this->executerRequete($sql, array($Code, $Designation));
		}
}
