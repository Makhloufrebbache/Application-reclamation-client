<?php 

$bdd = new PDO('mysql:host=localhost;dbname=********;charset=Latin1', '******','******');

if(isset($_POST['code']) && $_POST['code'] != 0){
$w_id=$_POST['code'];

 $resultats=$bdd->query("SELECT Code, Designation FROM dp521_client WHERE Wilaya = '$w_id'");
 $resultats->setFetchMode(PDO::FETCH_OBJ);
	 	
		if($resultats->rowCount() > 0){?>
   
   <select class="form-control" name="Code_Clt" id="Code_Clt" required  />
                <option value="">- - - Choisissez le Distributeur - - -</option>
                <?php 	
             while($resultat = $resultats->fetch()){?>
	            <option value="<?php echo $resultat->Code; ?>" ><?php echo $resultat->Designation; ?></option>
	 <?php }//end while ?>
       
	
		<?php }else{ ?>
	<select class="form-control" name="Code_Clt" id="Code_Clt" required  />
                <option value="">- - - Choisissez le Distributeur - - -</option>	
		<?php } //end if
	
	}//end if
?>