<?php
    require("php/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/contents.css">
    <link rel="stylesheet" href="css/admin functions.css">
    <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <title>Admin Functions</title>
    
</head>
<body>

<ul>
  <li><a href="admin-stock-monitoring.php" onclick="changeIframe('stockMonitoring')" id="stockMonitoring" target="adminIframe">Stock Monitoring</a></li>
  <li><a href="admin-product.php" onclick="changeIframe('addProduct')" id="addProduct" target="adminIframe">Add a product</a></li>
  <li><a href="upload-ad.php" onclick="changeIframe('uploadAd')" id="uploadAd" target="adminIframe">Upload ad banner</a></li>
  <li><a href="admin-sales-report.php" onclick="changeIframe('salesReport')" id="salesReport" target="adminIframe">Sales Report</a></li>
  <li><a href="admin-add-user.php" onclick="changeIframe('addAccount')" id="addAccount" target="adminIframe">Add an account</a></li>
</ul>

<div class="admin-iframe-div">
    <iframe src="admin-add-user.php" frameborder="0" id="adminIframe"  name="adminIframe" class="admin-iframe"></iframe>
</div>

<script src="js/admin-function.js"></script>

<script>

function changeIframe(option){
    if(option == "stockMonitoring"){
        document.getElementById("stockMonitoring").classList = "admin-nav-active";
        document.getElementById("salesReport").classList = "";
        document.getElementById("addAccount").classList = "";
        document.getElementById("addProduct").classList = "";
        document.getElementById("uploadAd").classList = "";
    }
    else if(option == "salesReport"){
        document.getElementById("salesReport").classList = "admin-nav-active";
        document.getElementById("stockMonitoring").classList = "";
        document.getElementById("addAccount").classList = "";
        document.getElementById("addProduct").classList = "";
        document.getElementById("uploadAd").classList = "";
    }
    else if(option == "addAccount"){
        document.getElementById("addAccount").classList = "admin-nav-active";
        document.getElementById("stockMonitoring").classList = "";
        document.getElementById("salesReport").classList = "";
        document.getElementById("addProduct").classList = "";
        document.getElementById("uploadAd").classList = "";
    }
    else if(option == "addProduct"){
        document.getElementById("addProduct").classList = "admin-nav-active";
        document.getElementById("stockMonitoring").classList = "";
        document.getElementById("salesReport").classList = "";
        document.getElementById("addAccount").classList = "";
        document.getElementById("uploadAd").classList = "";
    }
    else if(option == "uploadAd"){
        document.getElementById("uploadAd").classList = "admin-nav-active";
        document.getElementById("stockMonitoring").classList = "";
        document.getElementById("salesReport").classList = "";
        document.getElementById("addAccount").classList = "";
        document.getElementById("addProduct").classList = "";
    }

    document.getElementById("adminIframe").value = source;
}
</script>

    
</body>
</html>