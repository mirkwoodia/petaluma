<?php
$servername = "localhost";
$username = "root";
$password = "Decon_0213";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$parking_lot = $_POST['parking_lot'];

$member_id = 112;

$sql = "SELECT * FROM member WHERE member_ID = '$member_id'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
  echo "Error: member with ID $member_id does not exist";
  exit;
}

$sql = "SELECT * FROM Get_Parking_Pass WHERE member_ID = '$member_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "Error: member with ID $member_id already has a parking pass";
  exit;
}

$sql = "INSERT INTO Get_Parking_Pass (member_ID, parking_lot, date_issued) VALUES ('$member_id', '$parking_lot', NOW())";
if ($conn->query($sql) === TRUE) {
  echo "Parking pass assigned successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>