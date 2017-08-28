<?php ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Thế giới Công nghệ</title>
        <link href="<?php echo $base_url; ?>/public/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $base_url; ?>/public/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo $base_url; ?>/public/css/prettyPhoto.css" rel="stylesheet">
        <link href="<?php echo $base_url; ?>/public/css/price-range.css" rel="stylesheet">
        <link href="<?php echo $base_url; ?>/public/css/animate.css" rel="stylesheet">
        <link href="<?php echo $base_url; ?>/public/css/main.css" rel="stylesheet">
        <link href="<?php echo $base_url; ?>/public/css/responsive.css" rel="stylesheet">
        <link href="<?php echo $base_url; ?>/public/css/hstyles.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="<?php echo $base_url; ?>/public/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $base_url; ?>/public/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $base_url; ?>/public/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $base_url; ?>/public/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo $base_url; ?>/public/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="<?php echo $base_url; ?>contruction"><i class="fa fa-phone"></i> +84 941 88 4568</a></li>
                                    <li><a href="<?php echo $base_url; ?>contruction"><i class="fa fa-envelope"></i> thienhoanguit@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?php echo $base_url; ?>contruction"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?php echo $base_url; ?>contruction"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="<?php echo $base_url; ?>contruction"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="<?php echo $base_url; ?>contruction"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="<?php echo $base_url; ?>contruction"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header_top-->


            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">

                                    <li class="dropdown active"><a href="#">Danh mục<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="<?php echo $base_url; ?>admin/category">Nhóm hàng</a></li>
                                            <li><a href="<?php echo $base_url; ?>admin/product">Hàng hóa</a></li> 
                                            <li><a href="<?php echo $base_url; ?>admin/user">Tài khoản</a></li>
                                            <li><a href="<?php echo $base_url; ?>admin/brand">Thương hiệu</a></li> 
                                        </ul>
                                    </li> 
                                    <li class="dropdown"><a href="#">Báo cáo<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="<?php echo $base_url; ?>admin/transaction/order">Theo sản phẩm</a></li>
                                            <li><a href="<?php echo $base_url; ?>admin/transaction">Theo hóa đơn</a></li>
                                        </ul>
                                    </li> 
                                    <div style="display: none;" id="success"><?php echo $this->session->flashdata('success'); ?></div>
                                    <div style="display: none;" id="fail"><?php echo $this->session->flashdata('fail'); ?></div>
                                    <li><a href="" data-toggle="modal" data-target="#changepass">Đổi mật khẩu</a></li>
                                    <div class="modal fade" id="changepass" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Đổi mật khẩu</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" action="<?php echo $base_url; ?>admin/user/changepass" method="POST">
                                                        <div class="row hlineheight">
                                                            <div class="col-xs-3">
                                                                <label class="form-control-static">Mật khẩu cũ: </label>
                                                            </div>
                                                            <div class="col-xs-9">
                                                                <input class="form-control" type="password" name="txtOldPass" placeholder="Mật khẩu cũ" />
                                                            </div>
                                                        </div>
                                                        <div class="row hlineheight">
                                                            <div class="col-xs-3">
                                                                <label class="form-control-static">Mật khẩu mới: </label>
                                                            </div>
                                                            <div class="col-xs-9">
                                                                <div class="input-group">
                                                                    <input type="hidden" name="txtId" value="<?php 
                                                                    $user = $this->session->userdata('activeuser');
                                                                    if (!empty($user)) {
                                                                        echo $user['id'];
                                                                    }
                                                                    ?>"/>
                                                                    <input class="form-control" type="password" name="txtPass" placeholder="Mật khẩu mới" pattern="+[a-zA-Z0-9]">
                                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open" onmouseenter="showPass()" onmouseout="hidePass()"></span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-3" style="float: right;">
                                                                <button type="submit" class="btn btn-default">Đổi mật khẩu</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <li><a href="<?php echo $base_url; ?>admin/signin/signout">Đăng xuất</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->