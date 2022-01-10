
<!DOCTYPE html>
<html>
<head>
    <title>iShutter</title>
    <link rel="stylesheet" href="styles/style.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="font_awesome/fontawesome-free-5.11.2-web/css/all.css">
    <link rel="stylesheet" href="slider/css.css" type="text/css" media="all">
    
    </head>
    <body>
        
        <div class="index-container">
        <!-- Header -->
        
        <div class="i-header">
            <?php require 'header.php';
            require_once 'includes/functions.php';
            ?>
        </div>
        
        
        
        <!-- Slider -->
        
        <div class="i-slider">
            <div class="galleryContainer"> 
                <div class="slideShowContainer">
                    <div id="playPause" onclick="playPauseSlides()"></div>
                    <div onclick="plusSlides(1)" ><span class="arrow arrowRight"></span></div>
                    <div class="captionTextHolder"><p class="captionText slideTextFromTop"></p></div> 
                    <div class="imageHolder">
                        <img src="slider/images/slider_1.jpg">
                        <p class="captionText"></p>
                    </div>
                    <div class="imageHolder">
                        <img src="slider/images/slide_2.jpg">
                        <p class="captionText"></p>
                    </div>
                    <div class="imageHolder">
                        <img src="slider/images/slider_1.jpg">
                        <p class="captionText"></p>
                    </div>
                    <div class="imageHolder">
                        <img src="slider/images/slide_2.jpg">
                        <p class="captionText"></p>
                    </div>
                </div>
                <div id="dotsContainer"></div>
            </div>
            <script src="slider/myScript.js"></script>
        </div>
        
        
        
        
        <!-- Cameras -->    
        <div class="i-cameras">
            <div class="i-inner_cameras">
                <div class="i-camera_header">
                    <p>CAMERAS COLLECTION</p>
                </div>
                <div class="i-product-dispay">
                    <?php 
                    getpro();
                    getIp();
                    cart(); ?><br><br>
                    <div class="i-all_products1">
                        <a class="i-all_products" href="all_product.php">See all products &nbsp;<i class="fas fa-arrow-circle-right"></i> </a>
                    </div>
                </div>
            </div>
          </div><br><br>
            
            
        <!-- Lenses -->
            
            <div class="i-cameras">
            <div class="i-inner_cameras">
                <div class="i-lense_header">
                    <p>LENSE COLLECTION</p>
                </div>
                <div class="i-product-dispay">
                    <?php 
                    getLense();
                     ?><div class="i-all_products1">
                        <a class="i-all_products" href="all_product.php">See all products &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    
                   
                </div>
            </div>
          </div>
            <div class="i-outer_why"> 
                <img class="img_banner" src="images/banner.JPG"><br><br><br>
                <div class="i-why">
                    <p class="i-how_works">HOW IT WORKS</p>
                    <img src="images/how.JPG"><br><br>
                    <p class="i-how_works">WHAT WE DON'T HAVE TO PROMISE </p>
                    <img src="images/promise.JPG"><br><br><br><br>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="i-footer">
                <?php require 'footer.php' ?>
            </div>
            
       </div>
    </body>
</html>

