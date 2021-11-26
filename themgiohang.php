
<?php
    session_start();
    include 'connection.php';
    // // themsoluonh
    if(isset($_GET['after'])){
        $id = $_GET['after'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                $product_add[] = array('name'=>$cart_item['name'], 'id' =>$cart_item['id'], 'number' =>$cart_item['number'], 'price' => $cart_item['price'], 'thunbar'=>$cart_item['thunbar'] );
                $_SESSION['cart'] = $product_add;
            }
            else{
                
                if($cart_item['number'] <= 9){
                    $after = $cart_item['number'] + 1;
                    $product_add[] = array('name'=>$cart_item['name'], 'id' =>$cart_item['id'], 'number' =>$after, 'price' => $cart_item['price'], 'thunbar'=>$cart_item['thunbar'] );
                }
                else{
                    $product_add[] = array('name'=>$cart_item['name'], 'id' =>$cart_item['id'], 'number' =>$cart_item['number'], 'price' => $cart_item['price'], 'thunbar'=>$cart_item['thunbar'] );
                }
                $_SESSION['cart'] = $product_add;
            }
        }
        header('location: gio-hang.php');
    }
    // // trusoluong
    if(isset($_GET['prev'])){
        $id = $_GET['prev'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                $product_add[] = array('name'=>$cart_item['name'], 'id' =>$cart_item['id'], 'number' =>$cart_item['number'], 'price' => $cart_item['price'], 'thunbar'=>$cart_item['thunbar'] );
                $_SESSION['cart'] = $product_add;
            }
            else{
                if($cart_item['number'] >=1){
                    $prev = $cart_item['number'] - 1;
                    $product_add[] = array('name'=>$cart_item['name'], 'id' =>$cart_item['id'], 'number' =>$prev, 'price' => $cart_item['price'], 'thunbar'=>$cart_item['thunbar'] );
                }
                else{
                    $product_add[] = array('name'=>$cart_item['name'], 'id' =>$cart_item['id'], 'number' =>$cart_item['number'], 'price' => $cart_item['price'], 'thunbar'=>$cart_item['thunbar'] );
                }
                $_SESSION['cart'] = $product_add;
            }
        }
        header('location: gio-hang.php');
    }
    // // xoasanpham
    if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                $product_add[] = array('name'=>$cart_item['name'], 'id' =>$cart_item['id'], 'number' =>$cart_item['number'], 'price' => $cart_item['price'], 'thunbar'=>$cart_item['thunbar'] );
            }
            $_SESSION['cart'] = $product_add;
            header('location: gio-hang.php');
        }
    }
    // xoa tat ca
    if(isset($_GET['xoatatca']) && $_GET['xoatatca']==1){
        unset($_SESSION['cart']);
        header('location: gio-hang.php');
    }
    // // themsanpham vao gio hang
    // echo '<pre>' , var_dump(isset($_GET['id'])) , '</pre>';die;

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $num = 1;
        $sql = "SELECT * FROM product WHERE id = '$id'  LIMIT 1";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
        // echo '<pre>' , var_dump($row) , '</pre>';die;
        if($row){
            $new_product = array(array('name'=>$row['name'], 'id' =>$id, 'number' =>$num, 'price' => $row['price'], 'thunbar'=>$row['thunbar'] ));
            //kiemtra giohang ton tai khong
            if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as $cart_item){
                    // Nếu dữ liệu trùng
                    if($cart_item['id']==$id){
                        $product_add[] = array('name'=>$cart_item['name'], 'id' =>$cart_item['id'], 'number' =>$cart_item['number']+1, 'price' => $cart_item['price'], 'thunbar'=>$cart_item['thunbar'] );
                        $found = true;
                    }
                    else{
                        // nếu dữ liệu k trùng
                        $product_add[] = array('name'=>$cart_item['name'], 'id' =>$cart_item['id'], 'number' =>$cart_item['number'], 'price' => $cart_item['price'], 'thunbar'=>$cart_item['thunbar'] );
                    }
                }
                if($found == false){
                    //liên kết dữ liệu new_product vs product add
                    $_SESSION['cart'] = array_merge($product_add, $new_product);
                }
                else{
                    $_SESSION['cart'] = $product_add;
                }
            }
            else{
                $_SESSION['cart'] = $new_product;
            }
        }
        header('location: gio-hang.php');
        // print_r($_SESSION['cart']);
        
    }
?>
