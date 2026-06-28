<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/database.php';
include '../includes/session.php';


if ($_SESSION['role'] != 'admin') {


    header("Location: ../login_system.php");
    exit();
    
}

$id = $_GET['id'];

mysqli_query($conn,
             "DELETE FROM products
              WHERE product_id= '$id'");

header("Location: manage_products.php");
?>