 <?PHP
 include "C:/wamp64/www/test/core/produitc.php";
include "C:/wamp64/www/test/core/categoriesc.php";
$produit1c=new ProduitC();
 if (@$_GET['action']=='delete')
 {
                                        
$num=$_GET['num'];
$produit1c->supprimerproduit($num);
   header('Location: product-list.php') ;                              
}
?>