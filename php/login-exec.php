<?php
    require("config.php");
    session_start();

    $username       = mysqli_real_escape_string($con, $_POST['username']);
    $password       = mysqli_real_escape_string($con, $_POST['password']);
    $hash_password = hash('sha256', $password);

    $user_qry = mysqli_query($con, "SELECT * FROM `customer_tb` WHERE username = '$username' AND password = '$hash_password'");

    if(mysqli_num_rows($user_qry) == 1){
        session_regenerate_id();
        $row = mysqli_fetch_assoc($user_qry);
        // $_SESSION['user_id']        = $row['user_id'];
        $_SESSION['first_name']     = $row['first_name'];
        $_SESSION['customer_id']    = $row['customer_id'];
        $_SESSION['order_count']    = $row['order_count'];
        echo '<script>window.location="../main.php"</script>';
    }
    else{
        echo "<script>alert('No user found or wrong password.');</script>";
        echo '<script>window.location="../index.php"</script>';
    }
?>