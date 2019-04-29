<?php 
session_start();
include "../config.php";

$id_client=$_SESSION['id'];
$num_p=$_POST['num_p'];

$comment1C = new AvisC();
$res = $comment1C->recupererCommentaire($id_client,$num_p);

while ($rows = $res->fetch()){
	$commentaires[] = $rows;
}
foreach ($commentaires as $commentaire) {
	?>
	<div>
		<p>
		<?php echo $commentaire['commentaire']; ?>
	</p>
	</div>
	<?php

}
?>
