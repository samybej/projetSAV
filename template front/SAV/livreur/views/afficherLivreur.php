<?PHP
include "../core/livreurC.php";
$livreur1C=new LivreurC();
$liste_Livreurs=$livreur1C->afficherLivreurs();

//var_dump($listeEmployes->fetchAll());
?>
<table border="1">
<tr>
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


