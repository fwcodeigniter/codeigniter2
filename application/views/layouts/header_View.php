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

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="<?php echo $base_url; ?>"><img src="<?php echo $base_url; ?>/public/images/home/logo.png" alt="" /></a>
                            </div>
                            <div class="btn-group pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                        Việt Nam
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">US</a></li>
                                        <li><a href="#">JP</a></li>
                                    </ul>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                        VNĐ
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Dollar</a></li>
                                        <li><a href="#">Yen</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                        <!-- <li><a href="#"><i class="fa fa-user"></i> Tài khoản</a></li> -->
                                    <li><a href="<?php echo $base_url; ?>checkout"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                    <li><a href="<?php echo $base_url; ?>cart"><i class="fa fa-shopping-cart"></i> Giỏ hàng
                                            <?php
                                            //Kiểm tra xem giỏ hàng có sản phẩm hay không và hiện thông tin số lượng hàng lên
                                            $cart_num = $this->cart->total_items();
                                            if ($cart_num != 0) {
                                                echo '(' . $cart_num . ')';
                                            }
                                            ?>
                                        </a></li>
                                    <?php
                                    $activeuser = $this->session->userdata('activeuser');
                                    if (isset($activeuser)):
                                        ?>
                                        <li class="dropdown"><a href=""><i class="fa fa-lock"></i><?php echo $activeuser['dname']; ?></a>
                                            <ul role="menu" class="sub-menu" style="width: 130%">
                                                <div id="taikhoan">
                                                    <div style="display: none;" id="success"><?php echo $this->session->flashdata('success'); ?></div>
                                                    <div style="display: none;" id="fail"><?php echo $this->session->flashdata('fail'); ?></div>
                                                    <li style="display: block; padding-bottom: 5px;"><a style=" background: none" href="" data-toggle="modal" data-target="#changepass">Đổi mật khẩu</a></li>

                                                    <li style="display: block; padding-bottom: 5px;"><a style=" background: none" href="<?php echo $base_url; ?>admin/signin/signout">Đăng xuất</a></li> 
                                                </div>
                                            </ul>
                                        </li>
                                    <?php else: ?>
                                        <li><a href="<?php echo $base_url; ?>admin/login"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

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
                                    <li><a href="<?php echo $base_url; ?>home" class="active">Home</a></li>
                                    <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="shop.html">Products</a></li>
                                            <li><a href="product-details.html">Product Details</a></li> 
                                            <li><a href="checkout.html">Checkout</a></li> 
                                            <li><a href="cart.html">Cart</a></li> 
                                            <li><a href="login.html">Login</a></li> 
                                        </ul>
                                    </li> 
                                    <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="blog.html">Blog List</a></li>
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                        </ul>
                                    </li> 
                                    <li><a href="404.html">404</a></li>
                                    <li><a href="contact-us.html">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="search_box pull-right">
                                <input type="text" placeholder="Tìm kiếm..."/>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Dialog Đổi mật khẩu-->
                <div class="modal fade" id="changepass" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Đổi mật khẩu</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" action="<?php echo $base_url; ?>admin/user/changepass" method="POST">
                                    <div class="row" style="padding-bottom: 5px">
                                        <div class="col-xs-3">
                                            <label class="form-control-static">Mật khẩu cũ: </label>
                                        </div>
                                        <div class="col-xs-9">
                                            <input class="form-control" type="password" name="txtOldPass" placeholder="Mật khẩu cũ" />
                                        </div>
                                    </div>
                                    <div class="row" style="padding-bottom: 5px">
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
                <!--End Dialog Đổi mật khẩu-->
            </div><!--/header-bottom-->
        </header><!--/header-->
