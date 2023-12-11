// Afficher caché les informations de consommateur
function show_hide(code) {
  if (code == "CONSO") $("#cooclient").show(1000);
  else $("#cooclient").hide(1000);
}
//Afficher les client d'une wilayas
function distributeurw(w_id) {
  
  $.ajax({
    type: "POST",
    data: "code=" + w_id,
    url: "Modele/distributeurw.php",
    success: function (data) {
      var conteneur = document.getElementById("dist_w"); 
      if (data != "") conteneur.innerHTML = data;
    },
    error: function () {
      $("#dist_w").html("Problème de connexion!");
    },
  });
}
//Afficher les catégories d'un défaut
function cat_def(catdef_id) {
  
  $.ajax({
    type: "POST",
    data: "code=" + catdef_id,
    url: "Modele/defaut.php",
    success: function (data) {
      var conteneur = document.getElementById("defaut"); 
      if (data != "") conteneur.innerHTML = data;
    },
    error: function () {
      $("#defaut").html("Problème de connexion!");
    },
  });
}
//Vérification de la date d'éxpiration par rapport à la date de fabirication
function verifier(dlc) {
  var date_fab = document.getElementById("Date_fab").value;
  if (dlc <= date_fab) {
    alert("La DLC doit étre supérieur à la date fabrication");
    document.forms["reclamation"].elements["DLC"].value = "";

    document.getElementById("DLC").focus();
  }
}
//vérifacation des trois date (Date du jour(Date système),date fabrication,date DLC)
function verifierdaterec(Date_Sys) {
  var date_fab = document.getElementById("Date_fab").value;//Récuperer le date fabrication
  var date_rec = document.getElementById("Date_rec").value;//Récuperer la date de réclamation
  if (date_fab != "") {
    if (date_rec < date_fab) {
      alert(
        "La Date de réclamation   doit étre supérieur ou égale à la date  fabrication"
      );
      document.forms["reclamation"].elements["Date_rec"].value = "";
      document.getElementById("Date_rec").focus();
    }
  }
  if (Date_Sys < date_rec) {
    alert(
      "La Date de réclamation   doit étre inféreiur ou égale à la date  du jour"
    );
    document.forms["reclamation"].elements["Date_rec"].value = "";
    document.getElementById("Date_rec").focus();
  }
}
//vérification de  la date fabrication
function verifierdatefab() {
  var date_fab = document.getElementById("Date_fab").value;
  var date_rec = document.getElementById("Date_rec").value;
  var dlc = document.getElementById("DLC").value;
  if (date_fab > date_rec) {
    alert(
      "La Date de fabrication  doit étre inférieur ou égale à la date réclamation"
    );
    document.forms["reclamation"].elements["Date_fab"].value = "";
    document.getElementById("Date_fab").focus();
  }
  //verification de la DLC
  if (dlc != "") {
    if (date_fab > dlc) {
      alert("La Date de fabrication  doit étre inférieur  à la date DLC");
      document.forms["reclamation"].elements["Date_fab"].value = "";
      document.getElementById("Date_fab").focus();
    }
  }
}
//Formater la date de fab et DLC
function modifierdate(Id) {
  if (Id == 16) {
    document.getElementById("Date_fab").type = "text";
    document.getElementById("Date_fab").value = "0001/01/01";
    document.getElementById("DLC").type = "text";
    document.getElementById("DLC").value = "0001/01/01";
    document.getElementById("Horaire_fab").value = "00:00:00";
  }
}
//Supprimer un article
function articleDelete(id) {
  var msg = "Etes vous sre de vouloir supprimer cet article?";
  if (confirm(msg)) document.location.href = "admin/articledel/" + id;
}  
//Supprimerun menu
function menuDelete(id){
    var msg = "Etes vous s\re de vouloir supprimer cet menu?";
	if (confirm(msg))
	  document.location.href='admin/menusdel/'+id;	
	}
//Supprimer une catégorie
function categorieDelete(id){
    var msg = "Etes vous s\re de vouloir supprimer cette catégorie?";
	if (confirm(msg))
	  document.location.href='admin/categoriesdel/'+id;	
	}
	





