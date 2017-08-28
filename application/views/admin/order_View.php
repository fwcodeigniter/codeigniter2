
<section id="cart_items">
    <div class="container">
        <div style="display: none;" id="success"><?php echo $this->session->flashdata('success'); ?></div>
        <div style="display: none;" id="fail"><?php echo $this->session->flashdata('fail'); ?></div>
        <!-- Form Thêm hàng hóa -->

        <div class="table-responsive cart_info">
            <div class="modal-header">

                <h4 class="modal-title" align="center">Danh Sách Hàng hóa </h4>			


            </div><div align="right"><h5><b>Tổng số dòng: <?php echo count($order); ?></b></h5></div>


            <!-- Load danh sách hàng hóa -->
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="price">Mã hàng</td>
                        <td class="image">Tên hàng</td>
                        <td class="quantity">Tổng số lượng</td>
                        <td class="quantity">Tổng thành tiền</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $num = 1;
                    $total = 0;
                    $total_amount = 0;
                    foreach ($order as $key => $value):
                        ?>
                        <tr>
                            <td class="cart_transaction">
                                <?php echo $value['id_product']; ?>
                            </td>
                            <td class="cart_description">
                                <?php
                                foreach ($product as $v) {
                                    if ($value['id_product'] == $v->id) {
                                        echo $v->name;
                                        break;
                                    }
                                }
                                ?>
                            </td>
                            <td class="cart_description">
                                <?php echo number_format($value['TongSL']);
                                        $total += $value['TongSL'];
                                ?> 
                            </td>
                            <td class="cart_description">
                                <?php echo number_format($value['TongTT']); 
                                        $total_amount += $value['TongTT'];
                                ?>
                            </td>
                        </tr>
                        <?php
                        $num++;
                    endforeach;
                    ?>     
                        <tr class="cart_menu" style="background-color: gray;">
                        <td class="price"></td>
                        <td class="image"></td>
                        <td class="quantity">Tổng số lượng: <?php echo number_format($total);?></td>
                        <td class="quantity">Tổng thành tiền: <?php echo number_format($total_amount);?></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</section>
