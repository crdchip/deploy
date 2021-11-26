<?php 
session_start();
ob_start();
   $openn = "user";
   require_once __DIR__. '/Libraries/database.php';
   require_once __DIR__. '/Libraries/function.php';

   $db = new Database ;

   $user = $db->fetchAll("user");
?>
<?php require_once __DIR__. '/Layouts/header.php'; 
include_once 'connection.php';
?>
<?php 

if(isset($_POST["submit_login"]) && $_POST["account"] != '' && $_POST["password"] != ''){
   $account = $_POST["account"];
   $password = $_POST["password"];
      if(isset($account) && isset($password)){
      $sql = "SELECT * FROM user WHERE account = '$account' AND password = '$password'";
      // echo $sql; exit;
      $query = mysqli_query($conn,$sql);
      $rows = mysqli_num_rows($query);
      $row_array = mysqli_fetch_array($query);
   
      
      // echo '<pre>' , var_dump($row_array) , '</pre>';die;
      // echo $rows; exit;
      if($rows>0){
         $_SESSION['member'] = $row_array['name'];
         $_SESSION['id_khachhang'] = $row_array['id'];
         // echo '<pre>' , var_dump($_SESSION['acc_khachhang']) , '</pre>';die;
         header('Location: index.php');
      }
      else{
         echo '<center class="alert alert-danger">Tài khoản không tồn tại hoặc không có quyền truy cập</center>';
      }

   }
}

?>
         <!-- Nôi dung chính -->
         <div class="main">
            <div class="container">
            	<div class="row">
                  <div class="col-md-3">
                     <div class="menu-account">
                        <h3>
                           <span>
                           Tài khoản
                           </span>
                        </h3>
                        <ul>
                           <li><a href="dang-nhap.php"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
                           <li><a href="dang-ky.php"><i class="fa fa-key"></i> Đăng ký</a></li>
                           <li><a href="quen-mat-khau.php"><i class="fa fa-key"></i> Quên mật khẩu</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-9">
                     <div class="breadcrumb clearfix">
                        <ul>
                           <li itemtype="http://shema.org/Breadcrumb" itemscope="" class="home">
                              <a title="Đến trang chủ" href="index.php" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                           </li>
                           <li class="icon-li"><strong>Đăng nhập</strong> </li>
                        </ul>
                     </div>
                     <script type="text/javascript">
                        $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                     </script>
                        <div class="col-md-6 col-md-offset-3 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                           <form class="form-horizontal" ng-submit="login()" method="POST" action="dang-nhap.php">
                              <div class="form-group">
                              <?php if(isset($_SESSION['seccess'])): ?>
                                 <div class="alert alert-seccess">
                                    <?php echo $_SESSION['seccess'];?>
                                 </div>
                              <?php endif; ?>
                                 <label for="Account" class="col-sm-4 control-label">Tài khoản</label>
                                 <div class="col-sm-8">
                                    <input type="text" class="form-control" ng-required='true' name="account" />
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="Password" class="col-sm-4 control-label">Mật khẩu</label>
                                 <div class="col-sm-8">
                                    <input type="password"  name="password" class="form-control" ng-model="password" ng-required='true' />
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" name="submit_login" class="btn btn-primary">Đăng nhập</button>
                                    <a href="quen-mat-khau.php">Quên mật khẩu?</a>
                                 </div>
                              </div>
                           </form>
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