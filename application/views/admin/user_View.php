
<section id="cart_items">
    <div class="container">
        <div style="display: none;" id="success"><?php echo $this->session->flashdata('success'); ?></div>
        <div style="display: none;" id="fail"><?php echo $this->session->flashdata('fail'); ?></div>
        <!-- Thêm người dùng -->
        <div class="table-responsive cart_info">
            <button style="margin-bottom: 5px" type="button" class="btn btn-default hbtn" data-toggle="modal" data-target="#addUser">Thêm Người dùng</button>

            <div class="modal fade" id="addUser" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm Người dùng</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="<?php echo $base_url; ?>/admin/user/add" method="POST">
                                <div class="row hlineheight">
                                    <div class="col-xs-5">
                                        <input class="form-control" type="text" name="txtUser" placeholder="Tên đăng nhập" required pattern="/+[a-zA-Z0-9]/" />
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="input-group">
                                            <input id="userpass" class="form-control" type="password" name="txtPass" placeholder="Mật khẩu" required pattern="/+[a-zA-Z0-9]{6,32}/">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" onmouseenter="showPass()" onmouseout="hidePass()"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <label>Admin  </label>
                                        <input type="checkbox" name="txtPermission">
                                    </div>
                                </div>
                                <div class="row hlineheight">
                                    <div class="col-xs-6">
                                        <input class="form-control" type="text" name="txtName" placeholder="Tên hiển thị" pattern="/+[a-zA-Z0-9]/" />
                                    </div>
                                    <div class="col-xs-6">
                                        <input class="form-control" type="text" name="txtPhone" placeholder="Số điện thoại" pattern="^0+[0-9]{9,10}" />
                                    </div>
                                </div>
                                <div class="row hlineheight">
                                    <div class="col-xs-12"><input class="form-control" type="email" placeholder="Email" required name="txtEmail" />
                                    </div>
                                </div>
                                <div class="row hlineheight">
                                    <div class="col-xs-12"><input class="form-control" type="text" placeholder="Địa chỉ" name="txtAddress" />
                                    </div>
                                </div>
                                <div class="row hlineheight">
                                    <div class="col-xs-offset-6 col-xs-3">
                                        <input class="form-control hbtn" type="reset" class="btn btn-default" value="Nhập lại">
                                    </div>
                                    <div class="col-xs-3">
                                        <input class="form-control hbtn" type="submit" class="btn btn-default" value="Lưu">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="">Mã</td>
                        <td class="">Tên Đăng nhập</td>
                        <td class="">Tên Hiển thị</td>
                        <td class="">Số điện thoại</td>
                        <td class="">Địa chỉ</td>
                        <td class="">Email</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $num = 1;
                    foreach ($user as $key => $value):
                        ?>
                        <tr>
                            <td class="">
    <?php echo $value->id; ?>
                            </td>
                            <td class="">
    <?php echo $value->name; ?>
                            </td>
                            <td class="">
    <?php echo $value->dname; ?>
                            </td>
                            <td class="">
    <?php echo $value->phone; ?>
                            </td>
                            <td class="">
    <?php echo $value->address; ?>
                            </td>
                            <td class="">
    <?php echo $value->email; ?>
                            </td>
                            <td class="cart_edit">
                                <a class="cart_quantity_delete" data-toggle="modal" data-target="#editUser<?php echo $num; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                <div class="modal fade" id="editUser<?php echo $num; ?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Sửa thông tin Tài khoản</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="<?php echo $base_url; ?>/admin/user/update" method="POST">
                                                    <div class="row hlineheight">
                                                        <div class="col-xs-5">
                                                            <input class="form-control" type="text" name="txtUser" placeholder="Tên đăng nhập" value="<?php echo $value->name; ?>" disabled/>
                                                        </div>
                                                        <div class="col-xs-5">
                                                            <div class="input-group">
                                                                <input id="userpass" class="form-control" type="password" name="txtPass" placeholder="Mật khẩu">
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" onmouseenter="showPass()" onmouseout="hidePass()"></span></span>
                                                                <input type="hidden" name="txtPass2" value="<?php $value->pass; ?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2">
                                                            <label>Admin  </label>
                                                            <input type="checkbox" name="txtPermission" <?php echo ($value->permission == 0) ? 'checked' : ''; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="row hlineheight">
                                                        <div class="col-xs-6">
                                                            <input class="form-control" type="text" name="txtName" placeholder="Tên hiển thị" value="<?php echo $value->dname; ?>"/>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <input class="form-control" type="text" name="txtPhone" placeholder="Số điện thoại" pattern="^0+[0-9]{9,10}" value="<?php echo $value->phone; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="row hlineheight">
                                                        <div class="col-xs-12"><input class="form-control" type="email" placeholder="Email" required name="txtEmail" value="<?php echo $value->email; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="row hlineheight">
                                                        <div class="col-xs-12"><input class="form-control" type="text" placeholder="Địa chỉ" name="txtAddress" value="<?php echo $value->address; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="row hlineheight">
                                                        <div class="col-xs-offset-6 col-xs-3">
                                                            <input class="form-control hbtn" type="reset" class="btn btn-default" value="Nhập lại">
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <input class="form-control hbtn" type="submit" class="btn btn-default" value="Lưu">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                <form class="form-horizontal" action="<?php echo $base_url; ?>/admin/user/drop/<?php echo $value->id; ?>">
                                                    <div class="row">
                                                        <h4 style="padding-left: 10px; margin-bottom: 10px;"><i>Bạn muốn xóa Người dùng <?php echo $value->name; ?> ?</i></h4>
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
