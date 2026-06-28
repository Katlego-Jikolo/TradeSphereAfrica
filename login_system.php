<?php

include 'config/database.php';
include 'includes/session.php';

if (isset($_POST['user_login'])) {


    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE

                    email= '$email'
                    AND
                    password= '$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['full_name'] = $row['full_name'];
        $_SESSION['role'] = $row['role'];

        
        if ($row['role'] == 'admin') {

            header("Location: admin/dashboard.php");


        } elseif ($row['role'] == 'seller') {


            header("Location: seller_dashboard.php");


        } else {


            header("Location: buyer_dashboard.php");


        } 
        
    } else {

            echo "Invalid email address or password.";
        }
}

?>

<!DOCTYPE html>
<html>

    <head>

        <title> Login Page </title>

        <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel= "stylesheet">

        <link rel= "stylesheet" href= "assets/css/style.css">

    </head>

    <body>
        
        <nav class= "navbar navbar-dark bg-dark">


            <div class= "container">

                <a class= "navbar-brand">

                    TradeSphere Africa

                </a>
 


            </div>


        </nav>


        <div class= "card mb-4">

            <div class= "card-body text-center">

                <h2> Welcome to TradeSphereAfrica </h2>

                <p class= "text-muted">

                    South Africa's trusted student marketplace for buying and selling 
                    products online.

                </p>

            </div>
            
        </div>

        <div class= "container mt-5">
        <div class= "row justify-content-center">
        <div class= "col-md-5">
        <div class= "card">
        <div class= "card-body">

        <h2 class= "text-center mb-4"> User Login </h2>


        <form method= "POST">

            <label> Email Address </label><br>
            <input type= "email" name= "email" placeholder= "Enter email address" class="form-control" required>
            <br>

            <label> Password </label><br>
            <input type= "password" name= "password" placeholder= "Enter password" class= "form-control" required>
            <br>

            <button type= "submit" name= "user_login" class= "btn btn-success w-100">

                Login

            </button>


        </form>

        </div>
        </div>
        </div>
        </div>
        </div>

        <div class= "container mt-5">
        <div class= "row justify-content-center">
        <div class= "col-md-5">
        <div class= "card">
        <div class= "card-body">

        <h3 class= "text-center mb-4"> Register Account </h3>
        
        <div>

                <a href= "user_registration.php" class= "btn btn-success">

                        Register

                </a>

        </div>

        </div>
        </div>
        </div>
        </div>
        </div>
        

    </body>

</html>