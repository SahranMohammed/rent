<? php
function getpro(){
    $con = mysqli_connect("localhost","root","","ecommerce");
    
    $get_pro = "select * from products";
    $run_pro = mysqli_query($con,$get_pro);
    
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_img = $row_pro['product_img1'];
        $pro_price = $row_pro['product_price'];
        
        echo "<div style='width:200px; height:180px; float:left;'><h3>$pro_title</h3> <br>
            <img src='../admin_area/product_images/$pro_img' width='120' height='120'  />
        </div>
        ";
    }
    
}

getpro();
?>