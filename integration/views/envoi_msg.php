<?php 
session_start();

//include "../config.php";
include "../core/reclamationC.php";

if (isset($_POST['messages'])){
$messages = $_POST['messages'];
//var_dump($messages);
$id_client=$_SESSION['id'];

$reclamation1C = new ReclamationC();
$reclamation1C->insererMessages($id_client,$messages);

?>