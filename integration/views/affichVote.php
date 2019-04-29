<?php 
session_start();
include "../core/avisC.php";

$id_client=$_SESSION['id'];
$num_p=$_POST['num_p'];

$avis1C = new AvisC();
$res = $avis1C->recupererAvis($id_client,$num_p);
//$vote = array();

while ($rows = $res->fetch())
{
	$vote = $rows['vote'];
	print_r($vote);
}


return $vote;
?>
