<?php
require_once 'Framework/Controleur.php';
require_once 'Framework/SendMails.php';
require_once 'Modele/reclamations.php';
require_once 'Modele/clients.php';
require_once 'Modele/wilayas.php';
require_once 'Modele/sites.php';
require_once 'Modele/produits.php';
require_once 'Modele/catDefaut.php';
require_once 'Modele/Defaut.php';
require_once 'Modele/user.php';

class ControleurListereclamations extends Controleur {
    private $user;
    private $reclamations;
    public function __construct() {
    $this->user         = new user();
    $this->reclamations = new reclamations();
 }
  
  public function index() {
	$Date_debut="";
	$Date_fin="";
	$login = ""; 
	$user  = array();
	if($this->requete->getSession()->existAttribut("login")){ //
	$IdUser   =  $this->requete->getSession()->getAttribut("IdUser");
	$user     = $this->user->getUsers($IdUser);
	$login    = $this->requete->getSession()->getAttribut("login");
 }else{//Si l'utilisateur n'est pas connecter il sera vers la page d'acceuil
	$this->rediriger("index.php");		
 }
		  
 if ($user['USER_TYPE']=="AnimVente")
 $reclamations   = $this->reclamations->getReclamations('AuteurID =?',  $IdUser);//Récuperer les reclamations pour chaque animateur de vente
 else
		$reclamations            = $this->reclamations->getReclamations(); //Récuperer ttes les reclamations 
		    $nb_reclamations     = $reclamations->rowCount();
			$reclamations        = $reclamations->fetchAll();
			
		$wilayas                 = $this->wilayas->getWilayas();
		    $nb_wilayas          = $wilayas->rowCount();
			$wilayas             = $wilayas->fetchAll();
			
		$clients                 = $this->clients->getClients();
		    $nb_clients          = $clients->rowCount();
			$clients             = $clients->fetchAll();
			            
		$sitsFab                 = $this->sites->getSitesfab();
		    $nb_sitsFab          = $sitsFab->rowCount();
			$sitsFab             = $sitsFab->fetchAll();
			
		$catsDef                 = $this->catDefaut->getCatdefauts ();
		    $nb_catsDef          = $catsDef->rowCount();
			$catsDef             = $catsDef->fetchAll();
		
		$defauts                 = $this->Defaut->getDefauts ();
		    $nb_defauts          = $defauts->rowCount();
			$defauts             = $defauts->fetchAll();
		
		$dateduj                 = date("Y-m-d", time());
			
		
	//Filtrer selon Wilaya
	if($this->requete->existeParametre("wilaya")){
       $wilaya              = $this->requete->getParametre("wilaya");
	   $fwilayas            = $this->reclamations->getReclamations('wilaya =?', $wilaya);
	   $nb_reclamations     = $fwilayas->rowCount();
	   $reclamations        = $fwilayas->fetchAll();
	}
	
	//Filtrer par date
	if($this->requete->existeParametre("Date_debut") && $this->requete->existeParametre("Date_fin")){
       $Date_debut        = $this->requete->getParametre("Date_debut");
       $Date_fin          = $this->requete->getParametre("Date_fin");
	   
    if ($user['USER_TYPE']=="AnimVente")
    $reclamations   = $this->reclamations->getReclamations('AuteurID =?',  $IdUser, $Date_debut, $Date_fin);//Récuperer les reclamations pour chaque animateur de vente
    else
    $reclamations        = $this->reclamations->getReclamations("", "", $Date_debut, $Date_fin); //Récuperer ttes les reclamations 

    $nb_reclamations     = $reclamations->rowCount();
    $reclamations        = $reclamations->fetchAll();
	   
	}
			
    // GENERATION DU FICHIE CSV
	$generated_file='reclamation_'.$IdUser.'.csv';
	if(file_exists ('./Contenu/files/'.$generated_file))
	unlink('./Contenu/files/'.$generated_file); //supprimer l'ancien fichier
	$fp = fopen('./Contenu/files/'.$generated_file, 'w');
	
	// Insertion entete
	fputcsv($fp, array('Auteur', 'Date_rec', 'Date_sai', 'Code_Clt','Nom_Clt', 'Wilaya', 'Site_fab', 'Date_fab', 'DLC', 'Horaire_fab', 'Lot', 'n_ligne', 'Code_produit', 'Nb_Brique', 'Nb_Fardeau', 'Categorie_Defaut', 'Nom_Cons', 'Tel_Cons', 'Adresse_Cons', 'Email_Conso', 'Observation', 'Defaut'), ";");
	
	// Insertion de toutes les lignes
	foreach ($reclamations as $fields) {
	//Designation des codes
	$defaut = 	$this->reclamations->getDefaut($fields['Defaut']);
	$defaut1 = utf8_decode($defaut['Defaut']);
	
	$client  = $this->reclamations->getClient($fields['Code_Clt']);
	$client1 = utf8_decode($client['Designation']);
	
	$sitefab  = $this->reclamations->getSitefab($fields['Site_fab']);
	$sitefab1 = utf8_decode($sitefab['Designation']);
	
	$produit  = $this->reclamations->getProduit($fields['Code_produit']);
	$produit1 = utf8_decode($produit['Designation']);
	
	$catdefaut  = $this->reclamations->getCatdefaut($fields['Categorie_Defaut']);
	$catdefaut1 = utf8_decode($catdefaut['Designation']);
	
    fputcsv($fp, array($fields['Auteur'], $fields['Date_rec'], $fields['Date_sai'], $fields['Code_Clt'],$client1, utf8_decode($fields['Wilaya']), $sitefab1, $fields['Date_fab'], $fields['DLC'], $fields['Horaire_fab'], $fields['Lot'], $fields['n_ligne'], $produit1, $fields['Nb_Brique'], $fields['Nb_Fardeau'],$catdefaut1, $fields['Nom_Cons'], $fields['Tel_Cons'], utf8_decode($fields['Adresse_Cons']), $fields['Email_Conso'], utf8_decode($fields['Observation']), $defaut1), ";");
	
      }  fclose($fp);
	  			
		
    $this->genererVue(array('reclamations'=>$reclamations, 'nb_reclamations'=>$nb_reclamations, 'wilayas'=>$wilayas, 'login'=>$login, 'user'=>$user, 'clients'=>$clients, 'sitsFab'=>$sitsFab, 'catsDef'=>$catsDef,'defauts'=>$defauts, 'menuNum'=>2, 'generated_file'=>$generated_file,'dateduj'=>$dateduj,'Date_debut'=>$Date_debut,'Date_fin'=>$Date_fin));
  }
	  
}//end ContreolReclamations