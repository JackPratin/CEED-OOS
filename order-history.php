<?php
    require("php/menuFunctions.php");
    require("php/config.php");
    session_start();
    
    require("php/userType.php");
    typeCheck('customer');


    if(!isset($_SESSION['current_page'])){
        $_SESSION['current_page'] = "menu.php"; 
    }
    else{
        $_SESSION['current_page'] = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <script src="https://kit.fontawesome.com/484fbcb614.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/navigation.css">
        <link rel="stylesheet" href="css/contents.css">
        <link rel="stylesheet" href="css/order-history.css">
        <title>Order History</title>
    </head>
    
    <body>

        <div class="orderHistory">
            <h1>Order History</h1>
            <table width="100%">
                <tr>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Payment </th>
                    <th> Date </th>
                    <th> Type </th>
                    <th> Status </th>
                    <th> Total </th>
                    <th> Action </th>
                </tr>
                
                <?php historyDisplay($_SESSION['customer_id'], 'customer_id'); ?>
                
            </table>
        </div>

        <div id="menu-div2">
        
        
                    <!-- <p id="choose-category">
                        ORDER HISTORY
                    </p> -->
                    <!-- <center>
                        <div class="input-icons">
                            <input type="search" name="" id="search" placeholder="Search...">
                            
                        </div>
                    </center> -->
            <br>
            

            
            <div id="order-list cart-div">
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
                
            </div>
        </div>
        <footer id="footer-history">
            <div>
                <center><img src="css/system images/company logo.png" alt="1975 Old-Fashioned Burgers logo" height="60px" width="60px" style="border-radius: 50%;"><br>
                Copyright© 2023 <br></center>
            </div>
            <div>
                Contact us:<br>
                +63 927 253 9416<br>
                1975oldfashionedburgers@gmail.com<br>
                #26 Ignacio Cruz St., San Roque, Marikina City.<br>
            </div>
            <div>
                <a></a><br>
                <a></a><br>
                <center>
                    <a href='Terms-and-conditions.html'>
                        Terms and Conditions
                    </a>
                </center>
                <br>
            </div>
            
            <div>
                <center>
                    For news and updates, follow us:<br> <br> 
                    <div id="socials">
                        <a href="https://www.facebook.com/1975OldFashionedBurgers" target="_top"><img src='css/system images/fb.png'></a>
                        <a href="https://www.instagram.com/1975_oldfashionedburgers/" target="_top"><img src='css/system images/ig.png'></a>
                    </div>
                </center>
            </div>
        </footer>
        
        <script>
            // document.addEventListener('DOMContentLoaded', function(){
            
            
            // });

            function showActions(id){

                var triggerPopup = document.querySelector('#hicon-popup'+id);
                var popup = document.querySelector('#hpopup'+id);
                // var popupBg = document.querySelector('#popup-bg'+id);
                var popupBg = document.querySelector('.hpopup-bg');
                // var close = document.querySelector('#close'+id);

                // console.log(triggerPopup);
                // console.log(popup);
                // console.log(popupBg);
                // console.log(close);
                
                triggerPopup.addEventListener('click', function(){
                    show(popup);
                });
                
                popupBg.addEventListener('click', function(){
                    hide(popup);
                    });
                
                // close.addEventListener('click', function(){
                //     hide(popup);
                //     });
            }

            function show(el){
            el.style.display = 'block';
            }

            function hide(el){
            el.style.display = 'none';
            }

            function sub(cart){
                document.getElementById('form'+cart).submit();
            }

            function orderAgain(cart){
                document.getElementById('orderForm'+cart).submit();
            }
        </script>
        <script src="js/navigation.js"></script>
        

    </body>
</html>