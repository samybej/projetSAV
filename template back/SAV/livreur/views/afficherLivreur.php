<!DOCTYPE html>
<html>
<head>
	<title>Liste des livreurs</title>
	<link rel="stylesheet" href="../../../css/center.css">
	<link rel="stylesheet" href="../../../css/zebra.css">
</head>

<body>
	<p>
	<img src="../../../img/Logo/logo.JPG" alt="logo_bazart" width="300" height="300" class="center"/>
</p>

</body>
</html>
<?PHP
include "../core/livreurC.php";
$livreur1C=new LivreurC();
$liste_Livreurs=$livreur1C->afficherLivreurs();

//var_dump($listeEmployes->fetchAll());
?>
<table class="hover-tab td-affiche" border="1" align="center">
<tr class="hover-tab">
<td>Cin</td>
<td>Nom</td>
<td>Prenom</td>
<td>Destination</td>
<td>Disponibilité</td>
<td>Date Livraison</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($liste_Livreurs as $row){
	?>
	<tr>
	<td><?PHP echo $row['cin']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['prenom']; ?></td>
	<td><?PHP echo $row['destination']; ?></td>
	<td><?PHP echo $row['dispo']; ?></td>
	<td><?PHP echo $row['date_livraison']; ?></td>
	<td><form method="POST" action="supprimerLivreur.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['cin']; ?>" name="cin">
	</form>
	</td>
	
	<td><a href="modifierLivreur.php?cin=<?PHP echo $row['cin']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


