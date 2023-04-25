<?php
    require("config.php");

    if($_POST['submit'] == 'Invoice'){

    }
    elseif($_POST['submit'] == 'Prepare'){
        mysqli_query($con, "UPDATE `order_info` SET `status`='preparing' WHERE `info_id`='$_POST[info_id]'");
        // echo $_POST['info_id']."<br>";
        // echo $_POST['cart_number']."<br>";
        // echo $_POST['customer_id']."<br>";
    }
    elseif($_POST['submit'] == 'Gcash Payment Received'){
        mysqli_query($con, "UPDATE `order_info` SET `gcash_paid`='yes' WHERE `info_id`='$_POST[info_id]'");
    }
    elseif($_POST['submit'] == 'Deliver'){
        mysqli_query($con, "UPDATE `order_info` SET `status`='delivering' WHERE `info_id`='$_POST[info_id]'");
    }
    elseif($_POST['submit'] == 'Done'){
        mysqli_query($con, "UPDATE `order_info` SET `status`='done' WHERE `info_id`='$_POST[info_id]'");
    }
    elseif($_POST['submit'] == 'Cancel'){
        mysqli_query($con, "UPDATE `order_info` SET `status`='cancelled' WHERE `info_id`='$_POST[info_id]'");
    }
    elseif($_POST['submit'] == 'Remove'){
         mysqli_query($con, "DELETE FROM `order_info` WHERE `info_id`='$_POST[info_id]'");
         mysqli_query($con, "DELETE FROM `order_table` WHERE `cart_number`='$_POST[cart_number]' AND `customer_id`='$_POST[customer_id]'");
    }
    else{

    }

    echo '<script>window.location="../admin-order-list.php"</script>';
?>