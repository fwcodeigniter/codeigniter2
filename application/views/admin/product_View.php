
<section id="cart_items">
    <div class="container">
        <div style="display: none;" id="success"><?php echo $this->session->flashdata('success'); ?></div>
        <div style="display: none;" id="fail"><?php echo $this->session->flashdata('fail'); ?></div>
        <!-- Form Thêm hàng hóa -->
        <div class="table-responsive cart_info">
            <button style="margin-bottom: 5px" type="button" class="btn btn-default hbtn" data-toggle="modal" data-target="#addPro">Thêm Hàng hóa</button>

            <div class="modal fade" id="addPro" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm Hàng hóa</h4>
                            <?php
                            if (isset($file_error)) {
                                echo $file_error;
                            }
                            ?>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="<?php echo $base_url; ?>admin/product/add" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xs-9">
                                        <input class="form-control hlineheight" type="text" name="txtName" placeholder="Tên Hàng hóa" pattern="+[a-zA-Z0-9]">
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <div class="row">
                                                    <label class="col-xs-2 control-label">Giá: </label> 
                                                    <div class="col-xs-8"><input class="form-control hlineheight" onchange="format_curency(this)" type="text" name="txtPrice" value="0" pattern="+[0-9]"></div>
                                                </div>
                                            </div>									
                                            <div class="col-xs-7">
                                                <div class="row">
                                                    <label class="col-xs-6 control-label">Số lượng Tồn: </label>
                                                    <div class="col-xs-4"><input class="form-control hlineheight" type="text" name="txtInventory" value="0" pattern="+[0-9]"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 hlineheight">
                                                <select class="form-control" name="txtCat"> <!--Nhóm hàng -->
                                                    <?php
                                                    if (isset($category)) {
                                                        foreach ($category as $key => $value) {
                                                            echo "<option value=" . $value->id . ">" . $value->name . "</option>";
                                                        }
                                                    } else {
                                                        echo '<option value="1">Chưa có nhóm hàng</option>';
                                                    }
                                                    ?>
                                                </select></div> <!-- END nhóm hàng -->
                                            <div class="col-xs-6 hlineheight">
                                                <select class="form-control" name="txtBrand"> <!--Thương hiệu-->
                                                    <?php
                                                    if (isset($brand)) {
                                                        foreach ($brand as $key => $value) {
                                                            echo "<option value=" . $value->id . ">" . $value->name . "</option>";
                                                        }
                                                    } else {
                                                        echo '<option value="1">Chưa có Thương hiệu</option>';
                                                    }
                                                    ?>
                                                </select></div> <!-- END thương hiệu -->
                                        </div>
                                        <textarea name="txtDesc" class="form-control" rows="3" placeholder="Mô tả"></textarea>
                                    </div>
                                    <div class="col-xs-3">
                                        <img src='<?php
                                                    if (isset($product["image"])) {
                                                        echo $base_url . "public/images/products/" . $product["image"];
                                                    }
                                                    ?>' id="img" class="img-responsive hlineheight" style="min-height: 110px">
                                        <div class="row">
                                            <input id="f" type="file" onchange="file_change(this, img)" style="display: none;" name="image" />
                                            <input type="button" class="btn btn-default col-xs-8 col-xs-offset-2" value="Chọn ảnh" onclick="document.getElementById('f').click()" />
                                        </div>
                                        <div class="row">
                                            <input type="submit" class="btn btn-primary col-xs-8 col-xs-offset-2" value="Lưu">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Load danh sách hàng hóa -->
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="price">Mã</td>
                        <td class="image">Tên Hàng hóa</td>
                        <td class="quantity">Thương hiệu</td>
                        <td class="quantity">Nhóm hàng</td>
                        <td class="price">Giá</td>
                        <td class="quantity">SL tồn</td>
                        <td class="total">SL bán</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>

                <tbody>

<?php
$num = 1;
foreach ($product as $key => $value):
    ?>
                        <tr>
                            <td class="cart_price">
                                <?php echo $value->id; ?>
                            </td>
                            <td class="cart_product">
                                <?php echo $value->name; ?>
                            </td>
                            <td class="cart_quantity">
                                <?php
                                if (isset($brand)) {
                                    foreach ($brand as $k => $v) {
                                        if ($v->id == $value->brand_id) {
                                            echo $v->name;
                                            break;
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td class="cart_quantity">
    <?php
    if (isset($category)) {
        foreach ($category as $k => $v) {
            if ($v->id == $value->cat_id) {
                echo $v->name;
                break;
            }
        }
    }
    ?>
                            </td>
                            <td class="cart_price">
                                <?php echo number_format($value->price,0,",","."); ?>
                            </td>

                            <td class="cart_quantity">
    <?php echo $value->inventory; ?>
                            </td>
                            <td class="cart_quantity">
                                <?php echo $value->sold; ?>
                            </td>
                            <td class="cart_edit">
                                <a class="cart_quantity_delete" data-toggle="modal" data-target="#editPro<?php echo $num; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                <div class="modal fade" id="editPro<?php echo $num; ?>" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Sửa Hàng hóa</h4>

                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="<?php echo $base_url; ?>admin/product/update/<?php echo $value->id; ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <input class="form-control hlineheight" type="text" name="txtName" placeholder="Tên Hàng hóa" value="<?php echo $value->name; ?>" pattern="+[a-zA-Z0-9]">
                                                            <div class="row">
                                                                <div class="col-xs-5">
                                                                    <div class="row">
                                                                        <label class="col-xs-2 control-label">Giá: </label> 
                                                                        <div class="col-xs-8"><input class="form-control hlineheight" type="text" name="txtPrice" value="<?php echo number_format($value->price, 0, ',', '.'); ?>" pattern="+[0-9]"></div>
                                                                    </div>
                                                                </div>									
                                                                <div class="col-xs-7">
                                                                    <div class="row">
                                                                        <label class="col-xs-6 control-label">Số lượng Tồn: </label>
                                                                        <div class="col-xs-4"><input class="form-control hlineheight" type="text" name="txtInventory" value="<?php echo $value->inventory; ?>" pattern="+[0-9]"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-6 hlineheight">
                                                                    <select class="form-control" name="txtCat"> <!--Nhóm hàng -->
    <?php
    if (isset($category)) {
        foreach ($category as $k => $v) {
            if ($v->id == $value->cat_id) {
                echo "<option value=" . $v->id . " selected>" . $v->name . "</option>";
            } else {
                echo "<option value=" . $v->id . ">" . $v->name . "</option>";
            }
        }
    } else {
        echo '<option value="1">Chưa có nhóm hàng</option>';
    }
    ?>
                                                                    </select></div> <!-- END nhóm hàng -->
                                                                <div class="col-xs-6 hlineheight">
                                                                    <select class="form-control" name="txtBrand"> <!--Thương hiệu-->
                                                                        <?php
                                                                        if (isset($brand)) {
                                                                            foreach ($brand as $k => $v) {
                                                                                if ($v->id == $value->brand_id) {
                                                                                    echo "<option value=" . $v->id . " selected>" . $v->name . "</option>";
                                                                                } else {
                                                                                    echo "<option value=" . $v->id . ">" . $v->name . "</option>";
                                                                                }
                                                                            }
                                                                        } else {
                                                                            echo '<option value="1">Chưa có Thương hiệu</option>';
                                                                        }
                                                                        ?>
                                                                    </select></div> <!-- END thương hiệu -->
                                                            </div>
                                                            <textarea name="txtDesc" class="form-control" rows="5" placeholder="Mô tả"></textarea>
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <img src='<?php echo $base_url . "public/images/products/" . $value->image; ?>' id="img<?php echo $num; ?>" class="img-responsive hlineheight" style="min-height: 110px" />
                                                            <div class="row">
                                                                <input id="f<?php echo $num; ?>" type="file" style="display: none;" onchange="file_change(this,<?php echo "img" . $num; ?>)"  name="image<?php echo $num; ?>" />
                                                                <input type="button" class="btn btn-default col-xs-8 col-xs-offset-2" value="Chọn ảnh" onclick="document.getElementById('<?php echo "f" . $num; ?>').click()" />
                                                                <input type="hidden" name="txtImage" value="<?php echo $value->image; ?>">
                                                                <input type="hidden" name="txtNum" value="<?php echo $num; ?>">
                                                            </div>
                                                            <div class="row">
                                                                <input type="submit" class="btn btn-primary col-xs-8 col-xs-offset-2" value="Lưu">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" data-toggle="modal" data-target="#dellPro<?php echo $num; ?>"><i class="fa fa-times"></i></a>
                                <div class="modal fade" id="dellPro<?php echo $num; ?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Thông báo</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="<?php echo $base_url; ?>/admin/product/drop/<?php echo $value->id; ?>">
                                                    <div class="row">
                                                        <h4 style="padding-left: 10px; margin-bottom: 10px;"><i>Bạn muốn xóa <?php echo $value->name; ?> ?</i></h4>
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
