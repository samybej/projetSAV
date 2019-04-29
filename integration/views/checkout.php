<?PHP
session_start();
include "../core/ajoutCart.php" ;
include "../core/commandeC.php";
include "../core/livreurC.php";
include "../core/livraisonC.php";
include "../entities/livraison.php";
include "../entities/commande.php";

$var="";
if (isset($_POST['submit']))
{ 
      $cmd=new commande($_POST['address1'],$_POST['address2'],$_POST['ville'],$_POST['zip'],$_POST['phone'],$_POST['type_livraison'],$_POST['mode_payement']);
      $commande1C=new CommandeC();
      $commande1C->ajouterCommande($cmd);
      if ($_POST['type_livraison'] == 'livraison'){
      	$num_commande = $commande1C->recupererNumC();
      	$id_client = $_SESSION['id'];
      	//print_r($id_client);
      	$livreurC = new LivreurC();
      	if ($livreurC->checkIfDispo() == -1){
      $livraison = new Livraison($num_commande,NULL,$_POST['address1'],$_POST['address2'],$_POST['ville'],$_POST['zip'],$id_client);
      $livraison1C = new LivraisonC();
      $livraison1C->ajouterLivraison($livraison,$num_commande,$id_client);
		$livraison1C->autoMSGifDispo(NULL,$id_client);
  	}
  	else {
  		$cin_livreur = $livreurC->checkIfDispo();
  		$livraison = new Livraison($num_commande,$cin_livreur,$_POST['address1'],$_POST['address2'],$_POST['ville'],$_POST['zip'],$id_client);
      $livraison1C = new LivraisonC();
      $livraison1C->ajouterLivraison($livraison,$num_commande,$id_client);
       $livraison1C->getInfoLivreur($cin_livreur);
      $livraison1C->autoMSGifDispo(1,$id_client);
      $livreurC->updateDispo($cin_livreur,"0");
     
  }
      //var_dump($livraison1C);
  	}
  }

$commande=new commandeC();
$listecommande=$commande->afficherlast();
//$num_c=$commande->getNum_c();

//$livraison = new Livraison();


$result=$listecommande->fetch(PDO::FETCH_OBJ);
$idcommande=$commande->afficherid();
$res=$idcommande->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Baz'Art | eCommerce Tunisie</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/notify.css"/>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="js/notify.js"></script>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="./index.html" class="site-logo">
							<img src="img/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Search on divisima ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"></i>
								<a href="#">Sign</a> In or <a href="#">Create Account</a>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>0</span>
								</div>
								<a href="#">Shopping Cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="#">Home</a></li>
					<li><a href="#">Women</a></li>
					<li><a href="#">Men</a></li>
					<li><a href="#">Jewelry
						<span class="new">New</span>
					</a></li>
					<li><a href="#">Shoes</a>
						<ul class="sub-menu">
							<li><a href="#">Sneakers</a></li>
							<li><a href="#">Sandals</a></li>
							<li><a href="#">Formal Shoes</a></li>
							<li><a href="#">Boots</a></li>
							<li><a href="#">Flip Flops</a></li>
						</ul>
					</li>
					<li><a href="#">Pages</a>
						<ul class="sub-menu">
							<li><a href="./product.html">Product Page</a></li>
							<li><a href="./category.html">Category Page</a></li>
							<li><a href="./cart.html">Cart Page</a></li>
							<li><a href="./checkout.html">Checkout Page</a></li>
							<li><a href="./contact.html">Contact Page</a></li>
						</ul>
					</li>
					<li><a href="#">Blog</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->
	<?PHP 
	if ($_POST['type_livraison'] == 'livraison'){
	?>
<script>
	$.notify("Verifiez votre inbox !", {type:"success", animation:true, animationType:"drop", align:"center", verticalAlign:"top"});
</script>
<?PHP 
}
?>
	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Category PAge</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->
   <!-- command detail start-->
	<div class="col-lg-4 order-1 order-lg-2"style="position: relative;top: 100px; left: 150px">
						
				
					<div class="cart-table" style="position: relative; width: 510px">
						<h3>Your Cart</h3>
						<?php 
						$ids =array_keys($_SESSION['cart']);

						if (empty($ids)) {
							$produit = [];
						} else {
							$i=implode(',', $ids);
							$j=substr($i,1);
							$produit = $DB->query('SELECT * FROM produit WHERE numero IN(' .$j. ')');
						
						?>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th">Product</th>
									
									<th class="size-th">SizeSize</th>
									<th class="total-th">Price</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($produit as $product) :
							 ?>
								<tr>
									<td class="product-col">
										<img src="<?php echo $product->img_localisation ;?>" alt="">
										<div class="pc-title">
											<h4><?= $product->first_name ?></h4>
											
										</div>
									</td>
									
									<td class="size-col"><h4>Size M</h4></td>
									<td class="total-col"><h4>$<?= $product->price ?></h4> 
                                        </td>
								</tr>
								<?php endforeach ; 
							} ?>
							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<h6>Total <span>$<?=$cart->total()?></span></h6>
						</div>
					</div>
				</div>
						
					</div>
				</div>
				<form method="POST" action="valider.php" id="submit_cmd">
		<div class="col-lg-4 order-1 order-lg-2" style="position: relative;left: 500px;top: -500px;">
					<div class="checkout-cart" style="height:625px; position: relative;left: 200px ;top: -23px; width:500px">
						<h3>Command Details</h3>
						<?php

						?>
						
						<ul class="price-list" style="height: 332px">
							<h4>Adresses</h4>
							<input type="hidden" name="address1" value="<?PHP echo $result->address1;  ?>">
							<input type="hidden" name="address2" value="<?PHP echo $result->address2;  ?>">
							<input type="hidden" name="ville" value="<?PHP echo $result->ville;  ?>">
							<input type="hidden" name="zip" value="<?PHP echo $result->zip;  ?>">
							<input type="hidden" name="phone" value="<?PHP echo $result->phone;  ?>">
							<input type="hidden" name="type_livraison" value="<?PHP echo $result->type_livraison;  ?>">
							<input type="hidden" name="mode_payement" value="<?PHP echo $result->mode_payement;  ?>">
							<div style="position: relative; top: 30px">
							<li name="address1" style="position: relative;top: 10px">Adresse (1) :<p style="position: relative;top: -24px ;left: 150px"><?PHP echo $result->address1;  ?></p></li></div>
							<div style="position: relative; top: 30px">
							<li  style="position: relative;top: -20px">Adresse (2) :<p style="position: relative;top: -24px ;left: 150px"><?PHP echo $result->address2;  ?></p></li></div>
							<div style="position: relative; top: 30px">
							<li name="ville" style="position: relative;top: -50px">Ville :<p style="position: relative;top: -24px ;left: 150px"><?PHP echo $result->ville;  ?></p></li></div>
							<div style="position: relative; top: 30px">
							<li name="zip" style="position: relative;top: -80px">ZIP :<p style="position: relative;top: -24px ;left: 150px"><?PHP echo $result->zip;  ?></p></li></div>
							<div style="position: relative; top: 30px">
								<li name="zip" style="position: relative;top: -110px">Phone :<p style="position: relative;top: -24px ;left: 150px"><?PHP echo $result->phone;  ?></p></li></div>
								<div style="position: relative; top: 30px">
							<li name="type_livraison" style="position: relative;top: -140px">Type Livraison<p style="position: relative;top: -24px ;left: 150px" ><?PHP echo $result->type_livraison;  ?></p></li></div>
							<div style="position: relative; top: 30px">
							<li style="position: relative;top: -170px">Mode Payement<p style="position: relative;top: -24px ;left: 150px" ><?PHP echo $result->mode_payement;  ?></p></li></div>

						</ul>
						
							<?php   
                                if ($result->mode_payement=="carte")
                                {
                                	$name="payement";
                                	$value="passer au payement";
                                	
                                }
                                else if ($result->mode_payement=="cash")
                                {
                                	$name="valider";
                                	$value="valider commande";
                                }
							?>
						<input type="submit" name="<?php echo $name; ?>"  style=" color: white;position:relative;width:190px ;top: 90px;left: 15px; height: 50px;background-color: #f51167; border-radius:15px;" value="<?php echo $value; ?>">
						<input type="submit" name="annuler"  style="color: white;position:relative; width:190px ;top: 90px;left: 30px; height: 50px;background-color: #f51167; border-radius:15px;" value="annuler commande">
					   </form>
					</div>
				</div>
	

   <!-- command detail end -->





	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="index.html"><img src="./img/logo-light.png" alt=""></a>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>About</h2>
						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<img src="img/cards.png" alt="">
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<ul>
							<li><a href="">About Us</a></li>
							<li><a href="">Track Orders</a></li>
							<li><a href="">Returns</a></li>
							<li><a href="">Jobs</a></li>
							<li><a href="">Shipping</a></li>
							<li><a href="">Blog</a></li>
						</ul>
						<ul>
							<li><a href="">Partners</a></li>
							<li><a href="">Bloggers</a></li>
							<li><a href="">Support</a></li>
							<li><a href="">Terms of Use</a></li>
							<li><a href="">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<div class="fw-latest-post-widget">
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/1.jpg"></div>
								<div class="lp-content">
									<h6>what shoes to wear</h6>
									<span>Oct 21, 2018</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/2.jpg"></div>
								<div class="lp-content">
									<h6>trends this year</h6>
									<span>Oct 21, 2018</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>Questions</h2>
						<div class="con-info">
							<span>C.</span>
							<p>Your Company Ltd </p>
						</div>
						<div class="con-info">
							<span>B.</span>
							<p>1481 Creekside Lane  Avila Beach, CA 93424, P.O. BOX 68 </p>
						</div>
						<div class="con-info">
							<span>T.</span>
							<p>+53 345 7953 32453</p>
						</div>
						<div class="con-info">
							<span>E.</span>
							<p>office@youremail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
					<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
					<a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
				</div>

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</div>
		</div>
	</section>

	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>
	


	</body>
</html>

