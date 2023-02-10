<?php
    require("config.php");
    session_start();

    $cart_id     = mysqli_real_escape_string($con, $_POST['cart_id']);

    mysqli_query($con, "DELETE FROM `cart_tb` WHERE cart_id = '$cart_id '"); 

    echo '<script>window.location="../menu.php"</script>';
?>