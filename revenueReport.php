<link rel="stylesheet" type="text/css" href="revenuereport.css">
<nav class="navtop">
        <div>
            <h1>Petaluma Themepark</h1>
            <a href="Home_Page.php"><i class="fas fa-home"></i>Home</a>
            <a href="read_Maintenance.php"><i class="fas fa-address-book"></i>Maintenances</a>
            <a href="Parking_report.php"><i class="fas fa-address-book"></i>Parking Report</a>
            <a href="Logout_Admin.php"><i class="fas fa-address-book"></i>Logout</a>
        </div>
    </nav>
	<?php

// Function for finding the total ride ticket revenue between any two given dates
function findTotalTicketRevenue($start_date, $end_date)
{
	
	// Database details
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "Decon_0213";
	$dbName = "mydb";
	
	// Connects to the database and checks for connection error
	$connOne = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	if (!$connOne)
	{
		die("Connection failed: " . mysqli_connect_error());
	}	

	// Creates the SQL query to find the sum of 'ticket_total' values for any given start/end dates		
	$sql = "SELECT SUM(ticket_total) AS total, purchase_date AS date FROM ticket_booth WHERE purchase_date BETWEEN '$start_date' AND '$end_date' GROUP BY date";
	
	// Executes the SQL query
	$result = $connOne->query($sql);
	$totalRevenue = 0.00; 
	echo "<h1 style='text-align:center'>Total Ticket Revenue from: " . $start_date . " to ". $end_date.  "</h1>";
	echo "<table border='1'><br />";
	echo "<tr>";
	echo "<th>Date</th>";
	echo "<th>Total Revenue</th>";
	echo "</tr>";
	echo "<tr>";
	// Checks if the query returned any results
	if ($result != false && $result->num_rows > 0)
	{	
		
		// Outputs the sum of the 'ticket_total' values
		while($row = mysqli_fetch_array($result))
		{
			
			echo "<td>" . $row['date'] . "</td>";				
			echo "<td>" . "$".$row['total'] ."</td>";
			echo "</tr>";
				 
			$totalRevenue += $row['total'];
			
		}		
		
		echo "</table>";
		echo 'Total ticket sales between ' . $start_date . ' and ' . $end_date . ': $' . $totalRevenue . "</br>";
	
	}
	
	// Runs if no valid values were found
	else
	{		
		echo 'No results found';		
	}		
	
	// Closes the SQL connection
	$connOne->close();
	
}

function attractionRevenue($start_date, $end_date)
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
	
	// Queries the total amount of tickets for each ride and multiplies by the price of each ticket to get total revenue of each ride
	$wheelSql = "SELECT SUM(QtyWheel) * 10.25 AS totalQtyWheel FROM ticket_booth WHERE purchase_date BETWEEN '$start_date' AND '$end_date'";
	$speedSql = "SELECT SUM(QtySpeed) * 25.50 AS totalQtySpeed FROM ticket_booth  WHERE purchase_date BETWEEN '$start_date' AND '$end_date'";
	$aquaSql = "SELECT SUM(QtyAqua) * 20.00  AS totalQtyAqua FROM ticket_booth WHERE purchase_date BETWEEN '$start_date' AND '$end_date'";
	$puttSql = "SELECT SUM(QtyPutt) * 30.50  AS totalQtyPutt FROM ticket_booth WHERE purchase_date BETWEEN '$start_date' AND '$end_date'";
	
	// Makes query for the wheel ride
	$wheel= $connTwo->query($wheelSql);
	$wheelResult = $wheel->fetch_assoc();		
	
	// Makes query for the speed ride
	$speed = $connTwo->query($speedSql);
	$speedResult = $speed->fetch_assoc();	

	// Makes query for the aqua ride
	$aqua = $connTwo->query($aquaSql);
	$aquaResult = $aqua->fetch_assoc();	

		// Makes query for the putt ride
		$putt = $connTwo->query($puttSql);
		$puttResult = $putt->fetch_assoc();	
		
		if($wheel->num_rows > 0 || $speed->num_rows >0 || $aqua->num_rows > 0 || $putt->num_rows >0){
			$array = array("Petaluma Wheel" => $wheelResult, "Petaluma Speed"=> $speedResult, "Petaluma Aqua"=> $aquaResult, "Petaluma Putt"=> $puttResult);

		echo "<h1 style='text-align:center'>Revenue per Attraction from: " . $start_date . " to ". $end_date.  "</h1>";
		echo "<table border='1'><br />";
		echo "<tr>";
		echo "<th>Ride Name</th>";
		echo "<th>Total Revenue</th>";
		echo "</tr>";
		echo "<tr>";
				
		
		foreach($array as $first => $val){			
			echo "<td>" . $first . "</td>";
			echo "<td>" .  "$" . implode(" ",$val). "</td>";
			echo "</tr>";
		}		
		echo "</table>";
		}

		else{
			echo 'No results found';
		}
		
		
		
		$connTwo->close();	
	}

// Function for finding the revenue of the gift shop
function findGiftShopRevenue($start_date, $end_date)
{
	
	// Database details
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "Decon_0213";
	$dbName = "mydb";
	
	// Connects to the database and checks for connection error
	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	if (!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	
	// Creates the SQL query to find the sum of 'total_revenue' values for any given start/end dates
	$sql = "SELECT order_date, OrderDetails.price AS price, OrderDetails.quantity AS quantity FROM Orders, OrderDetails WHERE order_date BETWEEN $start_date AND $end_date";
	// Executes the SQL query
	$result = $conn->query($sql);	
	
	$totalGiftShopRev = 0.00;
	$total = 0.00;

		echo "<h1 style='text-align:center'>GiftShop Revenue from: " . $start_date . " to ". $end_date.  "</h1>";
		echo "<table border='1'><br />";
		echo "<tr>";
		echo "<th>Date</th>";
		echo "<th>Total Revenue</th>";
		echo "</tr>";
		echo "<tr>";

	if($result->num_rows > 0){			
		while($row = mysqli_fetch_array($result)){
	
			echo "<td>". $row['order_date'] . "</td>";
			$total = $row['price'] * $row['quantity'];
			echo "<td>" . $total . "</td>";
			echo "</tr>";
			$totalGiftShopRev += $total; 
		
		}
		echo "</table>";
		
		echo $totalGiftShopRev . " is the total gift shop revenue.";
	
	}
	

	else {
		echo "No results found"; 
	}
	
	// Closes the SQL connection
	$conn->close();
	
	

}


?>

<?php
// Start login process
//session_start();

// Retrieves the start date and end date from 'revenueReport.html'
$start_date = $_POST['start-date'];
$end_date = $_POST['end-date'];

// Calls the 'findTotalTicketRevenue' function
findTotalTicketRevenue($start_date, $end_date);

// Calls the 'findMostProfitableRides' function
attractionRevenue($start_date, $end_date);

// Calls the 'findGiftShopRevenue' function 
findGiftShopRevenue($start_date, $end_date);



?>





