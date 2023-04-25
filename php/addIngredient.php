<?php
    require("config.php");
    
    $name       = mysqli_real_escape_string($con, $_POST['name']);
    $price       = mysqli_real_escape_string($con, $_POST['price']);
    $qty       = mysqli_real_escape_string($con, $_POST['qty']);
    $type       = mysqli_real_escape_string($con, $_POST['type']);
    $ingredients;

        // insert new ingredient
    $insertqry = mysqli_query($con, "INSERT INTO `ingredients_tb`(`item_name`, `item_quantity`, `item_price`, `item_type`) VALUES ('$name ','$qty','$price','$type')");

        //getting id of newly inserted ingredient
    $qry = mysqli_query($con, "SELECT item_id as last_index FROM `ingredients_tb` ORDER BY item_id DESC LIMIT 1");

    $id_qry = mysqli_fetch_array($qry, MYSQLI_ASSOC);
    // echo $id_qry['last_index'];


        // updating category additionals
    foreach($_POST['categories'] as $category){
        $category_qry = mysqli_query($con, "SELECT category_additionals FROM `product_categories_tb` WHERE category_id = $category");

        while($additional = mysqli_fetch_array($category_qry, MYSQLI_ASSOC)){
            if($additional['category_additionals'] == ""){
                $ingredients = $id_qry['last_index'];
            }
            else{
                $ingredients = $additional['category_additionals'].', '.$id_qry['last_index'];
            }
        }
        mysqli_query($con, "UPDATE `product_categories_tb` SET `category_additionals`='$ingredients' WHERE `category_id` = $category");
    }

    echo "<script>alert('Ingredient Added.');</script>";
    echo '<script>window.location="../admin-product.php"</script>';
?>