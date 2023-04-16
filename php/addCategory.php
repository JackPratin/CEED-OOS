<?php
    require("config.php");
    
    $category      = mysqli_real_escape_string($con, $_POST['category']);

    $insertqry = mysqli_query($con, "INSERT INTO `product_categories_tb`(`category_name`) VALUES ('$category')");

    echo "<script>alert('Category Added.');</script>";
    echo '<script>window.location="../admin-product.php"</script>';
?>
