<?php
include_once 'sqlConnect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * from members where email= '$username' and password='$password'";
    $result = mysqli_query($conn, $query); 
    if(mysqli_num_rows($result)==1){
        session_start(); 
        $_SESSION['auth'] = 'true';
        header('location: login_Session.php');
    }
    else{
        echo "The username or password you entered is incorrect.";
    }
?>