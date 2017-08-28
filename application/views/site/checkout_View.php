<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url(); ?>">Trang chủ</a></li>
                <li class="active">Thanh toán</li>
            </ol>
        </div><!--/breadcrums-->
        <div class="review-payment">
            <h2>Thông tin đơn hàng và thanh toán</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image"></td>
                        <td class="description">Sản phẩm</td>
                        <td class="price">Đơn giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Thành tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $total_amount = 0; ?>
                    <?php foreach ($carts as $rows): ?>
                        <?php $total_amount += $rows['subtotal']; ?>
                        <tr>
                            <td class="cart_product">
                                <h4><a href=""</a></h4>
                            </td>
                            <td class="cart_description">
                                <h4><a href=""><?php echo $rows['name']; ?></a></h4>
                            </td>
                            <td class="cart_price">
                                <p><?php echo number_format($rows['price']); ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">

                                    <input class="cart_quantity_input" type="text" name="qty_<?php echo $rows['id']; ?>" value="<?php echo $rows['qty']; ?>" autocomplete="off" size="2">

                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"><?php echo number_format($rows['subtotal']); ?> VNĐ</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="<?php echo base_url('cart/del/' . $rows['id']); ?>"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
        <div class="shopper-informations">
            <div class="row">
<form method="post" action="<?php echo base_url('cart/checkout') ?>">  
                <div class="col-sm-8">
                    <div class="bill-to">

                        <div class="form-one">
                            <p>Thông tin khách hàng</p>
                            <input type="hidden" name="txtId" value="<?php echo isset($user['id']) ? $user['id'] : ''; ?>"/>
                            <tr><input class="form-control hlineheight" type="text" name="txtName" value="<?php echo isset($user['name']) ? $user['name'] : ''; ?>" placeholder="Nhập họ tên"></tr>
                            <tr><input class="form-control hlineheight" type="text" name="txtEmail" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>" placeholder="Nhập địa chỉ Email"></tr>
                            <tr><input class="form-control hlineheight" type="text" name="txtPhone" value="<?php echo isset($user['phone']) ? $user['phone'] : ''; ?>" placeholder="Nhập số điện thoại"></tr>
                            <tr><input class="form-control hlineheight" type="text" name="txtAddress" value="<?php echo isset($user['address']) ? $user['address'] : ''; ?>" placeholder="Nhập địa chỉ nhận hàng"></tr>
                            <tr><input class="form-control" type="text" name="txtMessage" value="" placeholder="Ghi chú thông tin giao hàng"></tr>
                        </div>
                        <div class="form-two">
                            <p> Phương thức thanh toán </p>

                            <select name="txtPayment">
                                <option value="Tiền mặt">-- Thanh toán khi nhận hàng --</option>
                                <option value="online">-- Thanh toán online --</option>
                            </select>

                           
                        </div>
                    </div>
                </div>
                <div class="col-sm-4"	>
                    <div class="total_area">
                        <p style= "color: #696763; font-size: 20px;font-weight: 300;"> Thông tin đơn hàng </p>
                        <ul>
                            <li>Tạm tính<span><?php echo number_format($total_amount); ?> VNĐ</span></li>
                            <li>Phí vận chuyển <span>Miễn phí</span></li>
                            <li>Tổng tiền <span><?php echo number_format($total_amount); ?> VNĐ</span></li>
                            <input type="hidden" name="txtTotal" value="<?php echo $total_amount; ?>"
                        </ul>
                        <a class="btn btn-default update" href="<?php echo $base_url; ?>">Mua hàng tiếp </a>

                        <button type="submit" class="btn btn-default check_out" >Thanh toán</button>

                    </div>
                </div>
</form> 
            </div>
        </div>

    </div>




</section> <!--/#cart_items-->
