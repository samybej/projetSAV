function verif() {

	var id_remise = document.getElementById("idR").value;
	var id_event = document.getElementById("idE").value;
	var pourcentage = document.getElementById("pourcentage").value;
	var num_p = document.getElementById("num_p").value;

	var REXPidR = new RegExp("^[0-9]{2,}$","i");
	var REXPidE = new RegExp("^[0-9]{2,}$","i");
	var REXPpourcentage = new RegExp("^[0-9_%-]{1,3}$","i");
	var REXPnum_p = new RegExp("^[0-9]{2,}$","i");

	if (id_remise == "") {

		document.getElementById("alerte").innerHTML="<span class=\"error\"><b>votre ajout n'as pas été effectué !</b>Cause: champ ID_remise vide.</span>";
		return false;
	}

	//si id incorrecte
	if (REXPidR.test(id_remise) == false) {

document.getElementById("alerte").innerHTML="<span class=\"error\"><b>votre ajout n'as pas été effectué !</b>Cause: ID_remise incorrecte !.</span>";
	return false;
	}

	if (id_event == "") {

		document.getElementById("alerte").innerHTML="<span class=\"error\"><b>votre ajout n'as pas été effectué !</b>Cause: champ ID_event vide.</span>";
		return false;
	}

	if (REXPidE.test(id_event) == false) {

document.getElementById("alerte").innerHTML="<span class=\"error\"><b>votre ajout n'as pas été effectué !</b>Cause: ID de l'event incorrecte !.</span>";
	return false;
	}

	if (pourcentage == "") {

		document.getElementById("alerte").innerHTML="<span class=\"error\"><b>votre ajout n'as pas été effectué !</b>Cause: champ pourcentage vide.</span>";
		return false;
	}

	if (REXPpourcentage.test(pourcentage) == false) {

document.getElementById("alerte").innerHTML="<span class=\"error\"><b>votre ajout n'as pas été effectué !</b>Cause: pourcentage incorrecte vérifiez! exp: 50% !.</span>";
	return false;
	}

	if (num_p == "") {

		document.getElementById("alerte").innerHTML="<span class=\"error\"><b>votre ajout n'as pas été effectué !</b>Cause: champ numero produit vide.</span>";
		return false;
	}

	
	if (REXPnum_p.test(num_p) == false) {

document.getElementById("alerte").innerHTML="<span class=\"error\"><b>votre ajout n'as pas été effectué !</b>Cause:numero produit incorrecte !..</span>";
	return false;
	}

	else {

		return true;
	}
}