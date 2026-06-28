<?php

include 'config/database.php';
include 'includes/session.php';

if ($_SESSION['role'] != 'seller') {

    header("Location: login_system.php");
}

if (isset($_POST['add_product'])) {


    $seller_id = $_SESSION['user_id'];


    $category_id = $_POST['category_id'];
    $product_name = $_POST['product_name'];
    $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];


    $image_name = $_FILES['product_image']['name'];
    $tmp_name = $_FILES['product_image']['tmp_name'];

    move_uploaded_file(

        $tmp_name,
        "uploads/" . $image_name

    );


    $sql = "INSERT INTO products (seller_id, category_id, product_name, product_description, price, stock_quantity, product_image)
            VALUES ('$seller_id', '$category_id', '$product_name', '$product_description', '$price', '$stock_quantity', '$image_name')";


    $result = mysqli_query($conn, $sql);

    if ($result) {


        echo "Product added successfully!";

    } else {

        echo "Error: " . mysqli_error($conn);

    }
}

?>

<!DOCTYPE html>
<html>

    <head>

        <title> Seller Products </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel= "stylesheet" href= "assets/css/style.css">

    </head>


    <body>

        <?php include 'includes/seller_navbar.php'; ?>

        <div class= "container mt-5">
        <div class= "card">
        <div class= "card-body">

        <h2 class= "page-title"> Seller Product Management </h2>

        <form method= "POST" enctype= "multipart/form-data">

            <label> Category ID </label><br>
            <p>
            <b>
                1: Beauty
                2: Clothing
                3: Electronics
                4: Furniture
                5: Home Appliances
            </b>    
            </p>
            <input type= "number" name= "category_id" placeholder= "Enter category ID" class= "form-control" required>
            <br>

            <label> Product Name </label><br>
            <input type= "text" name= "product_name" placeholder= "Enter product name" class= "form-control" required>
            <br>

            <label> Product Description </label><br>
            <textarea name= "product_description" class= "form-control"></textarea>
            <br>

            <label> Price </label><br>
            <input type= "text" name= "price" placeholder= "Enter product price" class= "form-control" required>
            <br>

            <label> Stock Quantity </label><br>
            <input type= "number" name= "stock_quantity" placeholder= "Enter stock quantity" class= "form-control" required>
            <br>

            <label> Product Image </label>
            <input type= "file" name= "product_image" class= "form-control" required>
            <br>

            <button type= "submit" name= "add_product">

                Add Product

            </button>


        </form>

        </div>
        </div>
        </div>

        <hr />

      

        <?php

        $seller_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM products
                WHERE seller_id= '$seller_id'";

        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)){

        
        ?>

        <div class= "card mb-4">
            <?php if(!empty($row['product_image'])) {
            ?>

            <img src= "uploads/<?php echo $row['product_image']; ?>" class= "card-img-top product-image">

            <?php
            }
            ?>

            <div class= "card-body">

            <h3><?php echo $row['product_name']; ?></h3>

            <p><?php echo $row['product_description']; ?></p>
            <p>R <?php echo $row['price']; ?></p>
            <p><strong>In Stock: <?php echo $row['stock_quantity']; ?></strong></p>
            
            <a href= "edit_product.php?id=<?php echo $row['product_id']; ?>" class= "btn btn-warning">

                Edit Product

            </a>
            <br>
            <hr />
            


            <a href= "delete_product.php?id=<?php echo $row['product_id']; ?>" class= "btn btn-danger" onclick= "return confirmDeleteProduct();">

                Delete Product

            </a>
            <br>

            <hr />
        
            </div>

        </div>

        <?php
        }
        ?>

        <script src= "assets/js/script.js"></script>

    </body>

</html>