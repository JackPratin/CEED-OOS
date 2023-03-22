
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/484fbcb614.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="css/admin functions.css">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <title>Login Page</title>
    </head>
    
    <body>
        <div class="center">
            <div>
            <form action="php/employeeRegistration.php" method="post" id="form"><br><br>
                <div id="signUp">New employee account</div> <br>
                <div>
                    User details <br>
                    <input type="text" name="fname" class="regInput" placeholder="First Name" required>
                    <input type="text" name="mi" class="regInput" maxlength="2" placeholder="Middle Initial" required>
                    <input type="text" name="lname" class="regInput" placeholder="Last Name" required>
                    <select name="type" required>
                        <option value="" hidden selected>Account Type</option>
                        <option value="staff">Staff</option>
                        <option value="admin">Admin</option>
                    </select>
                </div> <br>
        
                <div>
                    Login & Contact Details <br>
                    <input type="text" name="email" class="regInput" placeholder="Email" required> 
                    <input type="text" name="contact" class="regInput" placeholder="Contact Number" required> <br>
                    <input type="text" name="username" class="regInput" placeholder="Username" required>
                    <input type="password" name="password" class="regInput" placeholder="Password" required> 
                    <input type="password" name="conPassword" class="regInput" placeholder="Confirm Password" required>
                </div> <br>
        
                <div>
                    Address Details <br>
                    <input type="text" name="address" class="regInput" placeholder="Compound/Street/Subdivision" required> 
                    <input type="text" name="brgy" class="regInput" placeholder="Barangay" required>
                    <input type="text" name="city" class="regInput" placeholder="City" required>
                </div> <br>
        
                <input type="submit" value="Create your Account" id="regSubmit">
            </form>
                
            </div>
        </div>
    
    </body>
</html>