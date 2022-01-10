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
        <title>View customers</title>
        <style>
            #customers {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                justify-content: center;
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
            .pro-container{
                
            }
            .pro-container p{
                text-align: center;
                font-family: montserrat;
                font-size: 23px;
                font-weight: 500;
            }
            #customers a{
                text-decoration: none;
            }
            #customers a:hover{
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="pro-container">
            <p>CUSTOMERS</p><br><br>
            
        <table id="customers">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>NIC</th>
                <th>Phone</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>ZIP</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $no =0;
                $select_users = "select * from users";
                $run_users = mysqli_query($con,$select_users);
                while($assign_data = mysqli_fetch_array($run_users)){
                
            $id = $assign_data['user_id'];
            $name = $assign_data['user_name'];
            $email = $assign_data['email'];
            $nic = $assign_data['user_nic'];
            $phone = $assign_data['user_phone'];
            $address = $assign_data['user_address'];
            $city = $assign_data['user_city'];
            $state = $assign_data['user_state'];
            $zip = $assign_data['user_zip'];
            $no = $no+1;
               
            
            ?>
            <tr><td><?php echo $no ; ?></td>
                <td><?php echo $name;  ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $nic;  ?></td>
                <td><?php echo $phone;  ?></td>
                <td><?php echo $address;  ?></td>
                <td><?php echo $city; ?></td>
                <td><?php echo $state; ?></td>
                <td><?php echo $zip; ?></td>
                <td><a href="index.php?edit_customers=<?php echo $id; ?>">Edit</a></td>
                <td><a href="delete_customers.php?edit_customers=<?php echo $id; ?>">Delete</a></td>
            </tr>
            <?php }  ?>
        </table><br><br>
        </div>
    </body>
</html>















