<?php
    require("config.php");
    session_start();
    $cart_number = $_POST['cart_number'];

    mysqli_query($con, "UPDATE `order_info` SET `status`='cancelled' WHERE `customer_id` = $_SESSION[customer_id] AND `cart_number` = $cart_number");

    echo '<script>alert("Order cancelled.");</script>';
    echo '<script>window.location="../order-list.php"</script>';
    // echo"$_POST[id]";
?>