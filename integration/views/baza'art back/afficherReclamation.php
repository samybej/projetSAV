<html>
<head>
	<link rel="stylesheet" href="../../../css/zebra.css">
	<link rel="stylesheet" href="../../../css/center.css">
</head>
<body>
	<div style="background-color: #ffe6ff";>
	<p>
	<img src="img/Logo/logo.JPG" alt="logo_bazart" width="300" height="300" class="center"/>
</p>
</div>


<?PHP
include "../../core/reclamationC.php";
include "../../entities/reclamation.php";
$reclamation1C =new ReclamationC();
$liste_reclamations=$reclamation1C->afficherReclamations();

?>
<div style="padding-top: 70px;">
	<div align="center">
		<input type="text" id="search" placeholder="Search"/>
	 <select name="select" id="select">
  <option value="cin">CIN</option>
  <option value="nom/prenom">Nom / Prenom</option>
</select>
		<strong> Trier Par:</strong>
		<select name="select2" id="select2" onchange="Trier(this.value)"> 
			<option value="--">--</option>
			<option value="cin">CIN</option>
 		    <option value="nom">Nom / Prenom</option>
  			<option value="dispo">Disponibilite</option>
		</select>
		
	   <br>
   <br />

   <div id="display"></div>
 
		
	</div>
<table class="hover-tab td-affiche" border="1" align="center">
<tr>
<td>Num Reclamation</td>
<td>Num Produit</td>
<td>Id Client</td>
<td>Reclamation</td>
<td>Répondre</td>
</tr>

<?PHP
foreach($liste_reclamations as $row){
	?>
	<tr>
	<td><?PHP echo $row['num_r']; ?></td>
	<td><?PHP echo $row['num_c']; ?></td>
	<td><?PHP echo $row['id_client']; ?></td>
	<td><?PHP echo $row['reclame']; ?></td>
	<td><a href="repondreReclamation.php?num_r=<?PHP echo $row['num_r']; ?>">
	Répondre</a></td>
	</tr>
	<?PHP
}
?>
</table>
</div>

</body>
</html>