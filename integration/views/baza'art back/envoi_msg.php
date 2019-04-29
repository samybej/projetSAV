<?php 
//session_start();

include "../../config.php";
//include "repondreReclamation.php";


if (isset($_POST['messages'])){
$messages = $_POST['messages'];
$id_client = $_POST['id_client'];
//var_dump($messages);
//$id_client=$_SESSION['client'];
$sql="INSERT INTO messages (id_client,message,admin) VALUES (:id_client,:messages,:admin)";
//var_dump($sql);
$db = config::getConnexion();
try{
$req=$db->prepare($sql);
$admin="1";
$req->bindValue(':id_client',$id_client);
$req->bindValue(':messages',$messages);
$req->bindValue(':admin',$admin);

$req->execute();

}
catch(Exception $e){
	 echo 'Erreur: '.$e->getMessage();
}
}
else {
	echo "erreuuuur";
}
?>