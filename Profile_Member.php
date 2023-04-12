<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: Login_Member.html');
	exit;
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
$stmt = $connProfile->prepare('SELECT first_name, last_name, username, email_address, join_date, QtyWheel, QtySpeed, QtyAqua, QtyPutt FROM member WHERE member_ID = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $username, $email_address, $join_date, $QtyWheel, $QtySpeed, $QtyAqua, $QtyPutt);
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
            <a href="Home_Page.php"><i class="fas fa-home"></i>Home</a>
            <a href="Admin_Portal.html"><i class="fas fa-address-book"></i>More</a>
            <a href="Logout_Admin.php"><i class="fas fa-address-book"></i>Logout</a>
        </div>
    </nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
                    <tr>
						<td>First Name:</td>
						<td><?=$first_name?></td>
					</tr>
                    <tr>
						<td>Last Name:</td>
						<td><?=$last_name?></td>
					</tr>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					
					<tr>
						<td>Email:</td>
						<td><?=$email_address?></td>
					</tr>                    
          <tr>
						<td>Join Date:</td>
						<td><?=$join_date?></td>
					</tr>
					<tr>
						<td>Ferris Wheel:</td>
						<td><?=$QtyWheel?></td>
					</tr>
					<tr>
						<td>Speedway:</td>
						<td><?=$QtySpeed?></td>
					</tr>
					<tr>
						<td>Water ride:</td>
						<td><?=$QtyAqua?></td>
					</tr>
					<tr>
						<td>Mini Golf:</td>
						<td><?=$QtyPutt?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>