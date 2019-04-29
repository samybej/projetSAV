<?PHP
include "../entities/reclamation.php";
include "../core/reclamationC.php";

if (isset($_POST['num_r']) and isset($_POST['num_p']) and isset($_POST['id_client']) and isset($_POST['reclamation']){
$reclamation1=new Reclamation($_POST['num_r'],$_POST['num_p'],$_POST['id_client'],$_POST['reclamation']);

$reclamation1C=new ReclamationC();
$reclamation1C->ajouterReclamation($reclamation1);
	
}else{
	echo "vérifier les champs";
}
//*/

?>