<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "Decon_0213";
$dbName = "mydb";

$connLoginEmployee = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if (!$connLoginEmployee) {
    die("Connection failed: " . mysqli_connect_error());
}

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * from employee where email_address= '$username' AND password='$password'"; 
    $result = mysqli_query($connLoginEmployee, $query); 
    if(mysqli_num_rows($result)==1){
        session_start(); 
        $_SESSION['auth'] = 'true';
        header("Location:login_Session.php");
    }
    else{
        echo "The username or password you entered is incorrect.";
    }
?>