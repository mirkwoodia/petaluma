<?
    session_start();
    session_unset(); 
    session_destroy(); 
    header('location: Login_Account.html');
?>

