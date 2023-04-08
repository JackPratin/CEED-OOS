<?php
    require("config.php");

    if($_POST['newpassword'] != $_POST['confirmpass']){
        echo '<script>alert("Password not the same.");</script>';
        echo '<script>window.history.go(-1)</script>';
    }
    else{
        echo '<script>alert("Password change successfully.");</script>';
        echo '<script>window.location="index.php"</script>';
    }
?>