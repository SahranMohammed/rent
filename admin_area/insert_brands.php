<?php 
$pro_id=0;
require_once 'db.php';
require_once 'session_start.php';
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
?>





<!DOCTYPE html>
<html>
    <head>
        <title>Insert cat</title>
        <style>
            .header p{
                font-size:23px;
                text-align: center;
                font-weight: 600;
                font-family: montserrat;
                
            }
            .inner-container{
                width: 900px;
                margin: 0 auto;
            }
            input[type=text] {
                width: 100%;
                margin-bottom: 20px;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }
            label{
                font-family: montserrat;
                font-size:18px;
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
                    <p>INSERT BRANDS</p><br><br>
                </div>
                <div class="inputs">
                    <form action="" method="post">
                    <label class="lbl">Brand Title</label><br><br>
                    <input class="input" type="text" name="cat"><br>
                        <button name="insert">Insert</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>








<?php
    if(isset($_POST['insert'])){
        $cat = $_POST['cat'];
        
        $insert_cat = "insert into brands(brand_title) values('$cat')";
        
        $run_insert = mysqli_query($con,$insert_cat);
        
        if($run_insert){
            echo "<script>alert('update succesful')</script>";
            echo "<script>window.open('index.php?view_brand','_self')</script>";
        }
    }

?>
