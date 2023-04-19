<?php
    require("php/config.php");
    session_start();
    if(isset($_POST['submitLoss'])){
        $subtotal = $_POST['price']*$_POST['qty'];
        $current_time = new DateTime('now',new DateTimeZone('Asia/Manila'));
        $current_date = $current_time ->format('F j Y');

        $qry = mysqli_query($con, "INSERT INTO `order_table`(`cart_number`, `employee_id`, `product_id`, `price`, `quantity`, `item_subtotal`, `order_date`) VALUES ('-1','$_SESSION[employee_id]','$_POST[id]','$_POST[price]','$_POST[qty]','$subtotal','$current_date')");

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
            <h1>Replacement/Loss</h1>
            <h3><?php echo $product['product_name']?></h3>
            <input type="text" name="qty" id="" placeholder="Quantity" >
            <input type="hidden" name="id" id="" value='<?php echo $product['product_id'] ?>' ><br><br>
            <input type="hidden" name="price" id="" value='<?php echo $product['product_price'] ?>' >
            <input type="submit" name="submitLoss" class="stock-actions" >
        </form>
    </div>

    <?php
    }
}
    ?>
</body>
</html>