<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/484fbcb614.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="css/verification-code.css">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <title>Verification Code</title>
    </head>
    
    <body>
        <div class="verify">
            <div>
                <form>
                <a class="go-back" href="forgot-password.php">Go Back</a>
                    <br>
                    <center><div class="logocontainer">
                        <img src="css/system images/company logo.png" alt="1975 Old-Fashioned Burgers logo" class="logo">
                    </div></center>
                    <h1>Verification</h1>
                    <div class="text_field">
                    <i class="fa-solid fa-key"></i>
                        <input type="text" form="verification" name="code" required>
                        <span></span>
                        <label>Enter your verification code</label>    
                    </div>

                   
                </form>
                
                <input type="submit" value="Verify" form="login" onclick="location.href='confirm-pass.php'">
                <input type="hidden" name='type' value="employee" form="login">

                <form action="php/login-exec.php" method="post" id="login" name="login"></form>
                
            </div>
        </div>
    
    </body>
</html>