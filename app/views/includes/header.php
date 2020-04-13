<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Estore</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="manifest" href="site.webmanifest">
	<link rel="shortcut icon" type="image/x-icon" href="<?=$GLOBALS['home_path']?>/public/assets/img/favicon.ico">

	<!-- CSS here -->
	<link rel="stylesheet" href="<?=$GLOBALS['home_path']?>/public/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=$GLOBALS['home_path']?>/public/assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?=$GLOBALS['home_path']?>/public/assets/css/flaticon.css">
	<link rel="stylesheet" href="<?=$GLOBALS['home_path']?>/public/assets/css/slicknav.css">
	<link rel="stylesheet" href="<?=$GLOBALS['home_path']?>/public/assets/css/animate.min.css">
	<link rel="stylesheet" href="<?=$GLOBALS['home_path']?>/public/assets/css/magnific-popup.css">
	<link rel="stylesheet" href="<?=$GLOBALS['home_path']?>/public/assets/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="<?=$GLOBALS['home_path']?>/public/assets/css/themify-icons.css">
	<link rel="stylesheet" href="<?=$GLOBALS['home_path']?>/public/assets/css/slick.css">
	<link rel="stylesheet" href="<?=$GLOBALS['home_path']?>/public/assets/css/nice-select.css">
	<link rel="stylesheet" href="<?=$GLOBALS['home_path']?>/public/assets/css/style.css">
</head>

<body>

	<!-- Preloader Start -->
	<div id="preloader-active">
		<div class="preloader d-flex align-items-center justify-content-center">
			<div class="preloader-inner position-relative">
				<div class="preloader-circle"></div>
				<div class="preloader-img pere-text">
					<img src="<?=$GLOBALS['home_path']?>/public/assets/img/logo/logo.png" alt="">
				</div>
			</div>
		</div>
	</div>
	<!-- Preloader Start -->

	<header>
		<!-- Header Start -->
		<div class="header-area">
			<div class="main-header ">
				<div class="header-bottom  header-sticky">
					<div class="container-fluid">
						<div class="row align-items-center">
							<!-- Logo -->
							<div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
								<div class="logo">
									<a href="<?=$GLOBALS['home_path']?>/index"><img src="<?=$GLOBALS['home_path']?>/public/assets/img/logo/logo.png" alt=""></a>
								</div>
							</div>
							<div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
								<!-- Main-menu -->
								<div class="main-menu f-right d-none d-lg-block">
									<nav>
										<ul id="navigation">
											<li><a href="<?=$GLOBALS['home_path']?>/index">Home</a></li>
											<li><a href="#">Categories</a></li>
											<li><a href="<?=$GLOBALS['url_path'].'/user/account'?>">Account</a></li>
										</ul>
									</nav>
								</div>
							</div>
							<div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
								<ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
									<li class="d-none d-xl-block">
										<div class="form-box f-right ">
											<input type="text" name="Search" placeholder="Search products">
											<div class="search-icon">
												<i class="fas fa-search special-tag"></i>
											</div>
										</div>
									</li>
									<li>
										<div class="shopping-card">
											<a href="#"><i class="fas fa-shopping-cart"></i></a>
										</div>
									</li>
									<?php
										if(isset($_SESSION['user_id'])){
											echo '<li class="d-none d-lg-block"> <a href="' . $GLOBALS['url_path'] . '/user/logout" class="btn header-btn">Log out</a></li>';
										}
										else{
											echo '<li class="d-none d-lg-block"> <a href="' . $GLOBALS['url_path'] . '/user/login" class="btn header-btn">Sign in</a></li>';
										}
									?>
								</ul>
							</div>
							<!-- Mobile Menu -->
							<div class="col-12">
								<div class="mobile_menu d-block d-lg-none"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header End -->
	</header>