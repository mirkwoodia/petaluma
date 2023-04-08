<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="Parking_report.css">
<meta http-equiv="refresh" content="1000">

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
        <th>Parking lot name</th>
        <th>Total Parking Space</th>
        <th>Available Slots</th>
        <th>Close Lot</th>
    </tr>
    <?php
    require_once('parking.php');

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
        echo "<td>" . $row['lot_name'] . "</td>";
        echo "<td>" . $row['total_slots'] . "</td>";
        echo "<td>" . $row['available_slots'] . "</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='lot_name' value='" . $row['lot_name'] . "'>";
        echo "<input type='submit' name='close_parking' value='Close Parking'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
        $member_query = "SELECT m.* FROM get_parking_pass gpp 
        JOIN member m ON gpp.member_ID = m.member_ID 
        WHERE gpp.parking_lot = '{$row['lot_name']}'";
        $member_result = mysqli_query($dbc, $member_query);
        if ($member_result) {
            while($member_row = mysqli_fetch_assoc($member_result)) {
                echo "<tr>";
                echo "<td></td><td></td><td></td>";
                echo "<td>{$member_row['first_name']}</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<td colspan='4'>Error retrieving members for lot {$row['lot_name']}</td>";
            echo "</tr>";
        }
    }
    mysqli_close($dbc);
    ?>
</table>
</body>
</html>