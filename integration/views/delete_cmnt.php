<?php 
session_start();

//include "../config.php";
include "../core/avisC.php";

$id_client=$_SESSION['id'];
$num_p=$_POST['num_p'];

$avis1C = new AvisC();

$avis1C->supprimerCommentaire($id_client);
?>