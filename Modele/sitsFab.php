<?php
require_once 'Framework/Modele.php';

class sites extends Modele{
	//Renvoi tous les sites de fabrication
	public function getSitesfab(){
		$sql='SELECT Code, Designation FROM dp521_site_fab ORDER BY Code ASC ';
		$sitesfab = $this->executerRequete($sql);
		return $sitesfab;
		}
	//Renvoi d'un Site fab
	public function getSitefab($code){
		$sql='SELECT Code, Designation FROM dp521_site_fab WHERE Code=? ';
		$sitefab = $this->executerRequete($sql, array($code));
		$sitefab = $sitefab->fetch();
		return $sitefab;
		}
	
	}
