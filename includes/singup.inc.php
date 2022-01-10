<?php
require 'db_conn.php';
require 'functions.php';

if(isset($_POST['singup'])){
    session_start();

    $username = $_POST['name'];
    $email = $_POST['mail'];
    $password = $_POST['psw'];
    $repeat = $_POST['psw-repeat'];
  
    $s = "select * from users where email='$email'";
    $result = mysqli_query($conn,$s);
    $num = mysqli_num_rows($result);
    if($num>=1){
         echo "<script>alert('Already rigistered E-mail')</script>";
         echo "<script>window.open('../singup.php','_self')</script>";
         exit();
    }
    else if($password !== $repeat){
        echo "<script>alert('Passwords are not match')</script>";
        echo "<script>window.open('../singup.php','_self')</script>";
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Invalid email')</script>";
        echo "<script>window.open('../singup.php','_self')</script>";
        exit();
    }
    
    $sql = "INSERT INTO users (user_name, email, password)
    VALUES ('$username', '$email', '$password')";
    $_SESSION['customer_email'] = $email;
    $_SESSION['customer_name'] = $username;

    if ($conn->query($sql) === TRUE) {
    
        echo "<script>alert('Your Account Created Successfully')</script>";
        $total_items = totalItems();
        if($total_items==0){
            echo "<script>window.open('../index.php','_self')</script>";
        } else{ echo "<script>window.open('../checkout.php','_self')</script>"; }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
}


    
}
?>