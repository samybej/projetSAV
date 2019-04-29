<?PHP
include "C:/wamp64/www/nouveau dossier/core/remiseC.php";
$remiseC=new RemiseC();
if (isset($_POST["id_remise"])){
	$remiseC->supprimerRemise($_POST["id_remise"]);
	header('Location: afficherRemise.php');
}

?>