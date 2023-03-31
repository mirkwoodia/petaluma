<?php
    //include_once 'sqlConnect.php';
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "Decon_0213";
    $dbName = "mydb";
    
    $connMember = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (!$conMember) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //takes input values from HTML identified by their names and puts them into global variable
    $PurchaseDate = $_POST['date'];
    $QtyWheel = $_POST['QtyWheel'];
    $QtySpeed = $_POST['QtySpeed'];
    $QtyAqua = $_POST['QtyAqua'];
    $QtyPutt = $_POST['QtyPutt'];


    //call global variables to insert into table. User only inputs date, and the quantity of each ride they want to ride
    $ticket = "INSERT INTO ticket_booth(purchase_date, QtyWheel, QtySpeed, QtyAqua, QtyPutt) VALUES('$PurchaseDate', '$QtyWheel', '$QtySpeed', '$QtyAqua', '$QtyPutt');";
    mysqli_query($connTicket, $ticket);


    //search bar will show this message if the insert is successful
    header("Location:Ticket_Booth.html?purchase=success");
?>

