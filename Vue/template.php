<!DOCTYPE HTML>
<html>

  <head>
    <meta charset="utf-8">
    <base href="<?php echo $racineWeb;?>" >
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Contenu/Librairies/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Contenu/Librairies/bootstrap/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="Contenu/images/Logos TCHIN LAIT.jpg">
  </head>

  <body>
  <div class="menu-gauche" id="menu-gauche">
  <div class="container-fluid">
   <div class="col-lg-12 col-menu" id="menups">
    <div class="close close1"><img src="Contenu/images/close.jpg" class="aff"/></div>
    <ul class="list-group"> 
      <li class="list-group-item"><a id="menups0" class="btn btn-primary" href="./" role="button"><span class="glyphicon glyphicon-home"></span>Accueil</a></li>
      <?php if($user  != array() && $user['USER_TYPE'] == "Admin") {?>
      <li class="list-group-item"><a id="menups1" class="btn btn-primary" href="reclamations" role="button">Réclamations</a></li>
      <li class="list-group-item"><a id="menups2" class="btn btn-primary" href="listeReclamations" role="button">Liste des réclamations</a></li>
      <li class="list-group-item"><a id="menups3" class="btn btn-primary" href="client" role="button">Client</a></li>
      <li class="list-group-item"><a id="menups4" class="btn btn-primary" href="categorieClient" role="button">Catégorie client</a></li>
      <li class="list-group-item"><a id="menups5" class="btn btn-primary" href="produit" role="button">Produits</a></li>
      <li class="list-group-item"><a id="menups6" class="btn btn-primary" href="defaut" role="button">Défaut</a></li>
      <li class="list-group-item"><a id="menups7" class="btn btn-primary" href="categorieDefaut" role="button">Catégorie défaut</a></li><?php }
		  else if($user  != array() && $user['USER_TYPE'] == "AnimVente"){ ?><li class="list-group-item"><a id="menups1" class="btn btn-primary" href="reclamations" role="button">Réclamations</a></li>
      <li class="list-group-item"><a id="menups2" class="btn btn-primary" href="listeReclamations" role="button">Liste des réclamations</a></li>
      <?php } else if($user  != array() && $user['USER_TYPE'] == "User"){ ?><li class="list-group-item"><a id="menups2" class="btn btn-primary" href="listeReclamations" role="button">Liste des réclamations</a></li><?php } ?>
      <?php   if($user  != array() ){ ?> 
      <li class="list-group-item"><a class="btn btn-success" href="connexion/deconnecter" role="button">Déconnexion</a></li>
      
      <?php } ?>
      </ul>
  </div>
   </div>
  </div>
  
  <header class="container">
  <div class="row ligne">
       <div class="col-md-2" style="text-align:center;">
         <a href="./"><img id="img_logo" src="Contenu/images/Logos TCHIN LAIT.jpg" /></a>
       </div>
       <div class="col-md-5">&nbsp;</div>
       <div class="col-md-5">
         <form class="form-inline" action="./search/" name="form_search" method="POST">
          <div class="form-group">
            <div class="input-group">
            <input type="search" name="search" required class="form-control" value="" placeholder="Tapez votre recherche">
           <span class="input-group-btn">
           <button class="btn btn-primary" type="button" title="Rechercher un article"><span class="glyphicon glyphicon-search" style="line-height:0;"></span></button> <!--submit-->
           </span> 
          </div>
         </div>
        </form>
       </div>
       
       </div>
       <!-- affichage petit ecran -->
     <div class="row ligne  visible-xs">
       <img src="Contenu/images/menu.jpg" class="aff"/>
     </div>
     
     <div class="row ligne  hidden-xs">
       <div class="col-md-10 menu-secondaire" style="text-align: left;" id="menup">
       <a id="menup0" class="btn btn-primary" href="./" role="button"><span class="glyphicon glyphicon-home"></span>Accueil</a> 
       
		<?php if($user  != array() && $user['USER_TYPE'] == "Admin") {?>| <a id="menup1" class="btn btn-primary" href="reclamations" role="button">Réclamations</a> | <a id="menup2" class="btn btn-primary" href="listeReclamations" role="button">Liste des réclamations</a> | <a id="menup3" class="btn btn-primary" href="client" role="button">Client</a> | <a id="menup4" class="btn btn-primary" href="categorieClient" role="button">Catégorie client</a> |  <a id="menup5" class="btn btn-primary" href="produit" role="button">Produits</a> | <a id="menup6" class="btn btn-primary" href="defaut" role="button">Défaut</a> | <a id="menup7" class="btn btn-primary" href="categorieDefaut" role="button">Catégorie défaut</a>  <?php }
		else if($user  != array() && $user['USER_TYPE'] == "AnimVente"){ ?>|
<a id="menup1" class="btn btn-primary" href="reclamations" role="button">Réclamations</a> | <a id="menup2" class="btn btn-primary" href="listeReclamations" role="button">Liste des réclamations</a> <?php } else if($user  != array() && $user['USER_TYPE'] == "User"){ ?>
| <a id="menup2" class="btn btn-primary" href="listeReclamations" role="button">Liste des réclamations</a> <?php } ?>
       
        
       </div>
        <div class="col-md-2 menu-secondaire" style="text-align: right;" >
             <?php   if($user  != array() ){ ?> <a class="btn btn-success" href="connexion/deconnecter" role="button">Déconnexion</a>
             <?php } ?></div> 
     </div>
     
  </div>
  
   
  
  
  </header>


  <div class="container">
  
  <!-- Contenu de la page d'accueil -->
    <div class="col-md-12 pageac" >
    <?php echo $contenu;?>   
    </div>
  </div>
  
  <footer class="container-fluid piedpage" style="height:35px; ">
    <div class="container">
       <div class="col-md-12">
        <div class="row">
        <div class="col-md-3 ligne">
        
         <span class="concept-dev">
           © 2018 TCHINLAIT
         </span>
       
       </div>
       <div class="col-md-2 ligne">&nbsp;</div>
         <div class="col-md-7 menu-secondaire" style="padding:0; color:#FFF;">
      &nbsp;
       </div>
         
          <?php 
		  $nb = count($rubriquesMenu);
		  $i=0;
		  foreach($rubriquesMenu as $rubriqueMenu): 
		  if($i%5 ==0)
		  echo '<div class="col-md-3 ligne">
                <ul class="list-group">';
		  ?>    
            <li><a class="lien-blanc" href="<?php echo $this->slug(strtolower($rubriqueMenu['slug'])); ?>"><?php echo $rubriqueMenu['Nom_Rubrique_fr']; ?></a></li>
          <?php 
		  $i++;
		  if($i%5 ==0 || $i==$nb)
		  echo '</ul>
                </div>';
		  endforeach; ?> 
         
        </div>
       </div>
       
     </div>
  </footer>
    
  </body>
</html>