<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/database.php';
include '../includes/session.php';


if ($_SESSION['role'] != 'admin') {


    header("Location: ../login_system.php");
    exit();
    
}

$user_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));

$product_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));

$order_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders"));
?>

<!DOCTYPE html>
<html>

    <head>

        <title> Admin Dashboard </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel= "stylesheet" href= "../assets/css/style.css">

    </head>

<body>
 
 <nav class= "navbar navbar-dark bg-dark">


            <div class= "container">

                <a class= "navbar-brand">

                    TradeSphere Africa

                </a>

            </div>


 </nav>

 <div class="container mt-5">

    <div class="card mb-4">

        <div class="card-body">

            <h1 class="page-title"> Admin Dashboard </h1>

            <p>Welcome, <strong><?php echo $_SESSION['full_name']; ?></strong></p>

        </div>

    </div>

    <h2 class="mb-4"> System Statistics </h2>

    <div class="row">

        <div class="col-md-4">

            <div class="card text-center">

                <div class="card-body">

                    <h5>Total Users</h5>

                    <h2><?php echo $user_count; ?></h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card text-center">

                <div class="card-body">

                    <h5>Total Products</h5>

                    <h2><?php echo $product_count; ?></h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card text-center">

                <div class="card-body">

                    <h5>Total Orders</h5>

                    <h2><?php echo $order_count; ?></h2>

                </div>

            </div>

        </div>

    </div>

    <br>

    <h2 class="mb-4">Administration Menu</h2>

    <div class="row">

        <div class="col-md-3">

            <div class="card">

                <div class="card-body text-center">

                    <h5>Users</h5>

                    <a href="manage_users.php" class="btn btn-success">

                        Manage Users

                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card">

                <div class="card-body text-center">

                    <h5>Products</h5>

                    <a href="manage_products.php" class="btn btn-success">

                        Manage Products

                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-2">

           <div class="card">

               <div class="card-body text-center">

                  <h5>Verify Sellers</h5>

                  <a href="verify_seller.php" class="btn btn-success">

                       Verify Sellers

                    </a>

                </div>

           </div>

        </div>

        <div class="col-md-3">

            <div class="card">

                <div class="card-body text-center">

                    <h5>Orders</h5>

                    <a href="manage_orders.php" class="btn btn-success">

                        Manage Orders

                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card">

                <div class="card-body text-center">

                    <h5>Logout</h5>

                    <a href="../logout_system.php" class="btn btn-danger">

                        Logout

                    </a>

                </div>

            </div>

        </div>

    </div>

 </div>

</body>

</html>