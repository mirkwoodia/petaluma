<?php
/*require_once "config.php";

// Retrieve data from parking table
$sql = "SELECT * FROM parking";
$result = mysqli_query($conn, $sql);

// Check if any results are found
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<p>" . $row["type"] . ": used=" . $row["used"] . ", free=" . $row["free"] . ", total=" . $row["total"] . "</p>";
    }
} else {
    echo "No results found.";
}

// Retrieve data from total table
$sql = "SELECT * FROM total WHERE type='total'";
$result = mysqli_query($conn, $sql);

// Check if any results are found
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<p>Total: " . $row["value"] . "</p>";
    }
} else {
    echo "No results found.";
}

// Close connection
mysqli_close($conn); */
?>