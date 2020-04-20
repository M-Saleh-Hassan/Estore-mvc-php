<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="<?= $GLOBALS['home_path'] ?>/public/assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Orders</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- slider Area End-->
<div class="box-body no-padding">
    <table class="table table-striped">
        <tbody>
            <tr>
                <th style="width: 10px">#</th>
                <th>Ordered date</th>
                <th>Required date</th>
                <th style="width: 20px">Customer</th>
                <th style="width: 20px">Status</th>
            </tr>
            <?php
            foreach ($data['orders'] as $order) {
                ?>
                <tr>
                    <td><?= $order->id ?></td>
                    <td><?= $order->date_ordered ?></td>
                    <td><?= $order->date_required ?></td>
                    <td><a href="<?= $GLOBALS['url_path'] ?>/user/info/<?= $order->customer_id ?>"><button type="button" class="btn btn-block btn-primary btn-lg"> Profile</button></a></td>
                    <td><?=$order->status?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>