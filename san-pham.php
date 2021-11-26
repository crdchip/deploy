<?php 
   $open = "product";
   
   
   require_once __DIR__. '/Libraries/database.php';
   require_once __DIR__. '/Libraries/function.php';
   
   $db = new Database;
   session_start();
   ob_start();
    
   $product = $db->fetchAll("product");
   $id = intval(getInput('id'));
   
   $sql = "SELECT * FROM product";
   $product = $db->fetchsql($sql);
   
   ?>
<?php require_once __DIR__. '/Layouts/header.php'; ?>
<!-- Nôi dung chính -->
<div class="main">
<div class="container">
   <div class="row">    
      <div class=" col-md-9 bor">
         <div class="product-list">
            <?php foreach ($product as $item): ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 product-wrapper zoomIn wow">
               <div class="product-block product-resize">
                  <div class="product-image image-resize">
                     <div class="sold-out">Hot</div>
                     <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>">
                     <img src="http://localhost:8080/websieuthi/Public/frontend/Uploads/images/product/<?php echo $item['thunbar'] ?>" width="100%" height="100%" >
                     </a>
                     <div class="product-actions hidden-xs">
                        <div class="btn-add-to-cart" onclick="AddToCard(46444,1)">
                        <a class="quickview" name="themgiohang" href="themgiohang.php?id=<?php echo $item['id']?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn_quickview">
                        <a class="quickview" href="chi-tiet-san-pham.php?id= <?php echo $item['id'] ?>"><i class="fa fa-eye"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="product-info text-center m-t-xxs-20">
                     <h3 class="pro-name">
                        <a href="#" title=""> <?php echo $item['name'] ?> </a>
                     </h3>
                     <div class="pro-prices">
                        <span class="pro-price"><?php echo $item['price'] ?>đ</span>
                        <span class="pro-price text-danger">-<?php echo $item['sale'] ?>%</span>
                     </div>
                  </div>
               </div>
            </div>
            <?php endforeach ?>
         </div>
      </div>
      <div class="col-md-3">
         <div class="menu-product">
            <h3>
               <span>
               Sản phẩm
               </span>
            </h3>
            <ul class='level0'>
            <?php foreach ($category as $product): ?>
            <li class="level0">
               <a class='' href='danh-muc-san-pham.php?id<?php echo $product['id']?>'><?php echo $product['name']?>
               </a>
            </li>
            <?php endforeach ?>
            </ul class='level0'>
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