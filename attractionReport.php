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

// Function for finding the number of visitors per attraction in the park
function numVisitorsPerAttraction($ride_name)
{

	// Database details
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "Decon_0213";
	$dbName = "mydb";
	
	// Connects to the database and checks for connection error
	$connTwo = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	if (!$connTwo)
	{
		die("Connection failed: " . mysqli_connect_error());
	}	

	// Finds which attraction has been chosen based on the given ID number
	$name = "";
	if ($ride_name == "500")
	{
		$name = "QtyWheel"; 
	}
	
	else if ($ride_name == "501")
	{
		$name = "QtySpeed"; 
	}
	
	else if ($ride_name == "502")
	{
		$name = "QtyAqua"; 
	}
	
	else if ($ride_name == "503")
	{
		$name = "QtyPutt";
	}

	// Creates the SQL query to find the number of visitors
	$numVisitSQL = "SELECT SUM($name) as totalQtyWheel 
			FROM ticket_booth";
	
	// Executes the SQL query
	$resultnumVisitSQL = $connTwo->query($numVisitSQL);
	
	// Runs if a result is found
	if ($resultnumVisitSQL != false && $resultnumVisitSQL->num_rows > 0)
	{	
		
		while($row = $resultnumVisitSQL->fetch_assoc())
		{
			return $row['totalQtyWheel'];
		}
		
	}	
	
	// Runs if no valid values were found
	else
	{		
		echo 'No results found';		
	}

}

// Function for finding the number of maintenance per attraction in the park
function numMaintenance($ride_name)
{
	
	// Database details
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "Decon_0213";
	$dbName = "mydb";
		
	// Connects to the database and checks for connection error
	$connThree = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	if (!$connThree)
	{
		die("Connection failed: " . mysqli_connect_error());
	}	

	// Creates the SQL query to find the maintenance entries for a given attraction
	$totalMainSQL = "SELECT attractionID, COUNT(*) AS totalMain 
			 FROM maintenance 
			 WHERE attractionID = $ride_name 
			 GROUP BY attractionID";
	
	// Executes the SQL query
	$totalMainResult = $connThree->query($totalMainSQL); 

	// Runs if a result is found
	if ($totalMainResult != false && $totalMainResult->num_rows > 0)
	{	
		
		while($row = $totalMainResult->fetch_assoc())
		{
			return $row['totalMain'];
		}
		
	}
	
	// Runs if no valid values were found
	else
	{		
		echo 'No results found';		
	}
	
}

// Function for finding all of the visitors for a given ride
function allVisitorsPerAttraction($ride_name)
{

	// Database details
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "Decon_0213";
	$dbName = "mydb";
		
	// Connects to the database and checks for connection error
	$connFive = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	if (!$connFive)
	{
		die("Connection failed: " . mysqli_connect_error());
	}	
	
	// Finds which attraction has been chosen based on the given ID number
	$name = "";
	if ($ride_name == "500")
	{
		$name = "QtyWheel"; 
	}
	
	else if ($ride_name == "501")
	{
		$name = "QtySpeed"; 
	}
	
	else if ($ride_name == "502")
	{
		$name = "QtyAqua"; 
	}
	
	else if ($ride_name == "503")
	{
		$name = "QtyPutt";
	}
	
	// Creates the SQL query to find all of the visitors for a given attraction
	$visitorPerAttractionSQL = "SELECT $name AS name, purchase_date 
				    FROM ticket_booth";
	
	// Executes the SQL query
	$visitorSQLResult = $connFive->query($visitorPerAttractionSQL); 	

	// Prints table
	echo "<h1 style='text-align:center'>All Visitors" . "</h1>";
	echo "<table border='1'>";
  	echo "<thead>";
  	echo "<tr>";
  	echo "<th>Purchase Date</th>";
  	echo "<th>Quantity</th>";
	echo "</tr>";
 	echo "</thead>";
  	echo "<tbody>";

	// Runs if a result is found 
	if ($visitorSQLResult != false && $visitorSQLResult->num_rows > 0)
	{
		
		while ($row = $visitorSQLResult->fetch_assoc())
		{
			
			echo "<tr>";
			echo "<td>" . $row['purchase_date'] . "</td>";
			echo "<td>" . $row['name'] . "</td>";	
			echo "</tr>";
			
		}
		
		  echo "</tbody>";
		  echo "</table>";
	
	}
	
	// Runs if no result is found
	else
	{
		echo "No results found"; 
	}
	
	// Closes the SQL connection
	$connFive->close();
	
}

// Function for finding all of the maintanence for a given ride
function maintenancePerAttraction($ride_name)
{

	// Database details
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "Decon_0213";
	$dbName = "mydb";
		
	// Connects to the database and checks for connection error
	$connFour = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	if (!$connFour)
	{
		die("Connection failed: " . mysqli_connect_error());
	}		

	// Creates the SQL query to find all of the maintenance for a given attraction
	$mainPerAttractionSQL = "SELECT maintenance_name, maintenance_description, maintenance_start_time, maintenance_end_time 
				 FROM maintenance 
				 WHERE attractionID = '$ride_name'";
	
	// Executes the SQL query
	$mainSQLResult = $connFour->query($mainPerAttractionSQL); 

	// Finds which attraction has been chosen based on the given ID number
	$name = "";
	if ($ride_name == "500")
	{
		$name = "Petaluma Wheel"; 
	}
	
	else if ($ride_name == "501")
	{
		$name = "Petaluma Speedway"; 
	}
	
	else if ($ride_name == "502")
	{
		$name = "Petaluma Aqua"; 
	}
	
	else if ($ride_name == "503")
	{
		$name = "Petaluma Putt-Putt";
	}

	// Prints table
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
	
	// Runs if a result is found
	if($mainSQLResult->num_rows > 0)
	{
		
		while ($row = $mainSQLResult->fetch_assoc())
		{
			
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
	
	// Runs if no valid values were found
	else
	{
		echo "No data Available"; 
	}
	
	// Closes the SQL connection
	$connFour->close();
	
}

?>

<?php	
	
	// Calls the above functions
	if(isset($_POST['ride-name']))
	{
		
		// Retrieves the ride selection
		$ride_name = $_POST['ride-name'];
		
		$numVisitors = numVisitorsPerAttraction($ride_name);
		$numMaintenance = numMaintenance($ride_name);
		
		maintenancePerAttraction($ride_name);
		allVisitorsPerAttraction($ride_name);

		// Prints table
		echo "<h1 style='text-align:center'>Total Visitors and Maintenances for this Ride " .  "</h1>";
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
