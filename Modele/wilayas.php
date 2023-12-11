<?php
require_once 'Framework/Modele.php';

class wilayas extends Modele{
	
//Renvoi toutes les wilayas
	public function getWilayas(){
		$sql='SELECT Code, Designation FROM dp521_wilaya ORDER BY Code ASC ';
		$wilayas = $this->executerRequete($sql);
		return $wilayas;
	}
}
