<?php 
   require_once __DIR__. '/Libraries/database.php';
   require_once __DIR__. '/Libraries/function.php';
   $db = new Database;
   session_start();
   ob_start();
?>
<?php
   if(isset($_SESSION['cart'])){
      // echo '<pre>';
      //    print_r($_SESSION['cart']);
      // echo '</pre>';
   }
?>
<?php require_once __DIR__. '/Layouts/header.php'; ?>
         <!-- Nôi dung chính -->
         <div class="main">
            <div class="container">
            	<div class="row">
                     <div class="col-md-12">
                        <div class="breadcrumb clearfix">
                           <ul>
                              <li itemtype="http://shema.org/Breadcrumb" itemscope="" class="home">
                                 <a title="Đến trang chủ" href="index.php" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                              </li>
                              <li class="icon-li"><strong>Giỏ hàng</strong> </li>
                           </ul>
                        </div>
                        <script type="text/javascript">
                           $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                        </script>
                        <script src="Public/frontend/app/services/orderServices.js"></script>
                        <script src="Public/frontend/app/controllers/orderController.js"></script>
                        <div class="cart-content" ng-controller="orderController" ng-init="initOrderCartController()">
                           <h1><span>Giỏ hàng của tôi</span></h1>
                           <div class="steps clearfix">
                              <ul class="clearfix">
                                 <li class="cart active col-md-2 col-xs-12 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"><span><i class="glyphicon glyphicon-shopping-cart"></i></span><span>Giỏ hàng của tôi</span><span class="step-number"><a>1</a></span></li>
                                 <li class="payment col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-usd"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
                                 <li class="finish col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-ok"></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
                              </ul>
                           </div>
                           <div class="cart-block">
                              <div class="cart-info table-responsive">
                                 <table class="table table-striped table-bordered table-hover dataTable no-footer" style="width: 100%; text-align: center;" id="dataTables-example">
                                       <tr style="width: 100%; text-align: center;">
                                          <th class="text-center">Stt</th>
                                          <th class="text-center">Tên sản phẩm</th>
                                          <th class="text-center">Sản phẩm</th>
                                          <th class="text-center">Số lượng</th>
                                          <th class="text-center">Giá</th>
                                          <th class="text-center">Thành tiền</th>
                                          <th class="text-center">Quản lý</th>
                                       </tr>
                                    <?php
                                       if(isset($_SESSION['cart'])){
                                          $i =0;
                                          $tongtien = 0;
                                          foreach($_SESSION['cart'] as $cart_item){
                                             $i++;
                                             $thanhtien = $cart_item['number']*$cart_item['price'];
                                             $tongtien += $thanhtien;
                                    ?>
                                    <tbody>
                                       <tr>
                                          <td>
                                             <a href="" title=""><?php echo $i; ?></a>
                                          </td>
                                          <td>
                                             <a href="" title=""><?php echo $cart_item['name']; ?></a>
                                          </td>
                                          <td>
                                          <img src="http://localhost:8080/websieuthi/Public/frontend/Uploads/images/product/<?php echo $cart_item['thunbar'] ?>" width="50px" height="50px" >
                                          </td>
                                          <td style="text-align: center;">
                                             <a href="themgiohang.php?prev=<?php echo $cart_item['id'] ?>"><i class="fa fa-minus" aria-hidden="true"></i> </a>
                                             <a href="" title=""><?php echo $cart_item['number']; ?></a>
                                             <a href="themgiohang.php?after=<?php echo $cart_item['id'] ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                          </td>
                                          <td>
                                             <a href="" title=""><?php echo number_format($cart_item['price']).'vnđ'; ?></a>
                                          </td>
                                          <td>
                                             <a href="" title=""><?php echo number_format($thanhtien).'vnđ';  ?></a>
                                          </td>
                                          <td>
                                             <a href="themgiohang.php?xoa=<?php echo $cart_item['id'] ?>" title="">Xóa</a>
                                          </td>
                                       </tr>
                                    <?php 
                                    }
                                    ?>
                                       <tr>
                                          <td colspan='6'>Tổng tiền: <?php echo number_format($tongtien).'vnđ'; ?></td>
                                          <td conspan="1"><a href="themgiohang.php?xoatatca=1">Xóa tất cả</a></td>
                                       </tr>
                                    </tbody>
                                    <?php
                                    }else{
                                    ?>
                                    
                                    <tr>
                                       <td colspan="7" style ="color:red;"> <h2> Hiện tại giỏ hàng trống </h2> </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                 </table>
                              </div>
                              <div class="clearfix text-right">
                              </div><br>
                              <div class="button text-right">
                                 <a class="comeback" href="index.php" >Tiếp tục mua hàng</a>
                                 <?php 
                                    if(isset($_SESSION['member'])){
                                 ?>
                                 <a class="button-default" id="checkout" href="thanh-toan.php">Tiến hành thanh toán</a>
                                 <?php
                                 }else{
                                 ?>
                                 <a class="button-default" id="checkout" href="dang-nhap.php">Đăng nhập đặt hàng</a>
                                 <?php
                                 } 
                                 ?>
                              </div>
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