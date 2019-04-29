<?php 
session_start();
//include "../config.php";
include "../core/reclamationC.php";
$id_client=$_SESSION['id'];
$livraison='0';

$recalamation1C = new reclamationC();

$res = $recalamation1C->recupererMessages($id_client,$livraison);
$messages = array();
//var_dump($res);
while ($rows = $res->fetch()){

	$messages[] = $rows;
}
foreach ($messages as $message) {
	if ($message['admin'] == "0"){
	?>
	<p style="color : red;" align="right"><img src="img/icons/user.png" style="width:30px ; height:30px;"><?php echo $message['message']; ?></p>
	<?php
}
else if ($message['admin'] == "2"){
	?>
	<p style="color : grey;" align="center"><img src="img/icons/exclamation.png" style="width:30px ; height:30px;"><?php echo $message['message']; ?></p>
	<?php
}
else {
	?>
	<p style="color : blue; "align="left"><img src="img/icons/admin.png" style="width:30px; height:30px;"><?php echo $message['message']; ?></p>
	<?php
}
}

?>
