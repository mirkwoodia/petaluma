<link rel="stylesheet" type="text/css" href="revenueReport.css">
<nav class="navtop">
    <div>
        <h1>Petaluma Themepark</h1>
        <a href="Home_Page.php"><i class="fas fa-home"></i>Home</a>
    </div>
</nav>
<?php
$servername = "localhost";
$username = "root";
$password = "Decon_0213";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: Login_Member.html');
	exit;
}

$member_id = $_SESSION['id'];
$sql = "SELECT * FROM member WHERE member_ID = '$member_id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
  echo "Error: member with ID $member_id does not exist";
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $parking_lot = $_POST['parking_lot'];
  $license_plate = $_POST['license_plate'];

  $sql = "SELECT * FROM get_parking_pass WHERE member_ID = '$member_id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "Error: member with ID $member_id already has a parking pass";
    exit;
  }

  $start_time = date('Y-m-d H:i:s');
  $end_time = date('Y-m-d H:i:s', strtotime('+50 seconds', time()));
  $duration = strtotime($end_time) - strtotime($start_time);

  $sql = "INSERT INTO get_parking_pass (member_ID, parking_lot, license_plate, start_time, end_time, duration, date_issued) VALUES ('$member_id', '$parking_lot', '$license_plate', NOW(), '$end_time', '$duration', NOW())";

  if ($conn->query($sql) === TRUE) {
    echo "Parking pass assigned successfully!";
    
    echo "Your parking pass is valid for $duration seconds.";

  } else {
    echo "Error assigning parking pass: " . $conn->error;
  }
}
?>

<style>
  form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    max-width: 400px;
    margin: 0 auto;
    margin-top:100px;
  }
</style>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="parking_lot">Select a parking lot:</label>
  <select id="parking_lot" name="parking_lot">
    <option value="Lot A">Lot A</option>
    <option value="Lot B">Lot B</option>
    <option value="Lot C">Lot C</option>
    <option value="Lot D">Lot D</option>
  </select>
  <br><br>
  <label for="license_plate">Enter your license plate:</label>
  <input type="text" id="license_plate" name="license_plate" required>
  <br><br>
  <input type="submit" value="Submit">
</form>

<?php
$conn->close();
?>