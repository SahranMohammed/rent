<?php
require_once 'db.php';
require_once 'session_start.php';
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{
    if(isset($_GET['delete_order'])){
        $id = $_GET['delete_order'];
        
        $select_order = "delete from orders where order_id='$id'";
        $run_del = mysqli_query($con,$select_order);
        
        if($run_del){
            echo "<script>alert('Renting has been deleted')</script>";
            echo "<script>window.open('index.php?all_rents','_self')</script>";
        }
    }
    
}
?>