<?php
require_once 'db.php';
require_once 'session_start.php';
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
} else{
    if(isset($_GET['edit_brand'])){
        $id = $_GET['edit_brand'];
        
        $select_cat = "select * from brands where brand_id='$id'";
        $run_cat = mysqli_query($con,$select_cat);
        $assing_data = mysqli_fetch_array($run_cat);
        $title = $assing_data['brand_title'];
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Categories</title>
        <style>
            .inner-container{
                width: 900px;
                margin: 0 auto;
            }
            .header p{
                font-size: 23px;
                font-family: montserrat;
                font-weight: 500;
                text-align: center;
            }
            input[type=text] {
                width: 100%;
                margin-bottom: 20px;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }
            button{
                width: 100%;
                height: 35px;
                background-color: #11b300;
                border: hidden;
                border-radius: 4px;
                color: white;
                font-size: 14px;
            }
             button:hover{
                background-color: #1f6e17;
            }
            label{
                font-family: montserrat;
                font-size: 18px;
            }
        
        </style>
    </head>
    <body>
        <div class="container">
            <div class="inner-container">
                <div class="header">
                    <p>EDIT BRANDS</p><br><br>
                </div>
                <div class="input">
                    <form action="" method="post">
                    <label class="lbl">Brand Title</label><br><br>
                    <input class="input" name="title" type="text" value="<?php echo $title; ?>"><br>
                    <button name="update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>





<?php 
    if(isset($_POST['update'])){
        
        $update_title = $_POST['title'];
        
        $update_cat = "update brands set brand_title='$update_title' where brand_id='$id'";
        
        $run_update = mysqli_query($con,$update_cat);
        
        if($run_update){
            echo "<script>alert('update succesful')</script>";
            echo "<script>window.open('index.php?view_brand','_self')</script>";
        }
    }


?>