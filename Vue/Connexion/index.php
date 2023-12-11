<?php $this->title = "Connexion"; 
      $this->login = $login;
 ?>

<?php if (isset($msgErreur)) : ?>
    <div class="alert alertMM alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Erreur !</strong> <?php echo $this->nettoyer($msgErreur) ?>
    </div>
<?php endif; ?>
<?php if($login == "") { ?>
<div class="well wellMM" style="background-color: #dee6e1;">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3" style="margin-left:0;">
             <!-- <h2 class="text-center">Authentification</h2>-->

        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="connexion">
            <form class="form-signin form-horizontal" role="form" action="connexion/connecter" method="post">
                <div class="form-group">
                    <div class="col-lg-12 col-sm-offset-3 col-md-4 col-md-offset-4" style="margin-left:0;">
                        <input name="login" type="text" class="form-control" placeholder="Entrez votre login" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12 col-sm-offset-3 col-md-4 col-md-offset-4" style="margin-left:0;">
                        <input name="mdp" type="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" style="margin-left:50px;">
                    
                        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Connexion</button>      
                     
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>
<?php }else{ ?>
<div class="well wellMM" style="background-color: #dee6e1;">

    <div class="row">
        <div class="col-sm-12 col-sm-offset-2 col-md-12 col-md-offset-3" style="margin-left:0;">
            <h2 class="text-center">Bienvenu</h2>
        </div>
    </div>
    
    <div class="tab-content" >
        <div class="tab-pane fade in active" style="text-align:center;" id="connexion">
        <p> <span style="font-family: fantasy;"><?php echo $user['USER_NOM'].'  '.$user['USER_PRENOM']; ?></a></span></p>
        </div>
    </div>
    
    <div class="tab-content">
        <div class="tab-pane fade in active" id="connexion">
        
        </div>
    </div>
    
    <div class="tab-content">
        <div class="tab-pane fade in active" style="text-align:center;" id="pwupdate">
        <a class="link" href="pwupdate" role="button">Changer votre mot de passe</a>
        </div>
    </div>
    
</div>              
<?php } ?> 
