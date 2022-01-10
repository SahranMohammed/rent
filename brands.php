<?php
require_once 'includes/functions.php';

?>

<html>
    <head>
        <title>Brands</title>
        <link rel="stylesheet" href="styles/style-brands.css" media="all">
        <link rel="stylesheet" href="styles/style.css" type="text/css" media="all">
    </head>
    
    <body>
        <div class="b-header">
            <?php include ("header.php"); ?>
        </div>
        <div class="b-container">
            <div class="b-inner-container">
                <?php
                if(isset($_GET['cam_cannon'])){
                    getproCannon();
                }
                
                if(isset($_GET['cam_nikon'])){
                    getproNikon();
                }
                if(isset($_GET['cam_pentex'])){
                    getproPentex();
                }
                if(isset($_GET['cam_sony'])){
                    getproSony();
                }
                if(isset($_GET['cam_olympus'])){
                    getproOlympus();
                }
                if(isset($_GET['cam_leica'])){
                    getproleica();
                }
                
                
                if(isset($_GET['len_canon'])){
                    getproCannonLense();
                }
                if(isset($_GET['len_nikon'])){
                    getproNikonLense();
                }
                if(isset($_GET['len_pentax'])){
                    getproPentexLense();
                }
                if(isset($_GET['len_sony'])){
                    getproSonyLense();
                }
                if(isset($_GET['len_olympus'])){
                    getproOlympusLense();
                }
                if(isset($_GET['len_leica'])){
                    getproleicaLense();
                }
                ?>
                
                <img src="images/promise.JPG"><br><br>
            </div>
            
            
        </div>
        <div class="b-footer">
            <?php include("footer.php"); ?>
        </div>
    </body>
</html>