<?php 

include 'config/database.php';
include 'includes/session.php';

if (isset($_POST['user_registration'])) {


    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    $sql = "INSERT INTO users (full_name, email, phone, password, role)

    VALUES ('$full_name', '$email', '$phone', '$password', '$role')";


    $result = mysqli_query($conn, $sql);

    if ($result) {


        $_SESSION['full_name'] = $full_name;
        $_SESSION['role'] = $role;

        $new_user_id = mysqli_insert_id($conn);

        $_SESSION['user_id'] = $new_user_id;

        if ($role == 'admin') {


            header("Location: admin/dashboard.php");

        } elseif ($role == 'seller') {


            header("Location: seller_dashboard.php");

        } else {

            header("Location: buyer_dashboard.php");

        }

        exit();

    } else {
        
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<!-- Designing the user account registration webpage -->
<!DOCTYPE html>
<html>

 <head>

    <title> User Registration </title>

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
    <div class= "col-md-6">
    <div class= "card">
    <div class= "card-body">

    <h2 class text= "text-center mb-4">Create Account </h2>

    <form method="POST">

       <label class= "form-label">Full Name</label><br>
       <input type="text" name="full_name" placeholder= "Enter fullname" class= "form-control" required><br>
       <br>

       <label class= "form-label">Email Address</label><br>
       <input type="email" name="email" placeholder= "Enter email address" class= "form-control" required><br>
       <br>

       <label class= "form-label">Phone Number</label><br>
       <input type="text" name="phone" placeholder= "Enter phone number" class= "form-control" required><br>
       <br>

       <label class= "form-label">Password</label><br>
       <input type="password" name="password" placeholder= "Enter password" class= "form-control" required><br>
       <br>

       <label class= "form-label">Role</label><br>
       <select name="role" class= "form-select">

           <option value= "buyer"> Buyer </option>

           <option value= "seller"> Seller </option>

       </select>

       <br><br>

       <button type="submit" name="user_registration" class= "btn btn-success w-100">

            Register
        
       </button>

    </form>

    </div>
    </div>
    </div>
    </div>
    </div>

    <div class= "row mt-5">

        <div class= "col-md-4">

            <div class= "card text-center">

                <div class= "card-body">

                    <h4> Secure Payments </h4>

                    <p> Safe payment simulation system. </p>

                </div>

            </div>

        </div>

    </div>

    <div class= "col-md-4">

       <div class= "card text-center">

            <div class= "card-body">

                <h4> Verified Sellers </h4>

                <p> Buy confidently from approved sellers. </p>

            </div>

        </div>

    </div>

    <div class= "col-md-4">

       <div class= "card text-center">

            <div class= "card-body">

                <h4> Fast Delivery </h4>

                <p> Track and manage orders easily. </p>

            </div>

        </div>

    </div>

 </body>

</html>
