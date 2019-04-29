<HTML>
<head>
	<link rel="stylesheet" href="css/zebra.css">
	<link rel="stylesheet" type="text/css" href="css/center.css">
	<script type="text/javascript" src="ajoutLivreur.js"></script>
</head> 
<body>
	<div style="background-color: #ffe6ff";>
	<p>
	<img src="img/Logo/logo.JPG" alt="logo_bazart" width="300" height="300" class="center"/>
</p>
</div>
<?PHP

include "../../entities/livreur.php";
include "../../core/livreurC.php";

if (isset($_GET['cin'])){
	$livreurC=new LivreurC();
    $result=$livreurC->recupererLivreur($_GET['cin']);
	foreach($result as $row){
		$cin=$row['cin'];
		$nom=$row['nom'];
		$prenom=$row['prenom'];
		$dispo=$row['dispo'];
?>
<form method="POST" onsubmit="return verif()">
	<div style=" height: 250px; padding-top: 70px; padding-left: 750px ;padding-right: 750px;">
	<fieldset>
<table class="zebra-tab td-ajout" align="center" style="height:400px;">

<h2 style="color: #DF365F; padding-bottom: 30px;" align="center">Modification des données</h2>
<tr>
<td>CIN</td>
<td><input type="number" name="cin" id="cin" value="<?PHP echo $cin ?>"></td>
</tr>
<tr>
<td>Nom</td>
<td><input type="text" name="nom" id="nom" value="<?PHP echo $nom ?>"></td>
</tr>
<tr>
<td>Prenom</td>
<td><input type="text" name="prenom" id="prenom" value="<?PHP echo $prenom ?>"></td>
</tr>
<tr>
<td>Disponibilité</td>
<td><input type="text" name="dispo" id="dispo" value="<?PHP echo $dispo ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="cin_ini" value="<?PHP echo $_GET['cin'];?>"></td>
</tr>
</fieldset>
</table>

<div id="alerte">

</div>

</div>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$livreur = new Livreur($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['dispo']);
	echo $_POST['cin'];
	echo $_POST['nom'];
	echo $_POST['prenom'];
	echo $_POST['dispo'];
	$livreurC->modifierLivreur($livreur,$_POST['cin_ini']);
	echo $_POST['cin_ini'];
	header('Location: afficherLivreur.php');
}
?>
</body>
</HTMl>