<?php 
ob_start();
session_start();
$openn = "admin";
require_once __DIR__. '/../Libraries/database.php';
require_once __DIR__. '/../Libraries/function.php'; 

$db = new Database ;

$admin = $db->fetchAll("admin");
include_once 'connect_db.php';

if(isset($_POST["submit_login"]) && $_POST["account"] != '' && $_POST["password"] != ''){
    $account = $_POST["account"];
    $password = $_POST["password"];
    if(isset($account) && isset($password)){
        $sql = "SELECT * FROM admin WHERE account = '$account' AND password = '$password'";
        // echo $sql; exit;
        $query = mysqli_query($conn,$sql);
        $rows = mysqli_num_rows($query);
        $row_dangnhap = mysqli_fetch_array($query);
      // echo $rows; exit;
    if($rows>0){
        $_SESSION['dangnhap'] = $row_dangnhap['name'];
        header('Location: http://localhost:8080/websieuthi/Admin/index.php');
    }
    else{
        echo '<center class="alert alert-danger">Tài khoản không tồn tại hoặc không có quyền truy cập</center>';
    }

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Đăng nhập</title>

    <!-- Core CSS - Include with every page -->
    <link href="http://localhost:8080/websieuthi/Public/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost:8080/websieuthi/Public/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="http://localhost:8080/websieuthi/Public/admin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="http://localhost:8080/websieuthi/Public/admin/css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link rel="stylesheet" href="http://localhost:8080/websieuthi/Public/admin/css/style.css">
</head>
<body>
    <div class="main">
        <div class="container">
            <form  method="POST" class="form-login">
                <h1 class="content">Đăng nhập</h1>
                <div class="form-group">
                    <label for="" class="form-text" >Username</label>
                    <input type="text" class="form-control" name="account" >
                </div>
                <div class="form-group">
                    <label for="" class="form-text">Password</label>
                    <input type="password" class="form-control" name="password" >
                </div>
                <div class="form-group">
                    <button name="submit_login">Đăng nhập</button>
                    <span>Bạn chưa có tài khoản ? Đăng kí <a href="register.php">Tại đây</a></span>
                </div>
            </form>
        </div>
    </div>
    <script>
        const formLogin = document.querySelectorAll('.form-group input')
        const formLabel = document.querySelectorAll('.form-group label')

        for(let i=0; i<2; i++){
            formLogin[i].addEventListener("mouseover", function(){
                formLabel[i].classList.add("focus")
            })
            formLogin[i].addEventListener("mouseout", function(){
                if(formLogin[i].value==""){
                    formLabel[i].classList.remove("focus")
                }
            })
        }
    </script>
</body>
</html>