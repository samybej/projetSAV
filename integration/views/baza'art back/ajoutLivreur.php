<?PHP
include "../../entities/livreur.php";
include "../../core/livreurC.php";

if (isset($_POST['cin']) and isset($_POST['nom']) and isset($_POST['prenom'])){
$livreur=new Livreur($_POST['cin'],$_POST['nom'],$_POST['prenom']) or die("<br />Erreur de requete : ".mysql_error());

$livreurC=new LivreurC();

$res = $livreurC->recupererLivreur($_POST['cin']);
$rows = $res->fetchAll();
$rowCount = count($rows);

if ($rowCount > 0) {
	echo "erreur";
	/*header('Location: ajoutLivreur.html');
	?>
	<script> 
		document.getElementById("alerte").innerHTML="<span class=\"error\"><b>Erreur !</b>Cause: champ CIN vide.</span>";
	</script>
	<?php*/
}

$livreurC->ajouterLivreur($livreur);
header('Location: afficherLivreur.php');
}

else{
	echo "vérifier les champs";
}
//*/

?>