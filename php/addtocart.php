<?php
    require("config.php");
    session_start();

    if(!isset($_SESSION['order_count'])){
        $_SESSION['order_count'] = 0;
    }

    $id     = mysqli_real_escape_string($con, $_POST['id']);
    $price  = mysqli_real_escape_string($con, $_POST['price']);
    $qty    = mysqli_real_escape_string($con, $_POST['quantity']);
    $ingredients = '';
    $ingredients_prices= '';
    $price = floatval($price);
    $item_price = $price;
    $item_price = $item_price;

  
   if(isset($_POST['extras'])){
        foreach($_POST['extras'] as $extras){
            $ingqry = mysqli_query($con, "SELECT item_price FROM ingredients_tb WHERE item_id = $extras");
            $ingprice = mysqli_fetch_array($ingqry, MYSQLI_ASSOC);
            if($_POST['extras'][0] == $extras){
                $ingredients = $extras;
                $ingredients_prices =  $ingprice['item_price'];
            }
            else{
                $ingredients = $ingredients.', '.$extras;
                $ingredients_prices = $ingredients_prices.', '.$ingprice['item_price'];
            }

            $item_price += (float)$ingprice['item_price'];
            // echo $extras;
            
        }
   }

    // checking for existing item in user's cart
    if($_SESSION['account_type'] == 'customer'){
        $id_type = 'customer_id';
        $qry = "SELECT * FROM `cart_tb` WHERE customer_id = $_SESSION[$id_type] AND product_id = $id AND cart_number = $_SESSION[order_count] AND extra_ingredients = '$ingredients'";
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

    // updating tha existing item's quantity or adding the item to the cart

    if(mysqli_num_rows($existing_qry) > 0){
        $prodQuantity =  mysqli_fetch_array($existing_qry, MYSQLI_ASSOC);
        $quantity = $prodQuantity['quantity']+$qty;


        if($_SESSION['account_type'] == 'customer'){
            mysqli_query($con, "UPDATE `cart_tb` SET `quantity`='$quantity' WHERE  `$id_type` = $_SESSION[$id_type] AND product_id = $id AND cart_number = $_SESSION[order_count]");
        }
        else{
            mysqli_query($con, "UPDATE `cart_tb` SET `quantity`='$quantity' WHERE  `$id_type` = $_SESSION[$id_type] AND product_id = $id");
        }
        
    }
    else{
        $itemNumber = itemNumber("SELECT * FROM `cart_tb` WHERE $id_type = $_SESSION[$id_type] AND cart_number = $_SESSION[order_count] ORDER BY cart_id DESC LIMIT 1");

         $qry = "INSERT INTO `cart_tb`(`$id_type`, `product_id`, `cart_number`, `quantity`, `price`, `item_number`, `extra_ingredients`, `extra_prices`, `item_subtotal`) VALUES ('$_SESSION[$id_type]','$id','$_SESSION[order_count]','$qty','$price', '$itemNumber', '$ingredients', '$ingredients_prices', '$item_price')";

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