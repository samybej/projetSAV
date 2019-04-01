<?PHP
include "../entities/livreur.php";
include "../core/livreurC.php";

if (isset($_POST['cin']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['destination']) and isset($_POST['dispo']) and isset($_POST['date_livraison'])){
$livreur=new Livreur($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['destination'],$_POST['dispo'],$_POST['date_livraison']) or die("<br />Erreur de requete : ".mysql_error());
//Partie2
/*
var_dump($livreur);
}
*/
//Partie3
$livreurC=new LivreurC();
$livreurC->ajouterLivreur($livreur);
header('Location: afficherLivreur.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>