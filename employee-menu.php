<?php
    require("php/employeeFunctions.php");
    session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link rel="stylesheet" href="css/navigation.css">
        <link rel="stylesheet" href="css/contents.css">
        <title>Menu</title>
    </head>
    
    <body>
        <div id="menu-div">
            <div id="main-menu">
                <div id="top-main-menu">
                    <p id="choose-category">
                        CHOOSE CATEGORY
                    </p>
                    <center>
                        <input type="search" name="" id="search" placeholder="Search category or menu...">
                    </center>
                </div> <br>
                <div id="categories">
                    <div class="category-item">All</div>
                    <div class="category-item">Burgers</div>
                    <div class="category-item">Chicken</div>
                    <div class="category-item">Sides</div>
                    <div class="category-item">Extras</div>
                </div> <br>
                <div id="menu-name">
                    Burger Menu
                </div> <br>
                <div id="item-list">
                    <?php itemDisplay(); ?>
                </div>

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
        

        <script src="js/navigation.js"></script>
        
        
    </body>
</html>