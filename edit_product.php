<?php

include 'config/database.php';
include 'includes/session.php';

if ($_SESSION['role'] != 'seller') {


    header("Location: login_system.php");
}

if (!isset($_GET['id'])) {


    header("Location: seller_products.php");
    exit();
}

$product_id = $_GET['id'];

$sql = "SELECT * FROM products
        WHERE product_id= '$product_id'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['update_product'])) {


    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];

    $update_sql = "UPDATE products SET
                   
                   product_name= '$product_name',
                   product_description= '$product_description',
                   price= '$price',
                   stock_quantity= '$stock_quantity'
                   
                   WHERE product_id= '$product_id'";

    $update_result = mysqli_query($conn, $update_sql);

    if ($update_result) {


        header("Location: seller_products.php");

    } else {

        echo "Error updating product.";

    }
}

?>

<!DOCTYPE html>
<html>

    <head>

        <title> Edit Product </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel= "stylesheet" href= "assets/css/style.css">

    </head>

    <body>

        <?php include 'includes/seller_navbar.php'; ?>


        <div class= "container mt-5">
        <div class= "card">
        <div class= "card-body">
        <div class= "page-title"> 

            <h1> Edit Product </h1>

        </div>

        <form method= "POST">

            <label class= "form-label"> Product Name </label><br>
            <input type= "text" name= "product_name" class= "form-control" value= "<?php echo $row['product_name']; ?>" >
            <br>

            <label class= "form-label"> Product Description </label><br>
            <textarea name= "product_description" class= "form-control" rows= "4"><?php echo $row['product_description']; ?></textarea>
            <br>

            <label class= "form-label"> Price </label><br>
            <input type= "text" name= "price" class= "form-control" value= "<?php echo $row['price']; ?>">
            <br>

            <label class= "form-label"> Stock Quantity </label><br>
            <input type= "number" name= "stock_quantity" class= "form-control "value= "<?php echo $row['stock_quantity']; ?>">
            <br>

            <button type= "submit" name= "update_product" class= "btn btn-success">

                Update Product

            </button>

            <a href= "seller_products.php" class= "btn btn-secondary">

                Cancel

            </a>


        </form>

        </div>
        </div>
        </div>



    </body>

</html>