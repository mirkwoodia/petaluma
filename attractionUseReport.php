<?php
	include_once 'sqlConnect.php';
	session_start();
	if ($_SESSION['type'] != "admin") {
		header('Location: Login_Admin.html');
		exit;
	}
	
	// $stmt = $conn->prepare('SELECT sum(QtySpeed) FROM attractionusage WHERE date BETWEEN date("Y-m-d H:i:s", strtotime("yesterday")) and date("Y-m-d H:i:s");');
	$now = time();
	$yday = $now - (24 * 3600);
	$week = $now - (7 * 24 * 3600);
	$month = $now - (30 * 24 * 3600);

	$stmt = $conn->prepare("SELECT sum(QtySpeed) FROM attractionusage WHERE date BETWEEN FROM_UNIXTIME('$yday') and FROM_UNIXTIME('$now');");
	$stmt->execute();
	$stmt->bind_result($dailySpeed);
	$stmt->fetch();
	$stmt->close();

	$stmt = $conn->prepare("SELECT sum(QtySpeed) FROM attractionusage WHERE date BETWEEN FROM_UNIXTIME('$week') and FROM_UNIXTIME('$now');");
	$stmt->execute();
	$stmt->bind_result($weekSpeed);
	$stmt->fetch();
	$stmt->close();

	$stmt = $conn->prepare("SELECT sum(QtySpeed) FROM attractionusage WHERE date BETWEEN FROM_UNIXTIME('$month') and FROM_UNIXTIME('$now');");
	$stmt->execute();
	$stmt->bind_result($monthSpeed);
	$stmt->fetch();
	$stmt->close();

	$stmt = $conn->prepare("SELECT sum(QtySpeed) FROM attractionusage;");
	$stmt->execute();
	$stmt->bind_result($totalSpeed);
	$stmt->fetch();
	$stmt->close();

	$stmt = $conn->prepare("SELECT sum(QtyWheel) FROM attractionusage WHERE date BETWEEN FROM_UNIXTIME('$yday') and FROM_UNIXTIME('$now');");
	$stmt->execute();
	$stmt->bind_result($dailyWheel);
	$stmt->fetch();
	$stmt->close();

	$stmt = $conn->prepare("SELECT sum(QtyWheel) FROM attractionusage WHERE date BETWEEN FROM_UNIXTIME('$week') and FROM_UNIXTIME('$now');");
	$stmt->execute();
	$stmt->bind_result($weekWheel);
	$stmt->fetch();
	$stmt->close();

	$stmt = $conn->prepare("SELECT sum(QtyWheel) FROM attractionusage WHERE date BETWEEN FROM_UNIXTIME('$month') and FROM_UNIXTIME('$now');");
	$stmt->execute();
	$stmt->bind_result($monthWheel);
	$stmt->fetch();
	$stmt->close();

	$stmt = $conn->prepare("SELECT sum(QtyWheel) FROM attractionusage;");
	$stmt->execute();
	$stmt->bind_result($totalWheel);
	$stmt->fetch();
	$stmt->close();

	$stmt = $conn->prepare("SELECT sum(QtyAqua) FROM attractionusage WHERE date BETWEEN FROM_UNIXTIME('$yday') and FROM_UNIXTIME('$now');");
	$stmt->execute();
	$stmt->bind_result($dailyAqua);
	$stmt->fetch();
	$stmt->close();

	$stmt = $conn->prepare("SELECT sum(QtyAqua) FROM attractionusage WHERE date BETWEEN FROM_UNIXTIME('$week') and FROM_UNIXTIME('$now');");
	$stmt->execute();
	$stmt->bind_result($weekAqua);
	$stmt->fetch();
	$stmt->close();

	$stmt = $conn->prepare("SELECT sum(QtyAqua) FROM attractionusage WHERE date BETWEEN FROM_UNIXTIME('$month') and FROM_UNIXTIME('$now');");
	$stmt->execute();
	$stmt->bind_result($monthAqua);
	$stmt->fetch();
	$stmt->close();

	$stmt = $conn->prepare("SELECT sum(QtyAqua) FROM attractionusage;");
	$stmt->execute();
	$stmt->bind_result($totalAqua);
	$stmt->fetch();
	$stmt->close();

	$stmt = $conn->prepare("SELECT sum(QtyPutt) FROM attractionusage WHERE date BETWEEN FROM_UNIXTIME('$yday') and FROM_UNIXTIME('$now');");
	$stmt->execute();
	$stmt->bind_result($dailyPutt);
	$stmt->fetch();
	$stmt->close();

	$stmt = $conn->prepare("SELECT sum(QtyPutt) FROM attractionusage WHERE date BETWEEN FROM_UNIXTIME('$week') and FROM_UNIXTIME('$now');");
	$stmt->execute();
	$stmt->bind_result($weekPutt);
	$stmt->fetch();
	$stmt->close();

	$stmt = $conn->prepare("SELECT sum(QtyPutt) FROM attractionusage WHERE date BETWEEN FROM_UNIXTIME('$month') and FROM_UNIXTIME('$now');");
	$stmt->execute();
	$stmt->bind_result($monthPutt);
	$stmt->fetch();
	$stmt->close();

	$stmt = $conn->prepare("SELECT sum(QtyPutt) FROM attractionusage;");
	$stmt->execute();
	$stmt->bind_result($totalPutt);
	$stmt->fetch();
	$stmt->close();
	?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="Profile_Member.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
	<nav class="navtop">
        <div>
            <h1>Petaluma Themepark</h1>
            <a href="Admin_Portal.html"><i class="fas fa-home"></i>Home</a>
            <a href="Admin_Portal.html"><i class="fas fa-address-book"></i>More</a>
            <a href="Logout_Admin.php"><i class="fas fa-address-book"></i>Logout</a>
        </div>
    </nav>
		<div class="content">
			<h2>Attraction Uses Report</h2>
			<div>
				<p>Speedway:</p>
				<table>
                    <tr>
						<td>Daily:</td>
						<td><?=$dailySpeed?></td>
					</tr>
                    <tr>
						<td>Weekly:</td>
						<td><?=$weekSpeed?></td>
					</tr>
					<tr>
						<td>Monthly:</td>
						<td><?=$monthSpeed?></td>
					</tr>
					
					<tr>
						<td>All Time:</td>
						<td><?=$totalSpeed?></td>
					</tr>
				</table>
			</div>

			<div>
				<p>Ferris Wheel:</p>
				<table>
                    <tr>
						<td>Daily:</td>
						<td><?=$dailyWheel?></td>
					</tr>
                    <tr>
						<td>Weekly:</td>
						<td><?=$weekWheel?></td>
					</tr>
					<tr>
						<td>Monthly:</td>
						<td><?=$monthWheel?></td>
					</tr>
					
					<tr>
						<td>All Time:</td>
						<td><?=$totalWheel?></td>
					</tr>
				</table>
			</div>

			<div>
				<p>Water rides:</p>
				<table>
                    <tr>
						<td>Daily:</td>
						<td><?=$dailyAqua?></td>
					</tr>
                    <tr>
						<td>Weekly:</td>
						<td><?=$weekAqua?></td>
					</tr>
					<tr>
						<td>Monthly:</td>
						<td><?=$monthAqua?></td>
					</tr>
					
					<tr>
						<td>All Time:</td>
						<td><?=$totalAqua?></td>
					</tr>
				</table>
			</div>

			<div>
				<p>Mini Golf:</p>
				<table>
                    <tr>
						<td>Daily:</td>
						<td><?=$dailyPutt?></td>
					</tr>
                    <tr>
						<td>Weekly:</td>
						<td><?=$weekPutt?></td>
					</tr>
					<tr>
						<td>Monthly:</td>
						<td><?=$monthPutt?></td>
					</tr>
					
					<tr>
						<td>All Time:</td>
						<td><?=$totalPutt?></td>
					</tr>
				</table>
			</div>

		</div>
	</body>
</html>
