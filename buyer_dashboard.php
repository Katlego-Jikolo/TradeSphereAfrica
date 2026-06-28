<?php

include 'includes/session.php';

?>


<!DOCTYPE html>
<html>
    <head>

        <title> Buyer DashBoard </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel= "stylesheet" href= "assets/css/style.css">
 
    </head>
    
    <body>

    <?php include 'includes/buyer_navbar.php'; ?>


    <div class="container mt-5">

    <div class="card">

        <div class="card-body">

            <h1 class="page-title">Buyer Dashboard </h1>

            <p>
                Welcome to TradeSphere Africa, <strong><?php echo $_SESSION['full_name']; ?></strong>
            </p>

        </div>

    </div>

    <br>

    <div class="row">

        <div class="col-md-3">

            <div class="card">

                <div class="card-body text-center">

                    <h5>Products</h5>

                    <a href="buyer_products.php" class="btn btn-success">

                        Browse Products

                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card">

                <div class="card-body text-center">

                    <h5>Cart</h5>

                    <a href="cart.php" class="btn btn-success">

                        View Cart

                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card">

                <div class="card-body text-center">

                    <h5>Orders</h5>

                    <a href="buyer_orders.php" class="btn btn-success">

                        My Orders

                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card">

                <div class="card-body text-center">

                    <h5>Logout</h5>

                    <a href="logout_system.php" class="btn btn-danger">

                        Logout

                    </a>

                </div>

            </div>

        </div>

    </div>

    </div>
       

    </body>
</html>