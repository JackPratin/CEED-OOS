<?php
    require("config.php");
    require("imageUpload.php");

    $pName              = mysqli_real_escape_string($con, $_POST['pName']);
    $price              = mysqli_real_escape_string($con, $_POST['price']);
    // $qty                = mysqli_real_escape_string($con, $_POST['qty']);
    $category           = mysqli_real_escape_string($con, $_POST['category']);
    $additionals;
    $ingredients;


    // mysqli_query($con, "INSERT INTO `products_tb`(`product_name`, `product_category`, `product_price`, `product_ingredients`, `product_image`) VALUES ('$pName','$category','$price','[value-4]','[value-5]')");

    if(isset($_POST['item'])){
        foreach($_POST['item'] as $extras){
            $ingqry = mysqli_query($con, "SELECT * FROM ingredients_tb WHERE item_id = $extras");
            $ingprice = mysqli_fetch_array($ingqry, MYSQLI_ASSOC);
            if($_POST['extras'][0] == $extras){
                $ingredients = $extras;
            }
            else{
                $ingredients = $ingredients.', '.$extras;
            }
        }
        $additionals = 'yes';
   }
   else{
        $additionals = 'no';
   }

    if(($imageName = upload($pName)) != false){
        
        mysqli_query($con, "INSERT INTO `products_tb`(`product_name`, `product_category`, `product_price`, `product_image`, `product_additionals`, `has_additionals`) VALUES ('$pName','$category','$price', '$imageName', '$ingredients', '$additionals')");

        echo '<script>alert("Product added.");</script>';
        echo '<script>window.location="../admin-product.php"</script>';
    }
    else{
        echo '<script>alert("No image found.");</script>';
        echo '<script>window.history.go(-1)</script>';
    }

    

?>