<?php
    session_start();
    require 'includes/functions.php';
    
    if(isset($_POST['singup'])){
        $email = $_POST['mail'];
        $password = $_POST['psw']; 
        
        $sel_c = "select * from users where email='$email' AND password='$password'";
        $run_c = mysqli_query($con,$sel_c);
        
        $count = mysqli_num_rows($run_c);
        
        if($count==0){
            echo "<script>alert('Incorrect Password')</script>";
            echo "<script>window.open('login.php','_self')</script>";
            exit();
            
        }else{
            $select_user = "select * from users where email='$email'";
            $run_user = mysqli_query($con,$select_user);
            
            $get_user = mysqli_fetch_array($run_user);
            $user_name = $get_user['user_name'];
            
            $_SESSION['customer_email'] = $email;
            $_SESSION['customer_name'] = $user_name;
            
            $cart_items = totalItems();
            if($cart_items>0){
                echo "<script>window.open('checkout.php','_self')</script>";
            }else {echo "<script>window.open('index.php','_self')</script>";}
        }
        
    }
?>
