<?php
 require("php/menuFunctions.php");
 require("php/config.php");
    session_start();
    
    require("php/userType.php");
    typeCheck('customer');

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
    // $currentDate = new DateTime('now',new DateTimeZone('Asia/Manila'));
    date_default_timezone_set('Asia/Manila');
    $currentDate = date("Y-m-d");
    $currentDay = date('w');
    if($currentDay == 1){
        $min = "13:30";
        $max = "20:30";
    }
    else{
        $min = "12:00";
        $max = "23:30";
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/contents.css">
    <link rel="stylesheet" type="text/css" href="css/checkout-page.css">
    <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
    <title>Checkout</title>
</head>
<body>
    <div id="menu-div">
        <div class="checkoutForm">
            <?php
                if($deliveryMode == "deliver"){
                    echo"<div><h2 style='margin-right: 20%;'>Delivery Details</h2></div>
                        <br>
                        <div>
                            <b>Delivery Date and Time:</b>
                            <br>

                            <input class='date' type='date' id='date' form='submitOrder' name='date' min='$currentDate'> &nbsp;
                            <input class='time' type='time' id='time'  form='submitOrder' name='time' min='$min' max='$max'>
                        </div><br>

                        <div width='100%'>
                        <b>Delivery Address:</b><br>
                            <input type='text' class='address' placeholder='Address' form='submitOrder' name='address' value='$_SESSION[address]'>
                            <input type='text' class='address' id='baranggay' placeholder='Baranggay' form='submitOrder' name='baranggay' value='$_SESSION[baranggay]'
                            <input type='text' class='address' id='city' placeholder='City' form='submitOrder' name='city' value=' $_SESSION[city]'>
                        </div><br>
                        <div id='map'></div>
                        <div id='location'></div>
                        <br>

                        <b>Note to rider: (ex. Remarks, Landmarks, etc.)</b>
                        <input type='text' id='note' form='submitOrder' name='note'>
                    ";
                    
                }
                else if($deliveryMode == "pickup"){
                    echo"<div><h2>Pick-up Details</h2></div>
                        <br>
                        <div>
                            <b>Pick-up Date and Time:</b><br>
                            <input class='date' type='date' id='date' form='submitOrder' name='date' min='$currentDate'> &nbsp;
                            <input class='time' type='time' id='time'  form='submitOrder' name='time' min='$min' max='$max'>
                        </div><br>
                    ";
                    
                }
            ?>
            
            <div style="width:100%">
                <b>Payment method:<br></b>
                    <button class="cash" id='paycash'  onclick="closeGcash()"><img src="css/system images/cash.png" alt=""></button>
                    <!-- <br><br> -->
                    <button class="cash" id='paygcash' onclick="openGcash()" id="icon-popup"><img src="css/system images/gcash.png" alt=""></button><br>
                    <img src="css/system images/scan to pay.png" class="toPay" alt="" id='gcash'>
            </div><br><br><br><br>

            <!-- <div id="popup">
                <div id="popup-bg"></div>

                <div id="popup-fg">
                    <div class="actions">
                        <button id="cash">QR Code</button>
                        <div class="uploadFile">
                            <p>Upload File</p><br><br><br>
                            <input type="file"  accept=".jpg, .png, .jpeg" name="gcashProof" id="gcashUpload" form="submitOrder">
                    
                        </div>
                    </div>
                </div>
            </div> -->

            <div>
                <div>
                    <h2>Personal Details</h2><br>
                    <b>Email:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="email" class="emailInput" form="submitOrder" name="email" value='<?php echo $_SESSION['email']?>'><br>
                    <div >
                        <span><b>First Name:&nbsp;</b></span>
                        <input type="text" form="submitOrder" name="fname" value='<?php echo $_SESSION['first_name']?>'>
                    
                    </div>

                    <div >
                        <span><b>Last Name:&nbsp;</b></span>
                        <input type="text" form="submitOrder" name="lname" value='<?php echo $_SESSION['last_name']?>'>
                    </div>
                </div>
            </div>

            <div>
                <b>Contact Num:</b>
                <input type="text" form="submitOrder"  name="number" value="<?php echo $_SESSION['contact_number']?>"><br>
                <input type="hidden" name="subtotal" form="submitOrder" value="<?php echo $subtotal; ?>">
                <input type="hidden" name="deliveryMode" form="submitOrder" value="<?php echo $deliveryMode; ?>">
                <input type="hidden" name="modeOfPayment" id="modeOfPayment" form="submitOrder" value="">
            </div>
            <br>
            <br>
            <center><a href="">Cancellation policy and Terms of use</a></center>
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
                    <span class="end-to-end"><span>Delivery Fee</span><span id='delFee'>₱0.00</span></span><br>
                    <hr id="cart-hr">
                    <span class="end-to-end bold"><span>Total</span><span id='subtotal'>₱<?php echo $subtotal; ?></span></span>
                    <input type='hidden' id='subtotalValue' value='<?php echo $subtotal; ?>'>
                    <input type='hidden' id='deliveryFee' value=''>
                    <input type='hidden' id='total' value=''>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script src="js/geolocation.js"></script>
    <script>
            document.addEventListener('DOMContentLoaded', function(){
            var triggerPopup = document.querySelector('#icon-popup');
            var popup = document.querySelector('#popup');
            var popupBg = document.querySelector('#popup-bg');
            var close = document.querySelector('#close');
            
            triggerPopup.addEventListener('click', function(){
                show(popup);
            });
            
            popupBg.addEventListener('click', function(){
                hide(popup);
                });
            
            close.addEventListener('click', function(){
                hide(popup);
                });
            
            });

            function show(el){
            el.style.display = 'block';
            }

            function hide(el){
            el.style.display = 'none';
            }
        </script>
    <script>
        function openGcash(){
            document.getElementById("gcash").style.display = "flex";
            document.getElementById("modeOfPayment").value = "gcash";
            let paycash = document.getElementById('paygcash');
            paycash.style.backgroundColor = '#FFAE42';
            document.getElementById('paycash').style.backgroundColor = 'white'

        }
        function closeGcash(){
            document.getElementById("gcash").style.display = "none";
            document.getElementById("modeOfPayment").value = "cash";
            let paycash = document.getElementById('paycash');
            paycash.style.backgroundColor = '#FFAE42';
            document.getElementById('paygcash').style.backgroundColor = 'white';
        }

        // function deliveryFee(){
        //     const cities = [];
        //     const baranggays = [];
        //     const prices = [];
        //     let brgyObj = document.getElementById('baranggay');
        //     let cityObj = document.getElementById('city');

        //     if(){

        //     }
        // }
    </script>
    <!-- <script language="javascript">
        $(document).ready(function () {
            $("#date").datepicker({
                minDate: 0
            });
        });
</script> -->
    
</body>
</html>