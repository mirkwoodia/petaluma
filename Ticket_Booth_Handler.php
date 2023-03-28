<?php 
    include_once 'sqlConnect.php';
    //takes input values from HTML identified by their names and puts them into global variable
    $PurchaseDate = $_POST['date'];
    $QtyWheel = $_POST['QtyWheel']; 
    $QtySpeed = $_POST['QtySpeed']; 
    $QtyAqua = $_POST['QtyAqua']; 
    $QtyPutt = $_POST['QtyPutt']; 

    //call global variables to insert into table. User only inputs date, and the quantity of each ride they want to ride
    $sql = "INSERT INTO ticket_booth(purchase_date, QtyWheel, QtySpeed, QtyAqua, QtyPutt) VALUES('$QtyWheel', '$QtySpeed', '$QtyAqua', '$QtyPutt');";
    mysqli_query($conn, $sql); 

    //search bar will show this message if the insert is successful 
    header("Location: ../Ticket_Booth.html?purchase=success");


