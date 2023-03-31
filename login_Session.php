<?php
    session_start(); 
    if(!$_SESSION['auth']){
        header('location: Login_Account.html');
    }
?>

<h1>Logged In </h1>
<a href="logout.php">Logout?</a>