<?PHP
include "C:/wamp64/www/nouveau dossier/core/eventC.php";
$event1C=new EventC();
$listeEvents=$event1C->afficherEvents();

?>

<!DOCTYPE html>
<html>
<head>
	<title>affichage Liste des remises</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <script type="text/javascript" src="scripts.js"></script>
   <script type="text/javascript" src="trier.js"></script>  

	<style type="text/css">
	td:hover  {background-color: #DA3250;}	

	</style>
</head>
<body>

<div class="logoaffevent" style="padding-left: 630px; background-color: #ffe6ff" >
				<a href="#"><img src="img/logo/logo.jpg" alt="logo bazart"  style="width : 250px; height: 250px" ></a>
			</div>

<div class="tab1" align="center" style="padding-top: 50px;">
	<h1 style="color: #DA3250; background: rgba(0,0,0,0.4)" align="center" >Affichage des Evenements</h1>

<a href="index-1.html"><p><strong>Retour</strong></p></a>
<div style="padding-top: 30px;">
	<div align="center">
	<input type="text" id="search" placeholder="Search"/>
	 <select name="select" id="select">
  <option value="id">Id</option>
  <option value="nom">Nom</option>
  <option value="duree">Duree</option>
</select>

<strong> Trier Par:</strong>
		<select name="select2" id="select2" onchange="Trier(this.value)"> 
			<option value="--">--</option>
			<option value="id">Id</option>
 		    <option value="nom">Nom</option>
  			<option value="duree">Duree</option>
		</select>
		
   <br>
   <br />

<div id="display"></div>
  
   </div>

<table border="2" align="center" id="afficher">
<tr>
<td><strong>Id</td>
<td><strong>Nom</td>
<td><strong>Date</td>
<td><strong>Duree</td>

<td><strong>supprimer</td>
<td><strong>modifier</td>
</tr>

<?PHP
foreach($listeEvents as $row){
	?>
	<tr>
	<td><?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['dateE']; ?></td>
	<td><?PHP echo $row['duree']; ?></td>

	<td><form method="POST" action="supprimerEvent.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	</form>
	</td>

	<td><a href="modifierEvent.php?id=<?PHP echo $row['id']; ?>">Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>
<a href="ajoutEvent.html"><input type="submit" name="Ajouter" value="ajoutEvent"></a>
</div>

</body>
</html>

