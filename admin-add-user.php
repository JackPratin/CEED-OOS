
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/484fbcb614.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat'>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="css/admin-add-user.css">
        <link rel="icon" type="image/x-icon" href="css/system images/favicon.ico">
        <title>Add an account</title>
    </head>

    <body>
        <div class="addUser">
            <div>
            <form action="php/employeeRegistration.php" method="post" id="form"><br><br>
                <b><div id="newAccount">New employee account</div> </b><br>
                <div>
                    User details <br>
                    <input type="text" name="fname" class="adminInput" placeholder="First Name" required>
                    <input type="text" name="mi" class="adminInput" maxlength="2" placeholder="Middle Initial" required>
                    <input type="text" name="lname" class="adminInput" placeholder="Last Name" required>
                            <div class="container">
                                <div class="custom-select" >
                                    <select name="type" class="emploType" id="" required>
                                        <!-- <option value="" hidden='hidden' disabled selected>Account Type</option> -->
                                        <option value="staff">Staff</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                    
               
        
                <div>
                    Login & Contact Details <br>
                    <input type="text" name="email" class="emailInput" placeholder="Email" required> 
                    <input type="text" name="contact" class="adminInput" placeholder="Contact Number" required> <br>
                    <input type="text" name="username" class="adminInputUN" placeholder="Username" required>
                    <input type="password" name="password" class="adminInput" placeholder="Password" required> 
                    <input type="password" name="conPassword" class="adminInput" placeholder="Confirm Password" required>
                </div> <br>
        
                <div>
                    Address Details <br>
                    <input type="text" name="address" class="addressInput" placeholder="Compound/Street/Subdivision" required> 
                    <input type="text" name="brgy" class="adminInput" placeholder="Barangay" required>
                    <input type="text" name="city" class="adminInput" placeholder="City" required>
                </div> <br>
        
                <input type="submit" value="Create your Account" id="emploSubmit">
            </form>
                
            </div>
        </div>
    
        <script src="https://code.jquery.com/jquery-1.12.3.js" integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="js/dropdown.js"></script>
    </body>
</html>