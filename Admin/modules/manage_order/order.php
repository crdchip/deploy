<?php 
    session_start();
    if(!isset($_GET['code'])){
        header('location: list_order.php');
    }
    include "../../connect_db.php";
    // echo '<pre>' , var_dump($_GET['code']) , '</pre>';die;
    $sql_order = "SELECT * FROM cart_details, product WHERE cart_details.id_product = product.id AND cart_details.code_cart= '".$_GET['code']."' ORDER BY cart_details.id DESC;";
    $query_order = mysqli_query($conn, $sql_order);
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
                       <a href="index.php" title="">Đơn hàng</a>
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
                                <th class="text-center"> STT </th>
                                <th class="text-center"> Mã Đơn Hàng </th>
                                <th class="text-center"> Tên Sản Phẩm </th>
                                <th class="text-center"> Số Lượng </th>
                                <th class="text-center"> Đơn Giá </th>
                                <th class="text-center"> Thành Tiền </th>
                             </tr>
                          </thead>
                            <?php
                            $i = 0;
                            $tongtien = 0;
                            while($row = mysqli_fetch_array($query_order)){
                                $i++;
                                $thanhtien = $row['price']*$row['buy_number'];
                                $tongtien += $thanhtien; 
                            ?>
                          <tbody>
                             <tr class="gradeX even">
                                <td class="text-center"><?php echo $i ?></td>
                                <td class="text-center"><?php echo $row['code_cart'] ?> </td>
                                <td class="text-center"><?php echo $row['name'] ?> </td>
                                <td class="text-center"><?php echo $row['buy_number']?> </td>
                                <td class="text-center"><?php echo number_format($row['price']).' '.'vnđ';?> </td>
                                <td class="text-center"><?php echo number_format($thanhtien).' '.'vnđ';?> </td>
                             </tr>
                          
                          <?php
                            } 
                          ?>
                            <tr class="gradeX even">
                                <td colspan="6" style="text-align: right;"><span>Tổng tiền: </span> <?php echo number_format($tongtien).' '.'vnđ'; ?> </td>
                            </tr>
                            <tr class="gradeX even">
                                <td colspan="6" style="text-align: right;"><a href="list_order.php">Quay lại</a></td>
                            </tr>
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