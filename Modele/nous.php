<?php
require_once 'Framework/Modele.php';

class nous extends Modele{
	
	//Renvoi Le contenu de la présentation
	public function getNous(){
		$sql='SELECT id, content FROM nous';
		$nous = $this->executerRequete($sql);
		return $nous;
		}//end getNous
		
	//Modifier le cotenu
	public function updateNous($nous){
      $sql = "update nous
	          set    content = ?
			  where  id      = ? ";
      $this->executerRequete($sql, array($nous, 1));
		}
	
	}
