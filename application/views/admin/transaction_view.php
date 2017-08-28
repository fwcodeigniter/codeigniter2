
<section id="cart_items">
    <div class="container">
        <div style="display: none;" id="success"><?php echo $this->session->flashdata('success'); ?></div>
        <div style="display: none;" id="fail"><?php echo $this->session->flashdata('fail'); ?></div>
        <!-- Form Thêm hàng hóa -->

        <div class="table-responsive cart_info">
            <div class="modal-header">

                <h4 class="modal-title" align="center">Danh Sách Hóa Đơn </h4>			


            </div><div align="right"><h5><b>Tổng số : <?php echo count($transaction); ?></b></h5></div>


            <!-- Load danh sách hàng hóa -->
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="price">Mã Số</td>
                        <td class="image">Thành Viên</td>
                        <td class="quantity">Số Tiền</td>
                        <td class="quantity">Hình Thức</td>
                        <td class="price">Ghi Chú</td>
                        <td class="price">Trạng Thái</td>
                        <td class="price">Ngày Tạo</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $num = 1;
                    foreach ($transaction as $key => $value):
                        ?>
                        <tr>
                            <td class="cart_transaction">
                                <?php echo $value->id; ?>
                            </td>
                            <td class="cart_description">
                                <?php
                                    echo $value->name;
                                ?>
                            </td>
                            <td class="cart_description">
                                <?php echo number_format($value->amount); ?> đ
                            </td>
                            <td class="cart_description">
                                <?php echo $value->payment; ?>
                            </td>
                            <td class="cart_description">
                                <?php echo $value->message; ?>
                            </td>
                            <td class="cart_description">
                                <?php
                                if ($value->status == 0) {
                                    echo 'Chưa thanh toán';
                                } elseif ($value->status == 1) {
                                    echo 'Đã thanh toán';
                                } else {
                                    echo 'Thanh toán thất bại';
                                }
                                ?>
                            </td>

                            <td class="cart_description">
                                <?php echo $value->created; ?>
                            </td>

                            <td class="cart_edit">
                                <a class="cart_quantity_delete" data-toggle="modal" data-target="#editPro<?php echo $num; ?>"><i class="glyphicon glyphicon-th"></i></a>
                                <div class="modal fade" id="editPro<?php echo $num; ?>" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                <h4 class="modal-title">Chi tiết hóa đơn</h4>
                                                <b> 
                                                <?php
                                                echo 'Mã Thành viên: '.$value->id.' | '.'Tên Thành viên: '.$value->name; 
                                                ?>
                                                </b>
                                            </div>
                                            <table class="table table-condensed" style="margin-left: 5px; width: 98%;">
                                                <thead>
                                                    <tr class="cart_menu">
                                                        <td align="center">STT</td>
                                                        <td align="center">Tên sản phẩm</td>
                                                        <td align="center">Giá tiền vnđ</td>
                                                        <td align="center">Số lượng</td>
                                                        <td align="center">Thành tiền</td>
                                                    </tr>
                                                </thead> 
                                                <tbody>  
                                                  <?php
                                                  $stt = 1;
                                                  $total = 0;//Tổng tiền thanh toán
                      foreach ($order as $v){
                          if ($value->trac_id==$v->id_transaction){
                              echo '<tr>
                              <td>'.$stt.'</td>';
                              foreach ($product as $p){
                                  if($p->id == $v->id_product)
                                  {
                                      echo '<td>'.$p->name.'</td>';
                                      break;
                                  }
                              }
                              echo '<td>'.number_format($v->price).'</td>
                                    <td>'.$v->qty.'</td>
                                    <td>'.number_format($v->amount).'</td></tr>';
                              $total += $v->amount;
                          }
                      }
                                                  ?>
                                                </tbody>
                                            </table>
                                            <table class="table table-condensed" style="margin-left: 5px; width: 98%;">
                                                <thead>
                                                    <tr class="cart_menu">

                                                        <td align="right"><b>Tổng tiền thanh toán : <?php echo number_format($total); ?> đ</b></td>

                                                    </tr>


                                                </thead> </table></div>
                                    </div>
                                </div>
                            </td>


                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" data-toggle="modal" data-target="#delCat<?php echo $num; ?>"><i class="fa fa-times"></i></a>
                                <div class="modal fade" id="delCat<?php echo $num; ?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Thông báo</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="<?php echo $base_url; ?>/admin/transaction/drop/<?php echo $value->id; ?>">
                                                    <div class="row">
                                                        <h4 style="padding-left: 10px; margin-bottom: 10px;"><i>Bạn muốn xóa đơn hàng của <?php echo $value->name; ?> ?</i></h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-3 col-xs-offset-6">
                                                            <input class="form-control hbtn" type="submit" class="btn btn-default" value="Xác nhận">
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <input class="form-control hbtn" class="btn btn-default" type="button" data-dismiss="modal" value="Hủy">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
    <?php
    $num++;
endforeach;
?>     

                </tbody>
            </table>

        </div>
    </div>
</section>
