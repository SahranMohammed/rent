<?php
require_once 'db.php';
require_once 'session_start.php';
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>View rents</title>
        <style>
             #customers {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                justify-content: center;
                    }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
            .pro-container{
                
            }
            .pro-container p{
                text-align: center;
                font-family: montserrat;
                font-size: 23px;
                font-weight: 500;
            }
            #customers a{
                text-decoration: none;
            }
            #customers a:hover{
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="pro-container">
            <p>EXPIRED RENTS</p><br><br>
            
        <table id="customers">
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Quentity</th>
                <th>Payment</th>
                <th>Edit</th>
                <th>Return</th>
                <th>Mail</th>
                
            </tr>
            <?php
            $end_date = date("Y-m-d");
            $no = 0;
            $select_orders = "select * from orders where end_date<'$end_date'";
            $run_orders = mysqli_query($con,$select_orders);
            while($get_orders = mysqli_fetch_array($run_orders)){
                $id = $get_orders['order_id'];
                $pro_id = $get_orders['pro_id'];
                $start_date = $get_orders['start_date'];
                $end_date = $get_orders['end_date'];
                $payment = $get_orders['payment'];
                $customer_id = $get_orders['customer_id'];
                $qty = $get_orders['qty'];
                
                $no = $no+1;
                
                $select_customer = "select * from users where user_id='$customer_id'";
                $run_users = mysqli_query($con,$select_customer);
                $get_customer = mysqli_fetch_array($run_users);
                $email = $get_customer['email'];
                $name = $get_customer['user_name'];
                
                
                $select_product = "select * from products where product_id='$pro_id'";
                $run_product = mysqli_query($con,$select_product);
                $get_product = mysqli_fetch_array($run_product);
                $title = $get_product['product_title'];
                $price = $get_product['product_price'];
                
            
            ?>
            <tr><td><?php echo $no; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $title; ?></td>
                <td><?php echo $start_date; ?></td>
                <td><?php echo $end_date; ?></td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $payment; ?></td>
                <td><i class="fas fa-pencil-alt" style="color:blue"></i>&nbsp;<a href="index.php?edit_today=<?php echo $id; ?>">Edit</a></td>
                <td><a href="delete_today.php?delete_order=<?php echo $id; ?>">Returned</a></td>
                <td><a href="index.php?mail=<?php echo $id; ?>">mail</a></td>
            </tr>
            <?php } ?>
        </table><br><br>
        </div>
    </body>
</html>