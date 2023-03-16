<?php
    require("config.php");
    session_start();

    $id     = mysqli_real_escape_string($con, $_POST['id']);
    $price     = mysqli_real_escape_string($con, $_POST['price']);
    $qty = mysqli_real_escape_string($con, $_POST['quantity']);


    //checking for existing item in user's cart
    if($_SESSION['account_type'] == 'customer'){
        $id_type = 'customer_id';
        $qry = "SELECT * FROM `cart_tb` WHERE customer_id = $_SESSION[$id_type] AND product_id = $id AND cart_number = $_SESSION[order_count]";
    }
    else if($_SESSION['account_type'] == 'guest'){
        $id_type = 'guest_id';
        $qry = "SELECT * FROM `cart_tb` WHERE guest_id = $_SESSION[$id_type] AND product_id = $id AND cart_number = $_SESSION[order_count]";
    }
    else{
        $id_type = 'employee_id';
        $qry = "SELECT * FROM `cart_tb` WHERE employee_id = $_SESSION[$id_type] AND product_id = $id";
    }
        $existing_qry = mysqli_query($con, $qry);

    //updating tha existing item's quantity or adding the item to the cart
    if(mysqli_num_rows($existing_qry) > 0){
        $prodQuantity =  mysqli_fetch_array($existing_qry, MYSQLI_ASSOC);
        $quantity = $prodQuantity['quantity']+$qty;


        if($_SESSION['account_type'] == 'customer'){
            mysqli_query($con, "UPDATE `cart_tb` SET `quantity`='$quantity' WHERE  `$id_type` = $_SESSION[$id_type] AND product_id = $id AND cart_number = $_SESSION[order_count]");
        }
        else if($_SESSION['account_type'] == 'guest'){
            mysqli_query($con, "UPDATE `cart_tb` SET `quantity`='$quantity' WHERE  `$id_type` = $_SESSION[$id_type] AND product_id = $id AND cart_number = $_SESSION[order_count]");
        }
        else{
            mysqli_query($con, "UPDATE `cart_tb` SET `quantity`='$quantity' WHERE  `$id_type` = $_SESSION[$id_type] AND product_id = $id");
        }
        
    }
    else{
        $itemNumber = itemNumber($qry);
        mysqli_query($con, "INSERT INTO `cart_tb`(`$id_type`, `product_id`, `cart_number`, `quantity`, `price`, `item_number`) VALUES ('$_SESSION[$id_type]','$id','$_SESSION[order_count]','$qty','$price', '$itemNumber')"); 
    }

    function itemNumber($qry){
        require("config.php");
        $itemQry = mysqli_query($con, $qry." ORDER BY cart_id DESC LIMIT 1");
    }


    if($_SESSION['account_type'] == 'customer'){
        echo '<script>window.location="../menu.php"</script>';
    }
    else if($_SESSION['account_type'] == 'admin'){
        echo '<script>window.location="../admin-menu.php"</script>';
    }
    else if($_SESSION['account_type'] == 'guest'){
        echo '<script>window.location="../guest-menu.php"</script>';
    }
    else{
        echo '<script>window.location="../employee-menu.php"</script>';
    }
?>