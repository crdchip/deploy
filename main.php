
<?php 
   $open = "product";
   
   
   require_once __DIR__. '/Libraries/database.php';
   require_once __DIR__. '/Libraries/function.php';
   
   $db = new Database;
   if(isset($_GET['trang'])){
      $page = $_GET['trang'];
   }
   else{
      $page = "";
   }
   if($page == "" || $page == 1){
      $begin=0;
   }else{
      $begin = ($page*16)-16;
   }
   $product = $db->fetchAll("product");

   $id = intval(getInput('id'));
   
   $sql = "SELECT * FROM product ORDER BY id DESC LIMIT $begin,16";
   $product = $db->fetchsql($sql);
   
   ?>
<?php require_once __DIR__. '/Layouts/header.php'; ?>
<div class="row">
   <div class="col-md-3">
      <script src="Public/frontend/app/services/moduleServices.js"></script>
      <script src="Public/frontend/app/controllers/moduleController.js"></script>
      <!--Begin-->
      <!-- Blog sidebar -->
      <div class="sidebar_blogs">
         <h3 title="bài viết mới" class="sidebar_title">
            Bài viết nổi bật
         </h3>
         <div class="blog_content">
            <div class="article_item">
               <div class="article_img">
                  <a href="#">
                  <img src="Public/frontend/Uploads/images/news/canh-rong-bien-thit-bo.jpg" alt="Canh Rong Biển Thịt B&#242;" title="Canh Rong Biển Thịt B&#242;">
                  </a>
               </div>
               <div class="article_content clearfix">
                  <div class="title">
                     <h4><a href="#" title="Canh Rong Biển Thịt B&#242;">Canh Rong Biển Thịt B&#242;</a></h4>
                  </div>
                  <!-- <div class="article_meta">
                     <div class="article_comment">
                        <i class="fa fa-comments-o" aria-hidden="true"></i> 0 bình luận
                     </div>
                     <div class="article_created">
                        <i class="fa fa-calendar" aria-hidden="true"></i> <time datetime="16/06/2017">16/06/2017</time>
                     </div>
                  </div> -->
                  <div class="des">
                     <p> Bước 1: Cho tất cả rong biển vào ngâm trong nước. Sau khoảng 15 phút, vớt ra...                        </p>
                  </div>
                  <a class="readmore" href="#">Đọc tiếp <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
               </div>
            </div>
            <div class="article_item">
               <div class="article_img">
                  <a href="tin-tuc/ca-hoi-nuong-giay-bac-9164.html">
                  <img src="Public/frontend/Uploads/images/news/ca-hoi-nuong-giay-bac.jpg" alt="C&#225; Hồi nướng giấy bạc" title="C&#225; Hồi nướng giấy bạc">
                  </a>
               </div>
               <div class="article_content clearfix">
                  <div class="title">
                     <h4><a href="#" title="C&#225; Hồi nướng giấy bạc">C&#225; Hồi nướng giấy bạc</a></h4>
                  </div>
                  <div class="article_meta">
                     <div class="article_comment">
                        <i class="fa fa-comments-o" aria-hidden="true"></i> 0 bình luận
                     </div>
                     <div class="article_created">
                        <i class="fa fa-calendar" aria-hidden="true"></i> <time datetime="16/06/2017">16/06/2017</time>
                     </div>
                  </div>
                  <div class="des">
                     <p>Cá hồi không chỉ dùng ăn gỏi. Chúng ta còn có thể biến tấu phong phú hơn...          </p>
                  </div>
                  <a class="readmore" href="#">Đọc tiếp <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
               </div>
            </div>
            <div class="article_item">
               <div class="article_img">
                  <a href="#">
                  <img src="Public/frontend/Uploads/images/news/cach-che-bien-mon-ngon-tu-kho-ca-dua.jpg" alt="C&#225;ch chế biến m&#243;n ngon từ kh&#244; c&#225; dứa" title="C&#225;ch chế biến m&#243;n ngon từ kh&#244; c&#225; dứa">
                  </a>
               </div>
               <div class="article_content clearfix">
                  <div class="title">
                     <h4><a href="#" title="C&#225;ch chế biến m&#243;n ngon từ kh&#244; c&#225; dứa">C&#225;ch chế biến m&#243;n ngon từ kh&#244; c&#225; dứa</a></h4>
                  </div>
                  <div class="article_meta">
                     <div class="article_comment">
                        <i class="fa fa-comments-o" aria-hidden="true"></i> 0 bình luận
                     </div>
                     <div class="article_created">
                        <i class="fa fa-calendar" aria-hidden="true"></i> <time datetime="16/06/2017">16/06/2017</time>
                     </div>
                  </div>
                  <div class="des">
                     <p>Cá Dứa một nắng đã được tẩm gia vị, do đó chỉ cần chiên giòn là có...</p>
                  </div>
                  <a class="readmore" href="#">Đọc tiếp <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
               </div>
            </div>
            <div class="article_item">
               <div class="article_img">
                  <a href="#">
                  <img src="Public/frontend/Uploads/images/news/cach-lam-muc-tam-bot-chien-gion-thom-ngon.jpg" alt="C&#225;ch l&#224;m mực tẩm bột chi&#234;n gi&#242;n thơm ngon" title="C&#225;ch l&#224;m mực tẩm bột chi&#234;n gi&#242;n thơm ngon">
                  </a>
               </div>
               <div class="article_content clearfix">
                  <div class="title">
                     <h4><a href="#" title="C&#225;ch l&#224;m mực tẩm bột chi&#234;n gi&#242;n thơm ngon">C&#225;ch l&#224;m mực tẩm bột chi&#234;n gi&#242;n thơm ngon</a></h4>
                  </div>
                  <div class="article_meta">
                     <div class="article_comment">
                        <i class="fa fa-comments-o" aria-hidden="true"></i> 0 bình luận
                     </div>
                     <div class="article_created">
                        <i class="fa fa-calendar" aria-hidden="true"></i> <time datetime="16/06/2017">16/06/2017</time>
                     </div>
                  </div>
                  <div class="des">
                     <p>Có rất nhiều món ăn được chế biến từ những nguyên liệu khá phổ biến và thưởng...                              </p>
                  </div>
                  <a class="readmore" href="#">Đọc tiếp <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
               </div>
            </div>
            <!-- <div class="article_item">
               <div class="article_img">
                  <a href="#">
                  <img src="Public/frontend/Uploads/images/news/muc-om-nuoc-dua-hat-sen.jpg" alt="Mực om nước dừa hạt sen" title="Mực om nước dừa hạt sen">
                  </a>
               </div>
               <div class="article_content clearfix">
                  <div class="title">
                     <h4><a href="#" title="Mực om nước dừa hạt sen">Mực om nước dừa hạt sen</a></h4>
                  </div>
                  <div class="article_meta">
                     <div class="article_comment">
                        <i class="fa fa-comments-o" aria-hidden="true"></i> 0 bình luận
                     </div>
                     <div class="article_created">
                        <i class="fa fa-calendar" aria-hidden="true"></i> <time datetime="16/06/2017">16/06/2017</time>
                     </div>
                  </div>
                  <div class="des">
                     <p> 500 g mực ống tươi làm sạch và để nguyên con 150 g hạt sen 100 g giò sống 150 ml nước dừa Gia...                             </p>
                  </div>
                  <a class="readmore" href="#">Đọc tiếp <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
               </div>
            </div> -->
         </div>
      </div>
      <!-- End blog sidebar -->
   </div>
   <div class=" col-md-9 bor">
      <div class="product-list">
<!--          <div class="product_home_image">
            <a href="#">
               <img src="Public/frontend/Uploads/shop2005/images/slide/image-product-home_1.jpg" alt="">
               <div class="figcaption"></div>
            </a>
         </div> -->
         <div class="clearfix">
            <div class="section-heading">
               <h2 title="">
                  <!-- <span>Thịt - Cá - Trứng</span> -->
               </h2>
            </div>
         </div>
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
                     <span>Giá :</span><span class="pro-price" style="text-decoration: line-through; color: #ccc"> <?php echo number_format($item['price']).'vnđ';  ?></span><br>
                     <span>Giảm giá :</span><span class="pro-price" style="color: red"> <?php echo $item['price']-($item['price']*$item['sale']/100)?>đ -<?php echo $item['sale'] ?>%</span>
                  </div>
               </div>
            </div>
         </div>
         <?php endforeach ?>
         <div class="clearfix"></div>
         <style type="text/css">
            ul.list-page{
               padding: 0;
               margin: 0;
               list-style: none;
               display: flex;
               justify-content: center;
            }
            ul.list-page li{
               float: left;
               padding: 5px 13px;
               margin: 5px;
               background: burlywood;
               display: block; 
            }
            ul.list-page li a{
               color: #000;
               text-align: center;
               text-decoration: none;
            }
         </style>
         <?php
            $sql_page = "SELECT * FROM product";
            $query_page = mysqli_query($conn, $sql_page);
            $row_cout = mysqli_num_rows($query_page);
            $trang = ceil($row_cout/5);
         ?>
         <ul class="list-page">
            <?php
               for($i=1; $i<=$trang; $i++){
            ?>
               <li <?php if($i == $page){echo 'style="background: #A86F0E;"';}else {echo "";}?>><a href="index.php?trang=<?php echo $i ?>"><?php echo $i?></a></li>
            <?php
            }
            ?>
         </ul>
      </div>
<!--       <div class="product-list">
         <div class="product_home_image">
            <a href="#">
               <img src="Public/frontend/Uploads/shop2005/images/slide/image-product-home_2.jpg" alt="">
               <div class="figcaption"></div>
            </a>
         </div>
         <div class="clearfix">
            <div class="section-heading">
               <h2 title="">
                  <span>Đồ uống các loại</span>
               </h2>
            </div>
         </div>
         <?php foreach ($product as $item): ?>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 product-wrapper zoomIn wow">
            <div class="product-block product-resize">
               <div class="product-image image-resize">
                  <div class="sold-out">Hot</div>
                  <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>">
                  <img src="http://localhost/websieuthi/Public/frontend/Uploads/shop2005/images/product/<?php echo $item['thunbar'] ?>" width="100%" height="100%" >
                  </a>
                  <div class="product-actions hidden-xs">
                     <div class="btn-add-to-cart" onclick="AddToCard(46444,1)">
                        <a href="javascript:void(0);"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                     </div>
                     <div class="btn_quickview">
                        <a class="quickview" href="chi-tiet-san-pham.phpid?= <?php echo $item['id'] ?>"><i class="fa fa-eye"></i></a>
                     </div>
                  </div>
               </div>
               <div class="product-info text-center m-t-xxs-20">
                  <h3 class="pro-name">
                     <a href="#" title=""> <?php echo $item['name'] ?> </a>
                  </h3>
                  <div class="pro-prices">
                     <span class="pro-price"><?php echo $item['price'] ?>đ</span>
                     <span class="pro-price" style="color: red">-<?php echo $item['sale'] ?>%</span>
                  </div>
               </div>
            </div>
         </div>
         <?php endforeach ?>
      </div>
      <div class="product-list">
         <div class="product_home_image">
            <a href="#">
               <img src="Public/frontend/Uploads/shop2005/images/slide/image-product-home_3.jpg" alt="">
               <div class="figcaption"></div>
            </a>
         </div>
         <div class="clearfix">
            <div class="section-heading">
               <h2 title="">
                  <span>Sữa các loại</span>
               </h2>
            </div>
         </div>
         <?php foreach ($product as $item): ?>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 product-wrapper zoomIn wow">
            <div class="product-block product-resize">
               <div class="product-image image-resize">
                  <div class="sold-out">Hot</div>
                  <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>">
                  <img src="http://localhost/websieuthi/Public/frontend/Uploads/shop2005/images/product/<?php echo $item['thunbar'] ?>" width="100%" height="100%" >
                  </a>
                  <div class="product-actions hidden-xs">
                     <div class="btn-add-to-cart" onclick="AddToCard(46444,1)">
                        <a href="javascript:void(0);"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                     </div>
                     <div class="btn_quickview">
                        <a class="quickview" href="chi-tiet-san-pham.phpid?= <?php echo $item['id'] ?>"><i class="fa fa-eye"></i></a>
                     </div>
                  </div>
               </div>
               <div class="product-info text-center m-t-xxs-20">
                  <h3 class="pro-name">
                     <a href="#" title=""> <?php echo $item['name'] ?> </a>
                  </h3>
                  <div class="pro-prices">
                     <span class="pro-price"><?php echo $item['price'] ?>đ</span>
                     <span class="pro-price" style="color: red">-<?php echo $item['sale'] ?>%</span>
                  </div>
               </div>
            </div>
         </div>
         <?php endforeach ?>
      </div>
      <div class="product-list">
         <div class="product_home_image">
            <a href="#">
               <img src="Public/frontend/Uploads/shop2005/images/slide/image-product-home-1.jpg" alt="">
               <div class="figcaption"></div>
            </a>
         </div>
         <div class="clearfix">
            <div class="section-heading">
               <h2 title="">
                  <span>Bánh kẹo các loai</span>
               </h2>
            </div>
         </div>
         <?php foreach ($product as $item): ?>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 product-wrapper zoomIn wow">
            <div class="product-block product-resize">
               <div class="product-image image-resize">
                  <div class="sold-out">Hot</div>
                  <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>">
                  <img src="http://localhost/websieuthi/Public/frontend/Uploads/shop2005/images/product/<?php echo $item['thunbar'] ?>" width="100%" height="100%" >
                  </a>
                  <div class="product-actions hidden-xs">
                     <div class="btn-add-to-cart" onclick="AddToCard(46444,1)">
                        <a href="javascript:void(0);"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                     </div>
                     <div class="btn_quickview">
                        <a class="quickview" href="chi-tiet-san-pham.phpid?= <?php echo $item['id'] ?>"><i class="fa fa-eye"></i></a>
                     </div>
                  </div>
               </div>
               <div class="product-info text-center m-t-xxs-20">
                  <h3 class="pro-name">
                     <a href="#" title=""> <?php echo $item['name'] ?> </a>
                  </h3>
                  <div class="pro-prices">
                     <span class="pro-price"><?php echo $item['price'] ?>đ</span>
                     <span class="pro-price" style="color: red">-<?php echo $item['sale'] ?>%</span>
                  </div>
               </div>
            </div>
         </div>
         <?php endforeach ?>
      </div> -->

   </div>
</div>