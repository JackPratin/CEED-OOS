<?php
    //Start session
	session_start();
	
	//Unset the variables stored in session
	session_unset();
	
	//Kill the session
	session_destroy();
	
	// echo '<script>alert("Log out successful!")</script>';
	echo '<script>window.location="../index.php"</script>';
		
?>