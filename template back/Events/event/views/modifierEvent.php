<HTML>
<head>
</head>
<body>
<?PHP
include "../entities/event.php";
include "../core/eventC.php";
if (isset($_GET['id'])){
	$eventC=new EventC();
    $result=$eventC->recupererEvent($_GET['id']);
	foreach($result as $row){
		$id=$row['id'];
		$nom=$row['nom'];
		$dateE=$row['dateE'];
		$duree=$row['duree'];
		
?>
<form method="POST">
<table>
<caption>Modifier Event</caption>
<tr>
<td>ID</td>
<td><input type="number" name="id" value="<?PHP echo $id ?>"></td>
</tr>
<tr>
<td>Nom</td>
<td><input type="text" name="nom" value="<?PHP echo $nom ?>"></td>
</tr>
<tr>
<td>Date</td>
<td><input type="date" name="dateE" value="<?PHP echo $dateE ?>"></td>
</tr>
<tr>
<td>Duree</td>
<td><input type="text" name="duree" value="<?PHP echo $duree ?>"></td>
</tr>

<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$event=new Event($_POST['id'],$_POST['nom'],$_POST['dateE'],$_POST['duree']);
	$eventC->modifierEvent($event,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location: afficherEvent.php');
}
else 
{
	echo "Erreur !";
}
?>
</body>
</HTMl>