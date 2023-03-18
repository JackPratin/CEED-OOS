<?php
    require("config.php");
    session_start();

    $_SESSION['guest_id'] = 0;

    $cart_qry = mysqli_query($con, "SELECT * FROM cart_tb WHERE guest_id IS NOT NULL ORDER BY cart_id DESC LIMIT 1");
    $order_qry = mysqli_query($con, "SELECT * FROM order_table WHERE guest_id IS NOT NULL ORDER BY order_id DESC LIMIT 1");
    $history_qry = mysqli_query($con, "SELECT * FROM order_history WHERE guest_id IS NOT NULL ORDER BY order_id DESC LIMIT 1");

    if(mysqli_num_rows($history_qry) > 0){
        $id = mysqli_fetch_row($history_qry);
        if( $_SESSION['guest_id'] < $id['guest_id']){
            $_SESSION['guest_id'] = $id['guest_id']+1;
        }
    }
    if(mysqli_num_rows($order_qry) > 0){
        $id = mysqli_fetch_row($order_qry);
        if( $_SESSION['guest_id'] < $id['guest_id']){
            $_SESSION['guest_id'] = $id['guest_id']+1;
        }
    }
    if(mysqli_num_rows($cart_qry) > 0){
        $id = mysqli_fetch_row($cart_qry);
        if( $_SESSION['guest_id'] < $id['guest_id']){
            $_SESSION['guest_id'] = $id['guest_id']+1;
        }
    }

    $_SESSION['fname']          = mysqli_real_escape_string($con, $_POST['fname']);
    $_SESSION['lname']          = mysqli_real_escape_string($con, $_POST['lname']);
    $_SESSION['mi']             = mysqli_real_escape_string($con, $_POST['mi']);
    $_SESSION['contact']        = mysqli_real_escape_string($con, $_POST['contact']);
    $_SESSION['email']          = mysqli_real_escape_string($con, $_POST['email']);
    $_SESSION['address']        = mysqli_real_escape_string($con, $_POST['address']);
    $_SESSION['brgy']           = mysqli_real_escape_string($con, $_POST['brgy']);
    $_SESSION['city']           = mysqli_real_escape_string($con, $_POST['city']);
    $_SESSION['account_type']   = "guest";
    $_SESSION['order_count']    = 0;

    echo '<script>window.location="../guest-main.php"</script>';
?>