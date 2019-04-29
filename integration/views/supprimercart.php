<?PHP 
include "..\core\produitc.php";  
include "../core/cartCore.php";
$cartC=new CartCore();
if (isset($_POST["delete"])){
    $id= $_POST['num'];
	$cartC->supprimercart($id);
}
header('Location: cart.php');