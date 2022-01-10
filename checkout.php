<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="font_awesome/fontawesome-free-5.11.2-web/css/all.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}
    
    .g-pay{
        font-family: montserrat;
        text-align: center;
    }
    
    input[type=password] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
    
</style>
</head>
    
    
    <?php
    session_start();
    require 'includes/functions.php';
    if(!isset($_SESSION['customer_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    $name = $_SESSION['customer_name'];
    $email = $_SESSION['customer_email'];
    
    $total_items = totalItems();
    $total_price = totalPrice();
    if($total_items<=0){
        echo "<script>alert('You have no products')</script>";
        echo "<script>window.open('basket.php','_self')</script>";
    }
    
    $ip_add = getIp();
    $select_cart = "select * from cart where ip_add='$ip_add'";
    $run_cart = mysqli_query($con,$select_cart);
                            
    ?>
    
    
    
    
    
    
    
<body>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="checkout.php" method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" value="<?php echo $name; ?>" required readonly>
              
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>" required readonly>
              
            <label for="email"><i class="fas fa-id-card-alt"></i> NIC </label>
            <input type="text" id="phonenum" name="nic" placeholder="" required>
              
            <label for="email"><i class="fas fa-phone"></i> Phone </label>
            <input type="text" id="phonenum" name="phone" placeholder="" required>
              
            <label for="adr"><i class="far fa-address-card"></i> Address</label>
            <input type="text" id="adr" name="address" required>
              
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city"  required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state"  required>
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Payment Methods</label>
            <div class="icon-container">
              <i class="fab fa-cc-paypal" style="color:navy; font-size:40px;"></i>
            </div>
              
            
            <div class="row">
              <div class="col-50">
                
              </div>
              <div class="col-50">
                
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" name="checkout" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo $total_items ?></b></span></h4>
        
        <?php 
            while($raw_products=mysqli_fetch_array($run_cart)){
            $product_sub = $raw_products['sub_total'];
            $product_id = $raw_products['p_id'];
                
                $select_title = "select * from products where product_id='$product_id'";
                $run_title = mysqli_query($con,$select_title);
                
                while($get_title = mysqli_fetch_array($run_title)){
                    $title_final = $get_title['product_title'];
                
                
                                    
    ?>
        
        
      <p><?php echo $title_final ?> <span class="price">Rs. <?php echo  $product_sub ?> </span></p>

        <?php } } ?>
        
        
        
      <hr>
      <p>Total <span class="price" style="color:black"><b>Rs. <?php echo $total_price ?></b></span></p>
    </div>
  </div>
</div>

</body>
</html>














<?php

    if(isset($_POST['checkout'])){
        
        $nic = $_POST['nic'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $user_id;
        
        
        $select_products = "select * from cart where ip_add = '$ip_add'";
        $run_selected_pros = mysqli_query($con,$select_products);
        while($run_query = mysqli_fetch_array($run_selected_pros)){
            $product_id = $run_query['p_id'];
            $ip_address = $run_query['ip_add'];
            $product_price = $run_query['price'];
            $rent_start = $run_query['start_date'];
            $rent_end = $run_query['end_date'];
            $rent_qty = $run_query['qty'];
            $rent_sub_total = $run_query['sub_total'];
            
            $select_customer = "select * from users where email = '$email'";
            $run_selected_users = mysqli_query($con,$select_customer);
            while($run_users = mysqli_fetch_array($run_selected_users)){
                $user_id = $run_users['user_id'];
                
                $check_orders = "select * from orders where pro_id='$product_id' and customer_id='$user_id'";
                $process_order = mysqli_query($con,$check_orders);
                $run_process_orders = mysqli_num_rows($process_order);
                if($run_process_orders>0){
                    echo "<script>alert('You already added these products')</alert>";
                    break;
                }
                
                $insert_orders = "insert into orders(pro_id,start_date,end_date,payment,customer_id,qty)values('$product_id','$rent_start','$rent_end','$rent_sub_total','$user_id','$rent_qty')";
                
                $run_insert_orders = mysqli_query($con,$insert_orders);
                
            }
            
        }
        
        $update_user = "update users set user_nic='$nic',user_phone='$phone',user_address='$address',user_city='$city',user_state='$state',user_zip='$zip' where user_id='$user_id'";
        
        $final_update_user = mysqli_query($con,$update_user);
        
        echo "<script>window.open('paypal.php','_self')</script>";
        
    }







?>