<?php
    require("php/config.php");
    require("php/adminFunctions.php");
?>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
            <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
            
            <link rel="stylesheet" href="css/order-list.css">
            <title>Order List</title>
    </head>
    <body>
        <table>
            <tr>
                <th class='tableName'><h1>ORDERS</h1></th>
            </tr>
            <tr>
                <th>PENDING</th>
                <th>IN PREPARATION</th>
                <th>IN DELIVERY</th>
            </tr>    
            <tr>
                <td >
                    <?php pendingList(); ?>
                </td>
                <td>
                    <div class='orderLists'>
                        <div class='orderCard'>
                            helooo <br>
                            <input type="submit" value="Invoice">
                            <input type="submit" value="Deliver">
                            <input type="submit" value="Cancel">
                        </div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                    </div>
                </td>
                <td >
                    <div class='orderLists'>
                        <div class='orderCard'>
                            helooo<br>
                            <input type="submit" value="Invoice">
                            <input type="submit" value="Done">
                            <input type="submit" value="Cancel">
                        </div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                        <div class='orderCard'>helooo</div>
                    </div>
                </td>
            </tr>

        </table>
    </body>
</html>
