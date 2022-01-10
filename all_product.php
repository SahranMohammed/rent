<?php require 'includes/functions.php'; ?>
<html>
    <head>
        <title>ALL PRODUCTS</title>
        <link rel="stylesheet" href="styles/style-all_product.css" type="text/css" media="all">
        <link rel="stylesheet" href="styles/style.css" type="text/css" media="all">
    </head>
    
    <body>
        <div class="header">
            <?php require 'header.php' ?>
        </div>
        <div class="a-all_products">
            <div class="a-inner_all">
                <div class="a-all_cams">
                    <div class="a-cam_header">
                        <p>CAMERAS COLLECTION</p>
                    </div>
                    <div class="a-dispaly_cams">
                        <?php getCams(); ?>
                    </div>
                </div>
                
                <div class="lense-collection">
                    <div class="len-header">
                        
                    </div>
                </div>
                <img src="images/promise.JPG"><br><br>
            </div>
            
            <div class="a-footer">
                    <?php require 'footer.php'; ?>
                </div>
        </div>
    </body>
</html>