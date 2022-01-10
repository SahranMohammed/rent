<?php
//DataBase Connection
$con = mysqli_connect("localhost","root","","ecommerce");

//Display Cameras in index page
function getpro(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products where product_cat=1 limit 5";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        ";
    }
    
    
}

// Getting the user ip address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}



// Add to cart from index page
function cart(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    if(isset($_GET['add_cart'])){
        
        $ip = getIp();
        $pro_id = $_GET['add_cart'];
        $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
        $run_check = mysqli_query($con,$check_pro);
        
        if(mysqli_num_rows($run_check)>0){
            echo "<script>alert('This product already added')</script>";
        } 
        else{
            $get_product = "select * from products where product_id = $pro_id";
            $run_product = mysqli_query($con,$get_product);
            $row_product = mysqli_fetch_array($run_product);
            $pro_price = $row_product['product_price'];
            
            $sub_total = 7 * $pro_price;
            
            $start_date = date("Y-m-d");
            $end_date = date('Y-m-d', strtotime(' + 7 days'));
            $insert_pro = "insert into cart (p_id,ip_add,price,start_date,end_date,sub_total) values ('$pro_id','$ip','$pro_price','$start_date','$end_date','$sub_total')";
            $run_pro = mysqli_query($con,$insert_pro);
            echo "<script>alert('The product added successfully for 7 days renting')</script>";
        }
    }
    
}




// Dispay lenses in index page
function getLense(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products where product_cat=2 limit 5";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-contain_lenses' style='margin-top:-40px;'>
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        </div>
        ";
    }      
}


// Add to cart from product view page
function singleCart(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    if(isset($_GET['add_cart'])){
        $pro_id = $_GET['add_cart'];
        $ip = getIp();
        $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
        $run_check = mysqli_query($con,$check_pro);
        
        if(mysqli_num_rows($run_check)>0){
            echo "<script>alert('This product already added')</script>";
            echo "<script>window.open('single.php?pro_id=$pro_id','_self')</script>";
        } 
        else{
            $get_product = "select * from products where product_id = $pro_id";
            $run_product = mysqli_query($con,$get_product);
            $row_product = mysqli_fetch_array($run_product);
            $pro_price = $row_product['product_price'];
            
            $start_date = $_POST['rentout'] ;
            $end_date = $_POST['return'];
            
            $start = strtotime($start_date);
            $end = strtotime($end_date);
            $dif = $end - $start;
            $days = floor($dif / (60*60*24) );
            
            if($days<=0){
                echo "<script>alert('Invalid Date Selection')</script>";
                echo "<script>window.open('single.php?pro_id=$pro_id','_self')</script>";
                
            }
            if($days>31){
                echo "<script>alert('You cannot rent more than 31 days')</script>";
                echo "<script>window.open('single.php?pro_id=$pro_id','_self')</script>";
                
            }
            
            $sub_total = $days*$pro_price;
            
            $insert_pro = "insert into cart (p_id,ip_add,price,start_date,end_date,sub_total) values ('$pro_id','$ip','$pro_price','$start_date','$end_date','$sub_total')";
            $run_pro = mysqli_query($con,$insert_pro);
            echo "<script>alert('The product added successfully for $days days renting')</script>";
            echo "<script>window.open('single.php?pro_id=$pro_id','_self')</script>";
        } 
           
}

}


// Getting the total number of products in cart
function totalItems(){
    global $con;
    $ip = getIp();
    
    $select_items = "select * from cart where ip_add='$ip'";
    $run_items = mysqli_query($con,$select_items);
    $num_items = mysqli_num_rows($run_items);
    
    return $num_items;
}



// Getting total price of items in the cart
function totalPrice(){
    $total = 0;
    global $con;
    $ip = getIp();
    
    $sel_price = "select * from cart where ip_add='$ip'";
    $run_price = mysqli_query($con,$sel_price);
    
    while($p_price=mysqli_fetch_array($run_price)){
        $sub_total = array($p_price['sub_total']);
        $total_1 = array_sum($sub_total);
        $total += $total_1;
    }
    
    return $total;
}



 // functiom for delete from cart
 function update_cart(){
     global $con;
     if(isset($_POST['update'])){
        foreach($_POST['remove'] as $remove_id){
            $delete_product = "delete from cart where p_id='$remove_id'";
            $run_delete = mysqli_query($con,$delete_product);
            if($run_delete){
                echo "<script>window.open('basket.php','_self')</script>";
             } 
         }  
    } 
}
                



// function for update quentity of the product
 function set_qty(){ 
    global $con;
    global $product_price;
    global $pro_start;
    global $pro_end;
    if(isset($_POST['update'])){               
        if(isset($_POST['id'])){               
            $quaty = $_POST['qty'];
            $ids = $_POST['id'];
            $c=array_combine($quaty,$ids);
            foreach($c as $q => $i){
                $query = "update cart set qty='$q' where p_id='$i'";
                $run =  mysqli_query($con,$query);
               
                                
             }
         }
     }
                  
 }



// updating rentout date in the cart
function updateStartDate(){ 
    global $con;
    if(isset($_POST['update'])){               
         if(isset($_POST['id1'])){               
            $start = $_POST['start'];
            $ids = $_POST['id1'];
            $c=array_combine($start,$ids);
            foreach($c as $s => $i){
                $query = "update cart set start_date='$s' where p_id='$i'";
                $run =  mysqli_query($con,$query);
                
                                    
             }
         }
     }
                  
 }



//updating returning date in the cart
function updateEndDate(){ 
    global $con;
    if(isset($_POST['update'])){               
        if(isset($_POST['id1'])){               
            $end = $_POST['end'];
            $ids = $_POST['id1'];
            $c=array_combine($end,$ids);
            foreach($c as $s => $i){
                $query = "update cart set end_date='$s' where p_id='$i'";
                $run =  mysqli_query($con,$query);
                                    
            }
        }
     }
                  
}


//Update subtotal of each product from cart
function updateSubTotal(){
     global $con;
     global $ip_add;
     if(isset($_POST['update'])){
     $select_cart = "select * from cart where ip_add='$ip_add'";
     $run_cart = mysqli_query($con,$select_cart);
                            
     while($row_cart = mysqli_fetch_array($run_cart)){
         $pro_qty = $row_cart['qty'];
         $pro_start = $row_cart['start_date'];
         $pro_end = $row_cart['end_date'];
         $pro_end = $row_cart['end_date'];
         $pro_id = $row_cart['p_id'];
         $pro_price = $row_cart['price'];
                                
         $start = strtotime($pro_start);
         $end = strtotime($pro_end);
         $dif = $end - $start;
         $days = floor($dif / (60*60*24) );
         
         if($days<=0){
             echo "<script>alert('Invalid date selection')</script>";
             break;
         }
                                
         $sub_total = $pro_qty * $days * $pro_price;
                                
         $query = "update cart set sub_total='$sub_total' where p_id='$pro_id'";
         $run =  mysqli_query($con,$query);
         echo "<script>window.open('basket.php','_self')</script>";
        }
    }
}





//All cameras
function getCams(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        ";
    }
    
    
}


//All lenses
function get_lense(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products where product_cat=2";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        ";
    }
    
    
}







//getting data for brands file about cannon cameras
function getproCannon(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products where product_brand=1 and product_cat=1";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        ";
    }
    
    
}



//getting data for brands file about nikon cameras
function getproNikon(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products where product_brand=2 and product_cat=1";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        ";
    }
    
    
}





//getting data for brands file about pentex cameras
function getproPentex(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products where product_brand=3 and product_cat=1";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        ";
    }
    
    
}



//getting data for brands file about sony cameras
function getproSony(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products where product_brand=4 and product_cat=1";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        ";
    }
    
    
}




//getting data for brands file about olympus cameras
function getproOlympus(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products where product_brand=5 and product_cat=1";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        ";
    }
    
    
}



//getting data for brands file about leica cameras
function getproLeica(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products where product_brand=6 and product_cat=1";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        ";
    }
    
    
}











//getting data for brands file about cannon lense
function getproCannonLense(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products where product_brand=1 and product_cat=2";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        ";
    }
    
    
}



//getting data for brands file about nikon lense
function getproNikonLense(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products where product_brand=2 and product_cat=2";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        ";
    }
    
    
}





//getting data for brands file about pentex lense
function getproPentexLense(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products where product_brand=3 and product_cat=2";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        ";
    }
    
    
}



//getting data for brands file about sony lense
function getproSonyLense(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products where product_brand=4 and product_cat=2";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        ";
    }
    
    
}




//getting data for brands file about olympus lense
function getproOlympusLense(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products where product_brand=5 and product_cat=2";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        ";
    }
    
    
}



//getting data for brands file about leica lense
function getproLeicaLense(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products where product_brand=6 and product_cat=2";
    $run_pro = mysqli_query($con,$get_pro);
    $pro_id = 0;
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        $pro_status = $row_pro['product_status'];
        
        
        echo "
        <div class='i-display_single' style='width:220px; height:300px; float:left;'>
        <a href='single.php?pro_id=$pro_id'>
        <img src='admin_area/product_images/$pro_img' width='180' height='180'/>
        <h3>$pro_title</h3>
        <p style='font-weight:500; color:#02b6bd;'>Rs.&nbsp$pro_price/Day</p></a>
        <a href='index.php?add_cart=$pro_id'> <button class='i-add_btn' type='submit' name='submit1'><p>Add to Basket </p></a></button></a>
        
        </div>
        ";
    }
    
    
}


?>