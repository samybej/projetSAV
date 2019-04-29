<?php 
session_start();

//include "../config.php";
include "../core/avisC.php";



$num_p=$_POST['num_p'];

$id_client=$_SESSION['id'];

$avis1C = new AvisC();
$etat = $avis1C->verifierCommentaire($id_client,$num_p);
print_r($etat);
?>