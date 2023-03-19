<?php
    require("config.php");
    session_start();

    $cart_id     = mysqli_real_escape_string($con, $_POST['cart_id']);

    mysqli_query($con, "DELETE FROM `cart_tb` WHERE cart_id = '$cart_id '"); 

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