<?php 
   require_once __DIR__. '/Libraries/database.php';
   require_once __DIR__. '/Libraries/function.php';
   $db = new Database;
   session_start();
   ob_start();
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
                           <li class="icon-li"><strong>Kiểm tra đơn hàng</strong> </li>
                        </ul>
                     </div>
                     <script type="text/javascript">
                        $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                     </script>
                     <script src="Puclic/frontend/app/services/orderServices.js"></script>
                     <script src="Puclic/frontend/app/controllers/orderController.js"></script>
                     <div class="order-tracking-content clearfix" ng-controller="orderController" ng-init="initController()">
                        <h1 class="title"><span>Kiểm tra đơn hàng</span></h1>
                        <div class="order-tracking-block">
                           <div class="alert alert-danger" ng-if="Id<0">
                              Không tìm thấy đơn hàng trong hệ thống. Vui lòng kiểm tra lại mã đơn hàng hoặc số
                              điện thoại của bạn.
                           </div>
                           <form class="form-inline order-input" ng-submit="searchOrder()">
                              <div class="form-group">
                                 <label>Nhập mã đơn hàng</label>
                                 <input type="text" class="form-control" placeholder="Mã số đơn hàng (VD:123456789)" ng-model="AutoCode" ng-required='true' />
                                 <button class="btn btn-primary">Xem ngay</button>
                              </div>
                           </form>
                           <div ng-if="Id>0">
                              <h2>Thông tin đơn hàng</h2>
                              <div class="row-title docs">Đơn hàng của <a href="#">{{CustomerName}}</a><b> ({{AutoCode}})</b> lúc <span class="grey">{{CreatedDate}}</span></div>
                              <div class="table-responsive clearfix order-tracking-info">
                                 <table class="table table-mycart">
                                    <thead>
                                       <tr>
                                          <th>STT</th>
                                          <th colspan="2">Tên sản phẩm</th>
                                          <th>Giá</th>
                                          <th>Số lượng</th>
                                          <th>Thành tiền</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr ng-repeat="item in OrderDetails">
                                          <td>{{$index+1}}</td>
                                          <td class="image">
                                             <a href="san-pham/%7b%7bitem.ProductCode%7d%7d.html"><img src="notfound5031.html" class="img-responsive" /></a>
                                          </td>
                                          <td>
                                             <a href="san-pham/%7b%7bitem.ProductCode%7d%7d.html">{{item.ProductName}}</a>
                                             <p class="note" ng-if="item.IsVariant==true">{{item.VariantName}}</p>
                                          </td>
                                          <td>{{item.Price}} đ</td>
                                          <td>{{item.Quantity}}</td>
                                          <td>{{item.Amount|number:0}} đ</td>
                                       </tr>
                                       <tr>
                                          <td colspan="3" class="border-right">
                                             <div class="box-customer-content">
                                                <div class="title"><span>Thông tin giao hàng</span></div>
                                                <div>[Anh/Chị]<b> {{DeliveryName}}</b></div>
                                                <div>
                                                   {{DeliveryEmail}} |
                                                   {{DeliveryAddress}} |
                                                   {{DeliveryPhone}}
                                                </div>
                                             </div>
                                             <div class="box-customer-content">
                                                <div class="title"><span>Thông tin thanh toán</span></div>
                                                <div>[Anh/Chị]<b>{{CustomerName}}</b></div>
                                                <div>
                                                   {{CustomerEmail}} |
                                                   {{CustomerAddress}} |
                                                   {{CustomerPhone}}
                                                </div>
                                             </div>
                                          </td>
                                          <td colspan="4">
                                             <table class="table">
                                                <tbody>
                                                   <tr>
                                                      <td class="text-left"><b>Tổng tiền thanh toán</b></td>
                                                      <td class="text-right ">
                                                         <b class="total-payment">
                                                         {{Amount|number:0}}
                                                         </b>
                                                         <p class="note"></p>
                                                      </td>
                                                   </tr>
                                                   <tr class="text-center order-stt">
                                                      <td colspan="2">
                                                         <div>Trạng thái đơn hàng</div>
                                                         <div><b>{{ShipmentStateName}}</b></div>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <div class="button text-right">
                                 <a class="btn btn-default" href="dang-nhap.php">Trở về danh sách đơn hàng</a>
                                 <a class="btn btn-primary" href="index.php">Tiếp tục mua hàng</a>
                              </div>
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