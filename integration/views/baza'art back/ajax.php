<?php
//Including Database configuration file.
include "C:/wamp64/www/nouveau dossier/core/eventC.php";
//Getting value of "search" variable from "script.js".

  if (isset($_POST['search']) && isset($_POST['select'])){
   $res_search = $_POST['search'];
   $select = $_POST['select'];
   $event = new EventC();

   if ($select == 'id'){
   $result = $event->rechercheDynamique($res_search);
 }
  else if ($select == 'nom'){
    $result = $event->rechercheDynamiqueParNom($res_search);
  }
  else if ($select == 'duree'){
    $result = $event->rechercheDynamiqueParDuree($res_search);
  }
  
   ?>


<table class="hover-tab td-affiche" border="1" align="center">
<tr class="hover-tab">
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
  
  <td><a href="modifierEvent.php?id=<?PHP echo $row['id']; ?>">
  Modifier</a></td>
  </tr>
  <?PHP
}
?>
</table>
<?PHP
}
?>
</ul>