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
                       "SELECT products.*, users.full_name FROM products
                       
                       INNER JOIN users
                       ON products.seller_id = users.user_id");

?>

<!DOCTYPE html>
<html>

    <head>

        <title> Manage Products </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel= "stylesheet" href= "../assets/css/style.css">

    </head>


    <body>
       
       <?php include 'admin_navbar.php'; ?>
       
       <div class="container mt-5">

            <div class= "card mb-4">

                <div class= "card-body">

                    <h1 class= "page-title">Manage Products</h1>

                    <p> Access and manage all product listings on TradeSphere Africa. </p>

                </div>

            </div>

           <table class= "table table-striped table-bordered table-gover align-middle">


               <tr class= "table-dark">


                   <th>ID</th>
                   <th>Product</th>
                   <th>Seller</th>
                   <th>Price</th>
                   <th>Action</th>


                </tr>

               <?php

               while ($row = mysqli_fetch_assoc($result)) {

               ?>

               <tr>


                   <td><strong><?php echo $row['product_id']; ?></strong></td>
                   <td><?php echo $row['product_name']; ?></td>
                   <td><span class= "badge bg-success"><?php echo $row['full_name']; ?></span></td>
                   <td><span class= "text-success fw-bold"><?php echo $row['price']; ?></span></td>
                   <td>
                       <a href= "delete_product_admin.php?id= <?php echo $row['product_id'];?>" class= "btn btn-danger btn-sm" onclick= "return confirmProductDelete();">
                        
                           Delete

                        </a>
                    
            
                    </td>


                </tr>

                <?php
                }
                ?>


            </table>

       </div>

       <script src= "../assets/js/script.js"></script>

    </body>
</html>
