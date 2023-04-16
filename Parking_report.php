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
<nav class="navtop" style="margin-top:80px">
			<div>
				<h1>Petaluma Themepark Attractions</h1>
				<a href="Admin_Portal.html"><i class="fas fa-user-circle"></i>Home</a>
				<a href="Profile_Member.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="Logout_Member.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
<table style="margin-top:100px">
    <tr>
        <th>Parking lot name</th>
        <th>Total Parking Space</th>
        <th>Available Slots</th>
    </tr>
    <?php
    require_once('parking.php');

        $class = '';

        $STMT = "SELECT * FROM mydb.parking_slots;";
        $r = mysqli_query($dbc, $STMT);
        while($row = mysqli_fetch_assoc($r)) {
        echo "<tr class='$class' style='background-color: " . ($class == "even" ? "#00ff84" : "#00ff84") . "; color: " . ($class == "even" ? "#333333" : "#000000") . ";'>";
        echo "<td>" . $row['lot_name'] . "</td>";
        echo "<td>" . $row['total_slots'] . "</td>";
        echo "<td>" . $row['available_slots'] . "</td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='lot_name' value='" . $row['lot_name'] . "'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";

    }
    ?>
</table>
</body>
<br>
<body>
<table>
    <tr>
        <th>Parking lot name</th>
        <th>Username</th>
        <th>License Plate</th>
    </tr>
    <?php
    require_once('parking.php');


        $class = '';


        $STMT = "SELECT * FROM mydb.parking_slots;";
        $r = mysqli_query($dbc, $STMT);
        while($row = mysqli_fetch_assoc($r)) {
        echo "<tr class='$class' style='background-color: " . ($class == "even" ? "#00ff84" : "#00ff84") . "; color: " . ($class == "even" ? "#333333" : "#000000") . ";'>";
        echo "<td>" . $row['lot_name'] . "</td>";
        echo "<td></td>";

        echo "<td></td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='lot_name' value='" . $row['lot_name'] . "'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";

        $member_query = "SELECT m.*, gpp.* FROM get_parking_pass gpp 
        JOIN member m ON gpp.member_ID = m.member_ID 
        WHERE gpp.parking_lot = '{$row['lot_name']}'";
        $member_result = mysqli_query($dbc, $member_query);
        if ($member_result) {
            while($member_row = mysqli_fetch_assoc($member_result)) {
                echo "<tr>";
                echo "<td>";
                echo "<td>{$member_row['first_name']}</td>";
                echo "<td>{$member_row['license_plate']}</td>";

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
