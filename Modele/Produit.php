<?php
require_once 'Framework/Modele.php';

class produits extends Modele{
		
	//Renvoi tous les Produits
	public function getProduits(){
		$sql='SELECT Code, Designation FROM dp521_produit ORDER BY Code ASC ';
		$produits = $this->executerRequete($sql);
		return $produits;
		}

	//Renvoi d'un produit	
	public function getProduit($code){
		$sql='SELECT Code, Designation FROM dp521_produit WHERE Code =? ';
		$produit = $this->executerRequete($sql,array($code));
			$produit = $produit->fetch();
		return $produit;
		}
}
?>