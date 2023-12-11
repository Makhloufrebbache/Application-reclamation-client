<?php
require_once 'Framework/Modele.php';

class clients extends Modele{
	
	/****************** CLIENTS ***********************************///Renvoi toutes les catégories clients
	public function getCatClient(){
		$sql='SELECT Code, Designation FROM dp521_categorie_clt ORDER BY Designation DESC ';
		$catclient = $this->executerRequete($sql);
		return $catclient;
		}
	//Ajout d'un client dans la table client	
	public function addCatClient($code, $designation){
		$sql = "INSERT INTO dp521_categorie_defauts (Code, Designation) values(?, ?)";
     	$catclient = $this->executerRequete($sql);
		return $catclient;}
    //Récuperer un client par id.		
	public function getClient($clientID){
		$sql = "select Designation, Wilaya, Categorie FROM dp521_client WHERE Code=? ";
		$client = $this->executerRequete($sql, array($clientID));
		if($client->rowCount() == 1){
			return($client->fetch()); 
			}	
		}
   	//Renvoi tout les client	
	public function getClients(){
		$sql = "select Code, Designation, Wilaya, Categorie FROM dp521_client ";
		$clients = $this->executerRequete($sql);
		return $clients;	
		}
    }