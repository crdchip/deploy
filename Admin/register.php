<?php 
   $open = "admin";
   session_start();
   require_once __DIR__. '/../Libraries/database.php';
   require_once __DIR__. '/../Libraries/function.php';  
   
   $db = new Database ;
   
   //Danh sách danh mục sản phẩm
   $admin = $db->fetchAll("admin");
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       # code...
       $data =
       [
           "account"         => postInput('account'),
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
       if (postInput('password') == "") {
           # code...
           $error['password'] = " Mời bạn nhập password...";
       }
    //    if (postInput('repassword') == "") {
    //     # code...
    //     $error['repassword'] = " Mời bạn xác nhận lại password...";
    //      }
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
        $id_insert = $db->insert("admin",$data);
        if ($id_insert) 
        {
             # code...
          move_uploaded_file($file_tmp, $part.$file_name);
          $_SESSION['seccess'] = "Thêm mới thành công";
          header('Location: http://localhost:8080/websieuthi/Admin/modules/login/login.php');
          exit;
        } 
        else
        {
          $_SESSION['error'] = " Thêm mới thất bại";
        } 
       }
   };
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Đăng ký</title>

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
            <form  method="POST" class="form-register">
                <h2 class="content">Đăng ký</h2>
                <div class="form-group">
                    <label for="" class="form-text" >Tài khoản</label>
                    <input type="text" class="form-control" name="account" >
                </div>
                <div class="form-group">
                    <label for="" class="form-text">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" >
                </div>
                <!-- <div class="form-group">
                    <label for="" class="form-text">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="repassword" >
                </div> -->
                <div class="form-group">
                    <label for="" class="form-text">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" >
                </div>
                <div class="form-group">
                    <label for="" class="form-text">Họ và tên</label>
                    <input type="text" class="form-control" name="name" >
                </div>
                <div class="form-group">
                    <label for="" class="form-text">Ngày sinh</label>
                    <input type="text" class="form-control" name="birthday" >
                </div>
                <div class="form-group">
                    <label for="" class="form-text" rows="4" >Địa chỉ</label>
                    <input type="text" class="form-control" name="address" >
                </div>
                <div class="form-group">
                    <button>Đăng ký tài khoản</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const formLogin = document.querySelectorAll('.form-group input')
        const formLabel = document.querySelectorAll('.form-group label')

        for(let i=0; i<10; i++){
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