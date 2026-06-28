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


        header("Location: manage_users.php");
        exit();

}

$id = $_GET['id'];

$sql = "UPDATE users SET verification_status= 'verified'
        WHERE user_id= '$id'";

mysqli_query($conn, $sql);

header("Location: manage_users.php");
?>