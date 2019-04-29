<?PHP
include "C:/wamp64/www/nouveau dossier/core/remiseC.php";
$remise1C=new RemiseC();
$listeRemises=$remise1C->afficherRemises();

?>

<!DOCTYPE html>
<html>
<head>
	<title>affichage ajout remise</title>
	<meta charset="utf-8">
	<style type="text/css">
	td:hover  {background-color: #DA3250;}	

	</style>
</head>
<body>

<div class="logoaffremise" style="padding-left: 630px;">
				<a href="#"><img src="img/logo/logo.jpg" alt="logo bazart"  style="width : 250px; height: 250px" ></a>
			</div>

<div class="tab1" align="center" style="padding-top: 50px;">
	<h1 style="color: #DA3250; background: rgba(0,0,0,0.4)" align="center" >Affichage des Remises</h1>
<table border="2" >
<tr>
<td><strong>Id_remise</td> 
<td><strong>Id_event</td>
<td><strong>pourcentage</td>
<td><strong>num_p</td>

<td><strong>supprimer</td>
<td><strong>modifier</td>
</tr>

<?PHP
foreach($listeRemises as $row){
	?>
	<tr>
	<td><?PHP echo $row['id_remise']; ?></td>
	<td><?PHP echo $row['id_event']; ?></td>
	<td><?PHP echo $row['pourcentage'] ; ?></td>
	<td><?PHP echo $row['num_p']; ?></td>

	<td><form method="POST" action="supprimerRemise.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id_remise']; ?>" name="id_remise">
	</form>
	</td>

	<td><a href="modifierRemise.php?id_remise=<?PHP echo $row['id_remise']; ?>">Modifier</a></td>
	</tr>
	<?PHP
}
?>

</table>
<a href="ajoutRemise.html"><input type="submit" name="Ajouter" value="ajoutRemise"></a>
</div>

</body>
</html>