
<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="<?=$GLOBALS['home_path']?>/public/assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Complete Checkout</h2>
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
                        <h2>Checkout</h2>
                        <p>You can now choose date that this order will be delivered to you at.</p>
                        <a href="<?=$GLOBALS['url_path']?>/cart/index" class="btn_3">Check your cart again</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Final Checkout</h3>
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
                                <label>Required Date</label>
                                <input type="date" class="form-control" id="name" name="date_required" value="" placeholder="Username" required>
                            </div>
                            
                            <div class="col-md-12 form-group">
                                <input type="submit" name="action" value="Checkout" class="btn_3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

