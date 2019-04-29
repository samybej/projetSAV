<?PHP
include "C:/wamp64/www/test/core/produitc.php";
include "C:/wamp64/www/test/entities/produit.php";
include "C:/wamp64/www/test/core/categoriesc.php";
include "C:/wamp64/www/test/entities/categories.php";
session_start();
$val=@$_POST['val']; 
var_dump($val);
$cat1c=new CategoryC();
$data=$cat1c->remplircat($val);
if (isset($_POST['modify']))
 {
$cat1=new Category($_POST['category']);
$cat1c->modifiercat($cat1,$val);
header('Location: categorylist.php');
}
?>

