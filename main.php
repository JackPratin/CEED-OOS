<?php
    require("php/config.php");
    session_start();
    if(!isset($_SESSION['current_page'])){
        $_SESSION['current_page'] = "menu.php"; 
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        
        <link rel="stylesheet" href="css/contents.css">
        <link rel="stylesheet" href="css/navigation.css">
        <title>Menu</title>
    </head>

    <body>
        <div id="main-div">
            <div class="navigation-div">
                <img src="css/system images/company logo.png" alt="1975 Old-Fashioned Burgers logo" class="side-logo">
                
                <a href="menu.php" target="main-frame" onclick="changeDisplay('menu.php')">
                    <div class="nav-item">
                        <div class="unselected" id="menu-unselected">
                            <img class="nav-vector" src="css/system images/nav icons/menu.png" alt="Menu Vector">
                        </div>
                        <div class="selected" id="menu-selected">
                            <img class="nav-vector" src="css/system images/nav icons/menu-selected.png" alt="Menu Vector">
                        </div> <br>
                        Menu
                    </div>
                </a>

                <a href="order-list.php" target="main-frame" onclick="changeDisplay('order-list.php')">
                    <div class="nav-item">
                        <div class="unselected" id="order-list-unselected">
                            <img class="nav-vector" src="css/system images/nav icons/order-list.png" alt="List Vector">
                        </div>
                        <div class="selected" id="order-list-selected">
                            <img class="nav-vector" src="css/system images/nav icons/order-list-selected.png" alt="List Vector">
                        </div> <br>
                       Order List
                    </div>
                </a>

                <a href="order-history.php" target="main-frame" onclick="changeDisplay('order-history.php')">
                    <div class="nav-item">
                        <div class="unselected" id="history-unselected">
                            <img class="nav-vector-history" src="css/system images/nav icons/history.png" alt="History Vector"> 
                        </div>
                        <div class="selected" id="history-selected">
                            <img class="nav-vector-history" src="css/system images/nav icons/history-selected.png" alt="History Vector"> 
                        </div> <br>
                        <center>Order History</center>
                    </div>
                </a>

                <!-- <div class="nav-item"> -->
                    <br>
                    <br>
                <!-- </div> -->

                <a href="php/logout.php">
                    <div class="nav-item">
                        <img class="nav-vector"  src="css/system images/nav icons/logout.png"  alt="tabler:logout"> <br>
                        Logout
                    </div>
                </a>
            </div>

            <div class="iframe-div">
                <iframe src="<?php echo $_SESSION['current_page']; ?>" frameBorder="0" id="main-frame" name="main-frame" onload="source_locator()">
                </iframe>
                <input type="hidden" id="iframe-source" name="" value="<?php echo $_SESSION['current_page']; ?>">
            </div>
        </div>

        <script src="js/navigation.js"></script>

        <script>
            
            // document.getElementById("menu-selected").style.display = "flex";
            // document.getElementById("menu-unselected").style.display = "none";
        </script>

        
        
    </body>
</html>