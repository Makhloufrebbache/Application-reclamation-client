<?php 
header('Content-type: text/html; charset=UTF-8');
$this->title = "TCHINLAIT - Listes des réclamations";
      $this->login = $login;
      $this->user = $user;
	   $this->menuNum = $menuNum;
	  
      //$this->login = $this->nettoyer($login); ?>
 
<div class="pageContent">
   <caption>
 <div class="row">
<form id="filtre" name= "filtre" method="post" enctype="multipart/form-data" class="form-horizontal ">
        <div class="col-lg-3"> 
        <label for="Date_debut" class="control-label" > Filtrer les réclamation par date </label>   
       
        </div>
        <div class="col-lg-1" style="text-align:right;"> 
        <label for="Date_debut" class="control-label"  >Du :</label>   
        </div>
        <div class="col-lg-2"> 
    <input type="date" class="form-control"  name="Date_debut" id="Date_debut" value="<?php echo $Date_debut; ?>" required />
        </div>
        <div class="col-lg-1" style="text-align:right;">   
        <label for="Date_fin" class="control-label"  > Au :</label>   
        </div>
        <div class="col-lg-2">   
     <input type="date" class="form-control" name="Date_fin"  id="Date_fin" value="<?php echo $Date_fin; ?>" required />
        </div>
        <div class="col-lg-2">   
        <input type="submit"  value="Filtrer" class="btn btn-primary" />
        </div>
								</form>
        <div class="col-lg-1" style="text-align: right;"><a href="./Contenu/files/<?php echo $generated_file; ?>"><img src="Contenu/images/exceldl.png" class="rounded float-left" title="Exporter vers Ecxcel"  style="cursor:pointer; max-width:30px; max-height:40px;"></a></div>
        <!--<div class="col-lg-3"><form class="form-inline" action="" name="art_date" method="POST">
          <div class="form-group">
            <div class="input-group">
            <input type="date" name="art_date" required class="form-control" value="<?php //echo $date; ?>" placeholder="Tapez votre recherche">
           <span class="input-group-btn">
           <button class="btn btn-primary" type="submit" title="Rechercher les articles par date"><span class="glyphicon glyphicon-search"></span></button>
           </span> 
          </div>
         </div>
        </form></div>-->
        <!--<div class="col-lg-4" ><span id="ajm1"><a class="bouton" href="./admin/articlesadd/">+Ajouter un article</a></span></div>-->
      </div>
   </caption>
<section class="col-sm-12 table-responsive" style="overflow-x: auto;overflow-y: auto; max-height:500px;">
<table class="table table-bordered table-striped table-hover table-dark">
   <thead>
     <tr class="success" style="font-size:11px">
       <th scope=" col" >Auteur</th>
       <th scope="col">Date r&eacute;clamation </th>
       <th scope="col">Date de saisie</th>
       <th scope="col">Nom client</th>
       <th scope="col">Wilaya </th>     
       <th scope="col">Site de fabrication</th>
       <th scope="col">DLC</th>
       <th scope="col">Horaire de Fabrication</th>
       <th scope="col">Lot</th>
       <th scope="col">N° Ligne</th>
       <th scope="col">Code produit</th>
       <th scope="col">Nombre de brique</th>
       <th scope="col">Nombre de fardeaux</th>
       <th scope="col">Categorie de defaut</th>
       <th scope="col">Photo</th>
       <th scope="col">Nom Consomateur</th>
       <th scope="col">Telephone de consomateur</th>
       <th scope="col">Adresse de consomateur</th>
       <th scope="col">E_mail de consomateur</th>
       <th scope="col">Observation</th>
       <th scope="col">Defaut</th>
       <!--<th scope="col">Supprimer</th>-->
          <?php if($user  != array() && ($user['USER_TYPE'] == "Admin" || $user['USER_TYPE'] == "AnimVente")) { ?>  <th scope="col">Edit</th> <?php } ?>    
       <!--<th scope="col">Principal</th>
       <th scope="col">Supp</th>-->
     </tr>
   </thead>
   <tbody>
    <?php foreach($reclamations as $reclamation): ?>
     <tr style="font-size:11px">
       <td><?php echo $reclamation['Auteur'];?></td>
       <td><?php echo $this->formatdate($reclamation['Date_rec'], "/", true);?></a></td>
       <td><?php echo $this->formatdate($reclamation['Date_sai'], "/", true);?></a></td>
       <td><?php foreach($clients as $client): if($client['Code'] == $reclamation['Code_Clt']) echo $client['Designation']; endforeach; ?></td>
       <td><?php echo $reclamation['Wilaya'];?></td>
       <td><?php foreach($sitsFab as $sitFab): if($sitFab['Code'] == $reclamation['Site_fab']) echo $sitFab['Designation']; endforeach; ?></td>
       <td><?php if($reclamation['DLC'] == "0001-01-01") echo ""; else echo $reclamation['DLC'];?></td>
       <td><?php echo $reclamation['Horaire_fab'];?></td>
       <td><?php echo $reclamation['Lot'];?></td>
       <td><?php echo $reclamation['n_ligne'];?></td>
       <td><?php echo $reclamation['Code_produit'];?></td>
       <td><?php echo $reclamation['Nb_Brique'];?></td>
       <td><?php echo $reclamation['Nb_Fardeau'];?></td>
       <td><?php foreach($catsDef as $catDef): if($catDef['Code'] == $reclamation['Categorie_Defaut']) echo $catDef['Designation']; endforeach; ?></td>
       <td><?php if($reclamation['Photo'] != ""){ ?><a href="<?php echo $reclamation['Photo'];?>" target="_blank"><img src="Contenu/images/attachment.png" class="rounded float-left" title="Cliquer pour visualiser l'image"  style="cursor:pointer; max-width:30px; max-height:30px;"><?php }else{ ?><img src="Contenu/images/imageban.jpg" class="rounded float-left" title="Image indisponible"  style="cursor:pointer; max-width:30px; max-height:30px;"><?php } ?></td>
       <td><?php echo $reclamation['Nom_Cons'];?></td>
       <td><?php echo $reclamation['Tel_Cons'];?></td>
       <td><?php echo $reclamation['Adresse_Cons'];?></td>
       <td><?php echo $reclamation['Email_Conso'];?></td>
       <td><?php echo $reclamation['Observation'];?></td>
       <td><?php foreach($defauts as $defaut): if($defaut['Code_Defaut'] == $reclamation['Defaut']) echo ($defaut['Defaut']); endforeach; ?></td>
      <?php if($user  != array() && ($user['USER_TYPE'] == "Admin" || $user['USER_TYPE'] == "AnimVente")) { ?>  <td><?php if($dateduj == $reclamation['Date_sai']){?> <a id="menup2" class="btn btn-secondary" href="reclamations/<?php echo $reclamation['ID'];?>" role="button"><img src="Contenu/images/edit.jpg" title="Cliquer pour modifier cette reclamation"/></a> <?php }else{?> <img src="Contenu/images/edit.jpg" title="Reclamation non modifiable"/> <?php } ?> </td>  <?php } ?>         
     </tr>
    <?php endforeach; ?>
   </tbody>
</table>
</section>
</div>
