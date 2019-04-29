<?php 
session_start();
include "../core/livreurC.php";
include "../core/livraisonC.php";

$id_client=$_SESSION['id'];
//$num_p=$_POST['num_p'];
$num_c = $_GET['num_cmd'];
$cin = $_GET['cin_liv'];
var_dump($num_c);
var_dump($cin);
var_dump($id_client);
	$livraison1C = new LivraisonC();

	$livraison1C->updateDispo($cin,1);
	$livraison1C->supprimerLivraison($id_client,$num_c);

	header('Location: index.php');
?>
