<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="<?= $GLOBALS['home_path'] ?>/public/assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>product list</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!-- product list part start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="product_sidebar">
                    <div class="single_sedebar">
                        <form action="#" method="get">
                            <input type="text" name="search" placeholder="Search keyword and press enter">
                            <i class="ti-search"></i>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <section class="latest-product-area padding-bottom">
                    <div class="container">

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
                                                            <ul>
                                                                <?php if ($product->has_promotion && $product->expiry_date > date("Y-m-d")) : ?>
                                                                    <li>$ <?= $product->new_price ?></li>
                                                                    <li class="discount">$ <?= $product->price ?></li>
                                                                <?php else : ?>
                                                                    <li>$ <?= $product->price ?></li>
                                                                <?php endif; ?>
                                                            </ul>
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


                        </div>
                        <!-- End Nav Card -->
                    </div>
                </section>

            </div>
        </div>
    </div>
</section>
<!-- product list part end-->