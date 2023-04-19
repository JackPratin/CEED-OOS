<?php
    require("php/config.php");
    session_start();
    if(!isset($_SESSION['current_admin_page'])){
        $_SESSION['current_admin_page'] = "admin-stock-monitoring.php"; 
    }
    else{
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
        <script src="https://kit.fontawesome.com/484fbcb614.js" crossorigin="anonymous"></script>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link rel="stylesheet" href="css/admin functions.css">
        <title>Stock Monitoring</title>
    </head>

    <body>
        <div class="orderHistory">
            <h1>Stock Monitoring</h1>
            <table width="100%">
                <tr>
                    <th>Name of ingredient</th>
                    <th>Current quantity</th>
                    <th colspan="3">Actions</th>
                </tr>
                <?php
                    $ingredient_qry = mysqli_query($con, "SELECT * FROM `products_tb` WHERE product_category = 4");
                    while($ingredients = mysqli_fetch_array($ingredient_qry, MYSQLI_ASSOC)){
                        echo"
                            <form method='post' action='php/stockHandling.php'>
                                <tr>
                                    <td>$ingredients[product_name]</td>
                                    <td>$ingredients[product_quantity]</td>
                                    <td><input type='submit' name='submit' value='Update' class='stock-actions'></td>
                                    <td><input type='submit' name='submit' value='Replacement/loss' class='stock-actions'></td>
                                    <td><input type='submit' name='submit' value='Delete' class='stock-actions' onclick='confirm(\"Are you sure you want to delete $ingredients[product_name] from the stock list?\")'></td>
                                </tr>
                                <input type='hidden' name='id' value='$ingredients[product_id]'>
                            </form>
                        ";
                    }
                ?>
            </table>


            <div id="popup">
                <div id="popup-bg"></div>
                <div id="popup-fg">
                    <div class="actions">
                        <button id="close">X</button>
                        <b><p class="header">Update product details</p></b>
                        <input type="text" name="fname" class="updateInput" placeholder="Name" required>
                        <p class="Qty">Quantity</p>
                        <div class="number-input">
                            <div id='counter'>
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>

                                <input class="quantity" id="currentQty" min="1" name="quantity" value="0" type="number">

                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button> 
                            </div>
                        </div>    
    
                        <div width="100%">     
                                <input type="submit" value="Submit" class="updateBtn" onclick='addToCart()'>
                                <?php
                                    echo"</form>";
                                ?>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
        <script src="js/admin-function.js"></script>
    </body>
</html>