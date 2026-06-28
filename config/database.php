<?php

$host = "sql302.infinityfree.com";
$user = "if0_42117619";
$password = "sBJFgc9LlMgfC";
$database = "if0_42117619_TradeSphereAfrica";

$conn = mysqli_connect($host, $user, $password, $database,);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>
