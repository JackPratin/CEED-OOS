
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/484fbcb614.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="css/employee login page.css">
        <link rel="stylesheet" type="text/css" href="css/login page.css">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <title>Login Page</title>
    </head>
    
    <body>
        <div class="center">
            <div>
            <form action="php/customerRegistration.php" method="post" id="form"><br><br>
                <div id="signUp">New employee account</div> <br>
                <div>
                    User details <br>
                    <input type="text" name="fname" class="regInput" placeholder="First Name">
                    <input type="text" name="mi" class="regInput" maxlength="2" placeholder="Middle Initial">
                    <input type="text" name="lname" class="regInput" placeholder="Last Name">
                </div> <br>
        
                <div>
                    Login & Contact Details <br>
                    <input type="text" name="email" class="regInput" placeholder="Email"> 
                    <input type="text" name="contact" class="regInput" placeholder="Contact Number"> <br>
                    <input type="text" name="username" class="regInput" placeholder="Username">
                    <input type="password" name="password" class="regInput" placeholder="Password"> 
                    <input type="password" name="conPassword" class="regInput" placeholder="Confirm Password">
                </div> <br>
        
                <div>
                    Address Details <br>
                    <input type="text" name="address" class="regInput" placeholder="Compound/Street/Subdivision"> 
                    <input type="text" name="brgy" class="regInput" placeholder="Barangay">
                    <input type="text" name="city" class="regInput" placeholder="City">
                </div> <br>
        
                <input type="submit" value="Create your Account" id="regSubmit">
            </form>
                
            </div>
        </div>
    
    </body>
</html>