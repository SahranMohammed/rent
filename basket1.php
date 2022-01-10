<!DOCTYPE html>
<html>
    <head>
        <?php require 'includes/functions.php'; $con = mysqli_connect("localhost","root","","ecommerce"); ?>
        <title>Basket</title>
        
        <link rel="stylesheet" type="text/css" href="font_awesome/fontawesome-free-5.11.2-web/css/all.css">
        <style>
          border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}
        </style>
    </head>
    <body bgcolor="#f2f2f2">
        <div class="b-header">
            <?php
                    require 'header.php';
                ?>
        </div>
        
        
        
        
        
        
        <div class="b-container">
            <div class="b-inner_container">
                <div id="cart" class="col-md-9">
                    <div class="box">
                        <form action="basket.php" method="post">
                            <h2>My Basket</h2>
                            <?php
                            $ip_add = getIp();
                            $select_cart = "select * from cart where ip_add='$ip_add'";
                            $run_cart = mysqli_query($con,$select_cart);
                            
                            
                            ?>
                            <p class="text-muted">You currently have <?php echo $total_products_cart = totalItems();?> item(s) in your Basket</p><br><br><br>
                            <div class="table-responsive">
                                <table cellspacing="10" class="table">
                                    <thead >
                                        <tr>
                                            <th>Product</th>
                                            <th>Product</th>
                                            <th>Quentity</th>
                                            <th>Price per day</th>
                                            <th>Duration</th>
                                            <th>Delete</th>
                                            <th>Sub-total</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        <?php  
                                        
                                        while($raw_cart = mysqli_fetch_array($run_cart)){
                                            $pro_id = $raw_cart['p_id'];
                                            $pro_qty = $raw_cart['qty'];
                                            $pro_start = $raw_cart['start_date'];
                                            $pro_end = $raw_cart['end_date'];
                                            $pro_sub = $raw_cart['sub_total'];
                                            
                                            $get_products = "select * from products where product_id='$pro_id'";
                                            $run_products = mysqli_query($con,$get_products);
                                            
                                            while($raw_products=mysqli_fetch_array($run_products)){
                                                $product_title = $raw_products['product_title'];
                                                $product_img = $raw_products['product_img1'];
                                                $product_price = $raw_products['product_price'];
                                                $product_qty = $raw_products['product_qunty'];
                                        ?>
                                        <tr>
                                            <td>
                                                
                                                <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img; ?>" width="50" height="50" alt="this ti s product">
                                                
                                            </td>
                                            
                                             <td>
                                                <a href="single.php?pro_id=<?php echo $pro_id ?>"><?php echo $product_title; ?></a>
                                            </td>
                                            
                                            <td>
                                                <input type="text" name="qty[]" value="<?php echo $pro_qty; ?>">
                                                <input type="hidden" name="id[]" value="<?php echo $pro_id; ?>">
                            
                                                
                                            </td>
                                            
                                            <td ><p class="b-td">Rs. <?php echo $product_price ?></p></td>
                                            
                                            <td>
                                                from
                                                <input type="date" class="c-input" name="start[]" value="<?php echo $pro_start; ?>">
                                                <br>
                                                to &nbsp;&nbsp;&nbsp;
                                                <input type="date" name="end[]" value="<?php echo $pro_end; ?>" class="c-input">
                                                <input type="hidden" name="id1[]" value="<?php echo $pro_id; ?>">
                                            </td>
                                            
                                            <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" class="largerCheckbox"></td>
                                            
                                            <td><p class="b-td">Rs. <?php echo $pro_sub; ?></p></td>
                                            
                                        </tr>
                                        <?php } } ?> 
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th ></th>
                                            <th ></th>
                                            <th ></th>
                                            <th class="b-total">Total Amount</th>
                                            <th></th>
                                            <th class="b-lkr" >Rs. <?php echo $total_cart = totalPrice(); ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="b-button">
                                
                                 
                                <button name="update" type="submit" value="update cart" class="b-update_cart"><i class="fas fa-sync-alt"></i>&nbsp;&nbsp; Update Basket</button></div></form>
                        <a href="index.php"> <button class="b-countinue"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Countinue shopping</button></a>
                                
                        <a href="checkout.php"><button class="b-check"><i class="far fa-credit-card"></i>&nbsp; &nbsp;Checkout</button></a>
                                
                               
                            
                        
                    </div>
                    <?php 
                        echo @$up_cart = update_cart();
                        echo @$set_qty = set_qty();    
                        echo @$set_start_date = updateStartDate();
                        echo @$set_end_date = updateEndDate(); 
                        echo @$update_full = updateSubTotal();
                        ?>
                </div>
            </div>
        </div>
        
        
        
        
     
        
        
        
        <div class="b-footer">
            <?php
                    require 'footer.php';
                ?>
        </div>
    </body>
</html>
























<div class="a-all_lenses">
                    <div class="a-len_header">
                        <p>LENSE COLLECTION</p>
                    </div>
                    <div class="a-display_lense">
                        <?php get_lense(); ?>
                    </div>
                </div>