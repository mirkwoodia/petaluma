<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
/*
if (!isset($_SESSION['loggedin'])) {
	header('Location: Login_Member.html');
	exit;
}
*/

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Petaluma ThemePark Database</title>
        <link rel="stylesheet" href="Home_Page.css">
        <link rel="shortcut icon" type="image/x-icon" href="tab.ico" />
    </head>
    <body>
        <div class = "navbar">
            <ul>          
                <?php if (isset($_SESSION['loggedin'])) { ?>      
                    <li><a href="attractions.php">Attractions</a></li>
                    <li><a href="Ticket_Booth.php">Ticket Booth</a></li>
                <?php } ?>
                <?php if (!isset($_SESSION['loggedin'])) { ?>
                    <li style="float:right"><a href="Login_Member.html">Member Login/Register</a></li>
                <?php } ?>                   
                <li style="float:right"><a href="Login_Admin.html">Admin Login</a></li>
                <li style = "float:right"><a href="Profile_Member.php"><i class="fas fa-user-circle"></i>Profile</a></li>
                <?php if (isset($_SESSION['loggedin'])) { ?>
				    <li style = "float:right"><a href="Logout_Member.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                <?php } ?>
            </ul>
        </div>
        
        <div class="content">
			<h2>Home Page</h2>
            <?php if (isset($_SESSION['loggedin'])) { 
	                echo "<p>Welcome back, " . $_SESSION['name'] . "</p>"; } ?>
		</div>
        
    </body>
</html>