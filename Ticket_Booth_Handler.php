<?php
    include_once 'sqlConnect.php';
    session_start();

    //takes input values from HTML identified by their names and puts them into global variable
    $PurchaseDate = $_POST['date'];
    $QtyWheel = $_POST['QtyWheel'];
    $QtySpeed = $_POST['QtySpeed'];
    $QtyAqua = $_POST['QtyAqua'];
    $QtyPutt = $_POST['QtyPutt'];
    $memberID = $_SESSION['id'];

    //call global variables to insert into table. User only inputs date, and the quantity of each ride they want to ride
    $ticket = "INSERT INTO ticket_booth(purchase_date, QtyWheel, QtySpeed, QtyAqua, QtyPutt, member_id) VALUES('$PurchaseDate', '$QtyWheel', '$QtySpeed', '$QtyAqua', '$QtyPutt', '$memberID');";
    mysqli_query($conn, $ticket);


    //search bar will show this message if the insert is successful
    header("Location:Ticket_Booth.php?purchase=success");
?>

