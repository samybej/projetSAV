<?PHP
include "../entities/reclamation.php";
include "../core/reclamationC.php";

if (isset($_POST['num_p']) and isset($_POST['id_client']) and isset($_POST['vote']){
$reclamation1=new Reclamation($_POST['num_p'],$_POST['id_client'],$_POST['vote']);

$reclamation1C=new ReclamationC();
$reclamation1C->ajouterVote($reclamation1);
	
}else{
	echo "vérifier les champs";
}
//*/

?>