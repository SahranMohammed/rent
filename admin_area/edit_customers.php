<?php
require_once 'db.php';
require_once 'session_start.php';
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
} else{
    if(isset($_GET['edit_customers'])){
        $id = $_GET['edit_customers'];
       
        $select_customer = "select * from users where user_id='$id'";
        $run_customer = mysqli_query($con,$select_customer);
        $assign_data = mysqli_fetch_array($run_customer);
        
            $name = $assign_data['user_name'];
            $email = $assign_data['email'];
            $nic = $assign_data['user_nic'];
            $phone = $assign_data['user_phone'];
            $address = $assign_data['user_address'];
            $city = $assign_data['user_city'];
            $state = $assign_data['user_state'];
            $zip = $assign_data['user_zip'];
        
       
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Categories</title>
        <style>
            .inner-container{
                width: 900px;
                margin: 0 auto;
            }
            .header p{
                font-size: 23px;
                font-family: montserrat;
                font-weight: 500;
                text-align: center;
            }
            input[type=text] {
                width: 100%;
                margin-bottom: 20px;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }
            button{
                width: 100%;
                height: 35px;
                background-color: #11b300;
                border: hidden;
                border-radius: 4px;
                color: white;
                font-size: 14px;
            }
             button:hover{
                background-color: #1f6e17;
            }
            label{
                font-family: montserrat;
                font-size: 18px;
            }
        
        </style>
    </head>
    <body>
        <div class="container">
            <div class="inner-container">
                <div class="header">
                    <p>EDIT CUSTOMER</p><br><br>
                </div>
                <div class="input">
                    <form action="" method="post">
                    <label class="lbl">Customer Name</label><br>
                    <input class="input" name="name" type="text" value="<?php echo $name; ?>"><br>
                        
                    <label class="lbl">E-mail</label><br>
                    <input class="input" name="email" type="text" value="<?php echo $email; ?>"><br>
                        
                    <label class="lbl">NIC</label><br>
                    <input class="input" name="nic" type="text" value="<?php echo $nic; ?>"><br>
                        
                    <label class="lbl">Phone </label><br>
                    <input class="input" name="phone" type="text" value="<?php echo $phone; ?>"><br>
                        
                    <label class="lbl">Address</label><br>
                    <input class="input" name="address" type="text" value="<?php echo $address; ?>"><br>
                        
                    <label class="lbl">City</label><br>
                    <input class="input" name="city" type="text" value="<?php echo $city; ?>"><br>
                        
                    <label class="lbl">State</label><br>
                    <input class="input" name="state" type="text" value="<?php echo $state; ?>"><br>
                        
                    <label class="lbl">ZIP</label><br>
                    <input class="input" name="zip" type="text" value="<?php echo $zip; ?>"><br>
                        
                    <button name="update">Update</button><br><br>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>





<?php 
    if(isset($_POST['update'])){
        $up_name = $_POST['name'];
        $up_mail = $_POST['email'];
        $up_nic = $_POST['nic'];
        $up_phone = $_POST['phone'];
        $up_address = $_POST['address'];
        $up_city = $_POST['city'];
        $up_state = $_POST['state'];
        $up_zip = $_POST['zip'];
        
        $update = "update users set user_name='$up_name', email='$up_mail', user_nic='$up_nic', user_phone='$up_phone', user_address='$up_address', user_city='$up_city', user_state='$up_state', user_zip='$up_zip' where user_id='$id'";
        
        $run_update = mysqli_query($con,$update);
        
        if($run_update){
            echo "<script>alert('customer account has been updated')</script>";
            echo "<script>window.open('index.php?view_customers','_self')</script>";
        }
    }

?>