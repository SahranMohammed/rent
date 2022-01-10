<?php
require_once 'session_start.php';
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <? php include("includes/db.php"); ?>
        <title>Insert Products</title>
        <link rel="stylesheet" type="text/css" href="css/insert_product.css">
        <script src="js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea'});</script>
    </head>
    <body>
        <div class="insert-product">
            <div class="insert_product1">
                <form action="insert_product.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td class="insert_product2" colspan="8" align="center"><h2>Insert Products</h2></td>
                    </tr>
                    <tr>
                        <td>Product Title</td>
                        <td><input type="text" name="product_title" required></td>
                    </tr>
                    <div class="insert-catogory">
                     <tr>
                        <td>Product Catogory</td>
                        <td>
                            <select name="product_cat">
                                <option>Select the Catogory</option>
                                <?php 
                                 $con = mysqli_connect("localhost","root","","ecommerce");
                              $get_cat = "select * from catogories";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  $cat_id = $row_cat['cat_id'];
                                  $cat_title = $row_cat['cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$cat_id'> $cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                            </select>
                        </td>
                    </tr>
                    </div>
                     <tr>
                        <td>Product Brand</td>
                        <td>
                            <select name="product_brand">
                                <option>Select the Brand</option>
                                <?php 
                                $con = mysqli_connect("localhost","root","","ecommerce");
                                $get_brand = "select * from brands";
                                $run_brand = mysqli_query($con,$get_brand);
                              
                                while ($row_brand=mysqli_fetch_array($run_brand)){
                                  
                                    $brand_id = $row_brand['brand_id'];
                                    $brand_title = $row_brand['brand_title'];
                                  
                                    echo "
                                  
                                  <option value='$brand_id'> $brand_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                            </select>
                         
                         </td>
                    </tr>
                    <tr>
                        <td>Product Quentity</td>
                        <td><input type="text" name="product_quentity"></td>
                    </tr>
                     <tr>
                        <td>Product Image 1</td>
                        <td><input type="file" name="product_image1" required></td>
                    </tr>
                     <tr>
                        <td>Product Image 2</td>
                        <td><input type="file" name="product_image2" required></td>
                    </tr>
                     <tr>
                        <td>Product Image 3</td>
                        <td><input type="file" name="product_image3"></td>
                    </tr>
                     <tr>
                        <td>Product Image 4</td>
                        <td><input type="file" name="product_image4"></td>
                    </tr>
                     <tr>
                        <td>Product Price</td>
                        <td><input type="text" name="product_price" required></td>
                    </tr>
                     <tr>
                        <td>Product Description</td>
                        <td><textarea name="product_disc" cols="48" rows="10"></textarea></td>
                    </tr>
                     <tr>
                        <td>Product Keyword</td>
                        <td><input type="text" name="product_keyword" required></td>
                    </tr>
                    <tr>
                        <td colspan="8" align="center"><button type="submit" name="insert_post">Insert Now</button> </td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </body>
</html>

<?php 


if(isset($_POST['insert_post'])){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $product_title = $_POST['product_title'];
    $product_brand = $_POST['product_brand'];
    $product_cat = $_POST['product_cat'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keyword'];
    $product_desc = $_POST['product_disc'];
    $product_qunty = $_POST['product_quentity'];
    
    $product_img1 = $_FILES['product_image1']['name'];
    $product_img2 = $_FILES['product_image2']['name'];
    $product_img3 = $_FILES['product_image3']['name'];
    $product_img4 = $_FILES['product_image4']['name'];
    
    $temp_name1 = $_FILES['product_image1']['tmp_name'];
    $temp_name2 = $_FILES['product_image2']['tmp_name'];
    $temp_name3 = $_FILES['product_image3']['tmp_name'];
    $temp_name4 = $_FILES['product_image4']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$product_img1");
    move_uploaded_file($temp_name2,"product_images/$product_img2");
    move_uploaded_file($temp_name3,"product_images/$product_img3");
    move_uploaded_file($temp_name4,"product_images/$product_img4");
    
    $insert_product = "insert into products(product_cat,product_brand,product_title,product_price,product_desc,product_qunty,product_img1,product_img2,product_img3,product_img4,product_keyword) values('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_qunty','$product_img1','$product_img2','$product_img3','$product_img4','$product_keywords')";
    
    
    $insert_pro = mysqli_query($con,$insert_product);
    
    if($insert_pro){
        echo "<script>alert('product has been inserted')</script>";
        echo "<script>window.open('index.php?insert_products','_self')</script>";
    }
    else{
        echo "<script>alert('somthing went wrong')</script>";
    }
    
    
}

?>
<? php ?>