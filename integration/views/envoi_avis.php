<?php 
session_start();

//include "../config.php";
include "../core/avisC.php";

if (isset($_POST['vote'])){
$vote = $_POST['vote'];
$num_p=$_POST['num_p'];
//var_dump($messages);
$id_client=$_SESSION['id'];

$avis1C = new AvisC();
$etat = $avis1C->verifierAvis($id_client,$num_p);
?> 
<script>console.log("<?php echo $etat ; ?>")</script>
<?php
var_dump($etat);
if ($etat == true){
?> 
<script>console.log("<?php echo $etat ; ?>")</script>
<?php
$avis1C->ajouterVote($id_client,$vote,$num_p);
}
else {
	$avis1C->modifierAvis($id_client,$num_p,$vote);
}

//var_dump($avis1C);

}
else {
	echo "erreuuuur";
}
?>