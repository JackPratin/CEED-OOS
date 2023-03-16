<?php
    require("php/config.php");
    if(!isset($_SESSION['current_admin_page'])){
        $_SESSION['current_admin_page'] = "admin-stock-monitoring.php"; 
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="css/admin functions.css">
        <title>Stock Monitoring</title>
    </head>
    <body>
        <table width="100%">
            <tr>
                <th>Name of ingredient</th>
                <th>Current quantity</th>
                <th></th>
                <th colspan="2">Actions</th>
            </tr>
            <?php
                $ingredient_qry = mysqli_query($con, "SELECT * FROM `products_tb` WHERE product_category = 4");
                while($ingredients = mysqli_fetch_array($ingredient_qry, MYSQLI_ASSOC)){
                    echo"
                        <tr>
                            <td>$ingredients[product_name]</td>
                            <td>5</td>
                            <td><input type='button' value='Update' class='stock-actions'></td>
                            <td><input type='button' value='Replacement/loss' class='stock-actions'></td>
                            <td><input type='button' value='Delete' class='stock-actions'></td>
                        </tr>
                    ";
                }
            ?>
        </table>
    </body>
</html>