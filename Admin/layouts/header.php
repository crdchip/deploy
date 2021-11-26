<?php 


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Trang quản trị</title>

    <!-- Core CSS - Include with every page -->
    <link href="http://localhost:8080/websieuthi/Public/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost:8080/websieuthi/Public/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="http://localhost:8080/websieuthi/Public/admin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="http://localhost:8080/websieuthi/Public/admin/css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link rel="stylesheet" href="http://localhost:8080/websieuthi/Public/admin/css/sb-admin.css">

</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost:8080/websieuthi/index.php">Siêu thị Fresh Mart</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <span>Xin chào : </span> <p> <?php echo $_SESSION["dangnhap"] ?> </p>
                    </a>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Tìm kiếm...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="../../index.php"><i class="fa fa-dashboard fa-fw"></i> Trang chủ</a>
                        </li>
                        <li > 
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Danh sách danh mục <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/../websieuthi/admin/modules/category/index.php">Danh sách mục sản phẩm</a>
                                </li>
                                <li>
                                    <a href="/../websieuthi/admin/modules/product/index.php">Sản phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Quản lý đơn hàng <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="http://localhost:8080/websieuthi/Admin/modules/manage_order/list_order.php">Liệt kê đơn hàng</a>
                                </li>
                                <li>
                                    <a href="http://localhost:8080/websieuthi/Admin/modules/manage_order/order.php">Đơn hàng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Tài khoản Admin <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?login=dangxuat">Đăng xuất</a>
                                </li>
                                <li>
                                    <a href="#">Tài khoản</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>