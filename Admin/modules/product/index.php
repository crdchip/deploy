<?php 
  
  $open = "product";
  

  require_once __DIR__. '/../../../Libraries/database.php';
  require_once __DIR__. '/../../../Libraries/function.php';
  
  $db = new Database;
  session_start();
   
  $product = $db->fetchAll("product");
 
?>
<?php require_once __DIR__. '/../../layouts/header.php'; ?>
        <div id="page-wrapper">
           <div class="row">
              <div class="col-lg-12">
                 <h1 class="page-header">Danh sách sản phẩm</h1>
                 <ol class="breadcrumb">
                    <li>
                       <i class="fa fa-dashboard"></i>
                       <a href="../../index.php" title="">Trang chủ</a>
                    </li>
                    <li>
                       <i class="fa fa-dashboard"></i>
                       <a href="index.php" title="">Sản phẩm</a>
                    </li>
                 </ol>
                 <a href="add.php" title="" class="btn btn-info " >Thêm mới</a>
              </div>
              <div class="clearfix"></div>
              <?php if(isset($_SESSION['success'])): ?>
              <div class="alert alert-success">
                 <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
              </div>
              <?php endif; ?>
              <?php if(isset($_SESSION['error'])): ?>
              <div class="alert alert-danger">
                 <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
              </div>
              <?php endif; ?>
              <!-- /.col-lg-12 -->
           </div>
           <!-- /.row -->
           <div class="row">
              <div class="panel-body">
                 <div class="table-responsive">
                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                       <div class="row">
                          <div class="col-sm-6">
                             <div class="dataTables_length" id="dataTables-example_length">
                             </div>
                          </div>
                       </div>
                       <table class="table table-striped table-bordered table-hover dataTable no-footer  " id="dataTables-example" aria-describedby="dataTables-example_info">
                          <thead>
                             <tr role="row" class="text-center">
                                <th class="text-center" > STT </th>
                                <th class="text-center"> Name </th>
                                <th class="text-center"> Slug </th>
                                <th class="text-center"> Thunbar </th>
                                <th class="text-center"> Address </th>
                                <th class="text-center" width="250"> Note </th>
                                <th class="text-center"> Info </th>
                                <th class="text-center"> Action </th>
                             </tr>
                          </thead>
                          <tbody>
                             <?php $stt=1; foreach ($product as $item): ?>
                             <tr class="gradeX even">
                                <td class=""><?php echo $stt ?></td>
                                <td class=""><?php echo $item['name'] ?></td>
                                <td class=""><?php echo $item['slug'] ?></td>
                                <td>
                                  <img src="http://localhost:8080/websieuthi/Public/frontend/Uploads/images/product/<?php echo $item['thunbar'] ?>" width="80" height="80" >
                                </td>
                                <td class=""><?php echo $item['address'] ?></td>
                                <td class=""><?php echo $item['note'] ?></td>
                                <td class="">
                                  <ul>
                                    <li>Giá : <?php echo $item['price'] ?></li>
                                    <li>Số lượng : <?php echo $item['number'] ?></li>
                                    <li>Giảm giá : -<?php echo $item['sale'] ?>%</li>
                                  </ul>
                                </td>
                                <td class="">
                                   <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i> Sửa </a>
                                   <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i> Xóa </a>
                                </td>
                             </tr>
                             <?php $stt++; endforeach ?>
                          </tbody>
                       </table>
                       <div class="row">
                          <div class="col-sm-6">
                             <div class="dataTables_paginate paging_simple_numbers pull-right" id="dataTables-example_paginate">
                                <ul class="pagination">
                                   <li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous"><a href="#">Previous</a></li>
                                   <li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#">1</a></li>
                                   <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">2</a></li>
                                   <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">3</a></li>
                                   <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">4</a></li>
                                   <li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next"><a href="#">Next</a></li>
                                </ul>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
           <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<?php require_once __DIR__. '/../../layouts/footer.php'; ?>