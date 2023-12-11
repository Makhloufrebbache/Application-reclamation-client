<?php $this->title = "TCHINLAIT - Réclamations";
      $this->login = $login;
      $this->user = $user;
	    $this->menuNum = $menuNum;
      ?>


<div class="row">
<div class="col-md-8">
<div class="row" >
  <?php echo $msg; ?>
<div class="form-group">
  <!--Ajouter une réclamation-->
           </div>
<div class="">

<form id="reclamation" method="post" enctype="multipart/form-data" class="form-horizontal col-lg-12">
<div class="text-form" id="categories">

<div class="row">

 <div class="form-group" >
  <label for="Date_rec" class="col-lg-3 control-label">Date réclamation :</label>
  <div class="col-lg-9" >
  <input class="form-control" type="date" name="Date_rec" id="Date_rec" onchange="verifierdaterec()"  value="<?php echo $reclamation['Date_rec'];?>" required/>
     </div>
  </div>

 <div class="form-group" >
  <label for="Categorie_Clt" class="col-lg-3 control-label">Catégorie du client :</label>
  <div class="col-lg-9"  >
  <select required  class="form-control" name="Categorie_Clt"  id="Categorie_Clt" onchange="show_hide(document.getElementById('Categorie_Clt').value);"   >
    		<option value=""> - - - Choisissez la catégorie - - -</option>
    			<?php
						foreach($catclient as $catcl): 
    					?>  
    						<option value="<?php echo($catcl['Code']); ?>" <?php if($reclamation['Categorie_Clt']==$catcl['Code'])echo 'selected="selected" ';?> ><?php echo($catcl['Designation']); ?></option>
    					<?php
						 endforeach;
    			?>
    	</select>
  <div class="col-lg-9" id="cooclient" hidden="hidden">
    		 <!-- saisie du nom client --> 
  </label><label for="Nom_Cons" class="control-label">Nom du consommateur :</label>
  <input type="text" class="form-control" placeholder="Nom du consommateur" name="Nom_Cons" value="<?php echo $reclamation['Nom_Cons']; ?>" />
    	
    		 <!-- saisie du n° de Tel --> 
    	<label for="Tel_Cons" style="float: left;" class="control-label">N° de Téléphone :</label> 
    	<input type="text" class="form-control" name="Tel_Cons" value="<?php echo $reclamation['Tel_Cons']; ?>" />
    		
    			 <!-- saisie de l'adresse --> 
    	<label for="Adresse_Cons" style="float: left;" class="control-label">Adresse :</label> 
    	<input type="text" class="form-control" name="Adresse_Cons" value="<?php echo $reclamation['Adresse_Cons'];?>" />
    		
    			 <!-- saisie de l'email --> 
    	<label for="Email_Conso" style="float: left;" class="control-label">E-mail :</label> 
    	<input type="email" class="form-control" name="Email_Conso" value="<?php echo $reclamation['Email_Conso']; ?>" />
   </div>	
    	
  </div>
</div>

 <div class="form-group" >
  <label for="Wilaya" class="col-lg-3 control-label" style="float: left;">Wilaya du client : </label> 
  <div class="col-lg-9"  >
  <select class="form-control" name="Wilaya" id="Wilaya" onchange="distributeurw(document.getElementById('Wilaya').value);" required>
    		<option value="">- - - Choisissez la wilaya - - -</option>
    			<?php
						foreach($wilayas as $wilaya): 
    					?>
    						<option value="<?php echo($wilaya['Code']); ?>"  <?php if($reclamation['Wilaya']==$wilaya['Code'])echo 'selected="selected" ';?> ><?php echo($wilaya['Designation']); ?></option>
    					<?php
    				    endforeach;
    			?>
    	</select>     </div>
  </div>

 <div class="form-group" >
  <label for="Code_Clt" class="col-lg-3 control-label" style="float: left;">Distributeur :</label> 
  <div class="col-lg-9" id="dist_w">
   
         <select class="form-control" name="Code_Clt" id="Code_Clt" required >
    		<option value="<?php echo($reclamation['Code_Clt']); ?>"><?php echo $client; ?></option>
    	</select>
     </div>
  </div>
  
  <div class="form-group" >
  <!-- Séléction du produit dans la table produit --> 
  <label for="Code_produit" class="col-lg-3 control-label" style="float: left;">Produit :</label> 
  <div class="col-lg-9" >
   <select name="Code_produit" class="form-control" id="Code_produit" required >
    	<option value="">- - - Choisissez le Produit - - -</option>
    			<?php
						foreach($produits as $produit): 
    					?>  
    						<option value="<?php echo($produit['Code']); ?>" <?php if($reclamation['Code_produit']==$produit['Code'])echo 'selected="selected" ';?>><?php echo($produit['Designation']); ?></option>
    					<?php
    				endforeach;  
    			?>
    			</select>
          </div>
  </div>
  


 <div class="form-group" >
    <!-- saisie de la date de fabrication --> 
    <label for="Date_fab" class="col-lg-3 control-label" style="float: left;">Date de fabrication :</label> 
  <div class="col-lg-9" >
    <input type="date" class="form-control" name="Date_fab" id="Date_fab" onchange="verifierdatefab()"  value="<?php echo $reclamation['Date_fab'];?>" required />
     </div>
  </div>

 <div class="form-group" >
  <!-- saisie de la DLC --> 
  <label for="DLC" style="float: left;" class="col-lg-3 control-label">DLC :</label> 
  <div class="col-lg-9" >
  <input class="form-control" type="date" name="DLC" id="DLC" value="<?php echo $reclamation['DLC'];?>" onchange="verifier(this.value)" required />
     </div>
  </div>

 <div class="form-group" >
   <!-- saisie de l'heure de fabrication --> 
   <label for="Horaire_fab" class="col-lg-3 control-label" style="float: left;">Horaire de fabrication :</label> 
  <div class="col-lg-9" >
   <input type="time" step="1" name="Horaire_fab" id="Horaire_fab" class="form-control" value="<?php echo $reclamation['Horaire_fab'];?>" required />

     </div>
  </div>

 <div class="form-group" >
    <!-- saisie du n° lot --> 
   	<label for="Lot" class="col-lg-3 control-label" style="float: left;">N° du LOT :</label> 
  <div class="col-lg-9" >
    <input type="text" name="Lot" class="form-control" value="<?php echo $reclamation['Lot'];?>" required />
     </div>
  </div>

 <div class="form-group" >
    <!-- saisie du Nombre de briques --> 
     <label for="Nb_Brique" class="col-lg-3 control-label" style="float: left;">Nombre de briques :</label> 
     <div class="col-lg-9" >
      <input type="number" name="Nb_Brique" class="form-control" value="<?php echo $reclamation['Nb_Brique'];?>" required />     </div>
  </div>

 <div class="form-group" >
    <!-- saisie du Nombre de fardeaux --> 
     <label for="Nb_Fardeau" class="col-lg-3 control-label" style="float: left;">Nombre de fardeaux :</label> 
     <div class="col-lg-9" >
      <input type="number" name="Nb_Fardeau" class="form-control" value="<?php echo $reclamation['Nb_Fardeau'];?>" required />
   </div>
  </div>

 <div class="form-group" >
    <!-- Choix de la catégorie dédaut --> 
    <label for="Categorie_Defaut" class="col-lg-3 control-label" style="float: left;">Catégorie défaut :</label> 
     <div class="col-lg-9" >
     <select name="Categorie_Defaut" class="form-control" id="Categorie_Defaut" onchange="cat_def(document.getElementById('Categorie_Defaut').value);" required />
    		<option value="">- - - Choisissez Catégorie Défaut - - -</option>
    			<?php
						foreach($catdefauts as $catdefaut): 
    					?>  
    						<option value="<?php echo($catdefaut['Code']); ?>" <?php if($reclamation['Categorie_Defaut']==$catdefaut['Code'])echo 'selected="selected" ';?>><?php echo($catdefaut['Designation']); ?></option>
    					<?php
    				   endforeach;  
    			      ?>
    			</select>
    </div>
  </div>

 <div class="form-group" >
    <!-- Choix du dédaut --> 
     <label for="Defaut" class="col-lg-3 control-label" style="float: left;">Défaut :</label> 
     <div class="col-lg-9" id="defaut">
      <select name="Defaut" class="form-control" id="Defaut" required onchange="modifierdate(document.getElementById('Defaut').value);">
    		<option value="<?php echo($reclamation['Defaut']); ?>"><?php echo $defaut; ?></option>
    			</select>           </div>
  </div>

 <div class="form-group" >
   <!-- saisie de l'observation --> 
    <label for="Observation" class="col-lg-3 control-label" style="float: left;">Obsérvation :</label> 
     <div class="col-lg-9" >
     <input type="text" name="Observation" class="form-control" value="<?php  echo $reclamation['Observation'];?>" />
     </div>
  </div>

 <div class="form-group" >
    <label for="Photo" class="col-lg-3 control-label" style="float: left;">Photo :</label> 
     <div class="col-lg-9" >
     <input class="form-control" type="file" name="Photo" id="Photo" />
     </div>
  </div>


<div class="form-group" style="text-align:center;"><input type="submit" value="Insérer la réclamation" class="btn btn-primary" />
<input type="hidden" name="idHidden" value="<?php echo $reclamation["ID"]; ?>"/>
<input type="hidden" name="fileHidden" value="<?php echo $reclamation["Photo"]; ?>"/>
<span id="contactAlert"></span>
</div>
									
</form>
     </div>
   </div>
  </div>
 </div>
</div>
<!-- colonne droite() -->
  <div class="col-md-4">
    <div class="row">
       <div class="col-md-12">
         <div class="row en-continu">
           <div class="col-md-12">&nbsp;</div>
         </div>
              
         <div class="row en-continu">
           <div class="col-md-12">&nbsp;</div>
         </div>
 <div class="row en-continu">
  <div class="col-md-12">&nbsp;</div>
 </div>
 
 <div class="row en-continu">
  <div class="col-md-12">&nbsp;</div>
 </div>

 <div class="row">
   <div class="col-md-12">&nbsp;</div>
 </div>		
       </div>
    </div>
  </div>
</div>

