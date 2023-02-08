<?php
    function itemDisplay() {
        require("config.php");

        $products_qry = mysqli_query($con, "SELECT * FROM products_tb");

        while($products = mysqli_fetch_array($products_qry, MYSQLI_ASSOC)){
            echo"<div class='menu-item'>$products[product_name]</div>";
        }
    }

?>