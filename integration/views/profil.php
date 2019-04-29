<?php
session_start();
require_ONCE('../config.php');
include "../core/categoriesc.php";
include "../entities/categories.php";
include "../entities/submenu.php";
include "../core/submenuc.php";
$cat1c=new CategoryC();
$categorie=$cat1c->affichercategory();
$menu1c=new SubmenuC(); 
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Baz'art | eCommerce Template</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Baz'art | eCommerce Template">
	<meta name="keywords" content="Baz'art, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inscri/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inscri/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inscri/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inscri/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inscri/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inscri/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inscri/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inscri/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inscri/vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inscri/css/util.css">
	<link rel="stylesheet" type="text/css" href="../inscri/css/main.css">
<!--===============================================================================================-->

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


	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="./index.html" class="site0-logo">
							<img src="img/logo.jpg" alt="" style="width: 100px ">
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
								                                <a href="logout.php">Logout</a>

							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>0</span>
								</div>
								<a href="#">Shopping Cart</a>o
                                
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
					<li><a href="index.php">Home</a></li>

					<li><a href="affpag.php">Catalogue</a></li>
				 <?php  
				 foreach($categorie as $cat){ ?>
					<li><a href="productcategory.php?action=category&number=<?php echo $cat['id']; ?>"  type="submit" name="categoryclicked"><?php echo $cat['category']; ?></a>
						
						<ul class="sub-menu">
							<?php 
                         $champ=$cat['id'];

                         $select=$menu1c->remplirchamps($champ);
                        while($s=$select->fetch(PDO::FETCH_OBJ))
           {  
                         foreach ($s as $row) {
                 		
						?>
							<li><a href="#"><?php echo $row; ?></a></li>
						<?PHP
					 }
					

					}
						?>
						</ul>
						<?PHP
					 }
						?>
					</li>
					<li><a href="#">events
						<span class="new">New</span>
					</a></li>
					<li><a href="#">Blog</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->
    	<!-- profile section start -->

<section>
    
    
   <div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form"action="../views/modifier_client" method="POST" >
				<span class="contact100-form-title">
					 Profil
				</span>

				<div class="wrap-input100 validate-input bg1" data-validate="Veuiller saisir votre nom">
					<span class="label-input100">NOM</span>
					<input class="input100" type="text" name="nom" value="<?php echo $_SESSION['nom'] ?>">
				</div>
                <div class="wrap-input100 validate-input bg1" data-validate="Veuiller saisir votre prénom">
					<span class="label-input100"> PRENOM *</span>
					<input class="input100" type="text" name="prenom"value="<?php echo $_SESSION['prenom'] ?>">
				</div>
               
                  
                <div class="wrap-input100 validate-input bg1" data-validate="Veuiller saisir votre adresse">
					<span class="label-input100"> adresse *</span>
					<input class="input100" type="text" name="adresse" value="<?php echo $_SESSION['adress'] ?>">
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Veuiller saisir votre Email (e@a.x)">
					<span class="label-input100">Email *</span>
					<input class="input100" type="text" name="email" value="<?php echo $_SESSION['mail'] ?>">
				</div>
                <div class="wrap-input100 validate-input bg1" data-validate="Veuiller saisir votre date de naissance">
					<span class="label-input100"> date de naissance *</span>
					<input class="input100" type="date" name="date_N" value="<?php echo $_SESSION['date'] ?>">
				</div>
                

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Numéro de Téléphone</span>
					<input class="input100" type="text" name="phone" value="<?php echo $_SESSION['tel'] ?>">
				</div>

				
                
                	<div class="wrap-input100 validate-input bg1" data-validate="Veuiller saisir votre nom de compte">
					<span class="label-input100"> Nom de compte *</span>
					<input class="input100" type="hidden" name="nom_c" value="<?php echo $_SESSION['login'] ?>">
                         <h2>
                        <?php
    
            print_r($_SESSION['login']);
		
                          
    
                        ?>
                    
                    
                    </h2>
				</div>
                    <div class="wrap-input100 validate-input bg1">
					<span class="label-input100"> mot de passe *</span>
					<input class="input100" type="password" name="mdp" value="<?php echo $_SESSION['pass'] ?>">
				</div>
                <div class="wrap-input100 validate-input bg1">
					<span class="label-input100"> points de fidelité :</span>
                     <h2>
                        <?php
    $sql="SELECT * FROM carte_fidelite WHERE nom_c_client=nom_c_client";
                           $db = config::getConnexion();
		try{
		$liste=$db->query($sql);
            $a=$liste->fetch(PDO::FETCH_ASSOC);
            print_r($a['nb_point']);
		#echo $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
                          
    
                        ?>
                    
                    
                    </h2>
                   
                 
					
				  
                                   
				</div>
				<div class="container-contact100-form-btn">
                    <input type="submit" class="contact100-form-btn fa fa-long-arrow-right m-l-7" aria-hidden="true" name="button" value="Modifier"> 
					
				</div>
               
              
                

			</form>
             <form class="contact100-form validate-form"action="../views/ajout_carte.php" method="POST" >
                      <div class="container-contact100-form-btn">
                    <input type="submit" class="contact100-form-btn fa fa-long-arrow-right m-l-7" aria-hidden="true" name="button" value="Ajouter carte fidélite"> 
					
				</div>
                    
                </form>
              <form class="contact100-form validate-form"action="../views/supprimer_carte.php" method="POST" >
                      <div class="container-contact100-form-btn">
                    <input type="submit" class="contact100-form-btn fa fa-long-arrow-right m-l-7" aria-hidden="true" name="button" value="Supprimer carte fidélite"> 
					
				</div>
                    
                </form>
		</div>
	</div>
    
    </section>


		<!-- profile section end -->


	

	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="index.html"><img src="img/logo.jpg" alt=""  style="width : 350px"></a>
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
