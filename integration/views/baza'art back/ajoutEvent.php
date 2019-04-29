<?PHP
include "C:/wamp64/www/nouveau dossier/entities/event.php";
include "C:/wamp64/www/nouveau dossier/core/eventC.php";
if (isset($_POST['idE']) and isset($_POST['nomE']) and isset($_POST['dateE']) and isset($_POST['duree']))
{
$event1=new Event($_POST['idE'],$_POST['nomE'],$_POST['dateE'],$_POST['duree']) or die("<br />Erreur de requete: ".mysql_error()); 

$event1C=new EventC();
$event1C->ajouterEvent($event1);
header('Location: afficherEvent.php');
	
}
else{
	echo "vérifier les champs";
}
//*/

?>