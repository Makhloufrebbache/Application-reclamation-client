<?php
require_once 'Framework/Controleur.php';
require_once 'Framework/SendMails.php';
require_once 'Modele/reclamations.php';
require_once 'Modele/clients.php';
require_once 'Modele/wilayas.php';
require_once 'Modele/sites.php';
require_once 'Modele/produits.php';
require_once 'Modele/catDefaut.php';
require_once 'Modele/user.php';

class ControleurReclamations extends Controleur {
  private $catclient;
  private $wilayas;
  private $sitesfab;
  private $produits;
  private $catdefauts;
  private $reclamation;
  private $user;
  private $email;

  public function __construct() {
  $this->catclient   = new clients();
	$this->wilayas     = new wilayas();
	$this->sitesfab    = new sites();
	$this->produits    = new produits();
	$this->catdefauts  = new catDefaut();
	$this->reclamation = new reclamations();
	$this->user        = new user();
	$this->email       = new SendMail();
  }

  public function index() {
	    $login = ""; 
		$user  = array('IdUser'=>NULL, 'USER_NOM'=>"", 'USER_PRENOM'=>"", 'USER_MAIL'=>"", 'login'=>"", 'USER_TYPE'=>"", 'serv_code'=>""); 
	  if($this->requete->getSession()->existAttribut("login")){ 

	    $IdUser =  $this->requete->getSession()->getAttribut("IdUser");
	    $user   = $this->user->getUsers($IdUser);
	    $login  = $this->requete->getSession()->getAttribut("login");
    }
    else {
      $this->rediriger("index.php");
      exit();
    }
		$catclient        = $this->catclient->getCatClient();
		$nb_catclient     = $catclient->rowCount();
		$catclient        = $catclient->fetchAll();
		$wilayas          = $this->wilayas->getWilayas();
		$nb_wilayas       = $wilayas->rowCount();
		$wilayas          = $wilayas->fetchAll();
	  $sitesfab         = $this->sitesfab->getSitesfab();
		$nb_sitesfab      = $sitesfab->rowCount();
		$sitesfab         = $sitesfab->fetchAll();
	  $produits         = $this->produits->getProduits();
		$produits         = $produits->fetchAll();
	  $catdefauts       = $this->catdefauts->getCatdefauts();
		$catdefauts       = $catdefauts->fetchAll();

		//Ajout d'une Réclamation
		$login              = "";
		$msg                = "";
		$ID                 = NULL;
	  $Auteur             = "";
		$Date_rec           = ""; 
		$Date_sai           = "";
		$Code_Clt           = "";
		$Nom_Clt            = "";  
		$Nom_Cons           = "";
		$Categorie_Clt      = "";
		$Wilaya             = "";
		$Site_fab           = "";
		$Date_fab           = ""; 
		$DLC                = "";
		$Horaire_fab        = ""; 
		$Lot                = "";
		$Code_produit       = "";
		$Nb_Brique          = "";
		$Nb_Fardeau         = "";
		$Categorie_Defaut   = "";
		$Photo              = "";
		$Tel_Cons           = "";
		$Adresse_Cons       = "";
		$Email_Conso        = "";
		$Observation        = "";
		$Defaut	            = "";
		$client             = "- - - Choisissez le Distributeur - - -";
	  $defaut             = "- - - Choisissez le Défaut - - -";
		$reclamation        = array('ID'=>NULL, 'Auteur'=>"", 'Date_rec'=>"", 'Date_sai'=>"", 'Code_Clt'=>"", 'Nom_Clt'=>"", 'Categorie_Clt'=>"", 'Wilaya'=>"", 'Site_fab'=>"", 'Date_fab'=>"", 'DLC'=>"", 'Horaire_fab'=>"", 'Lot'=>"", 'Code_produit'=>"", 'Nb_Brique'=>"", 'Nb_Fardeau'=>"", 'Categorie_Defaut'=>"", 'Photo'=>"" , 'Nom_Cons'=>"" , 'Tel_Cons'=>"", 'Adresse_Cons'=>"", 'Email_Conso'=>"", 'Observation'=>"", 'Defaut'=>"");

    if($this->requete->existeParametre("id")){ 
    //Modification d'une reclamation
	  $ID            = intval($this->requete->getParametre("id"));
	  $reclamation   = $this->reclamation->getReclamation($ID);
	  $client        = $this->reclamation->getClient($reclamation['Code_Clt']);
	  $client        = $client['Designation'];  
	  $defaut        = $this->reclamation->getDefaut($reclamation['Defaut']);
	  $defaut        = $defaut['Defaut'];	  
	}
		
	if($this->requete->existeParametre("Defaut") AND ($user["IdUser"]!=NULL)){ 
    //Recupération de Forms Data 

	     $Auteur         = $user["USER_NOM"].'  '.$user["USER_PRENOM"];
	     $AuteurID       =  $user["IdUser"];
	  if($this->requete->existeParametre("Date_rec"))
       $Date_rec       = $this->requete->getParametre("Date_rec");
	  if($this->requete->existeParametre("Categorie_Clt"))
       $Categorie_Clt  = $this->requete->getParametre("Categorie_Clt");
	  if($this->requete->existeParametre("Nom_Clt"))
       $Nom_Clt        = $this->requete->getParametre("Nom_Clt");
	  if($this->requete->existeParametre("Nom_Cons"))
       $Nom_Cons       = $this->requete->getParametre("Nom_Cons");
	  if($this->requete->existeParametre("Tel_Cons"))
      $Tel_Cons        = $this->requete->getParametre("Tel_Cons");
	  if($this->requete->existeParametre("Adresse_Cons"))
      $Adresse_Cons    = $this->requete->getParametre("Adresse_Cons");
	  if($this->requete->existeParametre("Email_Conso"))
      $Email_Conso     = $this->requete->getParametre("Email_Conso");
	  if($this->requete->existeParametre("Wilaya"))
       $Wilaya         = $this->requete->getParametre("Wilaya");
	  if($this->requete->existeParametre("Code_Clt"))
       $Code_Clt       = $this->requete->getParametre("Code_Clt");
	  if($this->requete->existeParametre("Date_fab"))
       $Date_fab       = $this->requete->getParametre("Date_fab");
	  if($this->requete->existeParametre("DLC"))
       $DLC            = $this->requete->getParametre("DLC");
	  if($this->requete->existeParametre("Horaire_fab"))
       $Horaire_fab    = $this->requete->getParametre("Horaire_fab");
	  if($this->requete->existeParametre("Lot"))
       $Lot            = $this->requete->getParametre("Lot");
       $n_ligne = substr(trim($Lot), 0, 1);
       
       $n_ligne = strtoupper($n_ligne);//Récupération de la première lettre de nom de la ligne de production.
    if($n_ligne == "A"){
       $n_ligne = "CFA 312/01";
			 $Site_fab= "2";
    }elseif($n_ligne == "B"){
       $n_ligne = "CFA 312/02";
			 $Site_fab= "2";
    }elseif($n_ligne == "C" )
		 {
      $n_ligne = "CFA 124/03"; 
			$Site_fab= "2";
    }elseif($n_ligne == "D"){
            $n_ligne = "CFA 124/04"; 
			$Site_fab= "2";
    }elseif($n_ligne == "F" ){
            $n_ligne = "CFA 310"; 
			$Site_fab= "1";
    }elseif($n_ligne == "H"){
            $n_ligne = "CFA 312"; 
			$Site_fab= "1";
    }elseif($n_ligne == "E"){
            $n_ligne = "SPEED  1L"; 
			$Site_fab= "1";
    }elseif($n_ligne == "G"){
            $n_ligne = "SPEED  200 ml"; 
			$Site_fab= "1";
    }elseif($n_ligne == "L"){
            $n_ligne = "CFA 124"; 
			$Site_fab= "3";
    }elseif($n_ligne == "K"){
            $n_ligne = "CFA 312"; 
			$Site_fab= "3";
    }else
      $n_ligne = "Machine inconnue";
       
	  if($this->requete->existeParametre("Code_produit"))
       $Code_produit          = $this->requete->getParametre("Code_produit");
	  if($this->requete->existeParametre("Nb_Brique"))
       $Nb_Brique             = $this->requete->getParametre("Nb_Brique");
	  if($this->requete->existeParametre("Nb_Fardeau"))
       $Nb_Fardeau            = $this->requete->getParametre("Nb_Fardeau");
	  if($this->requete->existeParametre("Categorie_Defaut"))
       $Categorie_Defaut      = $this->requete->getParametre("Categorie_Defaut");
	  if($this->requete->existeParametre("Defaut"))
       $Defaut                = $this->requete->getParametre("Defaut");
	  if($this->requete->existeParametre("Observation"))
       $Observation           = $this->requete->getParametre("Observation");
       $Date_sai              = date("Y-m-d", time());
       
  // Verfier si cette reclamation n'est pas didja inserer
    if($this->reclamation->reclamexiste($AuteurID,$Date_fab,$Horaire_fab,$Lot) && $ID == NULL){
	  $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="opacity: 1;">
             <strong>Désolé!</strong> réclamation déja insérée.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
           </div>';
    }else{
	   if($this->requete->existeParametre("Photo"))  
	   $Photo = $this->requete->getParametre("Photo"); // $Photo est de type tableu
	   if($Photo['error'] == 0){ 
	   $filename = $this->uploadFile("Photo", "./Contenu/files/reclamations/", array('png', 'jpg', 'jpeg')); //Contenu/files/reclamationFile/
	   if($filename != "") 
     $Photo = "Contenu/files/reclamations/".$filename; 
	   }elseif($this->requete->existeParametre("fileHidden"))
	   $Photo = $this->requete->getParametre("fileHidden");
	   else{$Photo = "";}
	  
	   if($ID == NULL){ // Ajout réclamation
	   $this->reclamation->addReclamation($AuteurID, $Auteur, $Date_rec, $Date_sai, $Code_Clt, $Categorie_Clt, $Nom_Clt, $Wilaya, $Site_fab, $Date_fab, $DLC, $Horaire_fab, $Lot, $n_ligne, $Code_produit, $Nb_Brique, $Nb_Fardeau, $Categorie_Defaut, $Photo, $Nom_Cons, $Tel_Cons, $Adresse_Cons, $Email_Conso, $Observation, $Defaut);
	   $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="opacity: 1;">
             <strong>Success!</strong> réclamation insérée.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>';

//envoi email

	$defautmsg = 	$this->reclamation->getDefaut($Defaut);
	$defautmsg1 = ($defautmsg['Defaut']);
	
	$clientmsg  = $this->reclamation->getClient($Code_Clt );
	$clientmsg1 = ($clientmsg['Designation']);
	
	$sitefabmsg  = $this->reclamation->getSitefab($Site_fab );
	$sitefabmsg1 = ($sitefabmsg['Designation']);
	
	$produitmsg  = $this->reclamation->getProduit($Code_produit );
	$produitmsg1 = ($produitmsg['Designation']);
	
	$catdefautmsg  = $this->reclamation->getCatdefaut($Categorie_Defaut);
	$catdefautmsg1 = ($catdefautmsg['Designation']);
  //Personalisation du message dans un tableau
  $message='<table width="481" border="0" >
  <tr>
    <td width="179"><strong>Auteur :</strong></td>
    <td >'. $Auteur  .'</td>
    <td width="140" rowspan="8"><img src="http://reclamation.tchinlait.com/'.$Photo.'" alt="" name="Img" width="146" height="199" id="Img" /></td>
  </tr>
  <tr>
    <td><strong>Date réclamation :</strong></td>
    <td>'.$Date_rec .'</td>
  </tr>
  <tr>
    <td><strong>Date saisie :</strong></td>
    <td>'.$Date_sai .'</td>
  </tr>
  <tr>
    <td><strong>Nom client :</strong></td>
    <td>'.$clientmsg1.'</td>
  </tr>
  <tr>
    <td><strong>Site de fabrication :</strong><br /></td>
    <td>'.$sitefabmsg1.'</td>
  </tr>
  <tr>
    <td><strong>Wilaya :</strong></td>
    <td>'.$Wilaya.'</td>
  </tr>
    <td><strong>DLC :</strong></td>
    <td>'.$DLC.'</td>
  </tr>
  <tr>
    <td><strong>Date de Fabrication :</strong></td>
    <td>'.$Date_fab.'</td>
  </tr>
  <tr>
    <td><strong>Horaire de Fabrication :</strong></td>
    <td>'.$Horaire_fab.'</td>
  </tr>
  <tr>
    <td><strong>Lot :</strong></td>
    <td>'.$Lot.'</td>
  </tr>
  <tr>
    <td><strong>N° Ligne :</strong></td>
    <td>'.$n_ligne.'</td>
  </tr>
  <tr>
    <td><strong> produit :</strong></td>
    <td>'.$produitmsg1.'</td>
  </tr>
  <tr>
    <td><strong>Nombre de brique :</strong></td>
    <td>'.$Nb_Brique.'</td>
  </tr>
  <tr>
    <td><strong>Nombre de fardeaux :</strong></td>
    <td>'.$Nb_Fardeau.'</td>
  </tr>
  <tr>
    <td><strong>Categorie de defaut :</strong></td>
    <td>'.$catdefautmsg1.'</td>
  </tr>
  <tr>
    <td><strong>Nom Consomateur :</strong></td>
    <td>'.$Nom_Cons.'</td>
  </tr>
  <tr>
    <td><strong>Telephone de consomateur :</strong></td>
    <td>'.$Tel_Cons.'</td>
  </tr>
  <tr>
    <td><strong>Adresse de consomateur :</strong></td>
    <td>'.$Adresse_Cons.'</td>
  </tr>
  <tr>
    <td><strong>E_mail de consomateur :</strong></td>
    <td>'.$Email_Conso.'</td>
  </tr>
  <tr>
    <td><strong>Observation :</strong></td>
    <td>'.$Observation.'</td>
  </tr>
  <tr>
    <td><strong>Defaut :</strong></td>
    <td>'.$defautmsg1.'</td>
  </tr>
</table>';

$send=$user["email"];
//Création d'une table pour le destinataires (A faire) 
$dest=array("celia.berkati@tchinlait.com","kamel.soummari@tchinlait.com","anissa.aimene@tchinlait.com","lyes.benaoudia@tchinlait.com","makhlouf.rebbache@tchinlait.com","mohamed.djemili@tchinlait.com","Yasmina.amrani@tchinlait.com","mohamed.zaouche@tchinlait.com","rachida.benmouhoub@tchinlait.com","djamal.rahem@tchinlait.com","lakhdar.ziani@tchinlait.com","amine.ghoul@tchinlait.com","lyes.atrouche@tchinlait.com","dihia.nacer@tchinlait.com","farouk.bouchenoua@tchinlait.com","aboutaleb.ikhlef@tchinlait.com","tedj.berkati@tchinlait.com");
$objet="Relamation Consomateur";
	    
if ($Categorie_Clt=="CONSO" && $send != NULL){
    $this->email->send_email($message, $send, $dest, $objet);
	           }
}else{  // Modification réclamation
	  $this->reclamation->updatereclamation($Date_rec, $Code_Clt,$Nom_Clt, $Categorie_Clt, $Wilaya, $Site_fab, $Date_fab, $DLC, $Horaire_fab, $Lot, $n_ligne, $Code_produit, $Nb_Brique, $Nb_Fardeau, $Categorie_Defaut, $Photo, $Nom_Cons, $Tel_Cons, $Adresse_Cons, $Email_Conso, $Observation, $Defaut, $ID);
	  $this->rediriger("listeReclamations");
	   }
	   
	}
    }//Fin d'ajout d'une Réclamation
			
		
    $this->genererVue(array('catclient'=>$catclient, 'wilayas'=>$wilayas, 'sitesfab'=>$sitesfab, 'produits'=>$produits, 'catdefauts'=>$catdefauts, 'msg'=>$msg, 'login'=>$login, 'user'=>$user, 'menuNum'=>1, 'reclamation'=>$reclamation, 'client'=>$client, 'defaut'=>$defaut));
  }
	  
}//end ControlerReclamations