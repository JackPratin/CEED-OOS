<?php
    require("config.php");
    session_start();

    $username       = mysqli_real_escape_string($con, $_POST['username']);
    $password       = mysqli_real_escape_string($con, $_POST['password']);
    $type           = mysqli_real_escape_string($con, $_POST['type']);
    $hash_password = hash('sha256', $password);

    if($type == 'employee'){
        $user_qry = mysqli_query($con, "SELECT * FROM `employee_tb` WHERE username = '$username'");
    }
    else{
        $user_qry = mysqli_query($con, "SELECT * FROM `customer_tb` WHERE username = '$username'");
    }

    if(mysqli_num_rows($user_qry) == 1){
        session_regenerate_id();
        $row = mysqli_fetch_assoc($user_qry);
        if($row['password'] != $hash_password){
            echo "<script>alert('Wrong password.');</script>";
            $_SESSION['loginAttempt']++;
            if($type == 'employee'){
                echo '<script>window.location="../employee-login.php"</script>';
            }
            else{
                echo '<script>window.location="../index.php"</script>';
            }
        }

        $_SESSION['current_page'] = "";
        if($type == 'employee'){
            $_SESSION['first_name']     = $row['first_name'];
            $_SESSION['account_type']   = $row['employee_type'];
            $_SESSION['employee_id']    = $row['employee_id'];
            if($row['employee_type'] == 'admin'){
                echo '<script>window.location="../admin-main.php"</script>';
            }
            else{
                $_SESSION['order_count']    = $row['order_count'];
                echo '<script>window.location="../employee-main.php"</script>';
            }
        }
        else{
            // $_SESSION['user_id']        = $row['user_id'];
            $_SESSION['first_name']     = $row['first_name'];
            $_SESSION['customer_id']    = $row['customer_id'];
            $_SESSION['order_count']    = $row['order_count'];
            $_SESSION['account_type']   = "customer";
            echo '<script>window.location="../main.php"</script>';
        }
    }
    else{
        
        echo "<script>alert('No user found.');</script>";
        $_SESSION['loginAttempt']++;
        if($type == 'employee'){
            echo '<script>window.location="../employee-login.php"</script>';
        }
        else{
            echo '<script>window.location="../index.php"</script>';
        }
    }
?>