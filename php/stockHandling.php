<?php
    require("config.php");
    session_start();

    $submit = $_POST['submit'];
    $id = $_POST['id'];

    if($submit == 'Delete'){
        mysqli_query($con, "DELETE FROM `products_tb` WHERE `product_id`= $id");
        echo '<script>alert("Product deleted.")</script>';
        echo '<script>window.location="../admin-stock-monitoring.php"</script>';
    }
    else if($submit == 'Replacement/loss'){
        echo '<script>window.location="../admin-stock-monitoring.php"</script>';
    }
    else if($submit == 'Update'){
        echo '<script>window.location="../admin-stock-monitoring.php"</script>';
    }


    

?>