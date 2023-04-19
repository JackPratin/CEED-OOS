<?php
    function itemDisplay() {
        require("config.php");

        $products_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_category < 4");

        while($products = mysqli_fetch_array($products_qry, MYSQLI_ASSOC)){
            $id = $products['product_id'];
            echo"
            <a href='#' onclick='show(\"popup$products[product_category]\"); addDetails($id)' style=\"color:black; width:fit-content;\">
                <div class='menu-item' id='card$id'>
                    <div class='menu-details'>$products[product_name] <br><br> ₱$products[product_price]</div>

                    <div>
                    <img src='$products[product_image]' height='100%' width='75%' id='img$id'> </div> 
                    <input type='hidden' value='$products[product_category]' id='cat$id'>

                    <form method='post' action='php/addtocart.php' id='form$id'>
                        <input type='hidden' value='$id' name='id'>
                        <input type='hidden' value='' id='quantity$id' name='quantity'>
                        <input type='hidden' value='$products[product_category]' id='cat$id'>
                        <input type='hidden' value='$products[product_price]' name='price'>
                    </form>
                </div>
            </a>
            ";
        }
    }

    function cartDisplay(){
        require("config.php");

        $cart_qry = mysqli_query($con, "SELECT * FROM cart_tb WHERE employee_id = $_SESSION[employee_id]");

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

        $subtotal_qry = mysqli_query($con, "SELECT * FROM cart_tb WHERE employee_id = $_SESSION[employee_id]");

        $subtotal = 0;
        while($item = mysqli_fetch_array($subtotal_qry, MYSQLI_ASSOC)){
            $subtotal += ($item['quantity']*$item['price']);
        }

        return $subtotal;

    }

    function pendingList(){
        require("config.php");

        $qry = mysqli_query($con, "SELECT * FROM order_info WHERE status = 'pending'");
        echo"
        
            <div class='orderLists'>
        ";

        if(mysqli_num_rows($qry) == 0){
            echo "<center>No pending orders</center>";
        }
        else{
            while($order = mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                echo"
                    <div class='orderCard'>
                        Order# $order[customer_id]-$order[cart_number] <br>
                        <form method='post' action='php/orderManipulation.php'>
                            <input type='hidden' name='info_id' value='$order[info_id]'>
                            <input type='hidden' name='cart_number' value='$order[cart_number]'>
                            <input type='hidden' name='customer_id' value='$order[customer_id]'>
                            <input type='submit' name='submit' value='Invoice'>
                            <input type='submit' name='submit' value='Payment Received'>
                            <input type='submit' name='submit' value='Prepare'>
                            <input type='submit' name='submit' value='Remove'>
                        </form>
                    </div>
                ";
            }
        }
                
                
        echo"
            </div>
        ";
    }

    function preparationList(){
        require("config.php");

        $qry = mysqli_query($con, "SELECT * FROM order_info WHERE status = 'preparing'");
        echo"
        
            <div class='orderLists'>
        ";

        if(mysqli_num_rows($qry) == 0){
            echo "<center>No in-preparation orders</center>";
        }
        else{
            while($order = mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                echo"
                    <div class='orderCard'>
                        Order# $order[customer_id]-$order[cart_number] <br>
                        <form method='post' action='php/orderManipulation.php'>
                            <input type='hidden' name='info_id' value='$order[info_id]'>
                            <input type='hidden' name='cart_number' value='$order[cart_number]'>
                            <input type='hidden' name='customer_id' value='$order[customer_id]'>
                            <input type='submit' name='submit' value='Invoice'>
                            <input type='submit' name='submit' value='Deliver'>
                            <input type='submit' name='submit' value='Cancel'>
                        </form>
                    </div>
                ";
            }
        }
                
                
        echo"
            </div>
        ";
    }

    function deliveryList(){
        require("config.php");

        $qry = mysqli_query($con, "SELECT * FROM order_info WHERE status = 'delivering'");
        echo"
        
            <div class='orderLists'>
        ";

        if(mysqli_num_rows($qry) == 0){
            echo "<center>No in-delivery orders</center>";
        }
        else{
            while($order = mysqli_fetch_array($qry, MYSQLI_ASSOC)){
                echo"
                    <div class='orderCard'>
                        Order# $order[customer_id]-$order[cart_number] <br>
                        <form method='post' action='php/orderManipulation.php'>
                            <input type='hidden' name='info_id' value='$order[info_id]'>
                            <input type='hidden' name='cart_number' value='$order[cart_number]'>
                            <input type='hidden' name='customer_id' value='$order[customer_id]'>
                            <input type='submit' name='submit' value='Invoice'>
                            <input type='submit' name='submit' value='Done'>
                            <input type='submit' name='submit' value='Cancel'>
                        </form>
                    </div>
                ";
            }
        }
                
                
        echo"
            </div>
        ";
    }


?>