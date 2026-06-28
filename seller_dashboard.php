<?php

include 'includes/session.php';

?>

<!DOCTYPE html>
<html>
    <head>

        <title> Seller DashBoard </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel= "stylesheet" href= "assets/css/style.css">
 
    </head>
    
    <body>

    <?php include 'includes/seller_navbar.php'; ?>


    <div class="container mt-5">

    <div class="card">

        <div class="card-body">

            <h1 class="page-title"> Seller Dashboard </h1>

            <p>
                Welcome to TradeSphere Africa, <strong><?php echo $_SESSION['full_name']; ?></strong>
            </p>

        </div>

    </div>

    <br>

    <div class="row">

        <div class="col-md-6">

            <div class="card">

                <div class="card-body text-center">

                    <h5>Product Management</h5>

                    <p> Create, Update, and Delete Products. </p>

                    <a href="seller_products.php" class="btn btn-success">

                        Manage Products

                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card">

                <div class="card-body text-center">

                    <h5>Logout</h5>

                    <p> Exit your Seller Account. </p>

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