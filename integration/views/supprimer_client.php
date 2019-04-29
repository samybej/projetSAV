<?PHP
include "../core/clientC.php";
$clientC=new clientC();
if (isset($_POST["nom_c_client"])){
	$clientC->supprimerClient($_POST["nom_c_client"]);
	header('Location: afficher_client.php');
}

?>