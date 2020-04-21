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
                    <h3>
                        <?= $data['product']->name ?>
                        <a class="float-right" href="<?= $GLOBALS['url_path'] ?>/user/info/<?= $data['shop_profile']->seller_id ?>" style="color: #635c5c;"><i class="fas fa-user"></i><?= $data['shop_profile']->shop_name ?></a>
                    </h3>
                    <p>
                        <?= $data['product']->description ?>
                    </p>
                    <div class="card_area">
                        <form action="#" method="post">
                            <div class="product_count_area">
                                <p>Quantity</p>
                                <div class="product_count d-inline-block">
                                    <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                    <input class="product_count_item input-number" name="quantity" type="text" value="1" min="0" max="<?= $data['product']->quantity ?>">
                                    <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                                </div>
                                <?php if ($data['product']->has_promotion && $data['product']->expiry_date > date("Y-m-d")) : ?>
                                    <p>Price : $<?= $data['product']->new_price ?></p>
                                <?php else : ?>
                                    <p>Price : $<?= $data['product']->price ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="add_to_cart">
                                <button class="btn_3">add to cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">

            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->
<div class="container">
    <h2 class="text-center">Reviews and Comments</h2>
    <?php
    foreach ($data['reviews'] as $review) :
        $customer_data = $this->model('CustomerProfile')->find($review->customer_id);
        $likes = $this->model('ReviewLike')->getReviewLikes($review->id);
        ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" />
                        <p class="text-secondary text-center"><?= $review->created_at ?></p>
                    </div>
                    <div class="col-md-10">
                        <p>
                            <a class="float-left" href="<?= $GLOBALS['url_path'] ?>/user/info/<?= $review->customer_id ?>" style="color: #635c5c;"><strong><?= $customer_data->first_name . ' ' . $customer_data->last_name ?></strong></a>
                            <?php for ($i = 0; $i < $review->rating; $i++) : ?>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                            <?php endfor; ?>
                        </p>
                        <div class="clearfix"></div>
                        <p><?= $review->comment ?></p>
                        <p>
                            <a href="<?= $GLOBALS['url_path'] ?>/review/like/<?= $review->id ?>" class="float-right btn text-white btn-danger" style="color: #fff;background-color: #dc3545;border-color: #dc3545;"> <i class="fa fa-heart"></i> Like <?= $likes ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php
    if (isset($data['ordered_before']) && $data['ordered_before']) :
        ?>
        <div class="comment-form">
            <h4>Leave a Reply</h4>
            <form class="form-contact comment_form" action="<?= $GLOBALS['url_path'] ?>/review/save/<?= $data['product']->id ?>" method="POST" id="commentForm">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment" required></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" name="rating" type="number" placeholder="Rate" min="1" max="5" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">Rate</button>
                </div>
            </form>
        </div>
    <?php endif; ?>
</div>