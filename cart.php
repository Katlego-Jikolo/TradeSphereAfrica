<?php

include 'config/database.php';
include 'includes/session.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM cart_items
        INNER JOIN cart
        ON cart_items.cart_id = cart.cart_id
        
        INNER JOIN products
        ON cart_items.product_id = products.product_id
        
        WHERE cart.user_id= '$user_id'";

$result = mysqli_query($conn, $sql);

$total = 0;
?>

<!DOCTYPE html>
<html>

    <head>

        <title> Shopping Cart </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel= "stylesheet" href= "assets/css/style.css">

    </head>

    <body>
            
        <?php include 'includes/buyer_navbar.php'; ?>

        <div class= "container mt-4">

            <h1 class= "page-title"> Your Shopping cart </h1>


        <?php

        while ($row = mysqli_fetch_assoc($result)){

            $total += $row['price'];

        ?>

        <div class= "card mb-3">

            <div class= "card-body">


              <h4><?php echo $row['product_name']; ?></h4>

              <p class= "fw-bold text-success">R <?php echo $row['price']; ?></p>

              <a href= "remove_from_cart.php?id=<?php echo $row['cart_item_id']; ?>" class= "btn btn-danger btn-sm">

                Remove
                
              </a>
            
              <br>

              <hr />


            </div>

        </div>

        <?php
        }
        ?>

        <div class= "card">

            <div class= "card-body">

                <h3> Total Amount: <span class= "text-success"> R <?php echo $total; ?> </span></h3>

            </div>

        </div>

        <br>

        <a href= "checkout.php" class= "btn btn-success btn-lg">

             Proceed To Checkout

        </a>

        </div>

    </body>

</html>