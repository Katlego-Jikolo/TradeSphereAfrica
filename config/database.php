<?php

$host = "YOUR_HOST";
$username = "YOUR_USERNAME";
$password = "YOUR_PASSWORD";
$database = "YOUR_DATABASE";

$conn = mysqli_connect($host, $user, $password, $database,);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>
