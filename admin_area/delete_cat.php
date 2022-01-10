<?php
require_once 'db.php';
require_once 'session_start.php';
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{
    if(isset($_GET['edit_cat'])){
        $id = $_GET['edit_cat'];
        
        $select_cat = "delete from catogories where cat_id='$id'";
        $run_del = mysqli_query($con,$select_cat);
        
        if($run_del){
            echo "<script>alert('Category has been deleted')</script>";
            echo "<script>window.open('index.php?view_cat','_self')</script>";
        }
    }
    
}
?>