<?php $this->title = "TCHINLAIT - Accueil";
      $this->login = $login;
      $this->user = $user;
 ?>

<div class="row">
  <div class="col-md-9">
   <p><?php echo $articles[0]["Texte_fr"]; ?></p>
  </div>
  <div class="col-md-3">
   <p><?php include "Vue/Connexion/index.php"; ?></p>
  </div>
</div>
