<?php
 require("php/menuFunctions.php");
 require("php/config.php");
    session_start();
    if(!isset($_POST['deliveryMode'])){
        echo "
        <script>
            alert('Select if pick up or for delivery.');
            window.location='menu.php';
        </script>
        ";
    }
    $subtotal = mysqli_real_escape_string($con, $_POST['subtotal']);
    $deliveryMode = mysqli_real_escape_string($con, $_POST['deliveryMode']);
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
                <input class="date" type="date" form="submitOrder" name="date"> &nbsp;
                <input class="time" type="time" form="submitOrder" name="time">
            </div><br>
            

            Delivery Address:<br>
            <div style="display: flex;justify-content: space-between; height:5%">
                <input type="text" placeholder="Address" form="submitOrder" name="address">
                <input type="text" placeholder="Baranggay" form="submitOrder" name="baranggay">
            </div>
                <input type="text" placeholder="City" form="submitOrder" name="city"><br>
            
            Note to rider: (ex. remarks, landmarks)<br>
            <input type="text" form="submitOrder" name="note"><br>
            
            <div>
                <div>
                    Payment method:<br>
                    <button onclick="closeGcash()"><img src="css/system images/cash.png" alt=""></button>
                    <button onclick="openGcash()"><img src="css/system images/gcash.png" alt=""></button>
                </div><br>

                <div id="gcash">
                    <input type="file"  accept=".jpg, .png, .jpeg" name="gcashProof" id="" form="submitOrder">
                    <img src="css/system images/scan to pay.png" alt="">
                </div>
            </div>
            
            <h2>Personal Detail</h2>
            Email:
            <input type="text" style="width: 100%" form="submitOrder" name="email"><br>
            <div style= "display: flex; justify-content: space-between;">
                <div style="display: flex; flex-direction: column; width:90%">
                    <span>First Name:</span>
                </div>

                <div style="display: flex;flex-direction: column; width:90%">
                    <span>Last Name:</span>  
                </div>
            </div>
            <div style= "display: flex; justify-content: space-between; height:5%">
                <input type="text" style="width: 96%;" form="submitOrder" name="fname">
                <input type="text" style="width: 96%" form="submitOrder" name="lname">
            </div><br>
            
            Contact Num.
            <input type="text" form="submitOrder"  name="number"><br>
            <input type="hidden" name="subtotal" form="submitOrder" value="<?php echo $subtotal; ?>">
            <input type="hidden" name="deliveryMode" form="submitOrder" value="<?php echo $deliveryMode; ?>">
            <input type="hidden" name="modeOfPayment" id="modeOfPayment" form="submitOrder" value="">
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
                <div id="buttons">
                    <div id="upper-button">
                        <button class="<?php echo ($deliveryMode == 'pickup') ? 'clicked button' : 'upper button'?>" id="pickupbtn" onclick="deliveryMode('pickup')">Pick-up</button>&nbsp;
                        <button class="<?php echo ($deliveryMode == 'deliver') ? 'clicked button' : 'upper button'?>" id="deliverbtn" onclick="deliveryMode('deliver')"><img src="css/system images/menu icons/delivery.png" alt="Picture of motorcycle" height="60%" width="60%"></button> 
                    </div>
                    <div id="lower-button">
                        <button class="button" id="submit" form="submitOrder">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="php/submitOrder.php" method="post" id="submitOrder"></form>

    <script>
        function openGcash(){
            document.getElementById("gcash").style.display = "flex";
            document.getElementById("modeOfPayment").value = "gcash"
        }
        function closeGcash(){
            document.getElementById("gcash").style.display = "none";
            document.getElementById("modeOfPayment").value = "cash"
        }
    </script>
    
</body>
</html>