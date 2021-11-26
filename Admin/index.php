<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('location: login.php');
    }

?>
<?php
     if(isset($_GET['login'])){
            $dangxuat = $_GET['login'];
        }
    else{
            $dangxuat = "";
        }
    if($dangxuat == 'dangxuat'){
            unset($_SESSION['dangnhap']);
            header('location: login.php');
        }
?>

<?php require_once __DIR__. '/layouts/header.php'; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Trang chủ</h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>
                            <a href="index.php" title="">Trang chủ</a>
                        </li>
                    </ol>
                </div>
                    <?php
                      require_once __DIR__. "/../Libraries/database.php";
                      $db = new Database;
                      $category = $db->fetchAll("category");
                    ?>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">     <!-- /.panel -->
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php require_once __DIR__. '/layouts/footer.php'; ?>