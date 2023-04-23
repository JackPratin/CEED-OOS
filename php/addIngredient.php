<?php
    require("config.php");
    
    $name       = mysqli_real_escape_string($con, $_POST['name']);
    $price       = mysqli_real_escape_string($con, $_POST['price']);
    $qty       = mysqli_real_escape_string($con, $_POST['qty']);

    // $insertqry = mysqli_query($con, "INSERT INTO `products_tb`(`product_name`, `product_category`, `product_price`, `product_quantity`) VALUES ('$name ','4','$price','$qty')");
    $insertqry = mysqli_query($con, "INSERT INTO `ingredients_tb`(`item_name`, `item_quantity`, `item_price`) VALUES ('$name ','$qty','$price')");

    echo "<script>alert('Ingredient Added.');</script>";
    echo '<script>window.location="../admin-product.php"</script>';
?>