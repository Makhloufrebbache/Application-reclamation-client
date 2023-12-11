<?php $this->title = "TCHINLAIT - Administration - A Propos" ?>
<!-- page administration de texte de présention -->
<div class="pageContent">
  <div class="form-group">
     <legend>Qui sommes nous?</legend>
  </div>
  <form id="contact-form" method="post" enctype="multipart/form-data" class="form-horizontal col-lg-12">
<div class="row">
 <div class="form-group">
  <div class="col-lg-12">
<textarea class="form-control" id="editor" name="nous" ><?php echo $nous["content"]; ?></textarea>
  </div>
  </div>
  </div>
<div class="form-group"><input type="submit" value="Valider" class="btn btn-primary" /></div>

  </form>
</div>
