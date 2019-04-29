
<?PHP
include "C:/wamp64/www/test/core/produitc.php";
include "C:/wamp64/www/test/entities/produit.php";
include "C:/wamp64/www/test/core/categoriesc.php";
include "C:/wamp64/www/test/entities/categories.php";
session_start();
$numero=@$_POST['numero']; 
var_dump($numero);
$produit1c=new ProduitC();
$data=$produit1c->remplirchamps($numero);
var_dump($data);
$cat=new CategoryC();
var_dump($_POST['category']);
if (isset($_POST['modifier']))
 {
 	if ($_POST['category']!="opt1") {
//$produit1=new Produit("first_name","product_title",10,10,20,"descreption",0,"category",5,5,5,5,"img_localisation");
$produit1=new Produit($_POST['first_name'],$_POST['product_title'],$_POST['price'],$_POST['tax'],$_POST['quantity'],$_POST['descreption'],$_POST['sale'],$_POST['category'],$_POST['size_xs'],$_POST['size_S'],$_POST['size_M'],$_POST['size_L'],"","","");
$produit1c->modifierproduit($produit1,$numero);
header('Location: product-list.php');
}
else 
{   
	$category=$data->category;
	$produit1=new Produit($_POST['first_name'],$_POST['product_title'],$_POST['price'],$_POST['tax'],$_POST['quantity'],$_POST['descreption'],$_POST['sale'],$category,$_POST['size_xs'],$_POST['size_S'],$_POST['size_M'],$_POST['size_L'],"","","");
$produit1c->modifierproduit($produit1,$numero);
header('Location: product-list.php');
}
}
?>

