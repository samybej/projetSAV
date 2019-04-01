<?PHP
include "../core/reclamationC.php";
$reclamation1C =new ReclamationC();
$liste_reclamations=$reclamation1C->afficherReclamations();

?>
<table border="1">
<tr>
<td>Num Reclamation</td>
<td>Num Produit</td>
<td>Id Client</td>
<td>Vote du produit</td>
<td>Commentaire</td>
<td>Reclamation</td>
<td>Supprimer</td>
<td>Répondre</td>
</tr>

<?PHP
foreach($liste_reclamations as $row){
	?>
	<tr>
	<td><?PHP echo $row['num_r']; ?></td>
	<td><?PHP echo $row['num_p']; ?></td>
	<td><?PHP echo $row['id_client']; ?></td>
	<td><?PHP echo $row['vote']; ?></td>
	<td><?PHP echo $row['commentaire']; ?></td>
	<td><?PHP echo $row['reclamation']; ?></td>
	<td><form method="POST" action="supprimerReclamation.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['num_r']; ?>" name="num_r">
	</form>
	</td>
	<td><a href="repondreReclamation.php?cin=<?PHP echo $row['cin']; ?>">
	Répondre</a></td>
	</tr>
	<?PHP
}
?>
</table>


