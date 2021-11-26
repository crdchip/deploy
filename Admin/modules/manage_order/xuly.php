<?php
    include "../../connect_db.php"; 
    if(isset($_GET['code'])){
        $code = $_GET['code'];
        // echo '<pre>' , var_dump($code) , '</pre>';die;
        $sql_update = "UPDATE cart SET cart_status = 0 WHERE code_cart = '".$code."'";
        $query = mysqli_query($conn, $sql_update);
        header('location: list_order.php');
    }
    
?>