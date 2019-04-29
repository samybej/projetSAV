<!DOCTYPE html>
<html>
<head>
	<title>Liste des livreurs</title>
	<link rel="stylesheet" href="css/center.css">
	<link rel="stylesheet" href="css/zebra.css">  
	<link rel="stylesheet" type="text/css" href="style.css">
	 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <script type="text/javascript" src="scripts.js"></script>
	<script type="text/javascript" src="trier.js"></script>   


</head>

<body>
	<div style="background-color: #ffe6ff";>
	<p>
	<img src="img/Logo/logo.JPG" alt="logo_bazart" width="300" height="300" class="center"/>
</p>
</div>
</body>
</html>
<?PHP
include "../../core/livreurC.php";
$livreur1C=new LivreurC();
$liste_Livreurs=$livreur1C->afficherLivreurs();

//var_dump($listeEmployes->fetchAll());
?>
<a href="../../../index-1.html"><p><strong>Retour</strong></p></a>
<div style="padding-top: 70px;">
	<div align="center">
	<input type="text" id="search" placeholder="Search"/>
	 <select name="select" id="select">
  <option value="cin">CIN</option>
  <option value="nom/prenom">Nom / Prenom</option>
  <option value="dispo">Disponibilite</option>
</select>
		<strong> Trier Par:</strong>
		<select name="select2" id="select2" onchange="Trier(this.value)"> 
			<option value="--">--</option>
			<option value="cin">CIN</option>
 		    <option value="nom">Nom / Prenom</option>
		</select>
		
	   <br>
   <br />

   <div id="display"></div>
 
   </div>
<table class="hover-tab td-affiche" border="1" align="center" id="afficher">
<tr class="hover-tab">
<td>Cin</td>
<td>Nom</td>
<td>Prenom</td>
<td>Disponibilité</td>
</tr>

<?PHP
foreach($liste_Livreurs as $row){
	?>
	<tr>
	<td><?PHP echo $row['cin']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['prenom']; ?></td>
	<td><?PHP echo $row['dispo']; ?></td>
	<td><form method="POST" action="supprimerLivreur.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['cin']; ?>" name="cin">
	</form>
	</td>
	
	<td><a href="modifierLivreur.php?cin=<?PHP echo $row['cin']; ?>">
	Modifier</a></td>
	</tr>

	
	<?PHP
}
?>

</table>
</div>

