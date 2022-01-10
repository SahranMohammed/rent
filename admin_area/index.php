<?php
require_once 'db.php';
require_once 'session_start.php';
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
?>

<html>
    <head>
        <link rel="stylesheet" href="css/style.css.css" type="text/css" media="all">
        <link rel="stylesheet" type="text/css" href="font_awesome/fontawesome-free-5.11.2-web/css/all.css">
        <title>Admin panel</title>
        <style>
            li{
                margin-left: 10px;
            }
        </style>
    </head>
    
    <body>
        <div class="i-container">
            <div id="i-headder">
                <p>Admin Panel</p>
            </div>
            <div class="side-bar">
                <div class="side-bar1">
               <ul>
                   <li><i class="fas fa-chart-line" style="color:white;"></i><a href="index.php">Dashbord</a></li>
                   
                   <li><i class="fas fa-indent" style="color:white;"></i><a href="index.php?insert_products">Insert Product</a></li>
                   
                   <li><i class="fas fa-eye" style="color:white;"></i><a href="index.php?view_products">View products</a></li>
                   
                   <li><i class="fas fa-random" style="color:white;"></i><a href="index.php?insert_cat">Insert categories</a></li>
                   
                   <li><i class="fas fa-binoculars"style="color:white;"></i><a href="index.php?view_cat">View categories</a></li>
                   
                   <li><i class="fas fa-copyright" style="color:white;"></i><a href="index.php?insert_brand">Insert brands</a></li>
                   
                   <li><i class="far fa-sticky-note" style="color:white;"></i><a href="index.php?view_brand">View brands</a></li>
                   
                   <li><i class="fas fa-users" style="color:white;"></i><a href="index.php?view_customers">View customers</a></li>
                   
                   <li><i class="fas fa-sort-amount-up" style="color:white;"></i><a href="index.php?all_rents">View all rentings</a></li>
                   
                   <li><i class="fas fa-tachometer-alt" style="color:white;"></i><a href="index.php?today_expire">Today Expirings</a></li>
                   
                   <li><i class="fas fa-stopwatch"style="color:white;"></i><a href="index.php?expired_orders">Expired rentings</a></li>
                   
                   <li><i class="fas fa-coins" style="color:white;"></i><a href="index.php?view_payments">View payments</a></li>
                   
                   <li><i class="fas fa-sign-out-alt" style="color:white;"></i><a href="index.php?logout">Logout</a></li>
                   
                </ul>
                </div>
            </div>
            <div class="content-area">
                <div class="inner-content">
                <?php
                if(isset($_GET['insert_products'])){
                    include ("insert_product.php");
                }
                if(isset($_GET['view_products'])){
                    include ("view_products.php");
                }
                if(isset($_GET['edit_pro'])){
                    include ("edit_pro.php");
                }
                if(isset($_GET['insert_cat'])){
                    include("insert_cat.php");
                }
                if(isset($_GET['view_cat'])){
                    include("view_categories.php");
                }
                if(isset($_GET['edit_cat'])){
                    include ("edit_cats.php");
                }
                if(isset($_GET['insert_brand'])){
                    include ("insert_brands.php");
                }
                if(isset($_GET['view_brand'])){
                    include ("view_brands.php");
                }
                if(isset($_GET['edit_brand'])){
                    include ("edit_brand.php");
                }
                if(isset($_GET['view_customers'])){
                    include ("view_customers.php");
                }
                if(isset($_GET['edit_customers'])){
                    include ("edit_customers.php");
                }
                if(isset($_GET['all_rents'])){
                    include ("all_rents.php");
                }
                if(isset($_GET['edit_orders'])){
                    include ("edit_renting.php");
                }
                if(isset($_GET['today_expire'])){
                    include ("today_exp.php");
                }
                if(isset($_GET['edit_today'])){
                    include ("edit_today.php");
                }
                if(isset($_GET['expired_orders'])){
                    include ("expired_orders.php");
                }
                if(isset($_GET['mail'])){
                    include ("mail.php");
                }
                if(isset($_GET['logout'])){
                    session_destroy();
                    echo "<script>window.open('index.php','_self')</script>";
                }
                    
                         
                ?>
                </div>
                
            </div>
        </div>
    </body>
</html>

