<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/database.php';
include '../includes/session.php';


if ($_SESSION['role'] != 'admin') {


    header("Location: ../login_system.php");
    exit();

}

if (!isset($_GET['id'])) {


    header("Location: manage_orders.php");
    exit();

}

$id = $_GET['id'];

mysqli_query($conn,
             "UPDATE orders
              SET order_status= 'completed'
              WHERE order_id= '$id'");

header("Location: manage_orders.php");
exit();

?>
