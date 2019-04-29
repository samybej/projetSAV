<?php
//Including Database configuration file.
include "C:/wamp64/www/nouveau dossier/core/eventC.php";
//Getting value of "search" variable from "script.js".

  $q = $_GET['q'];
    
   $event = new eventC();

   $result = $event->trier($q);

  
  ?>

<table border="2" align="center" >
<tr>
<td><strong>Id</td>
<td><strong>Nom</td>
<td><strong>Date</td>
<td><strong>Duree</td>

<td><strong>supprimer</td>
<td><strong>modifier</td>
</tr>

<?PHP
foreach($result as $row){
 
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
</ul>