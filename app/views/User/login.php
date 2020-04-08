<!doctype html>
<html lang="zxx">

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Estore</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="../app/public/assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="../app/public/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="../app/public/assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="../app/public/assets/css/flaticon.css">
            <link rel="stylesheet" href="../app/public/assets/css/slicknav.css">
            <link rel="stylesheet" href="../app/public/assets/css/animate.min.css">
            <link rel="stylesheet" href="../app/public/assets/css/magnific-popup.css">
            <link rel="stylesheet" href="../app/public/assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="../app/public/assets/css/themify-icons.css">
            <link rel="stylesheet" href="../app/public/assets/css/slick.css">
            <link rel="stylesheet" href="../app/public/assets/css/nice-select.css">
            <link rel="stylesheet" href="../app/public/assets/css/style.css">
   </head>

   <body>
       
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="../app/public/assets/img/logo/logo.png" alt="">
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
                                  <a href="../index"><img src="../app/public/assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>                                                
                                        <ul id="navigation">                                                                                                                                     
                                            <li><a href="../index">Home</a></li>
                                            <li><a href="#">Categories</a></li>
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
                                   <li class="d-none d-lg-block"> <a href="../user/login" class="btn header-btn">Sign in</a></li>
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

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="../app/public/assets/img/hero/category.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Login</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="../user/signup" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                            <form class="row contact_form" action="#" method="post">
                                <?php
                                    if(isset($data['error'])) {
                                    ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?=$data['error']?>
                                        </div>
                                    <?php
                                    }
                                  
                                ?>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="username" value="" placeholder="Username" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="submit" name="action" value="log in" class="btn_3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->


    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="./../app/public/assets/js/vendor/modernizr-3.5.0.min.js"></script>

    <!-- Jquery, Popper, Bootstrap -->
    <script src="./../app/public/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./../app/public/assets/js/popper.min.js"></script>
    <script src="./../app/public/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./../app/public/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./../app/public/assets/js/owl.carousel.min.js"></script>
    <script src="./../app/public/assets/js/slick.min.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="./../app/public/assets/js/wow.min.js"></script>
    <script src="./../app/public/assets/js/animated.headline.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./../app/public/assets/js/jquery.scrollUp.min.js"></script>
    <script src="./../app/public/assets/js/jquery.nice-select.min.js"></script>
    <script src="./../app/public/assets/js/jquery.sticky.js"></script>
    <script src="./../app/public/assets/js/jquery.magnific-popup.js"></script>

    <!-- contact js -->
    <script src="./../app/public/assets/js/contact.js"></script>
    <script src="./../app/public/assets/js/jquery.form.js"></script>
    <script src="./../app/public/assets/js/jquery.validate.min.js"></script>
    <script src="./../app/public/assets/js/mail-script.js"></script>
    <script src="./../app/public/assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./../app/public/assets/js/plugins.js"></script>
    <script src="./../app/public/assets/js/main.js"></script>

</body>

</html>