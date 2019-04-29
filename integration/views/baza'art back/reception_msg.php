
<?php 
//session_start();
include "../../config.php";
//include "repondreReclamation.php";

$id_client=$_POST['id_client'];
$admin="0";
$sql="SELECT message,admin From messages where id_client=$id_client";
//var_dump($sql);
$db = config::getConnexion();
$messages = array();
$res=$db->query($sql);
while ($rows = $res->fetch()){
	$messages[] = $rows;
}
foreach ($messages as $message) {
	if ($message['admin'] == "0"){
	?>
	<p style="color : red;" align="left"><img src="../img/icons/user.png" style="width:30px ; height:30px;"><?php echo $message['message']; ?></p>
	<?php
}

else if ($message['admin'] != "0" && $message['admin'] != "2"){
	?>
	<p style="color : blue;" align="right"><img src="../img/icons/admin.png" style="width:30px; height:30px;"><?php echo $message['message']; ?></p>
	<?php
}
}

?>
