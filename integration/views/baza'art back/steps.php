<?PHP
include "C:/wamp64/www/test/entities/produit.php";
include "C:/wamp64/www/test/core/produitc.php";
if (isset($_POST['submit']))
{

  if (isset($_POST['first_name']) and isset($_POST['product_title']) and isset($_POST['price']) and isset($_POST['tax']) and isset($_POST['quantity']) and isset($_POST['descreption']) and isset($_POST['category']))
   {
        // Get image name
        $image = $_FILES['image']['name'];
        // image file directory
        $img_localisation = "img/product/".basename($image);

                // img details 1
        $image1 = $_FILES['image1']['name'];
        $img_details1_localisation = "img/product/".basename($image1);
                // img details 2
        $image2 = $_FILES['image2']['name'];
        $img_details2_localisation = "img/product/".basename($image2);
      $produit1=new Produit($_POST['first_name'],$_POST['product_title'],$_POST['price'],$_POST['tax'],$_POST['quantity'],$_POST['descreption'],$_POST['sale'],$_POST['category'],$_POST['size_xs'],$_POST['size_S'],$_POST['size_M'],$_POST['size_L'],$img_localisation,$img_details1_localisation,$img_details2_localisation);
      $produit1c=new ProduitC();
      $produit1c->ajouterProduit($produit1);
      header('Location: ./product-list.php');
   }
  else
   {
  echo "vérifier les champs";
   }
}
//*/

?>
