
<?php 

   $open = "category";
   $open = "product";
   $open = "user";

   include 'connection.php';
   require_once __DIR__. '/../Libraries/database.php';
   require_once __DIR__. '/../Libraries/function.php';

   $db = new Database;
   include 'connection.php';
   
   $category = $db->fetchAll("category");
   // echo '<pre>' , var_dump($_POST['timkiem']) , '</pre>';die;
?>
<!DOCTYPE html>
<html>
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <!-- /Added by HTTrack -->
   <head>
      <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
      <meta charset="UTF-8" />
      <title>Fresh Mart</title>
      <meta name="description" />
      <meta name="keywords" />
      <!-- Hiển thị icon nhỏ khi lướt website -->
      <link href="Public/frontend/Uploads/shop2005/images/favicon.png" rel="shortcut icon" type="image/x-icon" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta property="fb:app_id" content="227481454296289" />
      <meta content="vi_VN" property="og:locale" />
      <meta content="website" property="og:type" />
      <meta content="SeaFood Store" property="og:title" />
      <meta property="og:description" />
      <meta content="Public/frontend/Uploads/shop2005/images/logo.png" property="og:image" />
      <!--CSS-->
      <style>
         .loader_overlay {
         position: fixed;
         z-index: 9999;
         width: 100%;
         height: 100%;
         left: 0;
         top: 0;
         background-color: #fff;
         -webkit-transition: all .1s ease;
         -o-transition: all .1s ease;
         transition: all .1s ease;
         opacity: 1;
         visibility: visible;
         }
         .loader_overlay.loaded {
         opacity: 0;
         visibility: hidden;
         z-index: -2;
         }
      </style>
      <!--END CSS-->
      <link rel="stylesheet" href="Public/frontend/assets/js/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="Public/frontend/assets/fonts/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="Public/frontend/assets/fonts/fonts-master/roboto.css">
      <!--JS-->
      <script src="Public/frontend/assets/js/plugin42e7.js?v=582"></script>
      <script src="Public/frontend/assets/js/option_selection.js"></script>
      <script src="Public/frontend/assets/js/api.jquery.js"></script>
      <script src="Public/frontend/assets/js/search.js"></script>
      <!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
      <script src="Public/frontend/../apis.google.com/js/platform.js" async="" defer=""></script>
      <script async="" defer="defer" data-target=".product-resize" data-parent=".products-resize" data-img-box=".image-resize" src="Public/frontend/assets/100004/js/fixheightproductv242e7.js?v=582"></script>
      <script src="Public/frontend/assets/js/scripts42e7.js?v=582"></script>
      <script src="Public/frontend/Scripts/common/mycard.js" type="text/javascript"></script>
      <script src="Public/frontend/Scripts/lazyLoad/jquery.lazyload.min.js" type="text/javascript"></script>
      <script src="Public/frontend/Scripts/angularJS/angular.min.js"></script>
      <script src="Public/frontend/Scripts/angularJS/angular-sanitize.min.js"></script>
      <script type="text/javascript" src="Public/frontend/Scripts/angular-loading-spinner/spin.min.js"></script>
      <script type="text/javascript" src="Public/frontend/Scripts/angular-loading-spinner/angular-spinner.min.js"></script>
      <script type="text/javascript" src="Public/frontend/Scripts/angular-loading-spinner/angular-loading-spinner.js"></script>
      <script src="Public/frontend/app/appMain.js"></script>
      <script src="Public/frontend/app/directives/directive.js"></script>
      <script src="Public/frontend/app/directives/angular-summernote.js"></script>
      <script src="Public/frontend/app/directives/paging.js"></script>
      <script src="Public/frontend/app/services/ajaxServices.js"></script>
      <script src="Public/frontend/app/services/alertsServices.js"></script>
      <link href="Public/frontend/App_Themes/style.css" rel="stylesheet" type="text/css" />
      <link href="Public/frontend/App_Themes/responsive.css" rel="stylesheet" type="text/css" />
   </head>
   <body ng-app="appMain" style="" cz-shortcut-listen="true">
      <div class="loader_overlay"></div>
      <div id="opacity" class=""></div>
      <div id="fb-root"></div>
      <script>
         (function (d, s, id) {
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) return;
             js = d.createElement(s); js.id = id;
             js.src = "../connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=227481454296289";
             fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script>
      <!-- Khung bao tất cả nội dung trang web -->
      <div class="wrapper">
      <!-- Header chứa menu, logo -->
      <div class="header">
         <script src="Public/frontend/Scripts/common/login.js" type="text/javascript"></script>
         <section class="top-link clearfix">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <ul class="nav navbar-nav topmenu-contact pull-left">
                        <li><i class="fa fa-phone"></i> <span>Hotline:0908 77 00 95</span></li>
                     </ul>
                     <ul class="nav navbar-nav navbar-right topmenu  hidden-xs hidden-sm">
                        <li class="order-check">
                           <a href="kiem-tra-don-hang.php">
                           <i class="fa fa-pencil-square-o"></i> Kiểm tra đơn hàng
                           </a>
                        </li>
                        
                        <?php 
                           
                           if(isset($_SESSION['member'] )){
                        ?>
                           <li class="order-check">
                              <a href="#"><i class="fa fa-user fa-fw"></i>
                              <?php 
                              echo $_SESSION['member']; 
                              ?>
                             
                              </a>  
                           </li>
                           <li class="order-check">
                           <a href="?login_user=dangxuat">Đăng xuất</a>
                        </li>
                        <?php
                           }else{
                        ?>
                        <li class="order-check">
                           <a href="dang-nhap.php">Đăng nhập</a>
                        </li>
                        <li class="order-check">
                           <a href="dang-ky.php">Đăng ký</a>
                        </li>
                        <?php
                        }
                        ?>
                     </ul>
                     <div class="show-mobile hidden-lg hidden-md">
                        
                        <div class="quick-access">
                           <div class="quickaccess-toggle">
                              <i class="fa fa-list"></i>
                           </div>
                           <div class="inner-toggle">
                              <ul class="links">
                                 <li><a id="mobile-wishlist-total" href="kiem-tra-don-hang.php" class="wishlist"><i class="fa fa-pencil-square-o"></i> Kiểm tra đơn hàng</a></li>
                                 <li><a href="gio-hang.php" class="shoppingcart"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Header -->
         <header id="header">
            <div id="header_main">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-3 col-md-3 col-sm-4 col-xs-8">
                        <!--logo-->
                        <h1 class="pull-left">
                           <a href="index.php" class="logo" title="SIÊU THỊ FRESH MART">
                              <!-- lOGO FRESHMART -->
                              <img src="Public/frontend/Uploads/images/logo.png" alt="" title="SIÊU THỊ FRESH MART">
                           </a>
                        </h1>
                        <!-- end logo -->
                     </div>
                     <div class="col-lg-6 col-md-5 col-sm-4 hidden-xs">
                        <!-- Search -->
                        <div class="search_box">
                        <form action="tim-kiem.php" method="POST">
                              <div class="search_wrapper">
                              
                                 <input type="text"  class="index_input_search"  placeholder="Nhập tìm kiếm....."  name="tukhoa" />
                                 
                                 <button class="btn_search_submit btn " type="submit"   name="timkiem"><span>Tìm ngay</span></button>
                              
                              </div>
                        </form>
                        </div>
                        <!-- End Search -->
                     </div>
                     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <!-- Cart -->
                        <div class="cart_header">
                           <a href="gio-hang.php" title="Giỏ hàng">
                           <span class="cart_header_icon"></span>
                           <span class="box_text">

                           <strong class="cart_header_count">Giỏ hàng 
                              <span>
                                 (0)
                              </span></strong>
                              
                           <span class="cart_price">0d</span>
                           </span>
                           
                           </a>
                           <div class="cart_clone_box">
                              <div class="cart_box_wrap hidden">
                                 <div class="cart_item original clearfix">
                                    <div class="cart_item_image"></div>
                                    <div class="cart_item_info">
                                       <p class="cart_item_title"><a href="#" title=""></a></p>
                                       <span class="cart_item_quantity"></span>
                                       <span class="cart_item_price"></span>
                                       <span class="remove"></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="cart_header_top_box">
                              <div class="cart_empty">Giỏ hàng của bạn vẫn chưa có sản phẩm nào.</div>
                           </div>
                        </div>
                        <!-- End Cart -->
                        <!-- Account -->
                        
                        <!-- End account -->
                     </div>
                  </div>
               </div>
            </div>
            <div id="header_mobile">
               <div class="container">
                  <div class="row">
                     <!-- Menu mobile -->
                     <button type="button" class="navbar-toggle collapsed" id="trigger_click_mobile">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     </button>
                     <div id="mobile_wrap_menu" class="visible-xs visible-sm">
                        <div class="user_mobile">
                           <div class="icon_user_mobile">
                              <img src="Public/frontend/assets/images/user_mobile.png" alt="account">
                           </div>
                           <div class="login_mobile">
                              <a href="dang-nhap.php" class="login-btn">Đăng nhập </a><a href="dang-ky.php" class="login-btn"> / Đăng ký</a>
                           </div>
                           <div class="close_menu"></div>
                        </div>
                        <div class="content_menu">
                           <ul>
                              <li class="level0"><a class='' href='index.php'><span>Trang chủ</span></a></li>
                              <li class="level0"><a class='' href='gioi-thieu.php'><span>Giới thiệu</span></a></li>
                              <li class="level0"><a class='' href='san-pham.php'><span>Sản phẩm</span></a></li>
                              <li class="level0"><a class='' href='tin-tuc.php'><span>Tin tức</span></a></li>
                              <li class="level0"><a class='' href='lien-he.php'><span>Liên hệ</span></a></li>
                           </ul>
                        </div>
                     </div>
                     <!-- End menu mobile -->
                     <div class="pull-right mobile-menu-icon-wrapper">
                        <!-- Logo mobile -->
                        <div class="logo logo-mobile">
                           <a href="index.php" title="">
                           <img src="Public/frontend/Uploads/images/logo.png" alt="">
                           </a>
                        </div>
                        <!-- End Logo mobile -->
                        <!-- Cart mobile -->
                        <div class="cart_header" id="cart-target">
                           <a href="gio-hang.php" title="Giỏ hàng">
                              <div class="cart_header_icon"></div>
                              <div class="box_text">
                                 <strong class="cart_header_count"><span>0</span></strong>
                              </div>
                           </a>
                        </div>
                        <!-- End Cart mobile -->
                     </div>
                     <div class="clearfix"></div>
                     <!-- Search mobile -->
                     <div class="search_mobile col-md-12">
                        <div class="search_box">
                           <div class="search_wrapper">
                              <input type="text" name="search" class="index_input_search" id="txtsearch2" onblur="if(this.value=='')this.value='Nhập từ khóa tìm kiếm...'"
                                 onfocus="if(this.value=='Nhập từ khóa tìm kiếm...')this.value=''" value="Nhập từ kh&#243;a t&#236;m kiếm..." />
                              <button class="btn_search_submit btn " type="button" id="btnsearch2"><span><i class="fa fa-search"></i></span></button>
                           </div>
                        </div>
                     </div>
                     <!-- End search mobile -->
                  </div>
               </div>
            </div>
         </header>
         <!-- End header -->

         <!--Template--
            --End-->
         <!-- Main menu -->
         <nav class="navbar-main">
            <div id="mb_mainnav">
               <div class="container">
                  <div class="row">
                     <div class="col-md-3 col-sm-12 col-xs-12 vertical_menu">
                        <div id="mb_verticle_menu" class="menu-quick-select">
                           <div class="title_block">
                              <span>Danh mục sản phẩm</span>
                           </div>
                           <div id="menuverti" class="block_content navbar_menuvertical">
                              <ul class='nav_verticalmenu'>
                                 <?php foreach ($category as $item): ?>
                                    <li class="level0" >
                                       <!-- Tên danh mục -->
                                       <a class='' href='danh-muc-san-pham.php?id=<?php echo $item['id']?>'> 
                                          <img src="http://localhost:8080/websieuthi/Public/frontend/Uploads/images/logo_product/<?php echo $item['image'] ?>" width="25" height="25" >
                                          <?php echo $item['name']?>
                                       </a>

                                    </li>
                                 <?php endforeach ?>  
                              </ul class='nav_verticalmenu'>
                           </div>
                        </div>
                     </div>
                     <nav class="col-md-9 col-sm-12 col-xs-12 p-l-0">
                        <ul class='menu nav navbar-nav menu_hori'>
                        <li class="level0"><a class='' href='index.php'><span>Trang chủ</span></a></li>
                        <li class="level0"><a class='' href='gioi-thieu.php'><span>Giới thiệu</span></a></li>
                        <li class="level0"><a class='' href='san-pham.php'><span>Sản phẩm</span></a></li>
                        <li class="level0"><a class='' href='tin-tuc.php'><span>Tin tức</span></a></li>
                        <li class="level0"><a class='' href='lien-he.php'><span>Liên hệ</span></a></li>
                        </ul class='menu nav navbar-nav menu_hori'>
                     </nav>
                  </div>
               </div>
            </div>
         </nav>
         <!-- End main menu -->
         <script type="text/javascript">
            $(document).ready(function () {
                var str = location.href.toLowerCase();
                $("ul.menu li a").each(function () {
                    if (str.indexOf(this.href.toLowerCase()) >= 0) {
                        $("ul.menu li").removeClass("active");
                        $(this).parent().addClass("active");
                    }
                });
            });
         </script>
      </div>