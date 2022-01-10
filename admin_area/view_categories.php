<?php
require_once 'db.php';
require_once 'session_start.php';
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}  
?>


<!DOCTYPE html>
<html>
    <head>
        <title>View Categories</title>
        <style>
            .inner-container{
                width: 900px;
                margin: 0 auto;
            }
            .header p{
                font-family: montserrat;
                font-size: 25px;
                text-align: center;
                font-weight: 500;
            }
            #customers {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
            #customers a{
                text-decoration: none
            }
            #customers a:hover{
                text-decoration: underline;
            }
        
        </style>
    </head>
    <body>
        <div class="container">
            <div class="inner-container">
                <div class="header">
                    <p>VIEW CATEGORIES</p><br><br>
                </div>
                <div class="display">
                    <table id="customers">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        
                        <?php
                            $no = 0;
                            $select_cat = "select * from catogories";
                            $run_select = mysqli_query($con,$select_cat);
                            while($assign_data = mysqli_fetch_array($run_select)){
                                $cat_id = $assign_data['cat_id'];
                                $cat_title = $assign_data['cat_title'];
                                $no = $no+1;
                        ?>
                        
                        
                        
                        
                        
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $cat_title ?></td>
                            <td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">edit</a></td>
                            <td><a href="delete_cat.php?edit_cat=<?php echo $cat_id; ?>">delete</a></td>
                        </tr>
                        <?php } ?>
                    </table>

                </div>
            </div>
        </div>
    </body>
</html>

