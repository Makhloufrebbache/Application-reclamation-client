<?php $this->title = "TCHINLAIT - Ajout client";
      $this->login = $login;
      $this->user = $user;
	    $this->menuNum = $menuNum;
      ?>
<div class="row">
<div class="col-md-8">
<div class="row">
<div class="col-md-12">
<div class="form-group">
<legend>Ajout d'un produit</legend>
</div>
<div class="">

<form id="contactez-nous" method="post" enctype="multipart/form-data" class="form-horizontal col-lg-12">
<div class="text-form" id="categories">

<div class="row">
 <div class="form-group">
  <label for="Code" class="col-lg-3 control-label">Code produit:</label>
  <div class="col-lg-9">
  <input class="form-control" type="text" name="Code" id="Code" value="" />
     </div>
  </div>
</div>

<div class="row">
 <div class="form-group">
  <label for="Designation" class="col-lg-3 control-label">Designation produit:</label>
  <div class="col-lg-9">
  <input class="form-control" type="text" name="Designation" id="Designation" value="" required />
     </div>
  </div>
</div>
                                            
<div class="form-group" style="text-align:center;"><input type="submit" value="Envoyer" class="btn btn-primary" />
<input type="hidden" name="idHidden" value="<?php  ?>"/>
<span id="contactAlert"></span>
</div>
									
								</form>
     </div>
   </div>
  </div>
 </div>
</div>

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

