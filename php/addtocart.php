<?php
    require("config.php");
    session_start();

    $id     = mysqli_real_escape_string($con, $_POST['id']);
    $price     = mysqli_real_escape_string($con, $_POST['price']);

    if($_SESSION['account_type'] == 'customer'){
        $id_type = '"customer_id"';
        
        $existing_qry = mysqli_query($con, "SELECT * FROM `cart_tb` WHERE customer_id = $_SESSION[$id_type] AND product_id = $id AND cart_number = $_SESSION[order_count]");
    }
    else{
        $id_type = 'employee_id';

        $existing_qry = mysqli_query($con, "SELECT * FROM `cart_tb` WHERE employee_id = $_SESSION[$id_type] AND product_id = $id");
    }


    if(mysqli_num_rows($existing_qry) > 0){
        $prodQuantity =  mysqli_fetch_array($existing_qry, MYSQLI_ASSOC);
        $quantity = $prodQuantity['quantity']+1;


        if($_SESSION['account_type'] == 'customer'){
            mysqli_query($con, "UPDATE `cart_tb` SET `quantity`='$quantity' WHERE  `$id_type` = $_SESSION[$id_type] AND product_id = $id AND cart_number = $_SESSION[order_count]");
        }
        else{
            mysqli_query($con, "UPDATE `cart_tb` SET `quantity`='$quantity' WHERE  `$id_type` = $_SESSION[$id_type] AND product_id = $id");
        }
        
    }
    else{
        mysqli_query($con, "INSERT INTO `cart_tb`(`$id_type`, `product_id`, `cart_number`, `quantity`, `price`) VALUES ('$_SESSION[$id_type]','$id','$_SESSION[order_count]','1','$price')"); 
    }


    if($_SESSION['account_type'] == 'customer'){
        echo '<script>window.location="../menu.php"</script>';
    }
    else{
        echo '<script>window.location="../employee-menu.php"</script>';
    }
?>