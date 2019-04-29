
function verif() {

	var cin = document.getElementById("cin").value;
	var nom = document.getElementById("nom").value;
	var prenom = document.getElementById("prenom").value;

	var dispo = document.getElementById("dispo").value;
	var date = document.getElementById("date_livraison").value;


	console.log(current_date);

	var REXPcin = new RegExp("^[0-9]{8}$");
	var REXPnom = new RegExp("^[a-zA-Z]{2,}$","i");
	var REXPdispo = new RegExp("^[01]{1}$");

	if (cin == "") {

		document.getElementById("alerte").innerHTML="<span class=\"error\"><b>Erreur !</b>Cause: champ CIN vide.</span>";
		//alert("error");
		return false;
	}

	
	if (REXPcin.test(cin) == false) {

document.getElementById("alerte").innerHTML="<span class=\"error\"><b>Erreur!</b>Cause: CIN incorrecte !.</span>";
	return false;
	}

	if (nom == "") {

		document.getElementById("alerte").innerHTML="<span class=\"error\"><b>Erreur !</b>Cause: Nom vide !.</span>";
		return false;
	}

	if (REXPnom.test(nom) == false) {

document.getElementById("alerte").innerHTML="<span class=\"error\"><b>Erreur !</b>Cause: Verifier le nom  !.</span>";
	return false;
	}

	if (prenom == "") {

		document.getElementById("alerte").innerHTML="<span class=\"error\"><b>Erreur !</b>Cause: prenom vide !.</span>";
		return false;
	}

	if (REXPnom.test(prenom) == false) {

document.getElementById("alerte").innerHTML="<span class=\"error\"><b>Erreur !</b>Cause: Verifier le prenom  !.</span>";
	return false;
	}

	if (dispo == "") {

		document.getElementById("alerte").innerHTML="<span class=\"error\"><b>Erreur !</b>Cause: verifier la disponibilité !!.</span>";
		return false;
	}

	if (REXPdispo.test(dispo) == false) {

document.getElementById("alerte").innerHTML="<span class=\"error\"><b>Erreur !</b>Cause: Verifier la disponibilité !!.</span>";
	return false;
	}

	var current_date = new Date();
	var current_str = current_date.toISOString().substring(0, 10);


if ( date < current_str ){
	document.getElementById("alerte").innerHTML="<span class=\"error\"><b>Erreur !</b>Cause: date inférieure à la date actuelle !!.</span>";
	return false;
}

else {
	return true;
}

}