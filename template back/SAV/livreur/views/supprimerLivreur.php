<?PHP
include "../core/livreurC.php";
$livreurC=new LivreurC();
if (isset($_POST["cin"])){
	$livreurC->supprimerLivreur($_POST["cin"]);
	header('Location: afficherLivreur.php');
}

?>