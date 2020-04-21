<!-- slider Area Start-->
<div class="slider-area ">
  <!-- Mobile Menu -->
  <div class="single-slider slider-height2 d-flex align-items-center" data-background="<?= $GLOBALS['home_path'] ?>/public/assets/img/hero/category.jpg">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="hero-cap text-center">
            <h2>Shop Products</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<div class="container">
  <div class="row align-items-center">
    <div class="col-lg-12 col-md-12 text-center">
      <a href="<?=$GLOBALS['url_path']?>/product/create"><button style="width: 40%;" type="button" class="btn btn-block btn-primary btn-lg">Add New Product</button></a> 
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
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Category</th>
        <th style="width: 20px">ِAdd Promotion</th>
        <th style="width: 20px">Report</th>
        <th style="width: 20px">edit</th>
        <th style="width: 20px">delete</th>
      </tr>
      <?php
        foreach ($data['products'] as $product) {
          ?>
          <tr>
            <td><?=$product->id?></td>
            <td><?=$product->name?></td>
            <td><?=$product->price?> $</td>
            <td><?=$product->quantity?></td>
            <td><?=$product->category?></td>
            <td><a href="<?=$GLOBALS['url_path']?>/product/promotion/<?=$product->id?>"><button type="button" class="btn btn-block btn-primary btn-lg">promotion</button></a></td>
            <td><a href="<?=$GLOBALS['url_path']?>/product/report/<?=$product->id?>"><button type="button" class="btn btn-block btn-primary btn-lg"> details</button></a></td>
            <td>
              <a href="<?=$GLOBALS['url_path']?>/product/edit/<?=$product->id?>"><button type="button" class="btn btn-block btn-primary btn-lg"> Edit</button></a> 
            </td>
            <td>
              <a href="<?=$GLOBALS['url_path']?>/product/delete/<?=$product->id?>"><button type="button" class="btn btn-block btn-primary btn-lg"> Delete</button></a> 
            </td>
          </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
</div>
