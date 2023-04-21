<?php
    $con = mysqli_connect("localhost","root","","ceedoos_db");
    // $con = mysqli_connect("localhost","u287383616_1975","Ceedoos_db_1975","u287383616_ceedoos_db");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
?>