<?php
require_once 'Framework/Modele.php';

class reclamations extends Modele{
		
	
	//Renvoi toutes les reclamations selon le crétère de rechercher et de la date de début et fin.
	public function getReclamations($creter = "", $value = "", $Date_debut="", $Date_fin=""){
		if($creter == ""){
		if (($Date_debut == "")&&($Date_fin == "")){ 	
		$sql='SELECT ID, Auteur, Date_rec, Date_sai, Code_Clt, Nom_Clt, Categorie_Clt, Wilaya, Site_fab, Date_fab, DLC, Horaire_fab, Lot, n_ligne, Code_produit, Nb_Brique, Nb_Fardeau, Categorie_Defaut, Photo, Nom_Cons , Tel_Cons, Adresse_Cons, Email_Conso, Observation, Defaut FROM dp521_reclamation ORDER BY ID DESC LIMIT 300 ';
		$reclamations = $this->executerRequete($sql);}
		else {
		$sql='SELECT ID, Auteur, Date_rec, Date_sai, Code_Clt, Nom_Clt, Categorie_Clt, Wilaya, Site_fab, Date_fab, DLC, Horaire_fab, Lot, n_ligne, Code_produit, Nb_Brique, Nb_Fardeau, Categorie_Defaut, Photo, Nom_Cons , Tel_Cons, Adresse_Cons, Email_Conso, Observation, Defaut FROM dp521_reclamation WHERE( Date_sai >=? AND Date_sai <=?)ORDER BY ID DESC ';
		$reclamations = $this->executerRequete($sql, array($Date_debut, $Date_fin));
			}
		
		}else{
	    if (($Date_debut == "")&&($Date_fin == "")){ 	
		$sql='SELECT ID, Auteur, Date_rec, Date_sai, Code_Clt, Nom_Clt, Categorie_Clt, Wilaya, Site_fab, Date_fab, DLC, Horaire_fab, Lot, n_ligne, Code_produit, Nb_Brique, Nb_Fardeau, Categorie_Defaut, Photo, Nom_Cons, Tel_Cons, Adresse_Cons, Email_Conso, Observation, Defaut FROM dp521_reclamation WHERE '.$creter.' ORDER BY ID DESC LIMIT 60 ';
		$reclamations = $this->executerRequete($sql, array($value));
			}else{
		$sql='SELECT ID, Auteur, Date_rec, Date_sai, Code_Clt, Nom_Clt, Categorie_Clt, Wilaya, Site_fab, Date_fab, DLC, Horaire_fab, Lot, n_ligne, Code_produit, Nb_Brique, Nb_Fardeau, Categorie_Defaut, Photo, Nom_Cons, Tel_Cons, Adresse_Cons, Email_Conso, Observation, Defaut FROM dp521_reclamation WHERE ('.$creter.' AND Date_sai >=? AND Date_sai <=?) ORDER BY ID DESC  ';
		$reclamations = $this->executerRequete($sql, array($value, $Date_debut, $Date_fin));
				
		   }
		}
		return $reclamations;
	}  

	//Renvoi une reclamation
	public function getReclamation($ID){
		$sql='SELECT ID, Auteur, Date_rec, Date_sai, Code_Clt, Nom_Clt, Categorie_Clt, Wilaya, Site_fab, Date_fab, DLC, Horaire_fab, Lot, Code_produit, Nb_Brique, Nb_Fardeau, Categorie_Defaut, Photo, Nom_Cons, Tel_Cons, Adresse_Cons, Email_Conso, Observation, Defaut FROM dp521_reclamation WHERE ID=? ';
		$reclamations = $this->executerRequete($sql, array($ID));
		if($reclamations->rowCount() == 1){
		  $reclamation = $reclamations->fetch();
		return $reclamation; }
		}
		
	//Verification de'existance de la reclamation
	public function reclamexiste($AuteurID,$Date_fab,$Horaire_fab,$Lot){
		$trouver=FALSE;
		$sql='SELECT * FROM dp521_reclamation WHERE AuteurID=? AND Date_fab=? AND Horaire_fab=? AND Lot=? ';
		$existe = $this->executerRequete($sql, array($AuteurID,$Date_fab,$Horaire_fab,$Lot));
		if($existe->rowCount() == 1)
		 $trouver=TRUE;
		return $trouver;
		
	}
		
	//Ajouter une reclamation
	public function addReclamation($AuteurID, $Auteur, $Date_rec, $Date_sai, $Code_Clt, $Categorie_Clt, $Nom_Clt, $Wilaya, $Site_fab, $Date_fab, $DLC, $Horaire_fab, $Lot, $n_ligne, $Code_produit, $Nb_Brique, $Nb_Fardeau, $Categorie_Defaut, $Photo, $Nom_Cons, $Tel_Cons, $Adresse_Cons, $Email_Conso, $Observation, $Defaut){
      $sql = "INSERT INTO dp521_reclamation (AuteurID, Auteur, Date_rec, Date_sai, Code_Clt, Categorie_Clt,Nom_Clt, Wilaya, Site_fab, Date_fab, DLC, Horaire_fab, Lot, n_ligne, Code_produit, Nb_Brique, Nb_Fardeau, Categorie_Defaut, Photo, Nom_Cons, Tel_Cons, Adresse_Cons, Email_Conso, Observation, Defaut) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $this->executerRequete($sql, array($AuteurID, $Auteur, $Date_rec, $Date_sai, $Code_Clt, $Categorie_Clt, $Nom_Clt, $Wilaya, $Site_fab, $Date_fab, $DLC, $Horaire_fab, $Lot, $n_ligne, $Code_produit, $Nb_Brique, $Nb_Fardeau, $Categorie_Defaut, $Photo, $Nom_Cons, $Tel_Cons, $Adresse_Cons, $Email_Conso, $Observation, $Defaut));
		}
		
   //Ajouter une catégorie client	
      public function addcategorieClient($Code, $Designation){
      $sql = "INSERT INTO dp521_categorie_defauts (Code, Designation) values(?,?)";
      $this->executerRequete($sql, array($Code, $Designation,));
		}
		
	
	//Modifier une reclamation
	public function updateReclamation($Date_rec, $Code_Clt,$Nom_Clt, $Categorie_Clt, $Wilaya, $Site_fab, $Date_fab, $DLC, $Horaire_fab, $Lot,   $n_ligne, $Code_produit, $Nb_Brique, $Nb_Fardeau, $Categorie_Defaut, $Photo, $Nom_Cons, $Tel_Cons, $Adresse_Cons, $Email_Conso, $Observation, $Defaut, $ID){
      $sql = "update dp521_reclamation
	          set Date_rec=?, Code_Clt=?, Nom_Clt=?, Categorie_Clt=?, Wilaya=?, Site_fab=?, Date_fab=?, DLC=?,  Horaire_fab=?, Lot=?, n_ligne=?,  Code_produit=?, Nb_Brique=?, Nb_Fardeau=?, Categorie_Defaut=?,  Photo=?, Nom_Cons=?,  Tel_Cons=?, Adresse_Cons=?,  Email_Conso=?, Observation=?,  Defaut=?    
			  where  ID=? ";
      $this->executerRequete($sql, array($Date_rec, $Code_Clt,$Nom_Clt, $Categorie_Clt, $Wilaya, $Site_fab, $Date_fab, $DLC, $Horaire_fab, $Lot,   $n_ligne, $Code_produit, $Nb_Brique, $Nb_Fardeau, $Categorie_Defaut, $Photo, $Nom_Cons, $Tel_Cons, $Adresse_Cons, $Email_Conso, $Observation, $Defaut, $ID));
		}

}
