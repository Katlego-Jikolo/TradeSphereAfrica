<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/database.php';
include '../includes/session.php';


if ($_SESSION['role'] != 'admin') {


    header("Location: ../login_system.php");
    exit();

}

$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>

    <head>

        <title> Manage Users </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel= "stylesheet" href= "../assets/css/style.css">

    </head>

    <body>
        
        <?php include 'admin_navbar.php'; ?>

        <div class="container mt-5">

            <div class= "card mb-4">

                <div class= "card-body">

                    <h1 class= "page-title">Manage Users</h1>

                    <p> Manage all user accounts. </p>

                </div>

            </div>
        

            <table class= "table table-striped table-bordered table-hover align-middle">
                        

                <tr class= "table-dark">
                        


                    <th>ID</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Role</th>
                    <th>Verification</th>
                    <th>Actions</th>


                </tr>

            <?php

            while ($row = mysqli_fetch_assoc($result)) {

            ?>

            <tr>


                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['full_name']; ?></td>
                <td><?php echo $row['email']; ?></td>

                <td><?php 

                if ($row['role'] == 'admin') {


                    echo "<span class= 'badge bg-danger'>Admin</span>";


                } elseif ($row['role'] == 'seller') {


                    echo "<span class= 'badge bg-success'>Seller</span>";


                } else {


                    echo "<span class= 'badge bg-primary'>Buyer</span>";

                }
                
                ?>
                </td>


                <td><?php 
                
                if ($row['verification_status'] == 'verified') {


                    echo "<span class= 'badge bg-success'>Verified</span>";


                } else {


                    echo "<span class= 'badge bg-warning text-dark'>Pending</span>";

                }

                ?>
                </td>


                <td><?php
                
                if ($row['role'] == 'seller' && $row['verification_status'] != 'verified') {
                
                ?>

                <a href= "verify_seller.php?id= <?php echo $row['user_id'];?>" class= "btn btn-success btn-sm">

                    Verify

                </a>

                <?php

                } else {
                    echo "_";
                }

                ?>

                </td>


            </tr>

            <?php
            }
            ?>


            </table>

        </div>

    </body>
</html>
