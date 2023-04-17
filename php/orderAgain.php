<?php
    session_start();
    require("config.php");
    
    
    $orders_qry = mysqli_query($con, "SELECT * FROM order_table WHERE customer_id = $_SESSION[customer_id] AND cart_number = $_POST[cart]");

    $id_type = 'customer_id';

    while($orders = mysqli_fetch_array($orders_qry, MYSQLI_ASSOC)){
        $itemNumber = itemNumber("SELECT * FROM `cart_tb` WHERE $id_type = $_SESSION[$id_type] AND cart_number = $_SESSION[order_count] ORDER BY cart_id DESC LIMIT 1");

        $itemSubtotal_qry = mysqli_query($con, "SELECT total FROM order_info WHERE customer_id = $_SESSION[customer_id] AND cart_number = $_POST[cart]");
        $itemSubtotal = mysqli_fetch_array($itemSubtotal_qry, MYSQLI_ASSOC);

         $qry = "INSERT INTO `cart_tb`(`$id_type`, `product_id`, `cart_number`, `quantity`, `price`, `item_number`, `extra_ingredients`, `extra_prices`, `item_subtotal`) VALUES ('$_SESSION[$id_type]','$orders[product_id]','$_SESSION[order_count]','$orders[quantity]','$orders[price]', '$itemNumber', '$orders[extra_ingredients]', '$orders[extra_prices]', '$itemSubtotal[total]')";

        mysqli_query($con, $qry); 
        
    }

    function itemNumber($qry){
        require("config.php");
        $itemQry = mysqli_query($con, $qry);
        $num = mysqli_fetch_array($itemQry, MYSQLI_ASSOC);
        if(mysqli_num_rows($itemQry) != 0){
            return $num['item_number']+1;
        }
        else{
            return 0;
        }
    }

    if($_SESSION['account_type'] == 'customer'){
        $_SESSION['current_page'] = "menu.php";
        echo '<script>window.location="../menu.php"</script>';
    }

    
?>