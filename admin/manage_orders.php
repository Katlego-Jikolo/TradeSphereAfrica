<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/database.php';
include '../includes/session.php';


if ($_SESSION['role'] != 'admin') {


    header("Location: ../login_system.php");
    exit();
}


$result = mysqli_query($conn,
                       "SELECT orders.*, users.full_name
                        FROM orders
                        
                        INNER JOIN users
                        ON orders.buyer_id = users.user_id");

?>

<!DOCTYPE html>
<html>

    <head>

        <title> Manage Orders </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel= "stylesheet" href= "../assets/css/style.css">

    </head>

    <body>

        <?php include 'admin_navbar.php'; ?>

        <div class="container mt-5">

            <div class= "card mb-4">

                <div class= "card-body">

                    <h1 class= "page-title">Manage Orders</h1>

                    <p> Access and manage all customer orders. </p>

                </div>

            </div>

            <table class= "table table-striped table-bordered table-hover align-middle">


                <tr>


                    <th>Order ID</th>
                    <th>Buyer</th>
                    <th>Total Amount</th>
                    <th>Order Status</th>
                    <th>Action</th>


                </tr>

                <?php

                while ($row = mysqli_fetch_assoc($result)) {

                ?>

                <tr>


                    <td><?php echo $row['order_id']; ?></td>
                    <td><span class= "badge bg-primary"><?php echo $row['full_name']; ?></span></td>
                    <td><span class= "text-success fw-bold"><?php echo $row['total_amount']; ?></span></td>
                    <td><?php 

                    if ($row['order_status'] == 'completed') {


                       echo "<span class= 'badge bg-success'>Completed</span>";


                    } else {


                       echo "<span class= 'badge bg-warning text-dark'>Pending</span>";

                    }

                    ?>
                    </td>


                    <td><?php
                
                    if ($row['order_status'] != 'completed') {
                
                    ?>

                    <a href= "complete_order.php?id= <?php echo $row['order_id'];?>" class= "btn btn-success btn-sm">

                        Complete

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
