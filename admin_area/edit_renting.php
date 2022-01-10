<?php
require_once 'db.php';
require_once 'session_start.php';
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{
    if(isset($_GET['edit_orders'])){
        $id = $_GET['edit_orders'];
        
        $select_order = "select * from orders where order_id='$id'";
        $run_order = mysqli_query($con,$select_order);
        $get_order = mysqli_fetch_array($run_order);
        $end_date = $get_order['end_date'];
        $start_date = $get_order['start_date'];
        $pro_id = $get_order['pro_id'];
        
        $select_product = "select * from products where product_id='$pro_id'";
        $run_pro = mysqli_query($con,$select_product);
        $get_product = mysqli_fetch_array($run_pro);
        $product_price = $get_product['product_price'];
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Insert cat</title>
        <style>
            .header p{
                font-size:23px;
                text-align: center;
                font-weight: 600;
                font-family: montserrat;
                
            }
            .inner-container{
                width: 900px;
                margin: 0 auto;
            }
            input[type=date] {
                width: 100%;
                margin-bottom: 20px;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }
            label{
                font-family: montserrat;
                font-size:18px;
            }
            button{
                width:100%;
                background-color:  #11b300;
                border: hidden;
                border-radius: 4px;
                color: white;
                font-size: 16px;
                height: 35px;
                font-family: montserrat;
            }
            button:hover{
                background-color: #1f6e17;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="inner-container">
                <div class="header">
                    <p>EDIT RENTING</p><br><br>
                </div>
                <div class="inputs">
                    <form action="" method="post">
                    <label class="lbl">End Date</label><br><br>
                    <input class="input" type="date" name="date" value="<?php echo $end_date; ?>"><br>
                        <button name="update_date">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>



<?php
if(isset($_POST['update_date'])){
    $update_date = $_POST['date'];
    
    $start = strtotime($start_date);
    $end = strtotime($update_date);
    $dif = $end - $start;
    $days = floor($dif / (60*60*24) );
    
    $update_payment = $product_price*$days;
    
    $update_order = "update orders set end_date='$pda$update_date', payment='$update_payment' where order_id='$id'";
    $run_update = mysqli_query($con,$update_order);
    if($run_update){
        echo "<script>alert('Renting has been updated')</script>";
        echo "<script>window.open('index.php?all_rents','_self')</script>";
    }
    
}


?>











