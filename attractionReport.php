<link rel="stylesheet" type="text/css" href="revenueReport.css">
<nav class="navtop">
        <div>
            <h1>Petaluma Themepark</h1>
            <a href="Admin_Portal.html"><i class="fas fa-home"></i>Home</a>
            <a href="read_Maintenance.php"><i class="fas fa-address-book"></i>Maintenances</a>
            <a href="Parking_report.php"><i class="fas fa-address-book"></i>Parking Report</a>
            <a href="Logout_Admin.php"><i class="fas fa-address-book"></i>Logout</a>
        </div>
    </nav>


<?php
function numVisitorsPerAttraction($ride_name){

	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "Decon_0213";
	$dbName = "mydb";
		
	$connTwo = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	if (!$connTwo) {
		die("Connection failed: " . mysqli_connect_error());
	}	

	$name = "";
	if($ride_name == "500"){
		$name = "QtyWheel"; 
	}
	else if($ride_name == "501"){
		$name = "QtySpeed"; 
	}
	else if($ride_name == "502"){
		$name = "QtyAqua"; 
	}
	else if($ride_name == "503"){
		$name = "QtyPutt";
	}

	$numVisitSQL = "SELECT SUM($name) as totalQtyWheel from ticket_booth";
	$resultnumVisitSQL = $connTwo->query($numVisitSQL);
	

	if ($resultnumVisitSQL != false && $resultnumVisitSQL->num_rows > 0)
	{	
		while($row = $resultnumVisitSQL->fetch_assoc()){
			return $row['totalQtyWheel'];
		}
		
	}	


}

function numMaintenance($ride_name){

	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "Decon_0213";
	$dbName = "mydb";
		
	$connThree = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	if (!$connThree) {
		die("Connection failed: " . mysqli_connect_error());
	}	

	$totalMainSQL = "SELECT attractionID, COUNT(*) AS totalMain FROM maintenance WHERE attractionID = $ride_name GROUP BY attractionID";
	$totalMainResult = $connThree->query($totalMainSQL); 
	

	if ($totalMainResult != false && $totalMainResult->num_rows > 0)
	{	
		while($row = $totalMainResult->fetch_assoc()){
			return $row['totalMain'];
		}
		
	}
	

}
function allVisitorsPerAttraction($ride_name){

	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "Decon_0213";
	$dbName = "mydb";
		
	$connFive = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	if (!$connFive) {
		die("Connection failed: " . mysqli_connect_error());
	}	
	
	$name = "";
	if($ride_name == "500"){
		$name = "QtyWheel"; 
	}
	else if($ride_name == "501"){
		$name = "QtySpeed"; 
	}
	else if($ride_name == "502"){
		$name = "QtyAqua"; 
	}
	else if($ride_name == "503"){
		$name = "QtyPutt";
	}
	
	$visitorPerAttractionSQL = "SELECT $name AS name, purchase_date from ticket_booth";
	$visitorSQLResult = $connFive->query($visitorPerAttractionSQL); 	

	echo "<h1 style='text-align:center'>All Visitors" . "</h1>";
	echo "<table border='1'>";
  	echo "<thead>";
  	echo "<tr>";
  	echo "<th>Purchase Date</th>";
  	echo "<th>Quantity</th>";
	echo "</tr>";
 	echo "</thead>";
  	echo "<tbody>";

	if($visitorSQLResult != false && $visitorSQLResult->num_rows > 0){
		while ($row = $visitorSQLResult->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $row['purchase_date'] . "</td>";
			echo "<td>" . $row['name'] . "</td>";	
			echo "</tr>";
		}
		  echo "</tbody>";
		  echo "</table>";
	

	}
	else{
		echo "No data available"; 
	}
	
	$connFive->close(); 	
}



function maintenancePerAttraction($ride_name){

	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "Decon_0213";
	$dbName = "mydb";
		
	$connFour = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	if (!$connFour) {
		die("Connection failed: " . mysqli_connect_error());
	}		

	$mainPerAttractionSQL = "SELECT maintenance_name, maintenance_description, maintenance_start_time, maintenance_end_time FROM maintenance WHERE attractionID = '$ride_name'";
	$mainSQLResult = $connFour->query($mainPerAttractionSQL); 

	$name = "";
	if($ride_name == "500"){
		$name = "Petaluma Wheel"; 
	}
	else if($ride_name == "501"){
		$name = "Petaluma Speedway"; 
	}
	else if($ride_name == "502"){
		$name = "Petaluma Aqua"; 
	}
	else if($ride_name == "503"){
		$name = "Petaluma Putt-Putt";
	}

	echo "<h2 style='text-align:center'>Attraction Report for: " . $name.  "</h2>";
	echo "<h1 style='text-align:center'>All Maintenances".  "</h1>";
	echo "<table border='1'>";
  	echo "<thead>";
  	echo "<tr>";
  	echo "<th>Maintenance Name</th>";
  	echo "<th>Maintenance Description</th>";
  	echo "<th>Maintenance Start Time</th>";
	echo "<th>Maintenance End Time</th>";
	echo "</tr>";
 	echo "</thead>";
  	echo "<tbody>";
	if($mainSQLResult->num_rows > 0){
		while ($row = $mainSQLResult->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $row['maintenance_name'] . "</td>";
			echo "<td>" . $row['maintenance_description'] . "</td>";
			echo "<td>" . $row['maintenance_start_time'] . "</td>";
			echo "<td>" . $row['maintenance_end_time'] . "</td>";
			echo "</tr>";
		}
		  echo "</tbody>";
		  echo "</table>";
	}
	else{
		echo "No data Available"; 
	}
	

	$connFour->close(); 	
}
?>


<?php	
	
	// Calls the 'numVisitorPerAttraction' function
	if(isset($_POST['ride-name'])){
		$ride_name = $_POST['ride-name'];
		$numVisitors = numVisitorsPerAttraction($ride_name);
		$numMaintenance = numMaintenance($ride_name);

		maintenancePerAttraction($ride_name);
		allVisitorsPerAttraction($ride_name);

		echo "<h1 style='text-align:center'>Total Visitors & Maintenances for this ride " .  "</h1>";
		echo "<table>";
 	 	echo "<thead>";
  		echo "<tr>";
  		echo "<th>Total Visitors</th>";
  		echo "<th>Total Maintenance</th>";
  		echo "</tr>";
  		echo "</thead>";
  		echo "<tbody>";
		echo "<td>" . $numVisitors . "</td>";
		echo "<td>" . $numMaintenance . "</td>";
		echo "</tbody>";
  		echo "</table>";
		
	}
	
?>




