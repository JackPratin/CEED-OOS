<?php
    require("config.php");
    session_start();

    $submit = $_POST['submit'];
    $id = $_POST['id'];

    if($submit == 'Delete'){
        mysqli_query($con, "DELETE FROM `products_tb` WHERE `product_id`= $id");
        echo '<script>alert("Product deleted.")</script>';
        echo '<script>window.location="../admin-product.php"</script>';
    }
    // else if($submit == 'Hide'){
    //     echo"<form method='post' id='hide' action='../admin-loss-recording.php'>
    //     <input type='hidden' name='id' value='$_POST[id]'>
    //     </form>";
    //     // echo '<script>alert("Product marked a loss.")</script>';
    //     echo '<script>document.getElementById("loss").submit();</script>';
    // }
    else if($submit == 'Update'){
        echo"<form method='post' id='update' action='../admin-product-update.php'>
        <input type='hidden' name='id' value='$_POST[id]'>
        </form>";

        // echo$_POST['id'];
        echo '<script>document.getElementById("update").submit();</script>';
    }
    else if($submit == 'Delete Category'){
        mysqli_query($con, "DELETE FROM `product_categories_tb` WHERE `category_id`= $id");
        echo '<script>alert("Category deleted.")</script>';
        echo '<script>window.location="../admin-product.php"</script>';
    }


    

?>