<?php 
//session_start();
include "../config.php";
//include "repondreReclamation.php";

$id_client=$_POST['id_client'];
$admin="0";
$sql="SELECT message From messages where id_client=$id_client AND admin=$admin";
//var_dump($sql);
$db = config::getConnexion();
$res=$db->query($sql);

?>
