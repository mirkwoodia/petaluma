<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: Login_Member.html');
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>        
    <link rel="stylesheet" type="text/css" href="Ticket_Booth.css">
    <link rel="shortcut icon" type="image/x-icon" href="Tab.ico" />
    <title>Ticket Order Form</title>
    <nav class="navtop">
        <div>
            <h1>Petaluma Themepark</h1>
            <a href="Home_Page.php"><i class="fas fa-home"></i>Home</a>
            <a href="Admin_Portal.html"><i class="fas fa-address-book"></i>More</a>
            <a href="Logout_Member.php"><i class="fas fa-address-book"></i>Logout</a>
        </div>
    </nav>
