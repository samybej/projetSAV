<?PHP
include "../entities/event.php";
include "../core/eventC.php";

if (isset($_POST['id']) and isset($_POST['nom']) and isset($_POST['dateE']) and isset($_POST['duree']))
{
$event1=new Event($_POST['id'],$_POST['nom'],$_POST['dateE'],$_POST['duree']) or die("<br />Erreur de requete: ".mysql_error()); 

$event1C=new EventC();
$event1C->ajouterEvent($event1);
header('Location: afficherEvent.php');
	
}
else{
	echo "vérifier les champs";
}
//*/

?>