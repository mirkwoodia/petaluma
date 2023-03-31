<?php
    $dbServername ="localhost";
    $dbUsername = "root";
    $dbpassword = "Decon_0213";
    $dbname = "mydb";

    try {
        $conn = new PDO("mysql:host=$dbServername;dbname=mydb", $dbUsername, $dbpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
