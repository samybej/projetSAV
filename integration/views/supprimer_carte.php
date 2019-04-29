<?PHP
include "../core/carteC.php";
session_start();
$carteC=new CarteC();

	$carteC->supprimerCarte($_SESSION['login']);
	header('Location: profil.php');


?>