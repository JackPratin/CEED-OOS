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
                <th>Date</th>
                <th>Total No. of items</th>
                <th>No.of locations</th>
                <th>No. of orders</th>
                <th>Total Sales</th>
                <th>Dine in</th>
                <th>Delivery</th>
                <th>Pick Up</th>
                <th>COD</th>
                <th>GCash</th>
                <th>Guest Account</th>
                <th>Social Account</th>
                <th>Personal Account</th>
            </tr>
            <?php
                // $ingredient_qry = mysqli_query($con, "SELECT * FROM `products_tb` WHERE product_category = 4");
                // while($ingredients = mysqli_fetch_array($ingredient_qry, MYSQLI_ASSOC)){
                    echo"
                        <tr>
                            <td>11-13-22</td>
                            <td>300</td>
                            <td>6</td>
                            <td>6</td>
                            <td>20</td>
                            <td>12</td>
                            <td>15</td>
                            <td>4</td>
                            <td>10</td>
                            <td>2</td>
                            <td>8</td>
                            <td>3</td>
                            <td>9</td>
                        </tr>
                    ";
                // }
            ?>
        </table>
    </body>
</html>