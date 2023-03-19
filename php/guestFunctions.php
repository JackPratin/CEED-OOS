<?php
     function itemDisplay() {
        require("config.php");

        $products_qry = mysqli_query($con, "SELECT * FROM products_tb WHERE product_category < 4");

        while($products = mysqli_fetch_array($products_qry, MYSQLI_ASSOC)){
            echo"
            <a href='#' onclick='show(\"popup$products[product_category]\"); addDetails($products[product_id])' style=\"color:black; width:fit-content;\">
                <div class='menu-item' id='card$products[product_id]'>
                    <div class='menu-details'>$products[product_name] <br><br> ₱$products[product_price]</div>

                    <div>
                    <img src='$products[product_image]' height='100%' width='75%'> </div> 
                    <input type='hidden' value='$products[product_category]' id='cat$products[product_id]'>

                    <form method='post' action='php/addtocart.php' id='form$products[product_id]'>
                        <input type='hidden' value='$products[product_id]' name='id'>
                        <input type='hidden' value='' id='quantity$products[product_id]' name='quantity'>
                        <input type='hidden' value='$products[product_category]' id='cat$products[product_id]'>
                        <input type='hidden' value='$products[product_price]' name='price'>
                    </form>
                </div>
            </a>
            ";
        }
    }

    function cartDisplay(){
        require("config.php");

        $cart_qry = mysqli_query($con, "SELECT * FROM cart_tb WHERE guest_id = $_SESSION[guest_id]");

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

        $subtotal_qry = mysqli_query($con, "SELECT * FROM cart_tb WHERE guest_id = $_SESSION[guest_id]");

        $subtotal = 0;
        while($item = mysqli_fetch_array($subtotal_qry, MYSQLI_ASSOC)){
            $subtotal += ($item['quantity']*$item['price']);
        }

        return $subtotal;

    }
?>