<?php
$open = "product";
include 'connection.php';
if(isset($_POST['timkiem'])){
      $tukhoa  = $_POST['tukhoa'];
   }
   // echo '<pre>' , var_dump($_POST['tukhoa']) , '</pre>';die;
   $sql = "SELECT * FROM product WHERE product.name LIKE '%".$tukhoa."%'; ";
   $query = mysqli_query($conn, $sql);
   
   // echo '<pre>' , var_dump($row['thunbar']) , '</pre>';die;
?>
<?php require_once __DIR__. '/Layouts/header.php'; ?>
<!-- Nôi dung chính -->
<div class="main">
   <div class="container">
      <div class="row">
         <div class=" col-md-3 bor">
         </div>
         <div class=" col-md-9 bor">
            <div>
               <h4>Sản phẩm tìm kiếm: <?php echo $tukhoa ?></h4>
            </div><br>
            <div class="product-list">
               <?php 
               while ($row = mysqli_fetch_array($query)){ 
               ?>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 product-wrapper zoomIn wow">
                  <div class="product-block product-resize">
                     <div class="product-image image-resize">
                        <div class="sold-out" style="background: red; text-align: center; line-height: 35px;">-<?php echo $row['sale'] ?>%</div>
                        <img style="padding-top: 20px;"  src="http://localhost:8080/websieuthi/Public/frontend/Uploads/images/product/<?php echo $row['thunbar'] ?>" width="50%" height="50%" >
                        </a>
                        <div class="product-actions hidden-xs">
                           
                           <div class="btn-add-to-cart" >
                           <a class="quickview" name="themgiohang" href="themgiohang.php?id=<?php echo $row['id']?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                           </div>
                           <div class="btn_quickview">
                           <a class="quickview" href="chi-tiet-san-pham.php?id= <?php echo $row['id'] ?>"><i class="fa fa-eye"></i></a>
                           </div>
                        </div>
                     </div>
                     <div class="product-info text-center m-t-xxs-20">
                        <h3 class="pro-name">
                           <a href="#" title=""> <?php echo $row['name'] ?> </a>
                        </h3>
                        <div class="pro-prices">
                        <span>Giá :</span><span class="pro-price" style="text-decoration: line-through; color: #ccc"><?php echo $row['price'] ?>đ</span><br>
                        <span>Giảm giá :</span><span class="pro-price text-danger"><?php echo $row['price']-($row['price']*$row['sale']/100)?>đ</span>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
            </div>
         </div>

      </div>
   </div>
</div>

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
