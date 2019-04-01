<HTML>
<head>
</head>
<body>
<?PHP

include "../entities/reclamation.php";
include "../core/reclamationC.php";

if (isset($_GET['num_r'])){
	$reclamationC=new ReclamationC();
    $result=$reclamationC->recupererReclamation($_GET['num_r']);
	foreach($result as $row){
		$num_p=$row['num_p'];
		$reclamation=$row['reclamation'];
?>
<form method="POST">
<table>
<caption>Modifier Employe</caption>
<tr>
<td>CIN</td>
<td><input type="number" name="cin" value="<?PHP echo $cin ?>"></td>
</tr>
<tr>
<td>Nom</td>
<td><input type="text" name="nom" value="<?PHP echo $nom ?>"></td>
</tr>
<tr>
<td>Prenom</td>
<td><input type="text" name="prenom" value="<?PHP echo $prenom ?>"></td>
</tr>
<tr>
<td>nb heures</td>
<td><input type="number" name="nbH" value="<?PHP echo $nbH ?>"></td>
</tr>
<tr>
<td>tarif horaire</td>
<td><input type="text" name="tarifH" value="<?PHP echo $tarifH ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="cin_ini" value="<?PHP echo $_GET['cin'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$reclamation=new Reclamation($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['nbH'],$_POST['tarifH']);
	$reclamationC->modifierReclamation($reclamation,$_POST['cin_ini']);
	echo $_POST['cin_ini'];
}
?>
</body>
</HTMl>