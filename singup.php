
<html>
    <head><title>singup</title>
    <link rel="stylesheet" type="text/css" href="../font_awesome/fontawesome-free-5.11.2-web/css/all.css">
    <link rel="stylesheet" href="styles/style-singup.css" type="text/css" media="all">
    </head>
    <body>
<?php
require 'header.php';
?>
    <div class="container1">
       <div class="inner">
           <h2>CREATE ACCOUNT</h2>
           <div class="align">
           <form action="includes/singup.inc.php" method="post">
               <label class="input-label"><p>User Name</p></label>
               <input Class="input-class" type="text" placeholder="" name="name" style="brown" required><br><br>
               
               <label class="input-label"><p>Email</p></label>
               <input Class="input-class" type="text" placeholder="" name="mail" style="brown" required><br><br>
               
               <label class="input-label"><p>Password</p></label>
               <input Class="input-class" type="password" placeholder="" name="psw" style="brown" required><br><br>
               
               <label class="input-label"><p>Repeat Password</p></label>
               <input Class="input-class" type="password" placeholder="" name="psw-repeat" style="brown" required><br><br>
               
               <div class="sub">
                   <button type="submit" class="signupbtn" name="singup"><p>CREATE</p></button>
               </div>
                <div class="log">
                   <p>Already have an account? <a href="login.php">Login Here</a></p>
               </div>
           </form>
           </div>
        </div>
        </div>
        <?php require 'footer.php'; ?>
    </body>
</html>