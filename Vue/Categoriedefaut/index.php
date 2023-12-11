<?php $this->title = "TCHINLAIT - Ajout client";
      $this->login = $login;
      $this->user = $user;
	   $this->menuNum = $menuNum;
      ?>


<div class="row">
<!-- colonne gauche(Contenu de l'article) -->
<div class="col-md-8">
<div class="row">
<?php echo $msg; ?>
</div>

<div class="row">
  <div class="col-md-12">
<div class="form-group">
  <legend>Ajout d'une catégorie défaut</legend>
</div>
<div class="">

<form id="" method="post" enctype="multipart/form-data" class="form-horizontal col-lg-12">
<div class="text-form" id="categories">



<div class="row">
 <div class="form-group">
  <label for="Designation" class="col-lg-3 control-label">Designation défaut:</label>
  <div class="col-lg-9">
  <input class="form-control" type="text" name="Designation" id="Designation" value="" required />
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

