<?php 
    include_once 'sqlConnect.php';

    $QtyWheel = $_POST['QtyWheel']; 
    $QtySpeed = $_POST['QtySpeed']; 
    $QtyAqua = $_POST['QtyAqua']; 
    $QtyPutt = $_POST['QtyPutt']; 

    $sql = "INSERT INTO ticket_booth(ticket_quantity) VALUES('$QtyWheel', '$QtySpeed', '$QtyAqua', '$QtyPutt');";
    mysqli_query($conn, $sql); 

        
    header("Location: ../Ticket_Booth.html?purchase=success");


