<?PHP
include "../core/reclamationC.php";

$reclamationC=new ReclamationC();
if (isset($_POST["num_r"])){
	$id_c=$_GET['id_client'];
	$reclamationC->supprimerReclamation($_POST["num_r"]);
?>
<script type="text/javascript">document.location.href="consulterReclamation.php?id_client=<?PHP echo $id_c; ?>"</script>
<?PHP
}

?>