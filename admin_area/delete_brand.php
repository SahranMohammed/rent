<?php
require_once 'db.php';
require_once 'session_start.php';
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{
    if(isset($_GET['edit_brand'])){
        $id = $_GET['edit_brand'];
        
        $select_cat = "delete from brands where brand_id='$id'";
        $run_del = mysqli_query($con,$select_cat);
        
        if($run_del){
            echo "<script>alert('Brand has been deleted')</script>";
            echo "<script>window.open('index.php?view_brand','_self')</script>";
        }
    }
    
}
?>