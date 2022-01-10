<?php 
require_once 'db.php';
require_once 'session_start.php';
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{
    if(isset($_GET['pro_id'])){
        $detect_id = $_GET['pro_id'];
        $select_product = "delete from products where product_id='$detect_id'";
        $delete_product = mysqli_query($con,$select_product);
        
        if($delete_product){
             echo "<script>alert('Product has been deleted')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    }
    
    
    
    
}
