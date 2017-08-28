<?php
/* Phần này dùng để check sự tồn tại của các biến trong trang
  Nếu biến nào không tồn tại sẽ đặt giá trị mặc định để tránh lỗi */
if (!isset($product)) {
    $product = array('fail' => 'Không có sản phẩm');
}
?>
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <!-- <h2 class="title text-center"></h2> -->
        <?php foreach ($product as $key => $value): ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <form action="<?php echo $base_url; ?>home/addtocart" method="POST">
                            <input type="hidden" name="txtId" value="<?php echo $value->id; ?>" />
                            <input type="hidden" name="txtPrice" value="<?php echo $value->price; ?>" />
                            <input type="hidden" name="txtName" value="<?php echo $value->name; ?>" />
                            <div class="productinfo text-center">
                                <img src="<?php echo $base_url; ?>public/images/products/<?php echo $value->image; ?>" alt="">
                                <h2><?php echo number_format($value->price, 0, '.', ','); ?></h2>
                                <p><?php echo $value->name; ?></p>
                                <button name="isOK" type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <a href="<?php echo $base_url.'home/product/'.$value->id; ?>">
                                    <h2><?php echo number_format($value->price, 0, '.', ','); ?></h2>
                                    <p><?php echo $value->name; ?></p>
                                    <button name="isOK1" type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
        <!--features_items-->



    </div>
</div>
</section>