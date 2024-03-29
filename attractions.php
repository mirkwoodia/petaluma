<?php
include_once 'sqlConnect.php';
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	$_SESSION['id'] = 0;
	$_SESSION['name'] = "Guest";
}

if (isset($_POST['submit'])) {
	$memberID = $_SESSION['id'];
	$QtyWheel = $_POST['QtyWheel'];
    $QtySpeed = $_POST['QtySpeed'];
    $QtyAqua = $_POST['QtyAqua'];
    $QtyPutt = $_POST['QtyPutt'];
	if (($QtyAqua + $QtyPutt + $QtySpeed + $QtyWheel) > 0) {
		$deduct = "UPDATE `mydb`.`member` SET `QtyWheel` = `QtyWheel` - $QtyWheel, `QtySpeed` = `QtySpeed` - $QtySpeed, `QtyAqua` = `QtyAqua` - $QtyAqua, `QtyPutt` = `QtyPutt` - $QtyPutt WHERE (`member_ID` = $memberID);";
		$usage = "INSERT INTO attractionusage (memberID, QtySpeed, QtyWheel, QtyAqua, QtyPutt) VALUES ($memberID, $QtySpeed, $QtyWheel, $QtyAqua, $QtyPutt);";
		if ($memberID == 0) {
			echo '<script>alert("Please log in before making purchases")</script>';
		} else {
			try {
				mysqli_query($conn, $deduct);
				mysqli_query($conn, $usage);
				header("Location:attractions.php?purchase=success");
			} catch (Exception $e) {
				header("Location:attractions.php?purchase=failure");
			}
		}
	} else {
		header("Location:attractions.php?purchase=empty");
	}
}

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "Decon_0213";
$dbName = "mydb";
    
$connProfile = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (!$connProfile) {
        die("Connection failed: " . mysqli_connect_error());
    }
// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $connProfile->prepare('SELECT QtyWheel, QtySpeed, QtyAqua, QtyPutt FROM member WHERE member_ID = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($QtyWheel, $QtySpeed, $QtyAqua, $QtyPutt);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Attractions</title>
		<link href="Profile_Member.css" rel="stylesheet" type="text/css">
		<link href="attractions.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Petaluma Themepark</h1>
				<a href="Home_Page.php"><i class="fas fa-home"></i>Home</a>
				<a href="attractions.php">Attractions</a>
				<a href="Ticket_Booth.php">Ticket Booth</a>
				<?php if (!isset($_SESSION['loggedin'])) { ?>
					<a href="Login_Member.php">Member Login/Register</a>
				<?php } ?>
				<?php if (isset($_SESSION['loggedin'])) { ?> 
					<a href="getParking.php">Get Parking</a>
					<a href="Profile_Member.php"><i class="fas fa-user-circle"></i>Profile</a>
					<a href="Logout_Member.php"><i class="fas fa-address-book"></i>Logout</a>
				<?php } ?>
			</div>
		</nav>
		<div class="content">
			<h2>Logged in as <?=$_SESSION['name']?></h2>
			<form action="attractions.php" method="post">
				<div class="container" id=div1>
					<img src="aqua.webp">
					<input type="text" class="inp" name="QtyAqua" value=<?=$QtyAqua?> placeholder="Water ride (<?=$QtyAqua?>)" required>
				</div>
				<div class="container" id=div2>
					<img src="ferris.webp">
					<input type="text" class="inp" name="QtyWheel" value=<?=$QtyWheel?> placeholder="Ferris Wheel (<?=$QtyWheel?>)" required>
				</div>
				<div class="container" id=div1>
					<img src="speed.webp">
					<input type="text" class="inp" name="QtySpeed" value=<?=$QtySpeed?> placeholder="Speedway (<?=$QtySpeed?>)" required>
				</div>
				<div class="container" id=div2>
					<img src="putt.webp">
					<input type="text" class="inp" name="QtyPutt" value=<?=$QtyPutt?> placeholder="Mini Golf (<?=$QtyPutt?>)" required>
				</div>
				<div class="content">
					<div class="container">
						<button type="submit" class="btn" name="submit">Spend Tickets</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>