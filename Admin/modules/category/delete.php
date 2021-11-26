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

    $num = $db->delete("category",$id);
    if($num > 0)
    {
        $_SESSION['success'] = "Xóa thành công";
                header('Location: index.php');
                exit;
    }
    else
    {
        $_SESSION['error'] = "Xóa thất bại";
                header('Location: index.php');
                exit;
    }

?>
