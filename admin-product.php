<?php
    require("php/config.php");
    if(!isset($_SESSION['current_admin_page'])){
        $_SESSION['current_admin_page'] = "admin-stock-monitoring.php"; 
    }
    else{
        $_SESSION['current_admin_page'] = "admin-product.php";
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/484fbcb614.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link rel="stylesheet" href="css/admin functions.css">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <title>Login Page</title>
    </head>
    
    <body>
        <div class="center">
            <div class="productForm">
                <form action="php/addProduct.php" method="post" id="form" enctype="multipart/form-data"><br><br>
                    <div id="signUp">Add new product</div> <br>
                    <div>
                        User details <br>
                        <input type="text" name="pName" class="regInput" placeholder="Product Name">
                        <input type="text" name="price" class="regInput" maxlength="2" placeholder="Price">
                        <input type="text" name="qty" class="regInput" placeholder="Quantity">
                        <select name="category" id="" name="category">
                            <?php
                                $category_qry = mysqli_query($con, "SELECT * FROM product_categories_tb WHERE category_id != 4");
                                while($category = mysqli_fetch_array($category_qry, MYSQLI_ASSOC)){
                                    echo"<option value='$category[category_id]'>$category[category_name]</option>";
                                }
                            ?>
                        </select> <br>
                        Product Image:
                        <input type="file" name="image" id="">
                    </div> <br>
            
                    <input type="submit" value="Add Product" id="regSubmit">
                </form>
            </div>

            <div class="productForm">
                <form action="php/customerRegistration.php" method="post" id="form"><br><br>
                    <div id="signUp">Add new ingredient</div> <br>
                    <div>
                        User details <br>
                        <input type="text" name="fname" class="regInput" placeholder="Ingredient Name">
                        <input type="text" name="mi" class="regInput" maxlength="2" placeholder="Price">
                        <input type="text" name="lname" class="regInput" placeholder="Last Name">
                       
                    </div> <br>
<!--             
                    <div>
                        Login & Contact Details <br>
                        <input type="text" name="email" class="regInput" placeholder="Email"> 
                        <input type="text" name="contact" class="regInput" placeholder="Contact Number"> <br>
                        <input type="text" name="username" class="regInput" placeholder="Username">
                        <input type="password" name="password" class="regInput" placeholder="Password"> 
                        <input type="password" name="conPassword" class="regInput" placeholder="Confirm Password">
                    </div> <br>
            
                    <div>
                        Address Details <br>
                        <input type="text" name="address" class="regInput" placeholder="Compound/Street/Subdivision"> 
                        <input type="text" name="brgy" class="regInput" placeholder="Barangay">
                        <input type="text" name="city" class="regInput" placeholder="City">
                    </div> <br> -->
            
                    <input type="submit" value="Add Ingredient" id="regSubmit">
                </form>
            </div>
        </div>
    
    </body>
</html>