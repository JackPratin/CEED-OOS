<?php
    require("php/config.php");
    if(!isset($_SESSION['current_admin_page'])){
        $_SESSION['current_admin_page'] = "admin-stock-monitoring.php"; 
    }
    else{
        $_SESSION['current_admin_page'] = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/contents.css">
        <link rel="stylesheet" href="css/admin functions.css">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <title>Sales Report</title>
    </head>
    <body>
        <h1>Sales Report</h1>
        <div id='top-report'>
            <div id='mostOrder'>
                Most Ordered Item
            </div>
            <div id='mostLocation'>
                Location with most orders
            </div>
        </div>

        <br>

        <div id='select'>
            <select id='salesSelect'>
                <option class='salesOption'>Weekly</option>
                <option class='salesOption'>Monthly</option>
                <option class='salesOption'>Quarterly</option>
            </select>
        </div>

        <table width="75%";>
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