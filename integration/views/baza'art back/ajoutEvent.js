function verif() {

	var id_event = document.getElementById("idE").value;
	var nom_event = document.getElementById("nomE").value;
	var date_event = document.getElementById("dateE").value;
	var duree_event = document.getElementById("duree").value;
	var REXPid = new RegExp("^[0-9]{2,}$","i");
	var REXPnomE = new RegExp("^[a-zA-Z]{2,}$","i");
	var REXPduree = new RegExp("^[a-zA-Z0-9]{2,}$","i");

	if (id_event == "") {

		document.getElementById("alerte").innerHTML="<span class=\"error\"><b>votre ajout n'as pas été effectué !</b>Cause: champ ID vide.</span>";
		return false;
	}

	//si id incorrecte
	if (REXPid.test(id_event) == false) {

document.getElementById("alerte").innerHTML="<span class=\"error\"><b>votre ajout n'as pas été effectué !</b>Cause: ID incorrecte !.</span>";
	return false;
	}

	if (nom_event == "") {

		document.getElementById("alerte").innerHTML="<span class=\"error\"><b>votre ajout n'as pas été effectué !</b>Cause: champ nom vide.</span>";
		return false;
	}

	if (REXPnomE.test(nom_event) == false) {

document.getElementById("alerte").innerHTML="<span class=\"error\"><b>votre ajout n'as pas été effectué !</b>Cause: nom de l'event incorrecte !.</span>";
	return false;
	}

	if (date_event == "") {

		document.getElementById("alerte").innerHTML="<span class=\"error\"><b>votre ajout n'as pas été effectué !</b>Cause: champ date vide.</span>";
		return false;
	}


	if (duree_event == "") {

		document.getElementById("alerte").innerHTML="<span class=\"error\"><b>votre ajout n'as pas été effectué !</b>Cause: champ duree vide.</span>";
		return false;
	}

	
	if (REXPduree.test(duree_event) == false) {

document.getElementById("alerte").innerHTML="<span class=\"error\"><b>votre ajout n'as pas été effectué !</b>Cause:duree incorrecte !..</span>";
	return false;
	}

	else {

		return true;
	}
}