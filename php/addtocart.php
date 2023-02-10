<?php
    require("config.php");
    session_start();

    $id     = mysqli_real_escape_string($con, $_POST['id']);
    $price     = mysqli_real_escape_string($con, $_POST['price']);

    $existing_qry = mysqli_query($con, "SELECT * FROM `cart_tb` WHERE customer_id = $_SESSION[customer_id] AND product_id = $id AND cart_number = $_SESSION[order_count]");

    if(mysqli_num_rows($existing_qry) > 0){
        $prodQuantity =  mysqli_fetch_array($existing_qry, MYSQLI_ASSOC);
        $quantity = $prodQuantity['quantity']+1;

        mysqli_query($con, "UPDATE `cart_tb` SET `quantity`='$quantity' WHERE customer_id = $_SESSION[customer_id] AND product_id = $id AND cart_number = $_SESSION[order_count]");
    }
    else{
        mysqli_query($con, "INSERT INTO `cart_tb`(`customer_id`, `product_id`, `cart_number`, `quantity`, `price`) VALUES ('$_SESSION[customer_id]','$id','$_SESSION[order_count]','1','$price')"); 
    }

    echo '<script>window.location="../menu.php"</script>';
?>