<?php $this->title = "La tribune - Administration - Paramètres" ?>

<div class="pageContent">
<div class="form-group">
  <legend>Mot de passe Admin</legend>
</div>
<div class="">

<form id="pw-form" method="post" enctype="multipart/form-data" class="form-horizontal col-lg-12">
<?php if ($etat==1) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Succès !</strong> modifications terminées
    </div>
<?php endif; ?>


<?php if ($etat==2) : ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Erreur !</strong> mots de passe non identique
    </div>
<?php endif; ?>

<div class="row">
 <div class="form-group">
  <label for="login" class="col-lg-2 control-label">Login:</label>
  <div class="col-lg-3">
  <input class="form-control" type="text" name="login" id="login" value="<?php echo $user["login"]; ?>" required placeholder="Taper votre Login" />
     </div>
  </div>
</div>

<div class="row">
 <div class="form-group">
  <label for="pw" class="col-lg-2 control-label">Mot de passe:</label>
  <div class="col-lg-3">
  <input class="form-control" type="password" name="pw" id="pw" value="<?php echo $pw; ?>" required placeholder="Taper votre mot de passe" />
     </div>
  </div>
</div>

<div class="row">
 <div class="form-group">
  <label for="pwc" class="col-lg-2 control-label">Confirmation:</label>
  <div class="col-lg-3">
  <input class="form-control" type="password" name="pwc" id="pwc" value="<?php echo $pwc; ?>" required placeholder="Confirmer votre mote de passe" />
     </div>
  </div>
</div>

                                            
<div class="form-group" style="text-align:center;"><input type="submit" value="Valider" class="btn btn-primary" /></div>									
</form>
</div>


</div>