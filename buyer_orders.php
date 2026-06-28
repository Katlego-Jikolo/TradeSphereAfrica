<?php
include 'config/database.php';
include 'includes/session.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM orders
        WHERE buyer_id= '$user_id'";

$result = mysqli_query($conn, $sql);
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
            
            <h1 class= "page-title"> My Orders </h1>

            <p>View Order History </p>


           <?php

           while ($row = mysqli_fetch_assoc($result)){

           ?>

           <div class= "card mb-3">

               <div class= "card-body">

                  <h4>Order # <?php echo $row['order_id']; ?></h3>
            
                  <br>

                  <p><strong>Total Amount:</strong><span class= "text-success"> R <?php echo $row['total_amount']; ?></span></p>
                  <br>
    
                  <p><strong>Order Status: </strong><?php echo $row['order_status']; ?></p>

                  <hr />

                </div>

           </div>

           <?php
            }
           ?>


        </div>


    </body>


</html>