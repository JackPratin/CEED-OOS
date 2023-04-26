<?php
    require("php/config.php");
    session_start();
    if(!isset($_SESSION['current_admin_page'])){
        $_SESSION['current_admin_page'] = "admin-stock-monitoring.php"; 
    }
    else{
        $_SESSION['current_admin_page'] = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
    }

    // if(isset($_POST['select'])){
    // //    echo $_POST['select'];
    // }
    // else{
    //     $_SESSION['select'] = 'Daily';
    // }
    if(!isset($_POST['select'])){
        $_SESSION['select'] = 'Daily';
    }
    else{
        $_SESSION['select'] = $_POST['select'];
    }

    function autoSelect($value){
        if(isset($_POST['select']) && $_POST['select'] == $value){
            echo "selected='selected'";
        }
    }

    function mostOrdered(){
        require("php/config.php");
        $mostOrdered = mysqli_query($con, "SELECT product_id, count(product_id) as product_count FROM `order_table` GROUP BY product_id ORDER BY product_count DESC LIMIT 1");
        while($order= mysqli_fetch_array($mostOrdered, MYSQLI_ASSOC)){
            $image_qry = mysqli_query($con, "SELECT product_image, product_name FROM products_tb WHERE product_id = $order[product_id]");
            while($image = mysqli_fetch_array($image_qry, MYSQLI_ASSOC)){
                echo"<br>
                    <img src='$image[product_image]' width=25% height=auto>
                    $image[product_name]
                ";
            }
        }
    }

    function mostLocation(){
        require("php/config.php");
        $mostLocation = mysqli_query($con, "SELECT `cust_baranggay`, count(`cust_baranggay`) as loc_count FROM `order_info` GROUP BY cust_baranggay ORDER BY loc_count DESC LIMIT 1;");
        while($location= mysqli_fetch_array($mostLocation, MYSQLI_ASSOC)){
            echo"<br><br>$location[cust_baranggay]";
        }
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
        <title>Sales Report</title>
    </head>
    <body id='salesReportbody'>
        <h1>Sales Report</h1>
        <div class='top-report'>
            <div id='mostOrder' class='most'>
                Most Ordered Item:
                <?php mostOrdered(); ?>
            </div>
            <div id='mostLocation' class='most'>
                Location with most orders:
                <?php mostLocation(); ?>
            </div>
        </div>

        <br>

        <div id='select'>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <select id='salesSelect' onchange="this.form.submit(); "  name='select'>
                    <option class='salesOption' value='Daily' <?php autoSelect( 'Daily'); ?>>Daily</option>
                    <option class='salesOption' value='Monthly'  <?php autoSelect( 'Monthly'); ?>>Monthly</option>
                    <option class='salesOption' value='Yearly' <?php autoSelect('Yearly'); ?>>Yearly</option>
                </select>
            </form>
            
        </div>

        <table width="100%";>
            <tr>
                <th>Date</th>
                <th>Total No. of items</th>
                <th>No.of locations</th>
                <th>No. of orders</th>
                <th>Total Sales</th>
                <th>Dine in</th>
                <th>Delivery</th>
                <th>Pick Up</th>
                <th>COD</th>
                <th>GCash</th>
                <th>Guest Account</th>
                <!-- <th>Social Account</th> -->
                <th>Personal Account</th>
            </tr>
            <?php
            
                function daily(){
                    require("php/config.php");

                    $sales_qry = mysqli_query($con, "SELECT *,
                    SUM(number_of_items) AS total_items, 
                    COUNT(DISTINCT cust_baranggay) as brgy, 
                    COUNT(info_id) AS order_count, 
                    SUM(total) as sales,  
                    --  COUNT(SELECT * FROM order_info WHERE acquirement_type = 'deliver') as delc, 
                    --  COUNT(pickup) as pick, 
                    --  COUNT(cash) as cashc, 
                    --  COUNT(gcash) as gcashc, 
                    COUNT(guest_id) as guestc, 
                    COUNT(customer_id) as custc  
                    FROM order_info GROUP BY order_date ORDER BY info_id DESC");
                    while($sales = mysqli_fetch_array($sales_qry, MYSQLI_ASSOC)){
                        
                        echo"
                        <tr class='dailytr'>
                            <td>$sales[order_date]</td>
                            <td>$sales[total_items]</td>
                            <td>$sales[brgy]</td>
                            <td>$sales[order_count]</td>
                            <td>₱$sales[sales]</td>";
                            $info_qry = mysqli_query($con, "SELECT COUNT(acquirement_type) AS dinc FROM `order_info` WHERE acquirement_type = 'dinein' AND order_date = '$sales[order_date]'");
                            while($dine = mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                                echo"
                                    <td>$dine[dinc]</td>
                                ";
                            }
                            $info_qry = mysqli_query($con, "SELECT COUNT(acquirement_type) AS delc FROM `order_info` WHERE acquirement_type = 'deliver' AND order_date = '$sales[order_date]'");
                            while($deliver = mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                                echo"
                                    <td>$deliver[delc]</td>
                                ";
                            }
                            $info_qry = mysqli_query($con, "SELECT COUNT(acquirement_type) AS pickc FROM `order_info` WHERE acquirement_type = 'pickup' AND order_date = '$sales[order_date]'");
                            while($pick= mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                                echo"
                                    <td>$pick[pickc]</td>
                                ";
                            }
                            $info_qry = mysqli_query($con, "SELECT COUNT(payment_method) AS cashc FROM `order_info` WHERE payment_method = 'cash' AND order_date = '$sales[order_date]'");
                            while($cash= mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                                echo"
                                    <td>$cash[cashc]</td>
                                ";
                            }
                            $info_qry = mysqli_query($con, "SELECT COUNT(payment_method) AS gcashc FROM `order_info` WHERE payment_method = 'gcash' AND order_date = '$sales[order_date]'");
                            while($gcash= mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                                echo"
                                    <td>$gcash[gcashc]</td>
                                ";
                            }
                            echo"
                            <td>$sales[guestc]</td>
                            <td>$sales[custc]</td>
                        </tr>
                    ";
                    }
                }

                function monthly(){
                    require("php/config.php");
                    $month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");

                    for($i=11; $i >=0; $i--){
                        $month = $month_names[$i];
                        $sub = "( SELECT *, SUM(number_of_items) AS total_items, COUNT(DISTINCT cust_baranggay) as brgy, COUNT(info_id) AS order_count, SUM(total) as sales, COUNT(guest_id) as guestc, COUNT(customer_id) as custc FROM order_info WHERE order_date LIKE '$month%' GROUP BY order_date ) ";

                        $sales_qry = mysqli_query($con, "SELECT *, SUM(SUB.total_items) AS total_items1, SUM(SUB.brgy) as brgy1, SUM(SUB.order_count) AS order_count1, SUM(SUB.sales) as sales1, SUM(SUB.guestc) as guestc1, SUM(SUB.custc) as custc1 FROM $sub AS SUB;");
                        
                       
                        while($sales = mysqli_fetch_array($sales_qry, MYSQLI_ASSOC)){
                        
                            if(!is_null($sales['total_items1'])){
                            echo"
                            <tr class='monthlytr'>
                                <td>$month</td>
                                <td>$sales[total_items1]</td>
                                <td>$sales[brgy1]</td>
                                <td>$sales[order_count1]</td>
                                <td>₱$sales[sales1]</td>";
                                $info_qry = mysqli_query($con, "SELECT sum(sub.dinc) AS dinc FROM (SELECT COUNT(acquirement_type) AS dinc FROM `order_info` WHERE acquirement_type = 'dinein' AND order_date = '$sales[order_date]') AS sub");
                                while($dine = mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                                    echo"
                                        <td>$dine[dinc]</td>
                                    ";
                                }
                                $info_qry = mysqli_query($con, "SELECT sum(sub.delc) AS delc FROM (SELECT COUNT(acquirement_type) AS delc FROM `order_info` WHERE acquirement_type = 'deliver' AND order_date = '$sales[order_date]') as sub");
                                while($deliver = mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                                    echo"
                                        <td>$deliver[delc]</td>
                                    ";
                                }
                                $info_qry = mysqli_query($con, "SELECT COUNT(acquirement_type) AS pickc FROM `order_info` WHERE acquirement_type = 'pickup' AND order_date = '$sales[order_date]'");
                                while($pick= mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                                    echo"
                                        <td>$pick[pickc]</td>
                                    ";
                                }
                                $info_qry = mysqli_query($con, "SELECT COUNT(payment_method) AS cashc FROM `order_info` WHERE payment_method = 'cash' AND order_date = '$sales[order_date]'");
                                while($cash= mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                                    echo"
                                        <td>$cash[cashc]</td>
                                    ";
                                }
                                $info_qry = mysqli_query($con, "SELECT COUNT(payment_method) AS gcashc FROM `order_info` WHERE payment_method = 'gcash' AND order_date = '$sales[order_date]'");
                                while($gcash= mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                                    echo"
                                        <td>$gcash[gcashc]</td>
                                    ";
                                }
                                echo"
                                <td>$sales[guestc]</td>
                                <td>$sales[custc]</td>
                            </tr>
                        ";
                        }
                       }
                    }
                }

                function yearly(){
                    require("php/config.php");

                    $sales_qry = mysqli_query($con, "SELECT *,
                    SUM(number_of_items) AS total_items, 
                    COUNT(DISTINCT cust_baranggay) as brgy, 
                    COUNT(info_id) AS order_count, 
                    SUM(total) as sales,  
                    COUNT(guest_id) as guestc, 
                    COUNT(customer_id) as custc  
                    FROM order_info WHERE order_date LIKE '%2023' GROUP BY order_date ORDER BY info_id DESC");
                    while($sales = mysqli_fetch_array($sales_qry, MYSQLI_ASSOC)){
                        
                        echo"
                        <tr class='yearlytr'>
                            <td>$sales[order_date]</td>
                            <td>$sales[total_items]</td>
                            <td>$sales[brgy]</td>
                            <td>$sales[order_count]</td>
                            <td>₱$sales[sales]</td>";
                            $info_qry = mysqli_query($con, "SELECT COUNT(acquirement_type) AS dinc FROM `order_info` WHERE acquirement_type = 'dinein' AND order_date = '$sales[order_date]'");
                            while($dine = mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                                echo"
                                    <td>$dine[dinc]</td>
                                ";
                            }
                            $info_qry = mysqli_query($con, "SELECT COUNT(acquirement_type) AS delc FROM `order_info` WHERE acquirement_type = 'deliver' AND order_date = '$sales[order_date]'");
                            while($deliver = mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                                echo"
                                    <td>$deliver[delc]</td>
                                ";
                            }
                            $info_qry = mysqli_query($con, "SELECT COUNT(acquirement_type) AS pickc FROM `order_info` WHERE acquirement_type = 'pickup' AND order_date = '$sales[order_date]'");
                            while($pick= mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                                echo"
                                    <td>$pick[pickc]</td>
                                ";
                            }
                            $info_qry = mysqli_query($con, "SELECT COUNT(payment_method) AS cashc FROM `order_info` WHERE payment_method = 'cash' AND order_date = '$sales[order_date]'");
                            while($cash= mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                                echo"
                                    <td>$cash[cashc]</td>
                                ";
                            }
                            $info_qry = mysqli_query($con, "SELECT COUNT(payment_method) AS gcashc FROM `order_info` WHERE payment_method = 'gcash' AND order_date = '$sales[order_date]'");
                            while($gcash= mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                                echo"
                                    <td>$gcash[gcashc]</td>
                                ";
                            }
                            echo"
                            <td>$sales[guestc]</td>
                            <td>$sales[custc]</td>
                        </tr>
                    ";
                    }
                }

                if($_SESSION['select'] == 'Daily'){
                    daily();
                }
                else if($_SESSION['select'] == 'Monthly'){
                    monthly();
                }
                else if($_SESSION['select'] == 'Yearly'){
                    yearly();
                }
            ?>
        </table>

        <script>
            // function trChange(){
            //     var trValue = "<?php echo $_SESSION['select'];?>";
            //     if(trValue == 'Daily'){
            //         let myDaily = document.getElementsByClassName("dailytr");

            //         for (let i = 0; i < myDaily.length; i++) {
            //             myDaily[i].style.display = "table-row";
            //         }

            //         let myMonthly = document.getElementsByClassName("monthlytr");

            //         for (let i = 0; i < myMonthly.length; i++) {
            //             myMonthly[i].style.display = "none";
            //         }

            //         let myYearly = document.getElementsByClassName("yearlytr");

            //         for (let i = 0; i < myYearly.length; i++) {
            //             myYearly[i].style.display = "none";
            //         }

            //     }
            //     else if(trValue == 'Monthly'){
            //         let myDaily = document.getElementsByClassName("dailytr");

            //         for (let i = 0; i < myDaily.length; i++) {
            //             myDaily[i].style.display = 'none';
            //         }

            //         let myMonthly = document.getElementsByClassName("monthlytr");

            //         for (let i = 0; i < myMonthly.length; i++) {
            //             myMonthly[i].style.display = 'table-row';
            //         }

            //         let myYearly = document.getElementsByClassName("yearlytr");

            //         for (let i = 0; i < myYearly.length; i++) {
            //             myYearly[i].style.display = 'none';
            //         }
            //     }
            //     else if(trValue == 'Yearly'){
            //         let myDaily = document.getElementsByClassName("dailytr");

            //         for (let i = 0; i < myDaily.length; i++) {
            //             myDaily[i].style.display = 'none';
            //         }

            //         let myMonthly = document.getElementsByClassName("monthlytr");

            //         for (let i = 0; i < myMonthly.length; i++) {
            //             myMonthly[i].style.display = 'none';
            //         }

            //         let myYearly = document.getElementsByClassName("yearlytr");

            //         for (let i = 0; i < myYearly.length; i++) {
            //             myYearly[i].style.display = 'table-row';
            //         }
            //     }
            // }
        </script>
    </body>
</html>