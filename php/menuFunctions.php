<?php
    function itemDisplay() {
        require("config.php");

        $products_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_category < 4");

        while($products = mysqli_fetch_array($products_qry, MYSQLI_ASSOC)){
            $id = $products['product_id'];
            echo"
            <a href='#' onclick='show(\"popup$products[product_category]\"); addDetails($id); getImage(\"img$id\", \"$products[product_name]\", \"₱$products[product_price]\", $id, $products[product_category]);' style=\"color:black; width:fit-content;\">
                <div class='menu-item' id='card$id'>
                    <div class='menu-details'>$products[product_name] <br><br> ₱$products[product_price]</div>

                    <div>
                    <img src='$products[product_image]' height='100%' width='75%' id='img$id'> </div> 
                    <input type='hidden' value='$products[product_category]' id='cat$id'>

                    
                    <input type='hidden' value='$id' name='id'>
                    <input type='hidden' value='$id' name='id$id'>
                    <input type='hidden' value='' id='quantity$id' name='quantity'>
                    <input type='hidden' value='$products[product_category]' id='cat$id'>
                    <input type='hidden' value='$products[product_price]' name='price'>
                </div>
            </a>
            ";
        }
    }

    function landingPageDisplay(){
        require("config.php");

        $products_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_category < 4");
       

        while($products = mysqli_fetch_array($products_qry, MYSQLI_ASSOC)){
            echo"
            <div class='menu-item'> 
                <img src='$products[product_image]' height='100%' width='75%'> <br>
                $products[product_name] <br>
            </div>";
        }
    }

    function cartDisplay(){
        require("config.php");
        if(!isset($_SESSION)) 
        { 
        session_start(); 
        } 

        $cart_qry = mysqli_query($con, "SELECT * FROM cart_tb WHERE customer_id = $_SESSION[customer_id]");

        if(mysqli_num_rows($cart_qry) == 0){
            echo"<center>Cart is empty.</center>";
        }

        while($products = mysqli_fetch_array($cart_qry, MYSQLI_ASSOC)){
            $item_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_id = $products[product_id]");
            
            while($item = mysqli_fetch_array($item_qry, MYSQLI_ASSOC)){
                $subtotal = $products['quantity'] * $item['product_price'];
                echo"
                <div id='cart-items'>
                    <div id='item-img'>
                        <img src='$item[product_image]' alt='1975 Old-Fashioned Burgers logo' height='60px' width='60px' style='border-radius: 10px;'>
                    </div>&nbsp; 
                    <div id='item-details' class='bold'>
                        <span class='end-to-end'>$item[product_name] 
                        <form method='post' action='php/deleteFromCart.php'>
                            <input type='hidden' name='cart_id' value='$products[cart_id]'>
                            <button type='submit'>X</button>
                        </form>
                        </span>
                        
                        <span>";
                       

                                //if ingredient is not empty
                                if($products['extra_ingredients'] != ""){
                                    echo "Extra: <br>";

                                    //string to array
                                    $ingredients = explode(",",$products['extra_ingredients']);

                                    //loops through product names of ingredients
                                    foreach($ingredients as $ingredients){
                                        $nameqry = mysqli_query($con, "SELECT product_name FROM products_tb WHERE product_id = $ingredients");

                                        $ingredients_name = mysqli_fetch_array($nameqry, MYSQLI_ASSOC);
                                        echo $ingredients_name['product_name'].'<br>';
                                    }
                                }
                            
                        echo"</span>
                        <span class='end-to-end'> 
                            <span>
                                <span class='span-x'>x </span>
                                $products[quantity]
                            </span> 
                            <span id='item-price' class='span-x'>₱$subtotal</span>
                        </span>
                    </div>
                </div> <br>";
            }
            
        }
    }

    function subtotal(){
        require("config.php");

        $subtotal_qry = mysqli_query($con, "SELECT * FROM cart_tb WHERE customer_id = $_SESSION[customer_id]");

        $subtotal = 0;
        while($item = mysqli_fetch_array($subtotal_qry, MYSQLI_ASSOC)){
            $subtotal += ($item['quantity']*$item['price']);
        }

        return $subtotal;

    }

    function trackOrderDisplay(){
        require("config.php");
        $qry = mysqli_query($con, "SELECT * FROM order_info WHERE `customer_id` = $_SESSION[customer_id] AND `status` = 'pending' OR `status` = 'deliver'");


        if(mysqli_num_rows($qry) == 0){
            echo"<h2>No active order</h2>";
        }
        else{
            echo"
                <div class='tracking'>
                    <a href='invoice.php'>
                        <div class='order-card'>
                            Order 1#<br>
                            17 Mar 2023, 04:00PM<br>
                            1975 Classic<br>
                            <hr>
                            <span class='order-card-bottom'>x1 Items<br>₱ 105.00</span>
                        </div>
                    </a>
                    

                    <div class='order-status'>
                        <div class='inner-order-status'>
                            <div class='circle-active circle' id='placeCircle'></div>
                            <img src='css/system images/order list icons/order-placed-icon.png' alt='Icon for placed order'>
                            <div class='order-text'>
                                <div class='order-upper-text'>Order Placed</div>
                                <div class='order-lower-text'>We have received your order, please wait for a staff to accept your order.</div>
                            </div>
                        </div>

                        <div class='vertical-line'></div>

                        <div class='inner-order-status'>
                            <div class='circle' id='processCircle'></div>&nbsp;
                            <img src='css/system images/order list icons/processed-icon.png' alt='Icon for order processing'>
                            <div class='order-text'>
                                <div class='order-upper-text'>Order Accepted</div>
                                <div class='order-lower-text'>We are currently preparing your order.</div>
                            </div>
                        </div>

                        <div class='vertical-line'></div>

                        <div class='inner-order-status'>
                            <div class='circle' id='readyCircle'></div>&nbsp;
                            <img src='css/system images/order list icons/ready-icon.png' alt='Icon for ready to deliver items'>
                            <div class='order-text'>
                                <div class='order-upper-text'>Ready to Deliver</div>
                                <div class='order-lower-text'>Your order is ready to be deliverd, please wait for our rider to deliver your order.</div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        
    }


?>