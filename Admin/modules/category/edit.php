<?php 
   $open = "category";
   session_start();
   require_once __DIR__. '/../../../Libraries/database.php';
   require_once __DIR__. '/../../../Libraries/function.php';
   $db = new Database ;
   
   $id = intval(getInput('id')); 
   
   $EditCategory = $db->fetchID("category",$id);
   
   if(empty($EditCategory))
   {
       $_SESSION['error'] = "Dữ liệu không tồn tại";
       header('Location: index.php');
   }
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       # code...
       $data =
       [
           "name" => postInput('name'),
           "slug" => to_slug(postInput("name"))
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
           $id_update =$db->update("category",$data,array("id"=> $id));
   
           if ($id_update > 0)
           {
               # code...
               $_SESSION['success'] = "Cập nhật thành công";
               header('Location: index.php');
               exit;
           }
           else
           {
               //Theem thất bại
               $_SESSION['error'] = "Dữ liệu không thay đổi";
   
           }
       }
   };
   ?>
<?php require_once __DIR__. '/../../layouts/header.php'; ?>
<div id="page-wrapper">
   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">Thay đổi thông tin danh mục</h1>
         <ol class="breadcrumb">
         <li>
            <i class="fa fa-dashboard"></i>
            <a href="index.php" title="">Trang chủ</a>
         </li>
         <li>
            <i class="fa fa-dashboard"></i>
            <a href="index.php" title="">Danh mục</a>
         </li>
         <li>
            <i class="fa fa-dashboard"></i>
            <a href="add.php" title="">Chỉnh sửa</a>
         </li>
         </ol>
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
                  <input type="text"  class="form-control" id="inputEmail3" placeholder="Nhập danh mục..." name="name" value="<?php echo $EditCategory['name'] ?>">
                  <?php if(isset($error['name'])): ?>
                  <p class="text-danger">
                     <?php echo $error['name']; ?> 
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
<!-- /#page-wrapper -->
<?php require_once __DIR__. '/../../layouts/footer.php'; ?>