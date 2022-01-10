<?php 
require 'includes/functions.php';
$con = mysqli_connect("localhost","root","","ecommerce");
   $product_id=0;
    if(isset($_GET['pro_id'])){
        $product_id = $_GET['pro_id'];
        $get_product = "select * from products where product_id = $product_id";
        $run_product = mysqli_query($con,$get_product);
        $row_product = mysqli_fetch_array($run_product);
        
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img1 = $row_product['product_img1'];
        $pro_img2 = $row_product['product_img2'];
        $pro_img3 = $row_product['product_img3'];
        $pro_img4 = $row_product['product_img4'];
        $pro_desc = $row_product['product_desc'];
        
    }
    

?>








<!DOCTYPE html>
<html>
    <head><title>Single_product</title>
        <link rel="stylesheet" type="text/css" href="../font_awesome/fontawesome-free-5.11.2-web/css/all.css">
        <link rel="stylesheet" href="styles/style-single.css" type="text/css" media="all">
        

    </head>
    <body>
        <div class="s-header">
                <?php
                    require 'header.php';
                ?>
        </div>
        <div class="s-container">
            <div class="s-inner_container">
                <div class="s-product_view">
                    <div class="s-main">
                        <?php  
                            echo "<img id='main_img' src='admin_area/product_images/$pro_img1' width='360' height='360'/>";
                        ?>
                    </div>
                    <div class="s-sub_view">
                        <div class="s-sub"><?php echo "<img id='sub_img' src='admin_area/product_images/$pro_img1' width='100' height='100' onclick='change_image()'/>" ?></div>
                        
                        <div class="s-sub"><?php echo "<img id='sub_img' src='admin_area/product_images/$pro_img2' width='100' height='100'onclick='change_image()'/>" ?></div>
                        
                        <div class="s-sub"><?php if($pro_img3 != null){ echo "<img src='admin_area/product_images/$pro_img3' width='100' height='100'/>";} ?></div>
                        
                        <div class="s-sub"><?php if($pro_img4 != null){ echo "<img src='admin_area/product_images/$pro_img4' width='100' height='100'/>";} ?></div>
                        
                    </div>
                </div>
                <div class="s-product_buy">
                   <div class="s-price">
                       <h3> <?php echo $pro_title; ?></h3><br>
                       <div class="s-main_price"><h3>Rs. <?php echo $pro_price; ?>&nbsp;.00</h3></div>
                       <label class="s-per_day"><i class="fas fa-exclamation-triangle" style="color:red;"></i>&nbsp;Per day</label>
                       <br><br><br>
                       <div class="s-date">
                           <div class="s-date_inner">
                               
                                  <form action="single.php?add_cart=<?php echo $product_id;  ?>" method="post">
                                   <label class="s-lbl_from">Rentout Date</label><br><br>
                                   <input type="date" class="s-from_date" name="rentout" placeholder="" required><br><br><br>
                                   
                                    <label class="s-lbl_from">Return Date</label><br><br>
                                    <input type="date" class="s-from_date" name="return" placeholder="" required><br><br>
                                   
                                   <label class="s-rent_least"><i class="fas fa-exclamation-circle" style="color:red;"></i>&nbsp;Rentings must be at least one day</label><br><br>
                                   
                                   <button type="submit" class="s-add_cart" name="submit1"><p style="color:white;font-size:20px">ADD TO BASKET</p></button> <?php  singleCart() ?>
                                    </form>
                           </div>
                       </div>
                       
                       
                       
                    </div> 
                    <div class="s-disc">
                        <p><?php echo $pro_desc; ?></p>
                        <br><br>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="s-footer">
        <?php require 'footer.php'; ?>
        </div>
    </body>
</html>




<?php

?>








