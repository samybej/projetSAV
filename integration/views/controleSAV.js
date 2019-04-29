function verif() {

    var num_p = document.getElementById("num_p").value;
    
    var REXPnum_p = new RegExp("^[0-9]+$");

    if (num_p == null ) {
        document.getElementById("alerte").innerHTML="<span class=\"error\"><b>Erreur !</b>Cause: champ numero produit vide.</span>";
	
		return false;
    }

    if (REXPnum_p.test(num_p) == false) {

        document.getElementById("alerte").innerHTML="<span class=\"error\"><b>Erreur!</b>Cause: numero produit incorrect! utilisez des nombres [0-9].</span>";
            return false;
            }

            return true;
}