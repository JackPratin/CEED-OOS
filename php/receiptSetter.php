<?php
    require("config.php");
    session_start();
    $_SESSION['invoice_id'] = $_SESSION['customer_id'];
    $_SESSION['invoice_cart'] = $_POST['cart'];

    echo '<script>location.replace("../invoice.php")</script>';
?>