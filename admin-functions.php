<?php
    require("php/config.php");
    session_start();
    if(!isset($_SESSION['current_page'])){
        $_SESSION['current_page'] = "admin-functions.php"; 
    }
    else{
        $_SESSION['current_page'] = "admin-functions.php"; 
    }

    if(!isset($_SESSION['current_admin_page'])){
        $_SESSION['current_admin_page'] = "admin-stock-monitoring.php"; 
    }
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

<!-- <ul>
  <li><a href="admin-stock-monitoring.php" class="admin-nav-active" onclick="changeIframe('stockMonitoring');changeAdminDisplay('admin-stock-monitoring.php')" onload="changeIframe('stockMonitoring')" id="stockMonitoring" target="adminIframe">Stock Monitoring</a></li>

  <li><a href="admin-product.php" onclick="changeIframe('addProduct');changeAdminDisplay('admin-product.php')" onload="changeIframe('addProduct')" id="addProduct" target="adminIframe">Product Management</a></li>

  <li><a href="admin-ad-banner.php" onclick="changeIframe('uploadAd');changeAdminDisplay('admin-ad-banner.php')" onload="changeIframe('uploadAd')" id="uploadAd" target="adminIframe">Upload ad banner</a></li>

  <li><a href="admin-sales-report.php" onclick="changeIframe('salesReport');changeAdminDisplay('admin-sales-report.php')" onload="changeIframe('salesReport')" id="salesReport" target="adminIframe">Sales Report</a></li>

  <li><a href="admin-add-user.php" onclick="changeIframe('addAccount');changeAdminDisplay('admin-add-user.php')" onload="changeIframe('addAccount')" id="addAccount" target="adminIframe">Account Management</a></li>
</ul> -->
<ul>
  <li><a href="admin-stock-monitoring.php" class="admin-nav-active" onclick="changeIframe('stockMonitoring');" id="stockMonitoring" target="adminIframe">Stock Monitoring</a></li>

  <li><a href="admin-product.php" onclick="changeIframe('addProduct');" id="addProduct" target="adminIframe">Product Management</a></li>

  <li><a href="admin-ad-banner.php" onclick="changeIframe('uploadAd');"  id="uploadAd" target="adminIframe">Upload ad banner</a></li>

  <li><a href="admin-sales-report.php" onclick="changeIframe('salesReport');" id="salesReport" target="adminIframe">Sales Report</a></li>

  <li><a href="admin-add-user.php" onclick="changeIframe('addAccount');"  id="addAccount" target="adminIframe">Account Management</a></li>
</ul>

<div class="admin-iframe-div">
    <iframe src='admin-stock-monitoring.php' frameborder="0" id="adminIframe"  name="adminIframe" class="admin-iframe" ></iframe>
   
    
    <input type="hidden" id="adminIframe-source" name="" value="<?php echo $_SESSION['current_admin_page']; ?>">
</div>

<script src="js/admin-function.js"></script>

<script>

function changeIframe(option){
    // let option = document.getElementById("adminIframe-source").value;

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

    // console.log(<?php //echo $_SESSION['current_admin_page']; ?>);
    // document.getElementById("adminIframe").value = option;
}

function changeAdminDisplay(source){
    document.getElementById("adminIframe-source").value = source;
}

// function topNavActive(){
//     let source = document.getElementById("adminIframe").src;


// }
</script>

    
</body>
</html>