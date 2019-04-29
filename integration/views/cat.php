<?PHP
include "C:/wamp64/www/test/core/produitc.php";
include "C:/wamp64/www/test/entities/produit.php";
include "C:/wamp64/www/test/core/categoriesc.php";
include "C:/wamp64/www/test/entities/categories.php";
include "C:/wamp64/www/projet/entities/submenu.php";
include "C:/wamp64/www/projet/core/submenuc.php";
$produit1c=new ProduitC();
$listeProduit=$produit1c->afficherProduits();
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
		<!-- Font Awesome, Style -->
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="quick/css/style.css">
	<link rel="stylesheet" type="text/css" href="mimi.css">
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
							<img src="img/logo.jpg" alt="" style="width: 100px ">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form" style="top: 30px" method="POST" action="search.php">
							<input type="text" placeholder="Search on Baz'art ...." name="recherche" id="Search">
							<button type="submit" name="search"><i class="flaticon-search"></i></button>
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
					<li><a href="#">Home</a></li>

					<li><a href="cat.php">Catalogue</a></li>
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


	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>CAtegory PAge</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Categories</h2>
						<ul class="category-menu">
							
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">refine by</h2>
						<div class="price-range-wrap">
							<h4>Price</h4>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="270">
								<div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
								</span>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
								</span>
							</div>
							<div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">color by</h2>
						<div class="fw-color-choose">
							<div class="cs-item">
								<input type="radio" name="cs" id="gray-color">
								<label class="cs-gray" for="gray-color">
									<span>(3)</span>
								</label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="orange-color">
								<label class="cs-orange" for="orange-color">
									<span>(25)</span>
								</label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="yollow-color">
								<label class="cs-yollow" for="yollow-color">
									<span>(112)</span>
								</label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="green-color">
								<label class="cs-green" for="green-color">
									<span>(75)</span>
								</label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="purple-color">
								<label class="cs-purple" for="purple-color">
									<span>(9)</span>
								</label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="blue-color" checked="">
								<label class="cs-blue" for="blue-color">
									<span>(29)</span>
								</label>
							</div>
						</div>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">Size</h2>
						<div class="fw-size-choose">
							<div class="sc-item">
								<input type="radio" name="sc" id="xs-size">
								<label for="xs-size">XS</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="s-size">
								<label for="s-size">S</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="m-size"  checked="">
								<label for="m-size">M</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="l-size">
								<label for="l-size">L</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="xl-size">
								<label for="xl-size">XL</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="xxl-size">
								<label for="xxl-size">XXL</label>
							</div>
						</div>
					</div>
				</div>
    <nav style="overflow: hidden;
                height: 100px;
                background-color: white;
                width: 100%;">
	 <ul style="position: relative;left: 200px;top:40px;">
		<li style="padding-left: 100px;
                   list-style: none;
                   display: inline-block;
                   float: left;
                  line-height: 100px;"> <a style=" display: block;
                                                   text-decoration: none;
                                                   font-size: 14px;
                                                   font-family: arial;
                                                   color: #1e1e1e;
                                                   padding: 0 20px;" href="cat.php">Recommend</a> 
        </li>
        <li style="padding-left: 100px;
                   list-style: none;
                   display: inline-block;
                   float: left;
                  line-height: 100px;"> <a  style=" display: block;
                                                   text-decoration: none;
                                                   font-size: 14px;
                                                   font-family: arial;
                                                   color: #1e1e1e;
                                                   padding: 0 20px;" href="trier.php">Price(Lowest first)</a> 
        </li>
        <li style="padding-left: 100px;
                   list-style: none;
                   display: inline-block;
                   float: left;
                  line-height: 100px;"> <a style=" display: block;
                                                   text-decoration: none;
                                                   font-size: 14px;
                                                   font-family: arial;
                                                   color: #1e1e1e;
                                                   padding: 0 20px;" href="high.php">Price(highest first)</a>
        </li>
     </ul>
   </nav>
						<?PHP
						$i='0';
						$j='0';
						$p='1';
                        foreach($listeProduit as $row){
                        $i=$i+'1';
                        if ($i<='2') 
                        {

                      	 if ($i% '2'!==0)
                      	{
                      	$img=$row['img_localisation']; 
	                    ?>
				 <div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
		<div class="product-area" style="width: 10000px" >
		<div class="container" style="width: 10000px;top: 100px">
			<div class="col-3" >
				<a href="#" >
  
					<img src="<?PHP echo $img ?>">
					<div class="caption">
                        <h4><?PHP echo $row['first_name']; ?></h4>
						<button class="price"><i class="fas fa-dollar-sign"></i><?PHP echo $row['final_price']; ?></button>
					</div>	
					<a href="?action=view&amp;num=<?php echo $row['numero']; ?>"><button class="productViewBtn" name="quick">View Product</button></a>
				</a>

			</div>
						            <div class="product-item" style="position: relative;top: 320px;right: 890px">
									<div class="pi-pic">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								    </div>
								    </div>
		</div>
	</div>

	                          <?PHP
	                      }
                      	else if ($i% '2'==0 )
                      	{
                      	$img=$row['img_localisation']; 
	                    ?>
<div class="product-area" style="  width: 10000px">
		<div class="container" style="position:relative;left:400px;top: -640px ;width: 10000px">
			<div class="col-3" >
				<a href="#" >

					<img src="<?PHP echo $img ?>">
					<div class="caption">
                        <h4><?PHP echo $row['first_name']; ?></h4>
						<button class="price"><i class="fas fa-dollar-sign"></i><?PHP echo $row['final_price']; ?></button>
					</div>	
					<a href="?action=view&amp;num=<?php echo $row['numero']; ?>"><button class="productViewBtn" name="quick">View Product</button></a>
				</a>

			</div>
						            <div class="product-item" style="position: relative;top: 390px;right: 890px">
									<div class="pi-pic">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								    </div>
								    </div>
		</div>
	</div>

	                          <?PHP
	                      }
	                     }
                              
                        if($i>'2')
                        {

                      	 if ($i% '2'!==0)
                      	{
                      		$j=$j+1;
                      	$img=$row['img_localisation']; 
                      	$top="-".($j)*'640'."px";
	                    ?>
		<div class="product-area" style="width: 10000px">
		<div class="container" style="position:relative;top:<?PHP echo $top; ?>;width: 10000px">
			<div class="col-3" >
				<a href="#" >

					<img src="<?PHP echo $img ?>">
					<div class="caption">
						<h4><?PHP echo $row['first_name']; ?></h4>
						<button class="price"><i class="fas fa-dollar-sign"></i><?PHP echo $row['final_price']; ?></button>
					</div>	
					<a href="?action=view&amp;num=<?php echo $row['numero']; ?>"><button class="productViewBtn" name="quick">View Product</button></a>
				</a>
              </form>
			</div>
						            <div class="product-item" style="position: relative;top: 390px;right: 890px">
									<div class="pi-pic">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								    </div>
								    </div>
		</div>
	</div>

	                          <?PHP
	                      }
                          
                      	else if ($i% '2'==0 )
                      	{
                    $p=$p+1;
$img=$row['img_localisation']; 
$top="-".($p)*'641'."px";
                        ?>
<div class="product-area" style="position:relative;top:<?PHP echo $top; ?>;left:400px;width: 10000px">
		<div class="container" style="position:relative;width: 10000px">
			<div class="col-3" >
				<a href="#" >
                    
					<img src="<?PHP echo $img ?>">
					<div class="caption">
						
						<h4><?PHP echo $row['first_name']; ?></h4>
						<button class="price"><i class="fas fa-dollar-sign"></i><?PHP echo $row['final_price']; ?></button>
					</div>	
					<a href="?action=view&amp;num=<?php echo $row['numero']; ?>"><button class="productViewBtn" name="quick">View Product</button></a>
						
				</a>

			</div>
						            <div class="product-item" style="position: relative;top: 390px;right: 890px">
									<div class="pi-pic">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								    </div>
								    </div>
		</div>
	</div>

	                          <?PHP
	                      }
	                  }
                               }
                              ?>
						<div class="text-center w-100 pt-3" style="position: relative;left: 290px">
							<button class="site-btn sb-line sb-dark" onclick="loadmore">LOAD MORE</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->
	<!-- Product View Box / Quick Product View Start -->
	<div class="productViewBox">
		<?php  
$numero=@$_GET['num'];
$produit1c=new ProduitC();
$data=$produit1c->remplirchamps($numero);
		?>
		<a href="cat.php"><button class="productViewBox-closeBtn" ><i class="fas fa-times"></i></button></a>
		<div class="productViewBoxImg">
			<img src="<?PHP echo "$data->img_localisation";  ?>">
		</div>
		<div class="productViewBoxDetail">

		    <h2 class="p-title"><?PHP echo "$data->product_title";  ?></h2>
					<h3 class="p-price"><?PHP echo "$data->price";  ?></h3>
					<h4 class="p-stock">Available: <span>In Stock</span></h4>
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div>
					<div class="p-review">
						<a href="">3 reviews</a>|<a href="">Add your review</a>
					</div>
					<div class="fw-size-choose">
						<p>Size</p>
						<div class="sc-item">
							<input type="radio" name="sc" id="xs-size">
							<label for="xs-size">32</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="s-size">
							<label for="s-size">34</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="m-size" checked="">
							<label for="m-size">36</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="l-size">
							<label for="l-size">38</label>
						</div>
						<div class="sc-item disable">
							<input type="radio" name="sc" id="xl-size" disabled>
							<label for="xl-size">40</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="xxl-size">
							<label for="xxl-size">42</label>
						</div>
					</div>
					<div class="quantity">
						<p>Quantity</p>
                        <div class="pro-qty"><input type="text" value="1"></div>
                    </div>
					<a href="product.php?action=details&amp;num=<?php echo $numero; ?>" class="site-btn"> VIEW FULL DETAILS</a>
			<a href="#" class="addtocart"><i class="fas fa-heart"></i> Add to Cart</a>
			<a href="#" class="buynow" ><i class="fas fa-shopping-cart" ></i> ADD TO BAG</a>
		</div>
	</div>
	<!-- Product View Box / Quick Product View End -->
	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="category.html"><img src="./img/logo.jpg" alt=""  style="width : 350px"></a>
			</div>
			<div class="row">
				<div class="col-lg-3">
					<div class="footer-widget about-widget">
						<h2>About</h2>
						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<img src="img/cards.png" alt="">
					</div>
				</div>
				<div class="col-lg-3">
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
				<div class="col-lg-3">
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
				<div class="col-lg-3">
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
			</div>
		</div>
	</section>
	<!-- Footer section end -->

<!-- Jquery V.3.3.1 -->
<script src="quick/js/jquery-3.3.1.min.js"></script>
<script src="quick/js/jquery.cycle.js"></script>
<script src="quick/js/owl.carousel.min.js"></script>
<script>
	$("#sliderShuffle").cycle({
		next: '#next',
		prev: '#prev'
	});
	
	$('.owl-carousel').owlCarousel({
		items:4,
		loop:true,
		margin:15,
		autoplay:true,
		autoplayTimeout:3000, //3 Second
		nav:true,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:3,
				nav:true
			},
			1000:{
				items:4,
				nav:true
			}
		}

	});

	$(function(){
		$(".topbar ul li").click(function(){
			$(".topbar ul li").not(this).find("ul").slideUp();
			$(this).find("ul").slideToggle();
		});
		$(".topbar ul li ul li, productCategories ul li .megamenu").click(function(e){
			e.stopPropagation();	
		});
		$(".productCategories ul li").click(function(){
			$(".productCategories ul li").not(this).find(".megamenu").hide();
			$(this).find(".megamenu").toggle();
		});
		$(".otherInfoBody").hide();
		$(".otherInfoHandle").click(function(){
			$(".otherInfoBody").slideToggle();
		});
		$(".signBtn").click(function(){
			$("body").css("overflow", "hidden");
			$(".loginBox").slideDown();
		});
		$(".closeBtn").click(function(){
			$("body").css("overflow", "visible");
			$(".loginBox").slideUp();
		});  
		<?PHP  if ($_GET['action']=='view') {?>
		$(".productViewBtn").click(function(e){
			e.preventDefault();
			$("body").css("overflow", "hidden");
			$(".productViewBox").slideDown();
		});
		<?PHP } ?>
		$(".productViewBox-closeBtn").click(function(){
			$("body").css("overflow", "visible");
			$(".productViewBox").slideUp();
		});
	});
</script>

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