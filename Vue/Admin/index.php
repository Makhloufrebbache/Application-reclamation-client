<?php $this->title = "TCHINLAIT - Administration - Accueil";
 ?>
<!-- page d'accueil d'administration-->
<div class="pageContent">
<section class="col-sm-12 table-responsive">
<table class="table table-bordered table-striped table-condensed">
   <thead>
     <tr class="success">
       <th scope="col">Titres d'articles</th>
       <th scope="col">Date d'insertion</th>
       <th scope="col">Editer</th>
     </tr>
   </thead>
   <tbody>
    <?php foreach($articles as $article): ?>
     <tr>
       <td><?php echo $article['Titre_fr'];?></a>&nbsp;&nbsp;<?php if($article['photo_origine'] !=""){?><a href="Contenu/files/articlesFile/<?php echo $article['photo_origine'];?>" target="_blank"><img src="Contenu/images/attachment.png" width="25" height="25" title="Visualiser l'image" /></a><?php } ?>
       
      &nbsp;<a href="admin/comments/<?php echo $article['Id_Article'].'-'.$this->slug($article['Titre_fr']);?>" title="Voir les commentaires"></span></a>&nbsp; visite(s)</span>
       </td>
       <td><?php echo $this->formatdate($article['Date_Add'], "/", true);?></a></td>
           <?php foreach($rubriques as $rubrique):
                   if($rubrique['Id_Rubrique'] == $article["Id_Rubrique"])
				              echo $rubrique['Nom_Rubrique_fr'];
	                 endforeach; ?></td>
       <td><a href="admin/articlesadd/<?php echo $article['Id_Article'].'-'.$this->slug($article['Titre_fr']);?>"><img src="Contenu/images/edit.jpg" title="Cliquer pour modifier ce menu"/></a>       </td>
           <?php if($article['fp'] == "Y"){?><a href="admin/articlebloc/<?php echo $article['Id_Article'];?>"><img src="Contenu/images/bou_ok.gif" title="Article non principal"/></a><?php }else{ if($article['photo_origine'] !=""){?><a href="admin/articleactif/<?php echo $article['Id_Article'];?>"><img src="Contenu/images/bloc.png" width="21" height="22" title="Article principal" /></a><?php }else{?> <img src="Contenu/images/bloc.png" width="21" height="22" title="Article principal" onclick="alert('Cet article ne peut pas etre principal car il n\'a pas d\'image')" /> <?php } } ?>
       </td>
       <td><img src="Contenu/images/sup.jpg" id="supp" title="Cliquer pour supprimer ce dossier" onclick="articleDelete(<?php echo $article['Id_Article'];?>);" style="cursor:pointer;"/></td>
     </tr>
    <?php endforeach; ?>
   </tbody>
</table>
</section>
</div>
