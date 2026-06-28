<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config/database.php';
include 'includes/session.php';


if ($_SESSION['role'] != 'buyer') {


    header("Location: login_system.php");
    exit();

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

while ($row = mysqli_fetch_assoc($result)){

    $total += ($row['price'] * $row['quantity']);

}

if (isset($_POST['pay'])) {


    $cardholder_name = $_POST['cardholder_name'];
    $card_number = $_POST['card_number'];
    $cvv = $_POST['cvv'];
    $expirey_date = $_POST['expirey_date'];

    $order_sql = "INSERT INTO orders (buyer_id, total_amount, order_status)
                  VALUES ('$user_id', '$total', 'pending')";


    mysqli_query($conn, $order_sql);

    $order_id = mysqli_insert_id($conn);



    $payment_method = "Card";
    $payment_status = "Paid";

    mysqli_query($conn, "INSERT INTO payments (order_id, payment_method, payment_status)
                         VALUES ('$order_id', '$payment_method', '$payment_status')");



    $delivery_method = "Standard Delivery";
    $delivery_status = "Pending";
    $delivery_address = "Customer Address";

    mysqli_query($conn, "INSERT INTO deliveries (order_id, delivery_method, delivery_status, delivery_address)
                         VALUES ('$order_id', '$delivery_method', '$delivery_status', '$delivery_address')");

    $cart_sql = "SELECT * FROM cart_items
                 
                INNER JOIN cart
                ON cart_items.cart_id = cart.cart_id
                 
                INNER JOIN products
                ON cart_items.product_id = products.product_id
               
                WHERE cart.user_id= '$user_id'";
    
    $cart_result = mysqli_query($conn, $cart_sql);

    while ($cart_row = mysqli_fetch_assoc($cart_result)) {

        $product_id = $cart_row['product_id'];
        $quantity = $cart_row['quantity'];

        mysqli_query($conn, "INSERT INTO order_items (order_id, product_id, quantity)
                             VALUES ('$order_id', '$product_id', '$quantity')");

    }

    mysqli_query($conn, "DELETE cart_items FROM cart_items
                        
                         INNER JOIN cart
                         ON cart_items.cart_id = cart.cart_id
                       
                         WHERE cart.user_id = '$user_id'");
    
    header("Location: buyer_orders.php");
    exit();

}

?>

<!DOCTYPE html>
<html>

 <head>

    <title> Payment System </title>

    <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel= "stylesheet">

    <link rel= "stylesheet" href= "assets/css/style.css">

 </head>

 <body>

    <?php include 'includes/buyer_navbar.php'; ?>
    
    <div class= "container mt-5">
    <div class= "card">
    <div class= "card-body">
    
    <h1 class= "page-title"> Payment Details </h1>

    <h4> Total Amount: R <?php echo number_format($total, 2); ?></h4>

    <hr />

    <form method="POST" onsubmit= "validatePayment(this);">

       <label class= "form-label">Cardholder Name</label><br>
       <input type="text" name="cardholder_name" placeholder= "Cardholder Name" class= "form-control" required><br>
       <br>

       <label class= "form-label">Cadr Number</label><br>
       <input type="text" id= "card_number" name="card_number" placeholder= "Card Number" class= "form-control" maxlength= "16" required><br>
       <br>

       <label class= "form-label">CVV</label><br>
       <input type="text" id= "cvv" name="cvv" placeholder= "CVV" class= "form-control" maxlength= "3" required><br>
       <br>

       <label class= "form-label">Expirey date</label><br>
       <input type="month" name="expirey_date" placeholder= "MM/YY" class= "form-control" required><br>
       <br>


       <button type="submit" name="pay" class= "btn btn-success w-100">

            Pay Now
        
       </button>

    </form>

    </div>
    </div>
    </div>

    <script src= "assets/js/script.js"></script>

 </body>

</html>