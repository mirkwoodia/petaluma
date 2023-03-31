<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="Parking_report.css">
<meta http-equiv="refresh" content="10">

<style>
    .closed {
        background-color: red;
    }
</style>
<title>Parking Table</title>
</head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>Parking lot name</th>
        <th>Parking Rate</th>
        <th>Total Parking Space</th>
        <th>Available Slots</th>
    </tr>
    <?php
    require_once('parking.php');

    $q = "SELECT * FROM parking";
    $r = mysqli_query($dbc, $q);

    while($row = mysqli_fetch_assoc($r)) {

        $class = '';
        if (isset($row['expiration_time'])) {
            if (time() > $row['expiration_time']) {
                $class = '';
            } else {
                $class = 'closed';
            }
        }
        echo "<tr class='$class'>";
        echo "<td>" . $row['parking_ID'] . "</td>";
        echo "<td>" . $row['parking_lot_name'] . "</td>";
        echo "<td>" . $row['parking_rate'] . "</td>";
        echo "<td>" . $row['total_parking_space'] . "</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='parking_id' value='" . $row['parking_ID'] . "'>";
        echo "<input type='submit' name='close_parking' value='Close Parking'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    mysqli_close($dbc);
    ?>
</table>
</body>
</html>
