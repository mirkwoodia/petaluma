<?php
// Step 1: Connect to the database
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "Decon_0213";
$dbName = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/* 
try {
    $conn = new PDO("mysql:host=$dbServername;dbName=mydb", $dbUsername, $dbPassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
*/

// Step 2: Execute the SQL query to fetch the data
/*
$sql = "SELECT * FROM ticket_booth";
$result = mysqli_query($conn, $sql);

// Step 3: Display the data in an HTML table
if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th> ticketI D</th><th> purchase_date </th><th> qtyWheel </th><th> qtySpeed </th><th> qtyAqua </th><th> qtyPutt </th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["ticket_ID"]. "</td><td>" . $row["purchase_date"]. "</td><td>" . $row["QtyWheel"]. "</td><td>" . $row["QtySpeed"]. "</td><td>" . $row["QtyAqua"] . "</td><td>". $row["QtyPutt"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
*/
// Step 4: Close the database connection
mysqli_close($conn);
?>






