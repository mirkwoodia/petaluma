<?php
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "Decon_0213";
    $dbName = "mydb";
    
    $connMember = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (!$connMember) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['phone_number'];
    $email = $_POST['email_address'];
    $password = $_POST['password'];
    $joindate = $_POST['join_date'];
 

    //call global variables to insert into table. User only inputs date, and the quantity of each ride they want to ride
    $member = "INSERT INTO member(first_name, last_name, gender, address, birthdate, phone_number, email_address, password, join_date) 
            VALUES('$firstname', '$lastname', '$gender', '$address', '$birthdate', '$phone', '$email', '$password', '$joindate');";

    mysqli_query($connMember,$member);


    //search bar will show this message if the insert is successful
    header('location: login_Session.php');




?>