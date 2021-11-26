<?php 
   $open = "user";

   require_once __DIR__. '/Libraries/database.php';
   require_once __DIR__. '/Libraries/function.php';  
   
   $db = new Database ;
   
   //Danh sách danh mục sản phẩm
   $user = $db->fetchAll("user");
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       # code...
       $data =
       [
           "account"         => postInput('account'),
           "email"           => postInput('email'),
           "password"        => postInput('password'),
           "name"             => postInput('name'),
           "phone"            => postInput('phone'),
           "address"          => postInput('address'),
           "birthday"        => postInput('birthday')
       ];
          
           
           
   
       $error = [];
   
       if (postInput('account') == "") {
           # code...
           $error['account'] = " Mời bạn nhập đầy đủ tên tài khoản...";
       }
       if (postInput('email') == "") {
           # code...c
           $error['email'] = " Mời bạn nhập email...";
       }
       if (postInput('password') == "") {
           # code...
           $error['password'] = " Mời bạn nhập password...";
       }
       if (postInput('phone') == "") {
           # code...
           $error['phone'] = " Mời bạn nhập đầy đủ số điện thoại...";
       }
       if (postInput('address') == "") {
           # code...
           $error['address'] = " Mời bạn nhập đầy đủ địa chỉ...";
       }
       if (postInput('birthday') == "") {
           # code...
           $error['birthday'] = " Mời bạn nhập ngày sinh/tháng/năm...";
       }
       
   
       //error trống có nghĩa là 0 có lỗi
       if (empty($error)) 
       {
          
           # code...
        $id_insert = $db->insert("user",$data);
        if ($id_insert) 
        {
             # code...
          move_uploaded_file($file_tmp, $part.$file_name);
         //  $_SESSION['id_khachhang'] = mysqli_insert_id($conn);
         //  echo '<pre>' , var_dump($_SESSION['id_khachhang']) , '</pre>';die;
          header('Location: http://localhost:8080/websieuthi/dang-nhap.php');
          exit;
        } 
        else
        {
          $_SESSION['error'] = " Thêm mới thất bại";
        } 
       }
   };
   ?>
<?php require_once __DIR__. '/Layouts/header.php'; ?>
         <!-- Nôi dung chính -->
         <div class="main">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <h1 class="page-header">Đăng kí tài khoản</h1>
                     <ol class="breadcrumb">
                        <li>
                           <a href="index.php" title="">Trang chủ</a>
                        </li>
                        <li>
                           <a href="dang-nhap.php" title="">Đăng nhập</a>
                        </li>
                        <li>
                           <a href="dang-ky.php" title="">Đăng kí</a>
                        </li>
                     </ol>
                     <div class="clearfix"></div>
                        <?php if(isset($_SESSION['error'])): ?>
                          <div class="alert alert-danger">
                             <?php echo $_SESSION['error']; unset($_SESSION['error'])?>
                          </div>
                        <?php endif; ?>
                  </div>
                  <!-- /.col-lg-12 -->
               </div>

            	<div class="row">
                  <div class="col-sm-offset-3 col-sm-7">
                     <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" >
                        <div class="form-group">
                           <label  class="col-sm-2 control-label">Tên tài khoản</label>
                           <div class="col-sm-8" >
                              <input type="text"  class="form-control" id="inputEmail3" placeholder="Nhập danh mục..." name="account">
                              <?php if(isset($error['account'])): ?>
                              <p class="text-danger">
                                 <?php echo $error['account']; ?> 
                              </p>
                              <?php endif ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Mật khẩu</label>
                           <div class="col-sm-8" >
                              <input type="password"  class="form-control" id="inputEmail3" placeholder="Nhập mật khẩu..." name="password">
                              <?php if(isset($error['password'])): ?>
                              <p class="text-danger">
                                 <?php echo $error['password']; ?> 
                              </p>
                              <?php endif ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Nhập email</label>
                           <div class="col-sm-8" >
                              <input type="text"  class="form-control" id="inputEmail3" placeholder="quocson@gmail.com" name="email">
                              <?php if(isset($error['email'])): ?>
                              <p class="text-danger">
                                 <?php echo $error['email']; ?> 
                              </p>
                              <?php endif ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                           <div class="col-sm-8" >
                              <input type="nummber"  class="form-control" id="inputEmail3" placeholder="0908.xx.xx.xx" name="phone">
                              <?php if(isset($error['phone'])): ?>
                              <p class="text-danger">
                                 <?php echo $error['phone']; ?> 
                              </p>
                              <?php endif ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Họ và tên</label>
                           <div class="col-sm-8" >
                              <input type="text"  class="form-control" id="inputEmail3" placeholder="Ngô quốc sơn" name="name">
                              <?php if(isset($error['name'])): ?>
                              <p class="text-danger">
                                 <?php echo $error['name']; ?> 
                              </p>
                              <?php endif ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Ngày sinh</label>
                           <div class="col-sm-8" >
                              <input type="text"  class="form-control" id="inputEmail3" placeholder="08/11/1997" name="birthday">
                              <?php if(isset($error['birthday'])): ?>
                              <p class="text-danger">
                                 <?php echo $error['birthday']; ?> 
                              </p>
                              <?php endif ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
                           <div class="col-sm-8" >
                              <textarea name="address" id="" cols="30" rows="4" class="form-control"></textarea>
                              <?php if(isset($error['address'])): ?>
                              <p class="text-danger">
                                 <?php echo $error['address']; ?> 
                              </p>
                              <?php endif ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-success">Lưu</button>
                           </div>
                        </div>
                     </form>
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