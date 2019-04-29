<?php
$numero=@$_GET['n'];
include "C:/wamp64/www/nouveau dossier/core/eventC.php";
$event1c=new EventC();
$event=$event1c->afficherEvents();
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>formulaire d'ajout</title>
	<meta charset="utf-8">

	 <script type="text/javascript" src="ajoutR.js"></script>

	 <style type="text/css">
	 	.back{background-image: url('img/logo/back.png') ;}
	 	.error { color: #FFFFFF; border: 1px dotted #000000; padding: 10px; background-color: #FF0000; }
	 </style>
</head>

<div class="back">
<body>

	<div class="logomodifierremise" style="padding-left: 630px;">
				<a href="#"><img src="img/logo/logo.jpg" alt="logo bazart"  style="width : 250px; height: 250px" ></a>
			</div>

<form method="post" action="ajoutRemise.php" onsubmit="return verif()" style="padding-top: 0px;" >

	<h1 style="color: #DA3250; background: rgba(0,0,0,0.4)" align="center" >Ajouter une Remise</h1>

	<fieldset>
		<legend style="color: #DA3250"> <strong>les coordonnées</strong></legend>
	<p>
		<label for="id_remise" ><strong>ID Remise :</strong></label> 
		<input type="text" name="id_remise" id="idR" placeholder="exp:1234" />
	</p>

	<p>
		<label for="id_event"><strong>ID de l'event:</strong></label> 
		<select  name="id_event"  id="idE"  >
                              <option value="opt1">Events...</option>
                    <?php  foreach($event as $ev){ ?>
                              <option value="<?php echo $ev['id']; ?>"><?php echo $ev['nom']; ?></option> 
                              <?PHP } ?>
                              </select>
	</p>

	<p>
		<label for="Pourcentage"><strong>Pourcentage:</strong></label> 
		<input type="text" name="pourcentage" id="pourcentage" placeholder="exp: 50%" />
	</p>

	<p>
		
		<input type="hidden" name="num_p" value="<?PHP  echo $numero ?>" id="num_p" size="10" placeholder="exp:101" />
	</p>
<!--********************************************************************************************************-->



<input type="submit" value="ajouter" />

<a href="ajoutRemise.html"><input type="reset" value="reset"></a>
<a href="../../../index-1.html"><p><strong>Retour</strong></p></a>


</form>


<div id="alerte">
	

</div>

</fieldset>
</div>
</body>

</html>