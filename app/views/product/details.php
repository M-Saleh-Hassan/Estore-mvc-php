<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="<?= $GLOBALS['home_path'] ?>/public/assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>product Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="product_img_slide owl-carousel">
                    <div class="single_product_img">
                        <img src="<?= $GLOBALS['home_path'] . '/../' . $data['product']->image ?>" alt="#" class="img-fluid">
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-8">
                <div class="single_product_text text-center">
                    <h3><?= $data['product']->name ?></h3>
                    <p>
                        <?= $data['product']->description ?>
                    </p>
                    <div class="card_area">
                        <form action="#" method="post">
                            <div class="product_count_area">
                                <p>Quantity</p>
                                <div class="product_count d-inline-block">
                                    <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                    <input class="product_count_item input-number" name="quantity" type="text" value="1" min="0" max="<?=$data['product']->quantity?>">
                                    <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                                </div>
                                <p>Price :  $<?= $data['product']->price ?></p>
                            </div>
                            <div class="add_to_cart">
                                <button class="btn_3">add to cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->