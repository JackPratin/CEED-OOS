
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/484fbcb614.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="css/employee login page.css">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <title>Login Page</title>
    </head>
    
    <body>
        <div class="center">
            <div>
                <form>
                    <button type="button" style="position: absolute;right: 5px;" onclick="location.href='index.php'" class="button">Login as Customer</button>
                    <br>
                    <center><div class="logocontainer">
                        <img src="css/system images/company logo.png" alt="1975 Old-Fashioned Burgers logo" class="logo">
                    </div></center>
                    <h1>EMPLOYEE LOGIN</h1>
                    <div class="text_field">
                        <i class="fa-solid fa-circle-user"></i>
                        <input type="text" form="login" name="username" required>
                        <span></span>
                        <label>Username</label>    
                    </div>

                    <div class="text_field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" form="login" name="password" required>
                        <span></span>
                        <label>Password</label>
                    </div>
                </form>
                
                <input type="submit" value="LOGIN" form="login">
                <input type="hidden" name='type' value="employee" form="login">

                <form action="php/login-exec.php" method="post" id="login" name="login"></form>
                
            </div>
        </div>
    
    </body>
</html>