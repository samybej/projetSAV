<?php
include "../core/cartesc.php";
include "../core/commandeC.php";
include "../entities/cartes.php";
if (isset($_POST['valider']))
{ 
?>
<?PHP 
require('fpdf/fpdf.php');
class myPDF extends FPDF{
       function header(){
              $add1=$_POST['address1'];
              $add2=$_POST['address2'];
              $ville=$_POST['ville'];
              $zip=$_POST['zip'];
              $phone=$_POST['phone'];
              $type_livraison=$_POST['type_livraison'];
              $mode_payement=$_POST['mode_payement'];
              $this->SetFont("Arial","B",14);
              $this->Cell(0,10,"Facture des achats ",0,1,'C');
              $this->ln();
              $this->ln();
              $this->ln();
              $this->Cell(30,10,"Destination: ",0,1);
              $this->line(10,60,200,60);
              $this->ln(10);
              $this->Cell(70,10," addresse 1",0,0);
              $this->Cell(30,10,": {$add1} ",0,1);
              $this->Cell(70,10,"addresse2",0,0);
              $this->Cell(30,10,": {$add2} ",0,1);
              $this->Cell(70,10,"ville",0,0);
              $this->Cell(30,10,": {$ville} ",0,1);
              $this->Cell(70,10,"zip ",0,0);
              $this->Cell(30,10,": {$zip}",0,1);
              $this->Cell(70,10,"phone",0,0);
              $this->Cell(30,10,": {$phone} ",0,1);
              $this->Cell(70,10,"type de livraison",0,0);
              $this->Cell(30,10,": {$type_livraison} ",0,1);
              $this->Cell(70,10,"mode de payement",0,0);
              $this->Cell(30,10,": {$mode_payement} ",0,1);
              $this->ln(10);
              $this->line(155,200,195,200);
              $this->Cell(140,5,'',0,0);
              $this->Cell(35,110,"Signature",0,1,'C');
              $this->image('fpdf/logo.JPG',15,10);
       }}

       $pdf=new myPDF();
       $pdf->addPage();
       $pdf->output();
       ?>
<?php

}
else if (isset($_POST['annuler']))
{
$commande=new commandeC();
$idcommande=$commande->afficherid();
$res=$idcommande->fetch(PDO::FETCH_OBJ);
var_dump($res);
foreach ($res as $row) {
	var_dump($row);
$commande->supprimercommande($row);
header('Location: index.html');
}
}
else
{	 
if (isset($_POST['addcart']))
{
      $carte=new cartes($_POST['nom_titulaire'],$_POST['num_carte'],$_POST['year'],$_POST['month'],$_POST['code']);
      $carte1C=new CartesC();
      $carte1C->ajouterCartes($carte);
      header('Location:checkout.php');

}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Divisima | eCommerce Template</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link rel="stylesheet" type="text/css" href="css/cartes.css">
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
	

   <!-- cartes-->
<form method="POST">

<div class="form" style="position: relative; top: 40px;">
	
             <input type="text" id="num_carte" name="num_carte" placeholder="Card Number" class="name">
                           <div><br>
                         <select class="Month" name="month">
																	<option>Select Month</option>
																	<option value="01">January</option>
																	<option value="02">February </option>
																	<option value="03">March</option>
																	<option value="04">April</option>
																	<option value="05">May</option>
																	<option value="06">June</option>
																	<option value="07">July</option>
																	<option value="08">August</option>
																	<option value="09">September</option>
																	<option value="10">October</option>
																	<option value="11">November</option>
																	<option value="12">December</option>
																</select>

                                                            <select class="year" name="year" >
																	<option>Select Year</option>
																	<option value="16"> 2016</option>
																	<option value="17"> 2017</option>
																	<option value="18"> 2018</option>
																	<option value="19"> 2019</option>
																	<option value="20"> 2020</option>
																	<option value="21"> 2021</option>
																</select>
															</div><br>
															<div>
																<input type="text" id="code" name="code" placeholder="Card Code" class="code">

															</div>
															<div>
															<input type="text" id="titulaire" name="nom_titulaire" placeholder="titulaire de la carte" class="name" style="position: relative;top:20px">
															</div>
														     <div>
															<input  class="valider" id="valider"  type="submit" onclick="test_num_carte(); test_code(); test_titulaire();" style="position: relative;left: 0px;top:40px;background-color:lightgray; width:300px;height: 50px;border-radius: 20px;" name="addcart" > 
															</div>
															<?PHP  }  ?>
														
													</div>


</form>
	<!-- Footer section -->
	<section class="footer-section" style="position: relative;top: 200px">
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
			<script>
				$.notify("Verifiez votre inbox !", {type:"success", animation:true, animationType:"drop", align:"center", verticalAlign:"top"});
			</script>
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
	<script src="js/checkout.js"></script>

	</body>
</html>
