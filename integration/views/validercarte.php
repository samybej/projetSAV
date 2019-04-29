<?PHP
include "C:/wamp64/www/baz_art/core/cartesc.php";
include "C:/wamp64/www/baz_art/entities/cartes.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST " action="facture.php">
		<?php      $carte=new cartes($_POST['nom_titulaire'],$_POST['num_carte'],$_POST['year'],$_POST['month'],$_POST['code']);
      $carte1C=new CartesC();
      $carte1C->ajouterCartes($carte); ?>
			                        <input type="hidden" name="address1" value="<?PHP echo $_POST['address1'];  ?>">
							<input type="hidden" name="address2" value="<?PHP echo $_POST['address2'];  ?>">
							<input type="hidden" name="ville" value="<?PHP echo $_POST['ville'];  ?>">
							<input type="hidden" name="zip" value="<?PHP echo $_POST['zip'];  ?>">
							<input type="hidden" name="phone" value="<?PHP echo $_POST['phone'];  ?>">
							<input type="hidden" name="type_livraison" value="<?PHP echo $_POST['type_livraison'];  ?>">
							<input type="hidden" name="mode_payement" value="<?PHP echo $_POST['mode_payement'];  ?>">
<input type="submit" name="facture">
</form>
</body>
</html>