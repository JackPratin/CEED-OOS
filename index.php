<?php
     session_start();
     require("php/menuFunctions.php");
     require("php/userType.php");
     if(!isset($_SESSION['account_type'])){
        $_SESSION['account_type'] = 'none';
     }
     typeCheck('none');
     if(!isset($_SESSION['loginAttempt'])){
         $_SESSION['loginAttempt'] = 0;
     }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- google meta -->
        <meta name="google-site-verification" content="yVghcgd5WgaspO4yJG6fe-cst5ZBw3tKBk9m2prrFmA" />
        
        <script src="https://kit.fontawesome.com/484fbcb614.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="css/login page.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="css/contents.css">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <title>1975 Old Fashioned Burgers' Ordering System</title>
    </head>
    
    <body>

        <div id="company-logo">
            <?php landingPageDisplay();?>
        </div>
        

        <div class="center2">
       
            <form style="margin-bottom:0px">
                <!-- <button type="button" style="position: absolute;right: 5px;" onclick="location.href='employee-login.php'" class="button">Login as Employee</button>
                <br> -->
                <center>
                    <div class="logocontainer">
                        <img src="css/system images/company logo.png" alt="1975 Old-Fashioned Burgers logo" class="logo">
                    </div>
                </center>

                <h1>WELCOME</h1>
                <div class="text_field">
                    <i class="fa-solid fa-circle-user"></i>
                    <input type="text" form="login" name="username" required>
                    <label>Username</label>    
                </div>

                <div class="text_field">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" form="login" name="password" required>
                    <label>Password</label>
                </div>
            </form>
            
            

            <center>
                <div class="signup-and-forgot" style="margin-top: -3px;">
                    <div>
                        <a href="register.html" style="color:red;">Sign up here.</a>
                    </div>&nbsp;
                    <div>
                        <a href="forgot-password.php" class="pass">Forgot Password?</a>
                    </div>
                    
                
                </div>
            </center>


            <input type="submit" value="LOGIN" form="login" id="loginButton">
            <p id='countdown'></p>
            <input type="hidden" name='type' value="customer" form="login">

            <form action="php/login-exec.php" method="post" id="login" name="login"></form>
            <br>
        
            <div id="or">
                <hr style='display:inline-block; width:40%; '> OR <hr style='display:inline-block; width:40%;'>
            </div>
            <a onclick='fb()'><input type="submit" value="Facebook" id="facebook"></a>
            
            <input type="submit" value="Login as Guest" id="guest" onclick="location.href='guest-login.html'">
             
        </div>
 
        <?php
        if($_SESSION['loginAttempt'] >= 3){
        ?>
            <script>
                document.getElementById('loginButton').disabled = true;

                function startTimer(duration, display) {
                    var timer = duration, minutes, seconds;
                    check = setInterval(function () {
                        minutes = parseInt(timer / 60, 10)
                        seconds = parseInt(timer % 60, 10);

                        minutes = minutes < 10 ? "0" + minutes : minutes;
                        seconds = seconds < 10 ? "0" + seconds : seconds;

                        display.textContent = minutes + " " + " " + seconds;

                        if (--timer < 0) {
                            timer = duration;
                        }
                    console.log(parseInt(seconds))

                    if(minutes == 0 && seconds == 0){
                        var done = false;
                        document.getElementById('countdown').style.display = 'none';
                        clearInterval(check);
                        check = null;
                        document.getElementById('loginButton').disabled = false;
                        if(done){
                            <?php $_SESSION['loginAttempt'] = 0;?>
                        }
                        done = true;
                    }
                    window.localStorage.setItem("seconds",seconds)
                    window.localStorage.setItem("minutes",minutes)
                    }, 1000);
                    }

                    window.onload = function () {
                    sec  = parseInt(window.localStorage.getItem("seconds"))
                    min = parseInt(window.localStorage.getItem("minutes"))
                    
                    if(parseInt(min*sec)){
                        var threeMinutes = (parseInt(min*60)+sec);
                    }else{
                        // var threeMinutes = 60 * 3;
                        var threeMinutes = 10;
                    }
                        // var threeMinutes = 60 * 5;
                    display = document.getElementById('countdown');
                    
                    startTimer(threeMinutes, display);
                    };



            </script>

            <!-- <script>

                document.getElementById('loginButton').disabled = true;
                
                function startTimer(duration, display) {
                var timer = duration, minutes, seconds;
                setInterval(function () {
                    minutes = parseInt(timer / 60, 10)
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.textContent = minutes + " :" + " " + seconds + " remaining before another login attempt";

                    if (--timer < 0) {
                        timer = duration;
                    }
                console.log(parseInt(seconds))
                window.localStorage.setItem("seconds",seconds)
                window.localStorage.setItem("minutes",minutes)
                }, 1000);
                }

                window.onload = function () {
                    sec  = parseInt(window.localStorage.getItem("seconds"))
                    min = parseInt(window.localStorage.getItem("minutes"))

                    if(parseInt(min*sec)){
                        var threeMinutes = (parseInt(min*60)+sec);
                    }else{
                        var threeMinutes = 60 * 1;
                    }
                        // var threMinutes = 60 * 5;
                    display = document.getElementById('countdown');
                    startTimer(threeMinutes, display);

                    if(min == 0 && sec == 0){
                        document.getElementById("countdown").style.display = 'none';
                        document.getElementById('loginButton').disabled = false;
                        <?php //$_SESSION['loginAttempt'] = 0;?>
                        exit();
                    }
                };
            </script> -->
        <?php
         }
        ?>

        <script>
            // function fb(){
            //     // window.location.href="../../../facebook.com";
            //     window.open('facebook.com');
            // }

            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
            showSlides(slideIndex += n);
            }

            function currentSlide(n) {
            showSlides(slideIndex = n);
            }

            function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length} ;
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            // for (i = 0; i < dots.length; i++) {
                // dots[i].className = dots[i].className.replace(" active", "");
            // }
            slides[slideIndex-1].style.display = "block";
            // dots[slideIndex-1].className += " active";
            // dots[slideIndex-1].classList.add("active");
            }
        </script>
   
   </body>
 </html>