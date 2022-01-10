<?php 
    require 'includes/functions.php';
    require 'header.php';
    if(!isset($_SESSION['customer_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{  ?>




<?php
        $customer_email = $_SESSION['customer_email'];
        $select_customers = "select * from users where email='$customer_email'";
        $run_customer = mysqli_query($con,$select_customers);
        $get_customer_details = mysqli_fetch_array($run_customer);
        
        $user_name = $get_customer_details['user_name'];
        $user_email = $get_customer_details['email'];
        $user_nic = $get_customer_details['user_nic'];
        $user_phone = $get_customer_details['user_phone'];
        $user_address = $get_customer_details['user_address'];
        $user_city = $get_customer_details['user_city'];
        $user_state = $get_customer_details['user_state'];
        $user_zip = $get_customer_details['user_zip'];
        $user_password = $get_customer_details['password'];
        $user_id = $get_customer_details['user_id']
        
        
?>


















    
<html>
    <head>
        <title>My Account</title>
        <link rel="stylesheet" href="styles/style-my_account.css" media="all" type="text/css">
    </head>
    <body>
        <div class="m-container">
            <div class="m-inner_container">
                <div class="m-header">
                    <p>MY ACCOUNT</p>
                </div>
                <div class="m-cols">
                    <form action="my_account.php" method="post">
                    <label class="m-lable"><p>Full Name</p></label>
                    <input type="text" name="name" class="m-input" value="<?php echo $user_name; ?>"><br>
                    
                    <label class="m-lable"><p>E mail</p></label>
                    <input type="text" name="email" class="m-input" value="<?php echo $user_email; ?>"><br>
                    
                    <label class="m-lable"><p>Address</p></label>
                    <input type="text" name="address" class="m-input" value="<?php echo $user_address; ?>"><br>
                    
                    <label class="m-lable"><p>City</p></label>
                    <input type="text" name="city" class="m-input" value="<?php echo $user_city; ?>"><br>
                        
                    <label class="m-lable"><p>Phone</p></label>
                    <input type="text" name="phone" class="m-input" value="<?php echo $user_phone; ?>"><br>
                    
                    <label class="m-lable"><p>State</p></label>
                    <input type="text" name="state" class="m-input" value="<?php echo $user_state; ?>"><br>
                    
                    <label class="m-lable"><p>Nic</p></label>
                    <input type="text" name="nic" class="m-input" value="<?php echo $user_nic; ?>"><br>
                    
                    <label class="m-lable"><p>ZIP</p></label>
                    <input type="text" name="zip" class="m-input" value="<?php echo $user_zip; ?>"><br>
                        <div class="m-button">
                            <button name="update" type="submit" class="m-update"><p>UPDATE</p></button>
                        </div>
                        
                    </form>
                </div>
                <div class="m-change_pass">
                    <p>CHANGE PASSWORD</p>
                </div>
                <div class="m-cols">
                    <form action="my_account.php" method="post">
                    <label class="m-lable"><p>Old password</p></label>
                    <input type="text" name="old" class="m-input"><br>
                    
                    <label class="m-lable"><p>New Password</p></label>
                    <input type="text" name="new" class="m-input"><br>
                    
                    <label class="m-lable"><p>Repeat New Password</p></label>
                    <input type="text" name="repeat" class="m-input"><br>
                    
                    <div class="m-button">
                        <button name="password" type="submit" class="m-update"><p>CONFIRM</p></button>
                    </div>
                    </form>
                </div>
                <div class="m-change_pass">
                    <p>MY ORDERS</p>
                </div>
                <div class="m-cols">
                    <table id="customers">
                        <tr>
                            <th>PRODUCT</th>
                            <th>RENTOUT DATE</th>
                            <th>RETURN DATE</th>
                            <th>QUENTITY</th>
                            <th>PAYMENT</th>
                        </tr>
                        
                        <?php 
                        $select_products = "select * from orders where customer_id='$user_id'";
                        $run_products = mysqli_query($con,$select_products);
                        while($get_products=mysqli_fetch_array($run_products)){
                            $product_id = $get_products['pro_id'];
                            $start_date = $get_products['start_date'];
                            $end_date = $get_products['end_date'];
                            $quentity = $get_products['qty'];
                            $payment = $get_products['payment'];
                            
                            $select_name = "select * from products where product_id='$product_id'";
                            $run_name = mysqli_query($con,$select_name);
                            while($get_name=mysqli_fetch_array($run_name)){
                                $product_name = $get_name['product_title'];
                            
        ?>
                        
                        
                        <tr>
                            <td><a href="single.php?pro_id=<?php echo $product_id;?> "><?php echo $product_name; ?></a></td>
                            <td><?php echo $start_date; ?></td>
                            <td><?php echo $end_date; ?></td>
                            <td><?php echo $quentity; ?></td>
                            <td><?php echo $payment; ?></td>
                        </tr>
                        <?php } } ?>
                    </table>
                    <br><br><br><br>
                </div>
            </div>
        </div>
        <div class="m-footer">
            <?php require 'footer.php'; ?>
        </div>
    </body>
</html>

<?php } ?>











<?php
    if(isset($_POST['update'])){
        $update_username = $_POST['name'];
        $update_email = $_POST['email'];
        $update_address = $_POST['address'];
        $update_city = $_POST['city'];
        $update_phone = $_POST['phone'];
        $update_state = $_POST['state'];
        $update_nic = $_POST['nic'];
        $update_zip = $_POST['zip'];
        
        $update_users = "update users set user_name='$update_username',email='$update_email',user_nic='$update_nic',user_phone='$update_phone',user_address='$update_address',user_city='$update_city',user_state='$update_state',user_zip='$update_zip' where user_id='$user_id'";
        
        $final_update = mysqli_query($con,$update_users);
        
        echo "<script>alert('UPDATE SUCCESSFUL')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
        
        
    }



    if(isset($_POST['password'])){
        $old_password = $_POST['old'];
        $new_password = $_POST['new'];
        $repeat_password = $_POST['repeat'];
        
        if($old_password !== $user_password){
            echo "<script>alert('INCORRECT PASSWORD')</script>";
        }
        else if($new_password !== $repeat_password){
            echo "<script>alert('NEW PASSWORDS ARE NOT MATCH')</script>";
        }
        else{
            $update_password = "update users set password='$new_password' where user_id='$user_id'";
            $run_update_password = mysqli_query($con,$update_password);
            
            echo "<script>alert('YOUR PASSWORD IS UPDATED')</script>";
            echo "<script>window.open('my_account.php','_self')</script>";
        }
        
    }







?>




