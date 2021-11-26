<?php 
   $open = "category";
   session_start();
   require_once __DIR__. '/../../../Libraries/database.php';
   require_once __DIR__. '/../../../Libraries/function.php';  

   $db = new Database ;
   
   //Danh sách danh mục sản phẩm
   $category = $db->fetchAll("category");

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       # code...
       $data =
       [
           "name"         => postInput('name'),
           "slug"         => to_slug(postInput("name")),
           "category_id"  => postInput('category_id'),
       ];
          
           
           
   
       $error = [];
   
       if (postInput('name') == "") {
           # code...
           $error['name'] = " Mời bạn nhập đầy đủ tên sản phẩm...";
       }
       if (postInput('category_id') == "") {
           # code...
           $error['category_id'] = " Mời bạn chọn tên danh mục...";
       }
      
       if ( ! isset($_FILES['thunbar']))
       {
          $error['thunbar'] = "Mời bạn chọn hình ảnh";
       }
       
       //error trống có nghĩa là 0 có lỗi
       if (empty($error)) 
       {
           # code...
        if (isset($_FILES['thunbar'])) 
        {
          # code...
          $file_name = $_FILES['thunbar']['name'];
          $file_tmp = $_FILES['thunbar']['tmp_name'];
          $file_type = $_FILES['thunbar']['type'];
          $file_erro = $_FILES['thunbar']['error'];

          if ($file_erro == 0) 
          {
            # code...
            $part = 'http://localhost:8080/websieuthi/Public/frontend/Uploads/images/logo_product/';
            $data['thunbar'] = $file_name;
          }
        }
        $id_insert = $db->insert("category_child",$data);
        if ($id_insert) 
        {
             # code...
          move_uploaded_file($file_tmp, $part.$file_name);
          $_SESSION['seccess'] = "Thêm mới thành công";
          header('Location: index.php');
          exit;
        } 
        else
        {
          $_SESSION['error'] = " Thêm mới thất bại";
        }
        $isset = $db->fetchOne("category", "name ='".$data['name']."'");
           if ( count($isset)>0 ) 
           {
               # code...
               $_SESSION['error'] = "Tên danh mục đã tồn tại";
           }
           else
           {
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
                           <a href="../../index.php" title="">Trang chủ</a>
                        </li>
                        <li>
                           <i class="fa fa-dashboard"></i>
                           <a href="index.php" title="">Danh mục phụ</a>
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
                     <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" >
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Danh mục sản phẩm</label>
                           <div class="col-sm-8" >
                              <select class="form-control col-md-8" name="category_id">
                                <option value="">- Chọn danh mục sản phẩm -</option>
                                <?php foreach ($category as $item): ?>
                                  <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>}
                                <?php endforeach ?>
                              </select>
                              <?php if(isset($error['category'])): ?>
                              <p class="text-danger">
                                 <?php echo $error['category']; ?> 
                              </p>
                              <?php endif ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục phụ</label>
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
                           <label for="inputEmail3" class="col-sm-2 control-label">Chọn ảnh</label>
                           
                           <div class="col-sm-4" >
                              <input type="file"  class="form-control" id="inputEmail3"  name="thunbar" >
                           </div>
                           <?php if(isset($error['thunbar'])): ?>
                              <p class="text-danger">
                                 <?php echo $error['thunbar']; ?> 
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