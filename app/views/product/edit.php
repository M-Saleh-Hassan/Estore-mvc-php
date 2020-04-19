
<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="<?=$GLOBALS['home_path']?>/public/assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Edit Product</h2>
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
                        <h3><?=$data['product']->name?></h3>
                        <form class="row contact_form" action="#" method="post" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" name="name"  value="<?=$data['product']->name?>" placeholder="Product Name" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <textarea class="form-control"  name="description" placeholder="Product Description" required><?=$data['product']->description?></textarea>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="number" class="form-control" min="1" name="price" value="<?=$data['product']->price?>" placeholder="Product Price" required>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="number" class="form-control" min="0" name="quantity" value="<?=$data['product']->quantity?>" placeholder="Product Quantity" required>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control"  name="category" value="<?=$data['product']->category?>" placeholder="Product Category" required>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="file" class="form-control"  name="image">
                                <img src="<?=$GLOBALS['home_path'] . '/../' . $data['product']->image?>">
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
