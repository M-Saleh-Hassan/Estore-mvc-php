<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="<?= $GLOBALS['home_path'] ?>/public/assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Edit Promotion</h2>
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
                        <h3><?= $data['product']->name ?></h3>
                        <form class="row contact_form" action="#" method="post" enctype="multipart/form-data">
                            <?php
                            if (isset($data['error'])) {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $data['error'] ?>
                                </div>
                            <?php
                            }

                            ?>
                            <div class="col-md-12 form-group p_star">
                                <label>Allow Promotion</label><input type="checkbox" class="form-control" name="has_promotion"  <?php if ($data['product']->has_promotion) { ?>checked<?php } ?>>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="number" class="form-control" min="1" name="new_price" value="<?= $data['product']->new_price ?>" placeholder="Product New Price" required>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <label>Expiry Date</label>
                                <input type="date" class="form-control" name="expiry_date" value="<?= $data['product']->expiry_date ?>" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="submit" name="action" value="Edit" class="btn_3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>