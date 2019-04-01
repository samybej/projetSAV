function validerCIN() {
	var cin = document.getElementById("cin").value;
	
	
	
	if ( cin.length !=8 )
	{
			
			$("#cin").notify("CIN doit avoir 8 caracteres",{position:"top",className:"warn"});

	}
	/*if ( cin >=0 && cin <= 9 )
	{
			$(".notify").notify("CIN doit avoir uniquement des nombres",{position:"bottom",className:"warn"});
	}*/

}

function validerDispo()
{
	var dispo = document.getElementById("dispo").value();


	if ( dispo != 0 || dispo != 1)
	{
		$("#dispo").notify("Veuillez insérer 1 ou 0 ",{position:"bottom",className:"warn"});
	}
}




/*$(document).ready(function(){
    
    var $name = $('.box-color');
        

});

// le code précédent se trouve ici

$name.keyup(function(){
    if($(this).val().length < 5){ // si la chaîne de caractères est inférieure à 5
        $(this).css({ // on rend le champ rouge
            borderColor : 'red',
	    color : 'red'
        });
     }
     else{
         $(this).css({ // si tout est bon, on le rend vert
	     borderColor : 'green',
	     color : 'green'
	 });
     }
});
*/
