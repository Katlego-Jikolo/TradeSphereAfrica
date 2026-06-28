<?php

include 'config/database.php';
include 'includes/session.php';

if ($_SESSION['role'] != 'buyer') {


    header("Location: login_system.php");
}


$user_id = $_SESSION['user_id'];
$product_id = $_GET['id'];


$cart_check = "SELECT * FROM cart 
               WHERE user_id= '$user_id'";

$cart_result = mysqli_query($conn, $cart_check);

if (mysqli_num_rows($cart_result) > 0) {


    $cart_row = mysqli_fetch_assoc($cart_result);
    $cart_id = $cart_row['cart_id'];

} else {


    $create_cart = "INSERT INTO cart (user_id)
                    VALUES ('$user_id')";

    mysqli_query($conn, $create_cart);

    $cart_id = mysqli_insert_id($conn);

}

$insert_item = "INSERT INTO cart_items (cart_id, product_id, quantity)
                VALUES ('$cart_id', '$product_id', '1')";

mysqli_query($conn, $insert_item);

header("Location: buyer_products.php");
?>
