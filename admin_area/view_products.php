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
        <title>View products</title>
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
            <p>CAMERAS</p><br><br>
            
        <table id="customers">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quentity</th>
                <th>Keywords</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $no =0;
                $select_products = "select * from products where product_cat=1";
            $run_products = mysqli_query($con,$select_products);
           while($raw_products = mysqli_fetch_array($run_products)){
               $pro_id = $raw_products['product_id'];
               $product_cat = $raw_products['product_cat'];
               $product_brand = $raw_products['product_brand'];
               $product_title = $raw_products['product_title'];
               $product_price = $raw_products['product_price'];
               $product_qunty = $raw_products['product_qunty'];
               $product_keyword = $raw_products['product_keyword'];
               $pro_image = $raw_products['product_img1'];
               $no = $no+1;
               
            
            ?>
            <tr><td><?php echo $no ; ?></td>
                <td><?php echo $product_title ; ?></td>
                <td><?php echo "<img src='product_images/$pro_image' width='50' height='50'" ; ?></td>
                <td><?php echo $product_price ; ?></td>
                <td><?php echo $product_qunty ; ?></td>
                <td><?php echo $product_keyword ; ?></td>
                <td><a href="index.php?edit_pro=<?php echo $pro_id;?>">edit</a></td>
                <td><a href="delete_products.php?pro_id=<?php echo $pro_id;?>">delete</a></td>
            </tr>
            <?php }  ?>
        </table><br><br>
                <p>LENSES</p><br><br>
            
            
            
             <table id="customers">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quentity</th>
                <th>Keywords</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $no =0;
                $select_products = "select * from products where product_cat=2";
            $run_products = mysqli_query($con,$select_products);
           while($raw_products = mysqli_fetch_array($run_products)){
               $pro_id = $raw_products['product_id'];
               $product_cat = $raw_products['product_cat'];
               $product_brand = $raw_products['product_brand'];
               $product_title = $raw_products['product_title'];
               $product_price = $raw_products['product_price'];
               $product_qunty = $raw_products['product_qunty'];
               $product_keyword = $raw_products['product_keyword'];
               $pro_image = $raw_products['product_img1'];
               $no = $no+1;
               
            
            ?>
            <tr><td><?php echo $no ; ?></td>
                <td><?php echo $product_title ; ?></td>
                <td><?php echo "<img src='product_images/$pro_image' width='50' height='50'" ; ?></td>
                <td><?php echo $product_price ; ?></td>
                <td><?php echo $product_qunty ; ?></td>
                <td><?php echo $product_keyword ; ?></td>
                <td><a href="index.php?edit_pro=<?php echo $pro_id;?>">edit</a></td>
                <td><a href="delete_products.php?pro_id=<?php echo $pro_id;?>">delete</a></td>
            </tr>
            <?php }  ?>
        </table><br><br>
        </div>
    </body>
</html>















