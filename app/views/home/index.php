<div class="slider-area " style="background-color: #bddbfa;">
    <!-- Mobile Menu -->
    <div class="slider-active">
        <div class="single-slider slider-height" data-background="<?= $GLOBALS['home_path'] ?>/public/assets/img/hero/h1_hero.jpg">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                        <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                            <img src="<?= $GLOBALS['home_path'] ?>/public/assets/img/hero/hero_man.png" alt="">
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                        <div class="hero__caption">
                            <!-- <span data-animation="fadeInRight" data-delay=".4s">60% Discount</span> -->
                            <h1 data-animation="fadeInRight" data-delay=".6s">Winter <br> Collection</h1>
                            <p data-animation="fadeInRight" data-delay=".8s">Best Cloth Collection By 2020!</p>
                            <!-- Hero-btn -->
                            <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                <a href="<?= $GLOBALS['url_path'] ?>/store/index" class="btn hero-btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slider-height" data-background="<?= $GLOBALS['home_path'] ?>/public/assets/img/hero/h1_hero.jpg">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                        <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                            <img src="<?= $GLOBALS['home_path'] ?>/public/assets/img/hero/hero_man.png" alt="">
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                        <div class="hero__caption">
                            <!-- <span data-animation="fadeInRight" data-delay=".4s">60% Discount</span> -->
                            <h1 data-animation="fadeInRight" data-delay=".6s">Winter <br> Collection</h1>
                            <p data-animation="fadeInRight" data-delay=".8s">Best Cloth Collection By 2020!</p>
                            <!-- Hero-btn -->
                            <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                <a href="<?= $GLOBALS['url_path'] ?>/store/index" class="btn hero-btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Latest Products Start -->
<section class="latest-product-area padding-bottom">
    <div class="container">
        <div class="row product-btn d-flex justify-content-end align-items-end">
            <!-- Section Tittle -->
            <div class="col-xl-4 col-lg-5 col-md-5">
                <div class="section-tittle mb-30">
                    <h2>Latest Products</h2>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">
                <div class="properties__button f-right">
                    <!--Nav Button  -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Promotion</a>
                        </div>
                    </nav>
                    <!--End Nav Button  -->
                </div>
            </div>
        </div>
        <!-- Nav Card -->
        <div class="tab-content" id="nav-tabContent">
            <!-- card one -->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    <?php
                    foreach ($data['products'] as $product) {
                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-product mb-60">
                                <div class="product-img">
                                    <img src="<?= $GLOBALS['home_path'] . '/../' . $product->image ?>" alt="">
                                    <?php if ($product->has_promotion && $product->expiry_date > date("Y-m-d")) : ?>
                                        <div class="new-product">
                                            <span>Pro</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product-caption">
                                    <div class="product-ratting">
                                        <?php for ($i = 0; $i < $product->getRate(); $i++) : ?>
                                            <i class="far fa-star"></i>
                                        <?php endfor; ?>
                                        <?php for ($i = 0; $i < 5 - $product->getRate(); $i++) : ?>
                                            <i class="far fa-star low-star"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <h4><a href="<?= $GLOBALS['url_path'] ?>/product/details/<?= $product->id ?>"><?= $product->name ?></a></h4>
                                    <div class="price">
                                        <ul>
                                            <?php if ($product->has_promotion && $product->expiry_date > date("Y-m-d")) : ?>
                                                <li>$ <?= $product->new_price ?></li>
                                                <li class="discount">$ <?= $product->price ?></li>
                                            <?php else : ?>
                                                <li>$ <?= $product->price ?></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- Card two -->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row">
                    <?php
                    foreach ($data['products'] as $product) {
                        if ($product->has_promotion && $product->expiry_date > date("Y-m-d")) :
                            ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-product mb-60">
                                    <div class="product-img">
                                        <img src="<?= $GLOBALS['home_path'] . '/../' . $product->image ?>" alt="">
                                        <?php if ($product->has_promotion && $product->expiry_date > date("Y-m-d")) : ?>
                                            <div class="new-product">
                                                <span>Pro</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="product-caption">
                                        <div class="product-ratting">
                                            <?php for ($i = 0; $i < $product->getRate(); $i++) : ?>
                                                <i class="far fa-star"></i>
                                            <?php endfor; ?>
                                            <?php for ($i = 0; $i < 5 - $product->getRate(); $i++) : ?>
                                                <i class="far fa-star low-star"></i>
                                            <?php endfor; ?>
                                        </div>
                                        <h4><a href="<?= $GLOBALS['url_path'] ?>/product/details/<?= $product->id ?>"><?= $product->name ?></a></h4>
                                        <div class="price">
                                            <ul>
                                                <?php if ($product->has_promotion && $product->expiry_date > date("Y-m-d")) : ?>
                                                    <li>$ <?= $product->new_price ?></li>
                                                    <li class="discount">$ <?= $product->price ?></li>
                                                <?php else : ?>
                                                    <li>$ <?= $product->price ?></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endif;
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- End Nav Card -->
    </div>
</section>
<!-- Latest Products End -->