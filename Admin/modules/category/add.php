<?php 
   $open = "category";
   session_start();
   require_once __DIR__. '/../../../Libraries/database.php';
   require_once __DIR__. '/../../../Libraries/function.php';
   $db = new Database ;
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       # code...
       $data =
       [
           "name" => postInput('name'),
           "slug" => to_slug(postInput("name")),
           "image" => postInput('image'),
       ];
   
       $error = [];
   
       if (postInput('name') == "") {
           # code...
           $error['name'] = " Mời bạn nhập đầy đủ tên danh mục...";
       }
   
       //error trống có nghĩa là 0 có lỗi
       if (empty($error)) 
       {
           # code...
           if (isset($_FILES['image'])) 
            {
               # code...
               $file_name = $_FILES['image']['name'];
               $file_tmp = $_FILES['image']['tmp_name'];
               $file_type = $_FILES['image']['type'];
               $file_erro = $_FILES['image']['error'];

               if ($file_erro == 0) 
               {
                  # code...
                  $part = 'http://localhost:8080/websieuthi/Public/frontend/Uploads/images/logo_product/';
                  $data['image'] = $file_name;
               }
            }
           $isset = $db->fetchOne("category", "name ='".$data['name']."'");
           
               $id_insert = $db->insert("category", $data);
               if ($id_insert > 0)
               {
                   # code...
                   $_SESSION['success'] = "Thêm thành công";
                   header('Location: index.php');
                   exit;
               }
               else
               {
                   //Theem thất bại
                   $_SESSION['error'] = "Thêm thất bại";
   
               }
       }
   };
   ?>
<?php require_once __DIR__. '/../../layouts/header.php'; ?>
            <div id="page-wrapper">
               <div class="row">
                  <div class="col-lg-12">
                     <h1 class="page-header">Thêm mới danh mục</h1>
                     <ol class="breadcrumb">
                        <li>
                           <i class="fa fa-dashboard"></i>
                           <a href="../../../index.php" title="">Trang chủ</a>
                        </li>
                        <li>
                           <i class="fa fa-dashboard"></i>
                           <a href="index.php" title="">Danh mục</a>
                        </li>
                        <li>
                           <i class="fa fa-dashboard"></i>
                           <a href="add.php" title="">Thêm mới</a>
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
               <br>
               <!-- /.row -->
               <div class="row">
                  <div class="col-md-12">
                     <form class="form-horizontal" action="" method="POST" >
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục</label>
                           <div class="col-sm-8" >
                              <input type="text"  class="form-control" id="inputEmail3" placeholder="Nhập danh mục..." name="name">
                              <?php if(isset($error['name'])): ?>
                              <p class="text-danger">
                                 <?php echo $error['name']; ?> 
                              </p>
                              <?php endif ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục phụ</label>
                           <div class="col-sm-8" >
                              <input type="text"  class="form-control" id="inputEmail3" placeholder="Nhập danh mục..." name="name_child">
                              <?php if(isset($error['name_child'])): ?>
                              <p class="text-danger">
                                 <?php echo $error['name_child']; ?> 
                              </p>
                              <?php endif ?>
                           </div>
                        </div>
                        
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh</label>
                        
                           <div class="col-sm-4" >
                              <input type="file"  class="form-control" id="inputEmail3"  name="image" >
                           </div>
                           <?php if(isset($error['image'])): ?>
                              <p class="text-danger">
                                 <?php echo $error['image']; ?> 
                              </p>
                           <?php endif ?>
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
            <!-- /#page-wrapper -->
<?php require_once __DIR__. '/../../layouts/footer.php'; ?>