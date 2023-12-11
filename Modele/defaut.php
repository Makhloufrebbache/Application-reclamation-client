<?php 

$bdd = new PDO('mysql:host=localhost;dbname=******;charset=Latin1', '******','******');

if(isset($_POST['code']) && $_POST['code'] != 0){
$catdef_id=$_POST['code'];

 $resultats=$bdd->query("SELECT Code_Defaut, Defaut FROM dp521_defaut WHERE Code_Categorie = '$catdef_id'");
 $resultats->setFetchMode(PDO::FETCH_OBJ);
	 	
		if($resultats->rowCount() > 0){?>
   
      <select name="Defaut" class="form-control" id="Defaut" onchange="modifierdate(document.getElementById('Defaut').value);" required >
                <option value="">- - - Choisissez le Défaut - - -</option>
                <?php 	
             while($resultat = $resultats->fetch()){?>
	            <option value="<?php echo $resultat->Code_Defaut; ?>" ><?php echo $resultat->Defaut; ?></option>
	 <?php }//end while ?>
       
	
		<?php }else{ ?>
	<select class="form-control" name="Defaut" id="Defaut" required  >
                <option value="">- - - Choisissez le Distributeur - - -</option>	
		<?php } //end if
	
	}
?>