<?php 
//session_start();
include "../config.php";
//include "repondreReclamation.php";

$id_client=$_POST['id_client'];
$admin="1";
$sql="SELECT message From messages where id_client=$id_client AND admin=$admin";
//var_dump($sql);
$db = config::getConnexion();
$messages = array();
$res=$db->query($sql);
while ($rows = $res->fetch()){
	$messages[] = $rows;
}
foreach ($messages as $message) {
	?>
	<p><?php echo $message['message']; ?></p>

	<?php
}

?>
