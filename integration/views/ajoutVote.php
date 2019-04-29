<?PHP
session_start();
include "../entities/reclamation.php";
include "../core/reclamationC.php";


if (isset($_POST['rate'])){
	$num_p=13;

$reclamation1=new Reclamation($num_p,$_SESSION['client'],$_POST['vote'],$_POST['comment']);

$reclamation1C=new ReclamationC();
if ($reclamation1C->verifierAvis($_SESSION['client'],$num_p) == true)
{
	$reclamation1C->ajouterVote($reclamation1);

echo "<script>alert(\"Avis ajouté!\")</script>";
?>
<script type="text/javascript">document.location.href="../../../index.html"</script>
<?PHP


}
 else if ($reclamation1C->verifierAvis($_SESSION['client'],$num_p) == false) 
 {
 		$reclamation1C->modifierAvis_comment($_SESSION['client'],$num_p,$_POST['comment'],$_POST['vote']);
 		echo "<script>alert(\"Avis modifié!\")</script>";
 		?>
 		<script type="text/javascript">document.location.href="../../../index.html"</script>
 		<?PHP
 }
}
else 
{
	echo "erreur !";
}
?>
?>
?>