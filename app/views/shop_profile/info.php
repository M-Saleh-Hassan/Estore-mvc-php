<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="<?= $GLOBALS['home_path'] ?>/public/assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Shop Info</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->
<?php
if (!empty($data['success'])) {
    ?>
    <div class="alert alert-success" role="alert">
        <?= $data['success'] ?>
    </div>
<?php
}

?>
<section class="about_us" style="padding-top: 100px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="about_us_content text-center">
                    <h5>Shop Name: <?= $data['user']->shop_name ?></h5>
                    <h5>Shop Description: <?= $data['user']->shop_description ?></h5>
                    <h5>Shop Category: <?= $data['user']->shop_category ?></h5>
                </div>
            </div>
        </div>
    </div>
</section>

<br><br>
<div class="box-body no-padding">
  <table class="table table-striped">
    <tbody>
      <tr>
        <th style="width: 10px">#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th style="width: 30px">View</th>
      </tr>
      <?php
        foreach ($data['products'] as $product) {
          ?>
          <tr>
            <td><?=$product->id?></td>
            <td><?=$product->name?></td>
            <td><?=$product->price?> $</td>
            <td><?=$product->category?></td>
            <td><a href="<?=$GLOBALS['url_path']?>/product/details/<?=$product->id?>"><button type="button" class="btn btn-block btn-primary btn-lg">View</button></a></td>
          </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
</div>

<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Get in Touch</h2>
            </div>
            <div class="col-lg-12">
                <form class="form-contact contact_form" action="<?= $GLOBALS['url_path'] ?>/message/send/<?= $data['user']->seller_id ?>" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="message" cols="30" rows="9" placeholder=" Enter Message" required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="subject" id="subject" type="text" placeholder="Enter your subject" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="email" id="email" type="email" placeholder="Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" value="Send" class="button button-contactForm boxed-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->