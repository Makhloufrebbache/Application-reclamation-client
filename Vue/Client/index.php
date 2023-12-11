 <?php $this->title = "TCHINLAIT - Ajout client";
      $this->login = $login;
      $this->user = $user;
	    $this->menuNum = $menuNum;
    ?>


<div class="row">
<!-- colonne gauche(Contenu de l'article) -->
<div class="col-md-8">
<div class="row">
  <div class="col-md-12">
<div class="form-group">
  <legend>Ajout d'un client</legend>
</div>
<div class="">

<form id="" method="post" enctype="multipart/form-data" class="form-horizontal col-lg-12">
<div class="text-form" id="categories">

<div class="row">
 <div class="form-group">
  <label for="nom" class="col-lg-2 control-label">Nom client:</label>
  <div class="col-lg-10">
  <input class="form-control" type="text" name="Designation" id="Designation" value="" />
     </div>
  </div>
</div>

<div class="row">
 <div class="form-group">
  <label for="sujet" class="col-lg-2 control-label">Code client:</label>
  <div class="col-lg-10">
  <input class="form-control" type="text" name="Code" id="Code" value="" required />
     </div>
  </div>
</div>

<div class="row">
  <div class="form-group">
   <label for="destinataire" class="col-lg-2 control-label">Wilaya:</label>
   <div class="col-lg-5">
   <select class="form-control" name="Wilaya" id="Wilaya" required />
                <option value="0" selected="selected" >Choisir une wilaya ...</option>
               <?php
						foreach($wilayas as $wilaya): 
    					?>
    						<option value="<?php echo($wilaya['Code']); ?>" ><?php echo($wilaya['Designation']); ?></option>
    					<?php
    				    endforeach;
    			?>
         </select>
   </div>
  </div>
</div>

<div class="row">
  <div class="form-group">
   <label for="destinataire" class="col-lg-2 control-label">Catégorie:</label>
   <div class="col-lg-5">
   <select class="form-control" name="Categorie" id="Categorie" required />
                <option value="0" selected="selected" >Choisir une catégorie ...</option>
               <?php 
						foreach($catClients as $catClient): 
    					?>
    						<option value="<?php echo($catClient['Code']); ?>" ><?php echo($catClient['Designation']); ?></option>
    					<?php
    				    endforeach;
    			?>
         </select>
   </div>
  </div>
</div>
                                            
<div class="form-group" style="text-align:center;"><input type="submit" value="Envoyer" class="btn btn-primary" />
<input type="hidden" name="idHidden" value="<?php //echo $article["Id_Article"]; ?>"/>
<span id="contactAlert"></span>
</div>
									
								</form>
     </div>
   </div>
  </div>
 </div>
</div>
<!-- colonne droite(PDF, PUB, ...) -->
  <div class="col-md-4">
    <div class="row">
       <div class="col-md-12">
          <!-- Pdf -->
         <div class="row en-continu">
           <div class="col-md-12">&nbsp;</div>
         </div>
              
          <!-- Editorial -->
         <div class="row en-continu">
           <div class="col-md-12">&nbsp;</div>
         </div>

    <!-- La pub -->
 <div class="row en-continu">
  <div class="col-md-12">&nbsp;</div>
 </div>
 
 <div class="row en-continu">
  <div class="col-md-12">&nbsp;</div>
 </div>

 <div class="row">
   <div class="col-md-12">&nbsp;</div>
 </div>		

      
      <!-- /col-md-12 -->
       </div>
    </div>
  </div>
</div>

