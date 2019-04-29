<?PHP
include "../core/reclamationC.php";
$reclamationC=new ReclamationC();
if (isset($_POST["num_r"])){
	$reclamationC->supprimerReclamation($_POST["num_r"]);
	header('Location: afficherReclamation.php');
}

?>