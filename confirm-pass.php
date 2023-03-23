<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/484fbcb614.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="css/confirm-pass.css">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <title>Forgot Password</title>
    </head>
    
    <body>
        <div class="newpass">
            <div>
                <form>
                <a class="go-back" href="verification-code.php">Go Back</a>
                    <br>
                    <center><div class="logocontainer">
                        <img src="css/system images/company logo.png" alt="1975 Old-Fashioned Burgers logo" class="logo">
                    </div></center>
                    <h1>Create new password</h1>
                   
                    <div class="text_field">
                    <i class="fa-solid fa-user"></i>
                        <input type="text" form="new-password" name="username" required>
                        <span></span>
                        <label>Enter your username</label>    
                    </div>
                    <div class="text_field">
                    <i class="fa-solid fa-lock"></i>
                        <input type="text" form="new-password" name="newpassword" required>
                        <span></span>
                        <label>Enter your new password</label>    
                    </div>
                    <div class="text_field">
                    <i class="fa-solid fa-lock"></i>
                        <input type="text" form="new-password" name="confirmpass" required>
                        <span></span>
                        <label>Confirm your new password</label>    
                    </div>
                </form>
                
                <input type="submit" value="Submit" form="new-password" onclick="location.href='index.php'">
                <input type="hidden" name='type' value="employee" form="new-password">

                <form action="php/login-exec.php" method="post" id="login" name="login"></form>
                
            </div>
        </div>
    
    </body>
</html>