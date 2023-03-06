<?php
 require("php/menuFunctions.php");
 require("php/config.php");
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/contents.css">
    <link rel="stylesheet" type="text/css" href="css/checkout-page.css">
    <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
    <title>Checkout</title>
</head>
<body>
    <div id="menu-div">
        <div class="checkoutForm">
            <h2>Delivery Details</h2>
            <br>
            Delivery Time:
            <br>
            <div style="display: flex;justify-content: space-between; height:5%;">
                <input type="date"> &nbsp;
                <input type="time">
            </div><br>
            

            Delivery Address:<br>
            <div style="display: flex;justify-content: space-between; height:5%">
                <input type="text" placeholder="Address">
                <input type="text" placeholder="Baranggay">
            </div>
                <input type="text" placeholder="City"><br>
            
            

            Note to rider: (ex. remarks, landmarks)<br>
            <input type="text"><br>
            
            <div>
                <div>
                    Payment method:<br>
                    <button onclick="closeGcash()"><img src="css/system images/cash.png" alt=""></button>
                    <button onclick="openGcash()"><img src="css/system images/gcash.png" alt=""></button>
                </div><br>

                <div id="gcash">
                    <input type="file"  accept=".jpg, .png, .jpeg" name="" id="">
                    <img src="css/system images/scan to pay.png" alt="">
                </div>
            </div>
            
            <h2>Personal Detail</h2>
            Email:
            <input type="text" style="width: 100%"><br>
            <div style= "display: flex; justify-content: space-between;">
                <div style="display: flex; flex-direction: column; width:90%">
                    <span>First Name:</span>
                </div>

                <div style="display: flex;flex-direction: column; width:90%">
                    <span>Last Name:</span>  
                </div>
            </div>
            <div style= "display: flex; justify-content: space-between; height:5%">
                <input type="text" style="width: 96%;">
                <input type="text" style="width: 96%">
            </div><br>
            
            Contact Num.
            <input type="text"><br>
        </div>

        <div id="cart-div">
            <div id="customer-card">
                <div id="customer-img">
                    <img src="css/system images/company logo.png" alt="1975 Old-Fashioned Burgers logo" height="60px" width="60px" style="border-radius: 10px;">
                </div>&nbsp; 
                <div id="customer-name" class="bold">
                    <span style="color: white;">Hello!</span>
                    <span><?php echo $_SESSION['first_name']; ?></span>
                </div>
            </div>
            
            <br>
            <br>
            <br><br>
            <br>
            <br><br>
            
            <div id="cart-middle">
                <span class="bold" style="font-size: 20px;">Your Cart</span><br>
                <div id="cart-items-div">
                    <?php
                        cartDisplay();
                    ?>
                </div>

                <div id="fees-div">
                    <span class="end-to-end"><span class="bold">Subtotal</span><span>₱<?php $subtotal = subtotal(); echo $subtotal;?></span></span><br>
                    <span class="end-to-end"><span>Delivery Fee</span><span>₱0.00</span></span><br>
                    <hr id="cart-hr">
                    <span class="end-to-end bold"><span>Total</span><span>₱<?php echo $subtotal; ?></span></span>
                </div> 
            </div>

            <br>

            <div id="cart-bottom">
                Select Pick-up/Deliver: <br><br>
                <div id="buttons">
                    <div id="upper-button">
                        <button class="upper button">Pick-up</button>&nbsp;
                        <button class="upper button"><img src="css/system images/menu icons/delivery.png" alt="Picture of motorcycle" height="60%" width="60%"></button> 
                    </div>
                    <div id="lower-button">
                        <button class="button" id="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openGcash(){
            document.getElementById("gcash").style.display = "flex";
        }
        function closeGcash(){
            document.getElementById("gcash").style.display = "none";
        }
    </script>
    
</body>
</html>