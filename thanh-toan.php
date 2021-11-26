<?php
    session_start();
    include "connection.php";
    $id_khachhang = $_SESSION['id_khachhang'];
    $code_cart = rand(0,9999);
    $insert_cart = "INSERT INTO cart(id_khachhang, code_cart, cart_status) VALUE('".$id_khachhang."','".$code_cart."',1)";
    $cart_query = mysqli_query($conn,$insert_cart);
    if($insert_cart){
        // Thêm vào giỏ hàng chi tiết
        foreach($_SESSION['cart'] as $key => $value){
            $id_product = $value['id'];
            $number = $value['number'];
            $insert_cart_details = "INSERT INTO cart_details(code_cart, id_product, buy_number) VALUE('".$code_cart."','".$id_product."','".$number."')";
            mysqli_query($conn, $insert_cart_details);
        }
    }
    unset($_SESSION['cart']);
    header("location: index.php");
?>
    
    