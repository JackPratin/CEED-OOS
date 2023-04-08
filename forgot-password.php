<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/484fbcb614.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="css/forgot-password.css">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <title>Forgot Password</title>
    </head>
    
    <body>
        <div class="forgotpw">
            <div>
                <form>
                <a class="go-back" href="index.php">Go Back</a>
                    <br>
                    <center><div class="logocontainer">
                        <img src="css/system images/company logo.png" alt="1975 Old-Fashioned Burgers logo" class="logo">
                    </div></center>
                    <h1>Forgot your password?</h1>
                    <div class="text_field">
                    <i class="fa-solid fa-envelope"></i>
                        <input type="text" form="forgot-pw" name="email" required>
                        <span></span>
                        <label>Enter your email address</label>    
                    </div>

                   
                </form>
                
                <input type="submit" value="Submit" form="login" onclick="location.href='verification-code.php'">
                <input type="hidden" name='type' value="employee" form="login">

                <form action="verification-code.php" method="post" id="login" name="login"></form>
                
            </div>
        </div>
    
    </body>
</html>