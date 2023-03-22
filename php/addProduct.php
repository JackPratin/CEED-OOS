<?php
    require("config.php");
    require("imageUpload.php");

    $pName              = mysqli_real_escape_string($con, $_POST['pName']);
    $price              = mysqli_real_escape_string($con, $_POST['price']);
    $qty                = mysqli_real_escape_string($con, $_POST['qty']);
    $category           = mysqli_real_escape_string($con, $_POST['category']);

    // mysqli_query($con, "INSERT INTO `products_tb`(`product_name`, `product_category`, `product_price`, `product_ingredients`, `product_image`) VALUES ('$pName','$category','$price','[value-4]','[value-5]')");

    if(($imageName = upload($pName)) != false){
        
        mysqli_query($con, "INSERT INTO `products_tb`(`product_name`, `product_category`, `product_price`, `product_image`) VALUES ('$pName','$category','$price', '$imageName')");

        echo '<script>alert("Product added.");</script>';
        echo '<script>window.location="../admin-product.php"</script>';
    }
    else{
        echo '<script>alert("No image found.");</script>';
        echo '<script>window.history.go(-1)</script>';
    }

    

?>