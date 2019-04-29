  <?php
  include "C:/wamp64/www/test/core/produitc.php";
include "C:/wamp64/www/test/entities/produit.php";
$produitparpage = 1;
$produit1c=new ProduitC();
$pagesTotales=$produit1c->pagetotale($produitparpage);

if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
   $_GET['page'] = intval($_GET['page']);
   $pageCourante = $_GET['page'];
} else {
   $pageCourante = 1;
}
$depart = ($pageCourante-1)*$produitparpage;
?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <?php
      $produit = $produit1c->pagination($produitparpage,$depart);
      while($vid = $produit->fetch()) {
      ?>
      <b>N°<?php echo $vid['numero']; ?> - <?php echo $vid['first_name']; ?></b><br />
      <i><?php echo $vid['product_title']; ?></i>
      <br /><br />
      <?php
      }
      ?>
      <?php
      for($i=1;$i<=$pagesTotales;$i++) {
         if($i == $pageCourante) {
            echo $i.' ';
         } else {
            echo '<a href="pag.php?page='.$i.'">'.$i.'</a> ';
         }
      }
      ?>
   </body>
</html>
