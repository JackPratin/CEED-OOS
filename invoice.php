<?php
require("php/config.php");
require("php/menuFunctions.php");
    session_start();
    // $qry = mysqli_query($con, "SELECT * FROM order_info WHERE customer_id = $_SESSION[invoice_id] AND cart_number = $_SESSION[invoice_cart]");

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>

    <link rel="stylesheet" href="css/receipt.css">
    <link rel="stylesheet" href="css/navigation.css">
    <title>Receipt</title>
</head>

<body>

<div class='upper-buttons'>
    <span>&nbsp;&nbsp;<a class="go-back2" href="order-list.php">Go Back</a></span>
    <span><input type="button" class='print' onclick="window.print();" value="Print" /></span>
</div>

    <div class="receipt">

        <h2 class="name"> 1975 Old Fashioned Burgers </h2>

        <p class="greeting"> #26 Ignacio Cruz St., San Roque, Marikina City. </p>
        <p class="greeting"> 09487177577 </p>
        <h1 class="name1"> Receipt </h1>
        <!-- Order info -->
        

            <?php
                invoiceInfo();
            ?>

        
        <hr>
        <!-- Details -->
        <div class="details">

            <div class="product">
                
            <?php
                invoiceItems();
            ?>


            </div>

        </div>
        <hr>
        <!-- Sub and total price -->
        <div class="totalprice">

            <b><p class="sub"> Subtotal <span> ₱<?php invoiceSubtotal(); ?></span></p></b>

            <p class="del"> Cash <b><span> ₱ </span></b> </p>

            <p class="tot"> Change <b><span> ₱</span></b> </p>

        </div>
        <br><br>
        <!-- Footer -->
        <p class="thanks"> Thank you!
            <3</p>

    </div>

    <script src="js/navigation.js"></script>

    <script>
        // document.getElementById("menu-selected").style.display = "flex";
        // document.getElementById("menu-unselected").style.display = "none";
    </script>



</body>

</html>