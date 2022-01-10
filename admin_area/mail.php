<?php
require_once 'db.php';
require_once 'session_start.php';
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{
    if(isset($_GET['mail'])){
        $id = $_GET['mail'];
        $select_order = "select * from orders where order_id='$id'";
        $run_orders = mysqli_query($con,$select_order);
        $get_orders = mysqli_fetch_array($run_orders);
        $customer = $get_orders['customer_id'];
        
        $select_customer = "select * from users where user_id='$customer'";
        $run_customer = mysqli_query($con,$select_customer);
        $get_customer = mysqli_fetch_array($run_customer);
        $email = $get_customer['email'];
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>mail</title>
        <script src="js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea'});</script>
        <style>
            .container{
                width:100%;
            }
            .inner-container{
                width: 900px;
                margin: 0 auto;
            }
            .header p{
                font-family: montserrat;
                font-size:23px;
                font-weight: 500;
                text-align: center;
            }
            label{
                font-family: montserrat;
            }
            input[type=text] {
                width: 100%;
                margin-bottom: 20px;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 3px;
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
                    <p>SEND E-MAIL</p><br><br>
                </div>
                <form action="" method="post">
                <div class="text-feilds">
                    <label>E-mail Address</label><br>
                    <input type="text" value="<?php echo $email; ?>" name="address"><br><br>
                    
                    <label>Subject</label><br>
                    <input type="text" name="subject" required><br><br>
                    
                    <label>Message</label><br>
                    <textarea name="message"></textarea><br><br>
                    
                    <button name="send">Send</button>
                
                </div>
                </form>
            </div>
        </div>
    </body>
</html>

<?php
if(isset($_POST['send'])){
    $address = $_POST['address'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $header = "From:abc@somedomain.com \r\n";
         $header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
    
    $send = mail($address,$subject,$message,$header);
    
    if($send){
        echo "<script>alert('Sent')</script>";
    }
}




?>