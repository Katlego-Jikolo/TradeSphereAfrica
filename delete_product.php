<?php

include 'config/database.php';
include 'includes/session.php';

if ($_SESSION['role'] != 'seller') {


    header("Location: login_system.php");
}

$product_id = $_GET['id'];

$sql = "DELETE FROM products
        WHERE product_id= '$product_id'";

$result = mysqli_query($conn, $sql);

if ($result) {


    header("Location: seller_products.php");

} else {

    echo "Error deleting product.";

}
?>
