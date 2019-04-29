
<?php 
session_start();
include "../config.php";

$id_client=$_SESSION['id'];
$num_p=$_POST['num_p'];

$sql="SElECT avis.commentaire , client.nom_client , client.prenom_client from avis join client on client.id_client=avis.id_client where commentaire IS NOT NULL and num_p=$num_p ORDER BY avis.num_avis";
$db = config::getConnexion();
$commentaires = array();
$res=$db->query($sql);
//var_dump($res);
while ($rows = $res->fetch()){
	$commentaires[] = $rows;
}
foreach ($commentaires as $commentaire) {
	?>
	<div>
		<div style="display: inline-block;">
		<p style="font-style : italic ; color: blue;">
		<?php echo $commentaire['nom_client']; ?>
		<?php echo $commentaire['prenom_client']; ?>
		<?php echo " :"; ?>
		</p>
	</div>
		<div style="display: inline-block;">
		<p>
		<?php echo $commentaire['commentaire']; ?>
	</p>
</div>
	</div>
	<?php

}
?>
