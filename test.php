<?php
$servername = "localhost";
$username = "root";
$password = "Decon_0213";
$database = "test_schema";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
Save this code as a PHP file and run it on your web server. If everything is set up correctly, you should see the message "Connected successfully" in your web browser.





