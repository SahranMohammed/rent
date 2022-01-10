<?php 

if(isset($_SESSION['customer_email'])){
?>



<html>
    <head><title>Login</title>
    <link rel="stylesheet" type="text/css" href="../font_awesome/fontawesome-free-5.11.2-web/css/all.css">
    <link rel="stylesheet" href="styles/style-login.css" type="text/css" media="all">
    </head>
    <body>
<?php
require 'header.php';
?>
    <div class="container1">
       <div class="inner">
           <h2>You Are Already Logged In</h2>
           <div class="align">
           
           </div>
        </div>
        </div>
        <?php require 'footer.php'; ?>
    </body>
</html>






<?php } else{ ?>
<html>
    <head><title>Login</title>
    <link rel="stylesheet" type="text/css" href="../font_awesome/fontawesome-free-5.11.2-web/css/all.css">
    <link rel="stylesheet" href="styles/style-login.css" type="text/css" media="all">
    </head>
    <body>
<?php
require 'header.php';
?>
    <div class="container1">
       <div class="inner">
           <h2>LOGIN</h2>
           <div class="align">
           <form action="login.inc.php" method="post">
               
               <label class="input-label"><p>Email</p></label>
               <input Class="input-class" type="text" placeholder="" name="mail" style="brown" required><br><br>
               
               <label class="input-label"><p>Password</p></label>
               <input Class="input-class" type="password" placeholder="" name="psw" style="brown" required><br><br>
               
               <div class="sub">
                   <button type="submit" class="signupbtn" name="singup"><p>LOGIN</p></button>
               </div>
                <div class="log">
                   <p>Don't have an account? <a href="singup.php">Singup Here</a></p>
               </div>
           </form>
           </div>
        </div>
        </div>
        <?php require 'footer.php'; ?>
    </body>
</html>

<?php } ?>





