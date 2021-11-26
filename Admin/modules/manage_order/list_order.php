<?php 
    session_start();
    include "../../connect_db.php";
    $sql_list_order = "SELECT * FROM cart, user WHERE cart.id_khachhang = user.id ORDER BY cart.id DESC";
    $query_list_order = mysqli_query($conn, $sql_list_order);
?>
<?php require_once __DIR__. '/../../layouts/header.php'; ?>
        <div id="page-wrapper">
           <div class="row">
              <div class="col-lg-12">
                 <h1 class="page-header">Quản lý đơn hàng</h1>
                 <ol class="breadcrumb">
                    <li>
                       <i class="fa fa-dashboard"></i>
                       <a href="../../../index.php" title="">Trang chủ</a>
                    </li>
                    <li>
                       <i class="fa fa-dashboard"></i>
                       <a href="index.php" title="">Liệt kê đơn hàng</a>
                    </li>
                 </ol>
                 <!-- <a href="add.php" title="" class="btn btn-info " >Thêm mới</a> -->
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
                       <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
                          <thead>
                             <tr role="row">
                                <th> STT </th>
                                <th> Mã Đơn Hàng </th>
                                <th> Tên Khách Hàng </th>
                                <th> Địa Chỉ </th>
                                <th> Email </th>
                                <th> Số Điện Thoại </th>
                                <th> Tình Trạng </th>
                                <th> Quản lý </th>
                             </tr>
                          </thead>
                          <?php
                            $i = 0;
                            while($row = mysqli_fetch_array($query_list_order)){
                                $i++;
                          ?>
                          <a href=""></a>
                          <tbody>
                             <tr class="gradeX even">
                                <td class=""><?php echo $i ?></td>
                                <td class=""><?php echo $row['code_cart'] ?></td>
                                <td class=""><?php echo $row['name'] ?></td>
                                <td class=""><?php echo $row['address'] ?></td>
                                <td class=""><?php echo $row['email'] ?></td>
                                <td class=""><?php echo $row['phone'] ?></td>
                                <td class="">
                                    
                                    <?php 
                                    if($row['cart_status']==1){
                                        echo '<a href="xuly.php?code='.$row['code_cart'].'">Đơn Hàng Mới</a>';
                                    }else{
                                        echo 'Đã xử lý';
                                    }

                                    ?>
                                </td>
                                <td class="">
                                   <a class="btn btn-xs btn-info" href="order.php?code=<?php echo $row['code_cart']?>"><i class="fa fa-edit"></i> Xem đơn hàng </a>
                                </td>
                             </tr>
                          </tbody>
                          <?php
                            } 
                          ?>
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