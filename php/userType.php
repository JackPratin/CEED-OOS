<?php
    function typeCheck($pageType){
        require("config.php");
        
        // if(!isset($_SESSION['account_type'])){
        //     echo '<script>window.location="index.php"</script>';
        //     exit();
        // }
        
        if($pageType != $_SESSION['account_type']){
            echo "<script>alert('Page not available.');</script>";

            switch ($_SESSION['account_type']){
                case 'customer':    
                    echo '<script>window.location="main.php"</script>';
                    break;

                case 'admin':
                    echo '<script>window.location="admin-main.php"</script>';
                    break;

                case 'staff':
                    echo '<script>window.location="employee-main.php"</script>';
                    break;

                case 'guest':
                    echo '<script>window.location="guest-main.php"</script>';
                    break;

                case 'none':
                    echo '<script>window.location="index.php"</script>';
                    break;

                // default:
                //     echo '<script>window.location="index.php"</script>';
            }
        }
    }
?>