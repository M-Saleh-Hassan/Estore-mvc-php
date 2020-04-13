
<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="<?=$GLOBALS['home_path']?>/public/assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Create Customer Profile</h2>
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
            <div class="col-lg-12 col-md-12">
                <div class="login_part_form text-center">
                    <div class="login_part_form_iner">
                        <h3>Create Your Customer profile</h3>
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
                                <input type="text" class="form-control" name="first_name"  placeholder="First Name" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control"  name="last_name" placeholder="Last Name" required>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control"  name="email" placeholder="email" required>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control"  name="phone" placeholder="phone" required>
                            </div>
                            
                            <div class="col-md-12 form-group">
                                <input type="submit" name="action" value="Create" class="btn_3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
