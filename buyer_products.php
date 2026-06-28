<?php

include 'config/database.php';
include 'includes/session.php';

if ($_SESSION['role'] != 'buyer') {


    header("Location: login_system.php");

}

$sql = "SELECT * FROM products";

$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html>

    <head>

        <title> Browse Products </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel= "stylesheet" href= "assets/css/style.css">

    </head>

    <body>
        
        <?php include 'includes/buyer_navbar.php'; ?>

        <div class= "container mt-4">

        <h1> Browse Products </h1>

        <div class= "row">
        <?php

        while ($row = mysqli_fetch_assoc($result)){

        ?>

        <div class= "col-md-4 mb-4">

            <div class= "card h-100"> 

                <?php

                if (!empty($row['product_image'])) {

                ?>

                <img src= "uploads/<?php echo $row['product_image']; ?>" class= "card-img-top product-image">

                <?php

                }

                ?>

                <div class= "card-body">

                    <h4><?php echo $row['product_name']; ?></h4>

                    <p><?php echo $row['product_description']; ?></p>

                    <p class= "fw-bold text-success">R <?php echo $row['price']; ?></p>

                    <p>Stock Available: <?php echo $row['stock_quantity']; ?></p>

                    <a href= "add_product_to_cart.php?id= <?php echo $row['product_id']; ?>" class= "btn btn-success">

                          Add to Cart

                    </a>

                </div>

            </div>


        </div>


        <?php
        }
        ?>
        
        </div>

        </div>


    </body>

</html>