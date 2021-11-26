<?php 
    session_start();
    ob_start();
   $open = "product";
   
   
   require_once __DIR__. '/Libraries/database.php';
   require_once __DIR__. '/Libraries/function.php';
   
   $db = new Database;
   
    
   $product = $db->fetchAll("product");

   $id = intval(getInput('id'));
   
   $sql = "SELECT * FROM product";
   $product = $db->fetchsql($sql);
   
   ?>
   <?php
     if(isset($_GET['login_user'])){
            $dangxuat = $_GET['login_user'];
        }
    else{
            $dangxuat = "";
        }
    if($dangxuat == 'dangxuat'){
            unset($_SESSION['member']);
            
        }
?>

<?php require_once __DIR__. '/Layouts/header.php'; ?>
        <?php require_once __DIR__. '/slide.php'; ?>
        <?php require_once __DIR__. '/adv.php'; ?>
         <!-- Nôi dung chính -->
         <div class="main">
            <div class="container">
               <?php require_once __DIR__. '/main.php"'; ?>
            </div>
         </div>
         <?php require_once __DIR__. '/partner.php'; ?>
<?php require_once __DIR__. '/Layouts/footer.php'; ?>
<script  type="text/javascript" >
   $(document).ready(function(){
       $(".menu-quick-select ul").show();
       $(".menu-quick-select").hover(function(){
           $(".menu-quick-select ul").show();
       },
       function(){
           $(".menu-quick-select ul").show();
       });
   });
</script>