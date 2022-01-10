<?php 
$pro_id=0;
require_once 'db.php';
require_once 'session_start.php';
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{
    if(isset($_GET['edit_pro'])){
        $pro_id = $_GET['edit_pro'];
        
        $select_products = "select * from products where product_id='$pro_id'";
        $get_products = mysqli_query($con,$select_products);
        $assign_data = mysqli_fetch_array($get_products);
        
        $product_cat = $assign_data['product_cat'];
        $product_brand = $assign_data['product_brand'];
        $product_title = $assign_data['product_title'];
        $product_price = $assign_data['product_price'];
        $product_desc = $assign_data['product_desc'];
        $product_qunty = $assign_data['product_qunty'];
        $product_img1 = $assign_data['product_img1'];
        $product_img2 = $assign_data['product_img2'];
        $product_img3 = $assign_data['product_img3'];
        $product_img4 = $assign_data['product_img4'];
        $product_keyword = $assign_data['product_keyword'];
        
        //brand
        $select_brand = "select * from brands where brand_id='$product_brand'";
        $get_brand = mysqli_query($con,$select_brand);
        $assign_brand = mysqli_fetch_array($get_brand);
        $brand = $assign_brand['brand_title'];
        
        //category
        $select_cat = "select * from catogories where cat_id='$product_cat'";
        $get_cat = mysqli_query($con,$select_cat);
        $assign_cat = mysqli_fetch_array($get_cat);
        $cat = $assign_cat['cat_title'];
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Products</title>
        <script src="js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea'});</script>
        <style>
            .container{
                width:100%;
                justify-content: center;
            }
            .container p{
                font-family: montserrat;
                font-size: 25px;
                text-align: center;
                font-weight: 500;
            }
            .input{
                
                width: 100%;
                height:35px;
                border-radius: 3px;
                
            }
            input[type=text] {
                width: 100%;
                margin-bottom: 20px;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 3px;
}
            .lbl{
               
            }
            label{
                font-family: montserrat;
                font-size: 18px;
            }
            .inner-container{
                width:900px;
                margin: 0 auto;
            }
            select{
                width: 100%;
                height: 35px;
                border-radius: 3px;
                border-color: #ccc;
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
        </style>
    </head>
    
    
    <body>
        <div class="container">
            <div class="inner-container">
            <div class="head">
                <p>EDIT PRODUCTS</p><br>
            </div>
            <form action="edit_pro.php" method="post">
                <label class="lbl">Title</label><br>
                <input class="input" type="text" name="title" value="<?php echo $product_title; ?>"><br><br>
                
                <label class="lbl">Brand</label><br>
                 <select name="product_brand">
                     <option value="<?php echo $product_brand; ?>"><?php echo $brand; ?></option>
                     <?php 
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
                            </select><br><br><br>
                
                <label class="lbl">Category</label><br>
                <select name="product_cat">
                    <option value="<?php echo $product_cat; ?>"><?php echo $cat; ?></option>
                    <?php 
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
                            </select><br><br><br>
                
                <label class="lbl">Price</label><br>
                <input class="input" type="text" name="price" value="<?php echo $product_price; ?>"><br><br>
                
                <label class="lbl">Quentity</label><br>
                <input class="input" type="text" name="qty" value="<?php echo $product_qunty; ?>"><br><br>
                
                <label class="lbl">Keywords</label><br>
                <input class="input" type="text" name="key" value="<?php echo $product_keyword; ?>"><br><br>
                
                <label class="lbl">Image 1</label><br>
                <img src="product_images/<?php echo $product_img1;?>" width='100' height='100'>
                <input class="input" type="file" name="img1"><br><br>
                
                <label class="lbl">Image 2</label><br>
                <img src="product_images/<?php echo $product_img2; ?>"  width='100' height='100'>
                <input class="input" type="file" name="img2"><br><br>
                
                <label class="lbl">Image 3</label><br><?php if($product_img3 != null){ ?>
                <img src="product_images/<?php echo $product_img3; ?>" width='100' height='100'><?php } ?>
                <input class="input" type="file" name="img3"><br><br>
                
                <label class="lbl">Image 4</label><br><?php if($product_img4 != null){ ?>
                <img src="product_images/<?php echo $product_img4; ?>"  width='100' height='100'> <?php } ?>
                <input class="input" type="file" name="img4"><br><br>
                
                <label class="lbl">Description</label><br>
                <textarea name="product_disc" ><?php echo $product_desc; ?></textarea><br>
                
                <button name="update">Update</button><br><br>
            </form>
            </div>
        </div>
    </body>
</html>





<?php
if(isset($_POST['update'])){
    $title = $_POST['title'];
    $brand = $_POST['product_brand'];
    $cat = $_POST['product_cat'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $key = $_POST['key'];
    $desc = $_POST['product_disc'];
    
    $img1 = $_FILES['img1']['name'];
    $img2 = $_FILES['img2']['name'];
    $img3 = $_FILES['img3']['name'];
    $img4 = $_FILES['img4']['name'];
    
    $temp_name1 = $_FILES['img1']['tmp_name'];
    $temp_name2 = $_FILES['img2']['tmp_name'];
    $temp_name3 = $_FILES['img3']['tmp_name'];
    $temp_name4 = $_FILES['img4']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$img1");
    move_uploaded_file($temp_name2,"product_images/$img2");
    move_uploaded_file($temp_name3,"product_images/$img3");
    move_uploaded_file($temp_name4,"product_images/$img4");
    
    
    $update_product = "update products set product_cat='$cat', product_brand='$brand', product_title='$title', product_price='$price', product_desc='$desc', product_qunty='$qty', product_img1='$img1', product_img2='$img2', product_img3='$img3',  product_img4='$img4', product_keyword='$key' where product_id='$pro_id'";
    
    $run_update = mysqli_query($con,$update_product);
    
    if($run_update){
        echo "<script>alert('update succesful')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
    
    
}

?>












