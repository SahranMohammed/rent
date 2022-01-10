<?php session_start();
require_once 'includes/functions.php';

?>
<!DOCTYPE>
<html>
<head>
    <link rel="stylesheet" href="styles/style-header.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="font_awesome/fontawesome-free-5.11.2-web/css/all.css">
    </head>
    <body>
        
        <div id="header">
            <div class="inner-header">
                <div class="logo">
                    <h1><a href="index.php">iShutter</a></h1>   
                </div>
                <div class="search">
                    <div class="singup"><?php if(!isset($_SESSION['customer_email'])){ ?>
                        <a href="login.php">Login&nbsp;</a><p>or&nbsp;</p>  <a href="singup.php">Creat an Account&nbsp;</a>
                        <?php } else{ ?>
                        <a href="logout.php">Logout&nbsp;</a><p>|&nbsp;</p>  <a href="my_account.php">Welcome <?php echo $_SESSION['customer_name']; ?>&nbsp;</a>
                        <?php } ?>
                    </div>
                    <div class="search-bar">
                        <button class="cart" type="button"><i class="fas fa-shopping-cart" style="color:white; font-size:20px;"></i><a href="basket.php"> <p>My Basket</p></a></button>
                       <form>
                        <button class="search1" type="submit" name="sabmit" value="search"><i class="fas fa-search" style="font-size:20px;color:white"></i></button>
                         <input class="search-txt" type="search" name="" placeholder="type to search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- NAVIGATION BAR -->
        <div id="navigation">
            <div class="inner-navigation">
                <div class="dropdown">
                    <button class="dropbtn"><p>CAMERAS</p>&nbsp;<i class="fas fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="brands.php?cam_cannon">Canon</a>
                        <a href="brands.php?cam_nikon">Nikon</a>
                        <a href="brands.php?cam_pentex">Pentax</a>
                        <a href="brands.php?cam_sony">Sony</a>
                        <a href="brands.php?cam_olympus">Olympus</a>
                        <a href="brands.php?cam_leica">Leica</a>
                        
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn"><p>LENSES</p>&nbsp;<i class="fas fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="brands.php?len_canon">Canon</a>
                        <a href="brands.php?len_nikon">Nikon</a>
                        <a href="brands.php?len_pentax">Pentax</a>
                        <a href="brands.php?len_sony">Sony</a>
                        <a href="brands.php?len_leica">Leica</a>
                        <a href="brands.php?len_olympus">Olympus</a>
                    </div>
                </div>
                <button class="h-non-drop" type="button"><a href="all_product.php"><h4>ALL PRODUCTS</h4></a></button>
                <button class="h-non-drop" type="button"><a href="my_account.php"><h4>MY ACCOUNT</h4></a></button>
                <button class="h-non-drop" type="button"><a href="contect_us.php"><h4>CONTECT US</h4></a></button>
            </div>
        </div> 
    </body>
</html>