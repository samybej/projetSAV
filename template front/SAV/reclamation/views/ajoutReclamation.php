<?PHP
include "../entities/reclamation.php";
include "../core/reclamationC.php";

if (isset($_POST['num_p']) and isset($_POST['id_client']) and isset($_POST['abc'])){

	$num_p=$_POST['num_p'];
	$id_client=$_POST['id_client'];
	$reclamation=htmlspecialchars($_POST['abc']);

$reclamation1=new Reclamation($num_p,$id_client,NULL,NULL,$reclamation);
$reclamation1->setNum_p($num_p);
$reclamation1->setId_client($id_client);
$reclamation1->setReclame($reclamation);

$reclamation1C=new ReclamationC();
$reclamation1C->ajouterReclamation($reclamation1);


echo "<script>alert(\"Reclamation Envoyé\")</script>";
?>
<script type="text/javascript">document.location.href="../../../index.html"</script>-
<?PHP
}
else{
	echo "vérifier les champs";
}
//*/

?>