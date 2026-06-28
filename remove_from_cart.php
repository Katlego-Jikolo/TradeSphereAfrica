<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config/database.php';
include 'includes/session.php';

if ($_SESSION['role'] != 'buyer') {


    header("Location: login_system.php");
    exit();

}

$cart_item_id = $_GET['id'];

$sql = "DELETE FROM cart_items WHERE cart_item_id = '$cart_item_id'";

mysqli_query($conn, $sql);

header("Location: cart.php");
exit();

?>