<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="<?= $GLOBALS['home_path'] ?>/public/assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Cart Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!--================Cart Area =================-->
<?php 
if(count($data['cart_products']) > 0) {
    $subtotal = 0;
?>
<section class="cart_area section_padding">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:30%">Product</th>
                            <th style="width:20%">Price</th>
                            <th style="width:20%">Quantity</th>
                            <th style="width:20%">Total</th>
                            <th style="width:10%">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="<?=$GLOBALS['url_path'].'/cart/update'?>" method="POST">
                            <?php
                                foreach ($data['cart_products'] as $item) {
                                    $subtotal+= $item['price']*$item['quantity'];
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="<?=$GLOBALS['home_path'] . '/../' . $item['image']?>" alt="" />
                                                </div>
                                                <div class="media-body">
                                                    <p><?=$item['name']?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>$<?=$item['price']?></h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <!-- <span class="input-number-decrement"> <i class="ti-minus"></i></span> -->
                                                <input class="input-number" name="product_<?=$item['id']?>" type="number" value="<?=$item['quantity']?>" min="0" max="10">
                                                <!-- <span class="input-number-increment"> <i class="ti-plus"></i></span> -->
                                            </div>
                                        </td>
                                        <td>
                                            <h5>$<?=$item['price']*$item['quantity']?></h5>
                                        </td>
                                        <td>
                                            <a class="btn_1" href="<?=$GLOBALS['url_path'].'/cart/delete/'.$item['id']?>">Remove Product</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            ?>
                            
                            <tr class="bottom_button">
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Total</h5>
                                </td>
                                <td>
                                    <h5>$<?=$subtotal?></h5>
                                </td>
                                <td>
                                    <input type="submit" name="action" value="Update Cart" class="btn_3">
                                </td>
                            </tr>
                        </form>
                        <!-- <tr class="shipping_area">
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Shipping</h5>
                            </td>
                            <td>
                                <div class="shipping_box">
                                    <ul class="list">
                                        <li>
                                            Flat Rate: $5.00
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                        <li>
                                            Free Shipping
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                        <li>
                                            Flat Rate: $10.00
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                        <li class="active">
                                            Local Delivery: $2.00
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                    </ul>
                                    <h6>
                                        Calculate Shipping
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </h6>
                                    <select class="shipping_select">
                                        <option value="1">Bangladesh</option>
                                        <option value="2">India</option>
                                        <option value="4">Pakistan</option>
                                    </select>
                                    <select class="shipping_select section_bg">
                                        <option value="1">Select a State</option>
                                        <option value="2">Select a State</option>
                                        <option value="4">Select a State</option>
                                    </select>
                                    <input class="post_code" type="text" placeholder="Postcode/Zipcode" />
                                    <a class="btn_1" href="#">Update Details</a>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
                <div class="checkout_btn_inner float-right">
                    <a class="btn_1" href="<?=$GLOBALS['url_path'].'/store/index'?>">Continue Shopping</a>
                    <a class="btn_1 checkout_btn_1" href="<?=$GLOBALS['url_path'].'/store/checkout'?>">Proceed to checkout</a>
                </div>
            </div>
        </div>
</section>
<?php
} else {
?>
<h1>
    No Products in your cart
</h1>
<?php
}
?>