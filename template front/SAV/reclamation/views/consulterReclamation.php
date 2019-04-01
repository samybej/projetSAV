<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Baz'art | eCommerce Template</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Baz'art | eCommerce Template">
	<meta name="keywords" content="Baz'art, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="../../../img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="../../../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../../../css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../../../css/flaticon.css"/>
	<link rel="stylesheet" href="../../../css/slicknav.min.css"/>
	<link rel="stylesheet" href="../../../css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="../../../css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="../../../css/animate.css"/>
	<link rel="stylesheet" href="../../../css/style.css"/>


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
						<a href="../../../index.html" class="site0-logo">
							<img src="../../../img/logo.jpg" alt="" style="width: 100px ">
						</a>
					</div>
					<div class="col-xl-5 col-lg-5">
						<form class="header-search-form" style="top: 30px">
							<input type="text" placeholder="Search on Baz'art ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5"  style="top: 35px">
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
					<li><a href="../../../index.html">Home</a></li>
					<li><a href="#">clothes</a>
						<ul class="sub-menu">
							<li><a href="#">tops</a></li>
							<li><a href="#">trousers</a></li>
							<li><a href="#">coat</a></li>
							<li><a href="#">dress</a></li>
							<li><a href="#">skirt</a></li>
						</ul>
					</li>
					<li><a href="#">accessories</a>
						<ul class="sub-menu">
							<li><a href="#">jewelry</a></li>
							<li><a href="#">bags</a></li>
							<li><a href="#">perfume</a></li>
							<li><a href="#">belts</a></li>
							<li><a href="#">sunglasses</a></li>
						</ul>
					</li>
					<li><a href="#">Shoes</a>
						<ul class="sub-menu">
							<li><a href="#">Sneakers</a></li>
							<li><a href="#">Sandals</a></li>
							<li><a href="#">Formal Shoes</a></li>
							<li><a href="#">Boots</a></li>
							<li><a href="#">Flip Flops</a></li>
						</ul>
					</li>
					<li><a href="#">events
						<span class="new">New</span>
					</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Contact</a>
						<ul class="sub-menu">
							<li><a href="reclamer.html">Reclamer à propos d'un produit</a></li>
							<li><a href="consulterReclamation.html">Consulter ma réclamation</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->

<?PHP 
	include "../core/reclamationC.php";

	$reclamation1C =new ReclamationC();
	

	if (isset($_POST["id_client"])){
		$liste_reclamations=$reclamation1C->recupererReclamationParId($_POST["id_client"]);
?>

<div style="padding-bottom: 300px; padding-right: 200px;">	
<table border="2" align="center">
	<div style=" height: 100px; padding-top: 70px; padding-right: 50px;">
<tr >
<td>Id client</td>
<td>Num Reclamation</td>
<td>Num Produit</td>
<td>Reclamation</td>
<td>Supprimer</td>
<td>Modifier</td>
</tr>
</div>

<?PHP
foreach($liste_reclamations as $row){
	?>
	<tr ">
	<td><?PHP echo $row['id_client']; ?></td>
	<td><?PHP echo $row['num_r']; ?></td>
	<td><?PHP echo $row['num_p']; ?></td>
	<td><?PHP echo $row['reclame']; ?></td>
	<td><form method="POST" action="supprimerReclamation.php?id_client=<?PHP echo $row['id_client']; ?>">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['num_r']; ?>" name="num_r">
	</form>

	</td>
	<td><a href="modifierReclamation.php?num_r=<?PHP echo $row['num_r']; ?>">
	modifier</a></td>
	</tr>


<?PHP
}
?>
</table>
</div>
<div style="padding-left: 60px">


</div>
<?PHP
}
else {
?>



<?PHP
	$liste_reclamations=$reclamation1C->recupererReclamationParId($_GET["id_client"]);
?>

<div style="padding-bottom: 300px; padding-right: 200px;">	
<table border="2" align="center">
	<div style=" height: 100px; padding-top: 70px; padding-right: 50px;">
<tr>
<td>Id client</td>
<td>Num Reclamation</td>
<td>Num Produit</td>
<td>Reclamation</td>
<td>Supprimer</td>
<td>Répondre</td>
</tr>
</div>

<?PHP
foreach($liste_reclamations as $row){
	?>
	<tr>
	<td><?PHP echo $row['id_client']; ?></td>
	<td><?PHP echo $row['num_r']; ?></td>
	<td><?PHP echo $row['num_p']; ?></td>
	<td><?PHP echo $row['reclame']; ?></td>
	<td><form method="POST" action="supprimerReclamation.php?id_client=<?PHP echo $row['id_client']; ?>">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['num_r']; ?>" name="num_r">
	</form>
	</td>
	<td><a href="modifierReclamation.php?num_r=<?PHP echo $row['num_r']; ?>">
	modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>
</div>
<?PHP
}
?>

<div style="padding-left: 60px">


</div>
<div>
<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="index.html"><img src="../../../img/logo.jpg" alt=""  style="width : 350px"></a>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>About</h2>
						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<img src="../../../img/cards.png" alt="">
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
								<div class="lp-thumb set-bg" data-setbg="../../../img/blog-thumbs/1.jpg"></div>
								<div class="lp-content">
									<h6>what shoes to wear</h6>
									<span>Oct 21, 2018</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="../../../img/blog-thumbs/2.jpg"></div>
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
							<p>18, Rue des Juges, Menzah 6 Tunis, Aryanah, Tunisia</p>
						</div>
						<div class="con-info">
							<span>T.</span>
							<p>+216 54 323 912</p>
						</div>
						<div class="con-info">
							<span>E.</span>
							<p>office@youremail.com</p>
						</div>
						<div class="con-info">
							<span>O.</span>
							<p>ouvert 09:00 - 20:00</p>
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



			</div>
		</div>
	</section>
	<!-- Footer section end -->
</div>


	<!--====== Javascripts & Jquery ======-->
	<script src="../../../js/jquery-3.2.1.min.js"></script>
	<script src="../../../js/bootstrap.min.js"></script>
	<script src="../../../js/jquery.slicknav.min.js"></script>
	<script src="../../../js/owl.carousel.min.js"></script>
	<script src="../../../js/jquery.nicescroll.min.js"></script>
	<script src="../../../js/jquery.zoom.min.js"></script>
	<script src="../../../js/jquery-ui.min.js"></script>
	<script src="../../../js/main.js"></script>

	</body>
</html>
