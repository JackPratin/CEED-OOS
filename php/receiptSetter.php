<?php
    require("config.php");
    session_start();
    if($_SESSION['account_type'] == 'admin'){
        $_SESSION['invoice_id'] = $_POST['id'];
        $_SESSION['invoice_cart'] = $_POST['cart'];

        echo '<script>location.replace("../invoice.php")</script>';
    }
    else{
        $_SESSION['invoice_id'] = $_SESSION['customer_id'];
        $_SESSION['invoice_cart'] = $_POST['cart'];

        echo '<script>location.replace("../invoice.php")</script>';
    }
?>