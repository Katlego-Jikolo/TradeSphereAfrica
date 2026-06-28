<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config/database.php';
include 'includes/session.php';

if ($_SESSION['role'] != 'buyer') {


    header("Location: login_system.php");

}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM cart_items
        
        INNER JOIN cart
        ON cart_items.cart_id = cart.cart_id
        
        INNER JOIN products
        ON cart_items.product_id = products.product_id
        
        WHERE cart.user_id= '$user_id'";


$result = mysqli_query($conn, $sql);


$total = 0;

while ($row = mysqli_fetch_assoc($result)) {

    $total += $row['price'];

}

if (isset($_POST['checkout'])) {


    header("Location: payment_system.php");
    exit();     
           
}
?>


<!DOCTYPE html>
<html>

    <head>

        <title> Checkout </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel= "stylesheet" href= "assets/css/style.css">

    </head>


    <body>

        <?php include 'includes/buyer_navbar.php'; ?>

        <div class= "cintainer mt-5">

            <div class= "card">
                

                <h1 class= "page-title"> Checkout </h1>


                <p> Review your order details before proceeding </p>


                <h3> Total: <span class= "text-success"> R <?php echo $total; ?> </span></h3>

                <form method= "POST">
                    

                    <button type= "submit" name= "checkout" class= "btn btn-success btn-lg" onclick= "return confirmOrder();">

                        Confirm Order

                    </button>

                </form>

            </div>

        </div>

        <script src= "assets/js/script.js"></script>

    </body>

</html>