<?php 
session_start();

//include "../config.php";
include "../core/avisC.php";

if (isset($_POST['messages'])){
$messages = $_POST['messages'];
$num_p=$_POST['num_p'];
//var_dump($messages);
$id_client=$_SESSION['id'];

$avis1C = new AvisC();
$etat = $avis1C->verifierCommentaire($id_client,$num_p);
if ($etat == true )
{
$avis1C->ajouterCommentaire($id_client,$messages,$num_p);
}
else {
	$avis1C->modifierCommentaire($id_client,$num_p,$messages);
}
}
else {
	echo "erreuuuur";
}
?>