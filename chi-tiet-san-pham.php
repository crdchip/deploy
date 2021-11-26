<?php 
   $open = "product";
   $open = "category";
   
   require_once __DIR__. '/Libraries/database.php';
   require_once __DIR__. '/Libraries/function.php';
   
   $db = new Database;
   session_start();
   ob_start();
   $id = intval(getInput('id'));
   $product = $db->fetchID("product", $id);

   $sql = "SELECT * FROM product"
   
   //Lấy danh mục của sản phẩm
   
   
   ?>
<?php require_once __DIR__. '/Layouts/header.php'; ?>
<!-- Nôi dung chính -->
<div class="main">
<div class="container">
   <div class="row">
      <div class="col-md-9">
         <link href="Public/frontend/Scripts/smoothproducts/smoothproducts.css" rel="stylesheet" type="text/css">
         <script src="Public/frontend/Scripts/smoothproducts/smoothproducts.js" type="text/javascript"></script>
         <script src="Public/frontend/app/services/productServices.js"></script>
         <script src="Public/frontend/app/controllers/productController.js"></script>
         <div class="product-detail clearfix relative ng-scope" ng-controller="productController" ng-init="initController(46444)">
            <!--Begin-->
            <div class="clearfix">
               <div class="row">
                  <form action="themgiohang.php?id=<?php echo $item['id']?>" method="POST">
                     <div class="col-md-6 col-sm-6 col-xs-12 product-image clearfix">
                        <a href="" title="">
                        <img  src="http://localhost:8080/websieuthi/Public/frontend/Uploads/images/product/<?php echo $product['thunbar'] ?>" alt="" class="ing-rounded">
                        </a>
                     </div>
                     <div class="col-md-6 col-sm-6 col-xs-12 clearfix">
                        <div class="product-into text-center m-t-xxs-20">
                           <h3 class="pro-name">
                              <a href="" title=""><?php echo $product['name']; ?></a>
                           </h3>
                           <div class="pro-prices">
                              <span style="color: green;" class="pro-price" >Giá: <?php echo number_format($product['price']).'vnđ';  ?></span>
                           </div>
                           <div>
                              <span style="color: red;" class="pro-price" >Giảm giá: -<?php echo $product['sale'] ?>%</span>
                           </div>
                           <div>
                              <span style="color: green;" class="pro-price" >Số lượng: <?php echo $product['number'] ?></span>
                           </div>
                        </div>
                        <div class="product-code p-b-10 ">Mã SP: <?php echo $product['id'] ?></div>
                        <div class="des p-b-10 ng-binding">
                           <?php echo $product['content'] ?>
                        </div>
                        <div id="add-item-form" class="variants clearfix m-b-10 p-b-10">

                           <div class="button clearfix ng-scope" >
                              <div class="col-lg-6 col-sm-6 col-xs-6 col-xxs-12 p-l-0 p-r-xxs-0 m-b-10"> 
                                 <button type="button"  name="themgiohang" class="btn btn-success addCart" id="add-to-cart" ><a href="themgiohang.php?id=<?php echo $product['id']?>" style="color: #fff"><i class="glyphicon glyphicon-shopping-cart"></i> Thêm giỏ hàng</a></button>
                              </div>
                           </div>
                           <div class="call">
                              <p class="title">Để lại số điện thoại, chúng tôi sẽ tư vấn ngay sau từ 5 › 10 phút</p>
                              <div class="input">
                                 <div class="input-group">
                                    <input class="form-control ng-pristine ng-valid ng-touched" ng-model="CustomerPhone" onblur="if(this.value=='')this.value='Nhập số điện thoại...'" onfocus="if(this.value=='Nhập số điện thoại...')this.value=''" value="Nhập số điện thoại..." type="text">
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" ng-click="callMe()"><i class="fa fa-phone"></i> Gọi lại cho tôi</button>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div role="tabpanel" class="product_description product-tabs panel-group">
               <ul class="nav nav-tabs" role="tablist">
                  <!-- ngRepeat: item in ProductTabs -->
                  <li role="presentation"  class="ng-scope active">
                     <a data-toggle="tab" href="#tab1" role="tab" c>Chi tiết sản phẩm</a>
                  </li>
                  <!-- end ngRepeat: item in ProductTabs -->
               </ul>
               <div class="tab-content">
                  <!-- ngRepeat: item in ProductTabs -->
                  <div class="tab-pane fade in ng-scope active"  id="tab1" >
                     <div class="container-fluid rte " >
                        <ul>
                           <li><span>Tên sản phẩm : </span> <div><?php echo $product['name'] ?></div></li>
                        </ul>
                        <ul>
                           <li><span>Xuất xứ : </span> <div><?php echo $product['address'] ?></div></li>
                        </ul>
                        <ul>
                           <li><span>Hướng dẫn sử dụng : </span> <div><?php echo $product['note'] ?></div></li>
                        </ul>
                     </div>
                  </div>
                  <!-- end ngRepeat: item in ProductTabs -->
               </div>
            </div>
            <!--End-->
            <div class="modal fade" id="modalMyCart" tabindex="-1" role="dialog" aria-labelledby="modalMyCartLabel" aria-hidden="true">
               <div class="modal-dialog  modal-lg">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                        </button>
                        <h4 class="modal-title ng-binding" id="modalMyCartLabel">Bạn có  sản phẩm trong giỏ hàng.</h4>
                     </div>
                     <div class="modal-body">
                        <table class="table" style="width:100%;">
                           <thead>
                              <tr>
                                 <th></th>
                                 <th>Tên sản phẩm</th>
                                 <th>Số lượng</th>
                                 <th>Giá tiền</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                              <!-- ngRepeat: item in OrderDetails -->
                           </tbody>
                        </table>
                     </div>
                     <div class="modal-footer">
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="total-price-modal">
                                 Tổng cộng : <span class="item-total ng-binding">₫</span>
                              </div>
                           </div>
                        </div>
                        <div class="row margin-top-10">
                           <div class="col-lg-6">
                              <div class="comeback text-left">
                                 <a href="san-pham.php">
                                 <i class="fa fa-chevron-circle-left "></i> Tiếp tục mua hàng
                                 </a>
                              </div>
                           </div>
                           <div class="col-lg-6 text-right">
                              <div class="buttons btn-modal-cart">
                                 <a class="btn btn-default" href="/thanh-toan.php">
                                 Đặt hàng
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal fade" id="modalCallMe" tabindex="-1" role="dialog" aria-labelledby="modalCallMeLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-body">
                        <h2>Cám ơn Qúy Khách đã liên hệ đặt hàng</h2>
                        <p>Shop sẽ gọi lại để tư vấn cho Quý khách hàng trong thời gian sớm nhất</p>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                        OK
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="product-content product-other">
            <h1 title="products" class="page_heading ">
               Sản phẩm liên quan
            </h1>
            <div class="product_list grid clearfix">
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 product-wrapper zoomIn wow" style="visibility: hidden; animation-name: none;">
                  <div class="product-block product-resize m-b-20 fixheight" style="height: 295px;">
                     <div class="product-image image-resize" style="height: 208px;">
                        <div class="sold-out">Hot</div>
                        <a href="/san-pham/ hau-sua.html">
                        <img class="first-img" src="Public/frontend/Uploads/images/product/hau-sua-1_master.jpg" alt="Hàu sữa">
                        </a>
                        <div class="product-actions hidden-xs">
                           <div class="btn-add-to-cart" onclick="AddToCard(46475,1)">
                              <a href="javascript:void(0);"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                           </div>
                           <div class="btn_quickview">
                              <a class="quickview" href="/san-pham/ hau-sua.html"><i class="fa fa-eye"></i></a>
                           </div>
                        </div>
                     </div>
                     <div class="product-info text-center m-t-xxs-20">
                        <h3 class="pro-name">
                           <a href="" title="Hàu sữa">Hàu sữa</a>
                        </h3>
                        <div class="pro-prices">
                           <span class="pro-price">120.000&nbsp;₫</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-3">
         <div class="menu-product">
            <h3>
               <span>
               Sản phẩm
               </span>
            </h3>
            <ul class='nav_verticalmenu'>
            <?php foreach ($category as $product): ?>
            <li class="level0">
               <a class='' href='danh-muc-san-pham.php?id<?php echo $product['id']?>'><?php echo $product['name']?>
               </a>
            </li>
            <?php endforeach ?>  
            </ul class='nav_verticalmenu'>
         </div>
         <script type="text/javascript">
            $(document).ready(function () {
                $('.menu-product li.child .open-close').on('click', function () {
                    $(this).removeAttr('href');
                    var element = $(this).parent('li');
                    if (element.hasClass('open')) {
                        element.removeClass('open');
                        element.children('ul').slideUp();
                    }
                    else {
                        element.addClass('open');
                        element.children('ul').slideDown();
                    }
                });
            });
         </script>
         <script src="/app/services/moduleServices.js"></script>
         <script src="/app/controllers/moduleController.js"></script>
         <!--Begin-->
         <div class="box-sale-policy ng-scope" ng-controller="moduleController" ng-init="initSalePolicyController('Shop')">
            <h3><span>Chính sách bán hàng</span></h3>
            <div class="sale-policy-block">
               <ul>
                  <li>Giao hàng TOÀN QUỐC</li>
                  <li>Thanh toán khi nhận hàng</li>
                  <li>Hoàn ngay tiền mặt</li>
                  <li>Chất lượng đảm bảo</li>
                  <li>Miễn phí vận chuyển:<span>Đơn hàng từ 3 món trở lên</span></li>
               </ul>
            </div>
            <div class="buy-guide">
               <h3>Hướng Dẫn Mua Hàng</h3>
               <ul>
                  <li>
                     Mua hàng trực tiếp tại website
                     <b class="ng-binding"> http://www.freshmart.com</b>
                  </li>
                  <li>
                     Gọi điện thoại <strong class="ng-binding">
                     0908 xx xx xx
                     </strong> để mua hàng
                  </li>
                  <li>
                     Mua tại Trung tâm CSKH:<br>
                     <strong class="ng-binding"> Quang Trung, P.14, Q.Gò Vấp, Tp.HCM</strong>
                     <a href="/ban-do.html" rel="nofollow" target="_blank">Xem Bản Đồ</a>
                  </li>
                  <li>
                     Mua sỉ/buôn xin gọi <strong class="ng-binding">
                     0908 xx xx xx 
                     </strong> để được
                     hỗ trợ.
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<?php require_once __DIR__. '/partner.php'; ?>
<?php require_once __DIR__. '/Layouts/footer.php'; ?>
<script  type="text/javascript" >
   $(document).ready(function(){
       $(".menu-quick-select ul").hide();
       $(".menu-quick-select").hover(function(){
           $(".menu-quick-select ul").show();
       },
       function(){
           $(".menu-quick-select ul").hide();
       });
   });
</script>