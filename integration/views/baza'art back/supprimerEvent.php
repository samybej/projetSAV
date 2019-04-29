<?PHP
include "C:/wamp64/www/nouveau dossier/core/eventC.php";
$eventC=new EventC();
if (isset($_POST["id"])){
	$eventC->supprimerEvent($_POST["id"]);
	header('Location: afficherEvent.php');
}

?>