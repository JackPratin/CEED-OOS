<?php
    require("php/config.php");
    session_start();
    if(isset($_POST['submitUpdate'])){
        

        $qry = mysqli_query($con, "UPDATE `products_tb` SET `product_name`='$_POST[name]',`product_category`='$_POST[category]',`product_price`='$_POST[price]',`product_quantity`='$_POST[qty]' WHERE `product_id` = $_POST[id]");

        echo"<script>location.replace('admin-stock-monitoring.php')</script>";
    }
    else{

    
    $id = $_POST['id'];
    $qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_id = $id");
    
    while($product = mysqli_fetch_array($qry, MYSQLI_ASSOC)){

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link rel="stylesheet" href="css/admin functions.css">
    <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
    <title>Replacement/Loss Record</title>
</head>
<body>
    <div style='border: 1px solid black; width: fit-content; padding:10px;'>
        <form action="#" method='post'>
            <h1>Ingredient update</h1>
            <h3><?php echo $product['product_name']?></h3>
            <input type="hidden" name="id" id="" value='<?php echo $product['product_id'] ?>' ><br>
            Name
            <input type="text" name="name" id="" value='<?php echo $product['product_name'] ?>' ><br>

            
            Category
            <select name='category' value='<?php echo $product['product_category'] ?>'>
            <?php
                 $qry1 = mysqli_query($con, "SELECT * FROM product_categories_tb");
    
                 while($cat = mysqli_fetch_array($qry1, MYSQLI_ASSOC)){
                    if($cat['category_id'] == $product['product_category']){
                        echo"<option value='$cat[category_id]' selected>$cat[category_name]</option>";
                    }
                    else{
                        echo"<option value='$cat[category_id]'>$cat[category_name]</option>";
                    }
                 }
            ?>
            </select><br>
            Price
            <input type="text" name="price" id="" value='<?php echo $product['product_price'] ?>' ><br>
            Quantity
            <input type="text" name="qty" id="" value='<?php echo $product['product_quantity'] ?>' placeholder="Quantity" ><br>
            
            
            <input type="submit" name="submitUpdate" class="stock-actions" >
        </form>
    </div>

    <?php
    }
}
    ?>
</body>
</html>