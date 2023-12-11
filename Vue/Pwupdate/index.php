<?php $this->title = "TCHINLAIT - Administration - Ajouter un utilisateur" ?>

<div class="pageContent">
<div class="form-group">
  <legend>Modifier le mot de passe</legend>
</div>
<div class="">

<form id="contact-form" method="post" enctype="multipart/form-data" class="form-horizontal col-lg-12">
<div class="text-form" id="categories">


<div class="row">
 <div class="form-group">
  <label for="USER_NOM" class="col-lg-2 control-label">Nom utilisateur:</label>
  <div class="col-lg-3">
  <input class="form-control" type="text" name="USER_NOM" id="USER_NOM" value="<?php echo $user["USER_NOM"]; ?>" disabled />
     </div>
  </div>
</div>

<div class="row">
 <div class="form-group">
  <label for="USER_PRENOM" class="col-lg-2 control-label">Prénom utilisateur:</label>
  <div class="col-lg-3">
  <input class="form-control" type="text" name="USER_PRENOM" id="USER_PRENOM" value="<?php echo $user["USER_PRENOM"]; ?>" disabled />
     </div>
  </div>
</div>

<div class="row">
  <div class="form-group">
   <label for="USER_TYPE" class="col-lg-2 control-label">Type utilisateur:</label>
   <div class="col-lg-5">
   <select class="form-control" name="USER_TYPE" id="USER_TYPE" disabled >
                <option value="" <?php if($user["USER_TYPE"] == NULL) echo 'selected="selected"'; ?> >Choisir type utilisateur</option>
                <option value="Admin" <?php if($user["USER_TYPE"] == "Admin") echo 'selected="selected"'; ?>>Admin</option>
                <option value="AnimVente" <?php if($user["USER_TYPE"] == "AnimVente") echo 'selected="selected"'; ?>>Animateur vente</option>
                <option value="User" <?php if($user["USER_TYPE"] == "User") echo 'selected="selected"'; ?>>User</option>
         </select>
   </div>
  </div>
</div>

<div class="row">
 <div class="form-group">
  <label for="USER_LOGIN" class="col-lg-2 control-label">Login:</label>
  <div class="col-lg-3">
  <input class="form-control" type="text" name="USER_LOGIN" id="USER_LOGIN" value="<?php echo $user["login"]; ?>" disabled />
     </div>
  </div>
</div>
<div class="row">
 <div class="form-group">
  <label for="USER_MDP" class="col-lg-2 control-label">Mot de passe:</label>
  <div class="col-lg-3">
  <input class="form-control" type="password" name="USER_MDP" id="USER_MDP" value="<?php echo $user["mdp"]; ?>" required />
     </div>
  </div>
</div>

<div class="form-group" style="text-align:center;"><input type="submit" value="Valider" class="btn btn-primary" />
<input type="hidden" name="idHidden" value="<?php echo $user["USER_ID"]; ?>"/></div>
									
								</form>
</div>
</div>

