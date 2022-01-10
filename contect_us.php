
<?php require 'header.php';
 if(!isset($_SESSION['customer_email'])){
    echo "<script>alert('You Must login first')</script>";
    echo "<script>window.open('login.php','_self')</script>";
 }
?>

<?php

$contect_email = $_SESSION['customer_email'];
$select_customers = "select * from users where email = '$contect_email'";
$get_customers = mysqli_query($con,$select_customers);
$get_email = mysqli_fetch_array($get_customers);
$this_email = $get_email['email'];
$this_id = $get_email['user_id'];



?>





<html>
    <head>
        <title>Contect Us</title>
        <link type="text/css" rel="stylesheet" href="styles/style-contect_us.css" media="all">
        <link type="text/css" rel="stylesheet" href="styles/style-login.css" media="all">
    </head>
    <body>
        <div class="con-con">
            <div class="con-inner-con">
                <div class="con-header">
                    <p>CONTECT US</p>
                </div>
                <div class="align" style="margin-top:30px;">
                    <form action="contect_us.php" method="post">
               
                        <label class="input-label"><p>Email</p></label>
                        <input Class="input-class" type="text" placeholder="" name="mail" value="<?php echo $this_email ?> " style="brown" required readonly><br><br>
               
                        <label class="input-label"><p>Subject</p></label>
                        <input Class="input-class" type="text" placeholder="" name="psw" style="brown" required><br><br>
                        
                        <label class="input-label"><p>Message</p></label>
                        <textarea class="input-area" name="mesage"></textarea><br><br>
               
                        <div class="sub">
                            <button type="submit" class="signupbtn" name="submit"><p>SUBMIT</p></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="con-footer">
                <?php require 'footer.php'; ?>
            </div>
        </div>
    </body>
</html>




<?php

if(isset($_POST['submit'])){
     echo "<script>alert('Your message has send successfully')</script>";
     echo "<script>window.open('index.php','_self')</script>";
    
}

?>
