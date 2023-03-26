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
        <title>Admin Product</title>
    </head>
    
    <body>
        <div class="center">
            <div class="productForm">
                <form action="php/addProduct.php" method="post" id="form" enctype="multipart/form-data"><br><br>
                    <b><div id="addProd">Add new product</div></br>
                        
                            Product details <br>
                            <input type="text" name="pName" class="prodInput" placeholder="Product Name">
                            <input type="text" name="price" class="prodInput" maxlength="2" placeholder="Price">
                            <input type="text" name="qty" class="prodInput" placeholder="Quantity">

                            <div class="container">
                                <!-- the select elemnt should go into div!!!!!  -->
                                <div class="custom-select" >
                                    <select name="category" class="categoryProd" id="" name="category">
                                        <option>
                                            <?php
                                                $category_qry = mysqli_query($con, "SELECT * FROM product_categories_tb WHERE category_id != 4");
                                                while($category = mysqli_fetch_array($category_qry, MYSQLI_ASSOC)){
                                                    echo"<option value='$category[category_id]'>$category[category_name]</option>";
                                                }
                                            ?>
                                        </option>
                                    </select>   <br>
                                </div>
                            </div><br><br><br><br><br>
    
                            <b>Product Image:</b>
                            <div class="file-upload">
                                <div class="file-select">
                                   
                                    <div class="file-select-button" id="fileName">Choose File</div>
                                    <div class="file-select-name" id="noFile">No file chosen...</div> 
                                    <input type="file" name="chooseFile" id="chooseFile">
                                </div>
                            </div>


                 <br>
        
                    
                        <input type="submit" value="Add Product" class="addProdBtn" id="prodSubmit">
                   
                </form>
            </div>

            <div class="productForm1">
                <form action="php/addIngredient.php" method="post" id="form"><br><br>
                    <div id="addIngre">Add new ingredient</div> <br>
                    <div>
                        Ingredients <br>
                        <input type="text" name="fname" class="IngreInput" placeholder="Ingredient Name">
                        <input type="text" name="mi" class="IngreInput" maxlength="2" placeholder="Price">
                        <input type="text" name="lname" class="IngreInput" placeholder="Quantity">
                       
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
            
                    <input type="submit" value="Add Ingredient" id="IngreSubmit">
                </form>
            </div>
        </div>
    
      
        <script src="https://code.jquery.com/jquery-1.12.3.js" integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="js/dropdown.js"></script>
        <script src="js/upload-file.js"></script>
    </body>
</html>