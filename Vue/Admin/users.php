<?php $this->title = "TCHINLAIT - Users";
?>
<!-- page d'administration des utilisateurs -->
<div class="pageContent">
<section class="col-sm-12 table-responsive">
<table class="table table-bordered table-striped table-condensed">
   <caption>
      <div class="row">
        <div class="col-lg-5"><h2><?php echo $nb_users; ?> Utilisateur(s) - <spam style="color: greenyellow; font-size: large;">(<?php echo $nb_connected_users; ?> Connecté(s))</spam></spam></h2></div>
        <div class="col-lg-3"></div>
        <div class="col-lg-4" >&nbsp;<span id="ajm1"><a class="bouton" href="./admin/usersadd">+Ajouter un utilisateur</a></span></div>
      </div>
   </caption>
   <thead>
     <tr class="success">
       <th scope="col">Nom & Prénom</th>
       <th scope="col">Login</th>
       <th scope="col">Type utilisateur</th>
       <th scope="col">Date d'insertion</th>
       <th scope="col">Etat</th>
       <th scope="col">Edit</th>
       <th scope="col">Supp</th>
     </tr>
   </thead>
   <tbody>
    <?php foreach($users as $user): ?>
     <tr>
       <td <?php if($user['connected']=="Y") echo "style='background-color: greenyellow;'"; ?>><?php echo $user['USER_NOM'].' '.$user['USER_PRENOM'];?></td>
       <td><?php echo $user['USER_LOGIN'];?></td>
       <td><?php echo $user['USER_TYPE'];?></td>
       <td><?php echo $user['USER_DATE'];?></td>
       
       <td><?php if($user['USER_ACTIF'] == "Y"){?><a href="admin/userbloc/<?php echo $user['USER_ID'];?>"><img src="Contenu/images/bou_ok.gif" title="Désactiver cet utilisateur"/></a><?php }else{?><a href="admin/useractif/<?php echo $user['USER_ID'];?>"><img src="Contenu/images/bloc.png" width="21" height="22" title="Activer cet utilisateur" /></a><?php } ?>
       </td>
       <td><a href="admin/usersadd/<?php echo $user['USER_ID'].'-'.$this->slug($user['USER_NOM']);?>"><img src="Contenu/images/edit.jpg" title="Cliquer pour modifier cet utilisateur"/></a>       </td>
       <td><img src="Contenu/images/sup.jpg" id="supp" title="Cliquer pour supprimer cet utilisateur" onclick="userDelete(<?php echo $user['USER_ID'];?>);" style="cursor:pointer;"/></td>
     </tr>
    <?php endforeach; ?>
   </tbody>
</table>
</section>
</div>

</div>
</div>
    </div>
  </div>
</div>
