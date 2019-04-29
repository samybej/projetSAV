<HTML>
<head>
</head>
<body>
<?PHP
include "C:/wamp64/www/nouveau dossier/core/remiseC.php";
include "C:/wamp64/www/nouveau dossier/entities/remise.php";
if (isset($_GET['id_remise'])){
	$remiseC=new RemiseC();
    $result=$remiseC->recupererRemise($_GET['id_remise']);
	foreach($result as $row){
		$id_remise=$row['id_remise'];
		$id_event=$row['id_event'];
		$pourcentage=$row['pourcentage'];
		$num_p=$row['num_p'];
		
?>


<html>
<head>
	
	<title>formulaire de modification</title>
	<meta charset="utf-8">

	 <script type="text/javascript" src="modifierR.js"></script>

	 <style type="text/css">
	 	.back{background-image: url('../../../img/logo/back.png') ;}
	 	.error { color: #FFFFFF; border: 1px dotted #000000; padding: 10px; background-color: #FF0000; }
	 </style>
</head>

<div class="back">
<body>

<div class="logomodifierremise" style="padding-left: 630px;">
				<a href="#"><img src="../../../img/logo/logo.jpg" alt="logo bazart"  style="width : 250px; height: 250px" ></a>
			</div>

<form method="post" onsubmit="return verif()">
	<h1 style="color: #DA3250; background: rgba(0,0,0,0.4)" align="center" >Modifier Remise</h1>

	<fieldset>
		<legend style="color:#DA3250"> <h2>les coordonnées</h2></legend>
	<p>
		<label for="id_remise" > <strong>id remise :</strong> </label> 
		<input type="text" name="id_remise" id="idR" placeholder="exp:1234" size="20" value="<?PHP echo $id_remise ?>">
	</p>

	<p>
		<label for="id_event"> <strong>id de l'event :</strong></label> 
		
		<input type="text" name="id_event" id="idE"   value="<?PHP echo $id_event ?>">
	</p>

	<p>
		<label for="pourcentage"> <strong>pourcentage :</strong> </label> 
		
		<input type="text" name="pourcentage" id="pourcentage" placeholder="exp: 50%" value="<?PHP echo $pourcentage ?>">
	</p>

	

	<p>
		<label for="num_p"><strong>numero du produit: </strong></label> 
		
		<input type="text" name="num_p" id="num_p" size="20" placeholder="exp:1234" value="<?PHP echo $num_p ?>">
	</p>
	<input type="submit" name="modifier" value="modifier">
	<input type="hidden" name="id_ini" value="<?PHP echo $_GET['id_remise'];?>">
<!--********************************************************************************************************-->

<a href="ajoutRemise.html"><input type="reset" value="reset"></a>
<a href="../../../index-1.html"><p><strong>Retour</strong></p></a>

</form>
<br />
<br />

<div id="alerte">
	

</div>

<?PHP
	}
}
if (isset($_POST['modifier'])){
	$remise=new Remise($_POST['id_remise'],$_POST['id_event'],$_POST['pourcentage'],$_POST['num_p']);
	$remiseC->modifierRemise($remise,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location: afficherRemise.php');
}

?>
</body>
</HTMl>