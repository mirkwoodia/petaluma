<?php
$servername = "localhost";
$username = "root";
$password = "Decon_0213";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$member_id = 103;

$sql = "SELECT * FROM member WHERE member_ID = '$member_id'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
  echo "Error: member with ID $member_id does not exist";
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $parking_lot = $_POST['parking_lot'];

  $sql = "SELECT * FROM get_parking_pass WHERE member_ID = '$member_id'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "Error: member with ID $member_id already has a parking pass";
    exit;
  }

  $sql = "INSERT INTO get_parking_pass (member_ID, parking_lot, date_issued) VALUES ('$member_id', '$parking_lot', NOW())";
  if ($conn->query($sql) === TRUE) {
    echo "Parking pass assigned successfully!";
    
}
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="parking_lot">Select a parking lot:</label>
  <select id="parking_lot" name="parking_lot">
    <option value="Lot A">Lot A</option>
    <option value="Lot B">Lot B</option>
    <option value="Lot C">Lot C</option>
    <option value="Lot D">Lot D</option>
  </select>
  <br><br>
  <input type="submit" value="Submit">
</form>

<?php
$conn->close();
?>
