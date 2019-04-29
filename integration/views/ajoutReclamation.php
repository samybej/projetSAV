<?PHP
session_start();
include "../entities/reclamation.php";
include "../core/reclamationC.php";

if (isset($_POST['num_c']) and isset($_POST['abc'])){

	$num_c=$_POST['num_c'];
	$id_client=$_SESSION['id'];
	$reclamation=htmlspecialchars($_POST['abc']);

$reclamation1=new Reclamation($num_c,$id_client,$reclamation);
$reclamation1->setNum_c($num_c);
$reclamation1->setId_client($id_client);
$reclamation1->setReclame($reclamation);

$reclamation1C=new ReclamationC();
$reclamation1C->ajouterReclamation($reclamation1);
$num_r = $reclamation1C->recupererNumRec($id_client);
$reclamation1C->msgAuto($id_client,$num_r);


echo "<script>alert(\"Reclamation Envoyé\")</script>";
?>
<script type="text/javascript">document.location.href="chat.php"</script>
<?PHP
}
else{
	echo "vérifier les champs";
}
//*/

?>