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
	$sql = "SELECT ticket_ID AS id, SUM(ticket_total) AS total, QtyWheel AS wheel, QtySpeed AS speed, QtyAqua AS aqua, QtyPutt AS putt, purchase_date AS date 
		FROM ticket_booth 
		WHERE purchase_date BETWEEN '$start_date' AND '$end_date' GROUP BY id";
	
	// Executes the SQL query
	$result = $connOne->query($sql);
	$totalRevenue = 0.00; 
	
	// Prints table
	echo "<h1 style='text-align:center'>Total Ticket Revenue From: " . $start_date . " to ". $end_date.  "</h1>";
	echo "<table border='1'><br />";
	echo "<tr>";
	echo "<th>Date</th>";
	echo "<th>Quantity Wheel ($10.25)</th>";
	echo "<th>Quantity Speed ($25.50)</th>";
	echo "<th>Quantity Aqua ($20.00)</th>";
	echo "<th>Quantity Putt ($30.50)</th>";
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
			echo "<td>" .$row['wheel'] ."</td>";
			echo "<td>" . $row['speed'] ."</td>";
			echo "<td>" . $row['aqua'] ."</td>";
			echo "<td>" . $row['putt'] ."</td>";
			echo "<td>" . "$".$row['total'] ."</td>";
			echo "</tr>";
				 
			$totalRevenue += $row['total'];
			
		}		
		
		echo "</table>";
		echo "<h4 style='text-align:center'>Total Ticket Sales Between: " . $start_date . " and " . $end_date . ": $" . $totalRevenue . "</h1>". "</br>";
	
	}
	
	// Runs if no valid values were found
	else
	{		
		echo 'No results found';		
	}		
	
	// Closes the SQL connection
	$connOne->close();
	
}

// Function for finding the amount of revenue per attraction
function attractionRevenueDetails($start_date, $end_date)
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
	
	// Queries the total amount of tickets for each ride and multiplies by the price of each ticket to get total revenue of each ride
	$wheelSql = "SELECT SUM(QtyWheel) AS wheelQ, SUM(QtyWheel) * 10.25 AS totalQtyWheel, attraction.attraction_price AS price, attraction.attraction_name AS name 
		     FROM ticket_booth, attraction 
		     WHERE purchase_date BETWEEN '$start_date' AND '$end_date' AND attraction_ID = 500";
	
	$speedSql = "SELECT SUM(QtySpeed) AS speedQ, SUM(QtySpeed) * 25.50 AS totalQtySpeed, attraction.attraction_price AS price, attraction.attraction_name AS name 
		     FROM ticket_booth, attraction 
		     WHERE purchase_date BETWEEN '$start_date' AND '$end_date' AND attraction_ID = 501";
	
	$aquaSql = "SELECT SUM(QtyAqua) AS aquaQ, SUM(QtyAqua) * 20.00 AS totalQtyAqua, attraction.attraction_price AS price, attraction.attraction_name AS name 
		    FROM ticket_booth, attraction 
		    WHERE purchase_date BETWEEN '$start_date' AND '$end_date' AND attraction_ID = 502";
	
	$puttSql = "SELECT SUM(QtyPutt) AS puttQ, SUM(QtyPutt) * 30.50 AS totalQtyPutt, attraction.attraction_price AS price, attraction.attraction_name AS name 
		    FROM ticket_booth, attraction 
		    WHERE purchase_date BETWEEN '$start_date' AND '$end_date' AND attraction_ID = 503";
	
	// Prints table
	echo "<h1 style='text-align:center'>Revenue Details Per Attraction From: " . $start_date . " to ". $end_date.  "</h1>";
	echo "<table border='1'>";
  	echo "<thead>";
  	echo "<tr>";
  	echo "<th>Attraction Name</th>";
  	echo "<th>Attraction Price</th>";
  	echo "<th>Attraction Quantity</th>";
	echo "<th>Attraction Total Revenue</th>";
	echo "</tr>";
 	echo "</thead>";
  	echo "<tbody>";


	// Makes query for the wheel ride
	$wheel= $connThree->query($wheelSql);
	$speed = $connThree->query($speedSql);
	$aqua = $connThree->query($aquaSql);
	$putt = $connThree->query($puttSql);

	// Runs if a result is found
	if($wheel->num_rows > 0 || $speed->num_rows > 0 || $aqua->num_rows > 0 || $putt->num_rows > 0)
	{
		
		// Populates the ferris wheel row
		while ($row = $wheel->fetch_assoc())
		{
			
			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . "$". $row['price'] . "</td>";
			echo "<td>" . $row['wheelQ'] . "</td>";
			echo "<td>" . "$" . $row['totalQtyWheel'] . "</td>";
			echo "</tr>";
			
		}

		// Populates the speedway row
		while ($row = $speed->fetch_assoc())
		{
			
			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . "$". $row['price'] . "</td>";
			echo "<td>" . $row['speedQ'] . "</td>";
			echo "<td>" . "$". $row['totalQtySpeed'] . "</td>";
			echo "</tr>";
			
		}

		// Populates the aqua row
		while ($row = $aqua->fetch_assoc())
		{
			
			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . "$". $row['price'] . "</td>";
			echo "<td>" . $row['aquaQ'] . "</td>";
			echo "<td>" . "$". $row['totalQtyAqua'] . "</td>";
			echo "</tr>";
			
		}

		// Populates the putt-putt row
		while ($row = $putt->fetch_assoc())
		{
			
			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . "$". $row['price'] . "</td>";
			echo "<td>" . $row['puttQ'] . "</td>";
			echo "<td>" . "$". $row['totalQtyPutt'] . "</td>";
			echo "</tr>";
			
		}

		echo "</tbody>";
		echo "</table>";
		 
	}
	
	// Runs if no result is found
	else
	{	
		echo 'No results found';
	}
		
	// Closes the SQL connection
	$connThree->close();
	
}

// Function for finding the revenue of each attraction in the park
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
	$wheelSql = "SELECT SUM(QtyWheel) * 10.25 AS totalQtyWheel 
		     FROM ticket_booth 
		     WHERE purchase_date BETWEEN '$start_date' AND '$end_date'";
	
	$speedSql = "SELECT SUM(QtySpeed) * 25.50 AS totalQtySpeed 
		     FROM ticket_booth  
		     WHERE purchase_date BETWEEN '$start_date' AND '$end_date'";
	
	$aquaSql = "SELECT SUM(QtyAqua) * 20.00  AS totalQtyAqua 
		    FROM ticket_booth 
		    WHERE purchase_date BETWEEN '$start_date' AND '$end_date'";
	
	$puttSql = "SELECT SUM(QtyPutt) * 30.50  AS totalQtyPutt 
		    FROM ticket_booth 
		    WHERE purchase_date BETWEEN '$start_date' AND '$end_date'";
	
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
	
	// Runs if a result is found
	if($wheel->num_rows > 0 || $speed->num_rows > 0 || $aqua->num_rows > 0 || $putt->num_rows > 0)
	{
		
		$array = array("Petaluma Wheel" => $wheelResult, "Petaluma Speed"=> $speedResult, "Petaluma Aqua"=> $aquaResult, "Petaluma Putt"=> $puttResult);

		// Prints table
		echo "<h1 style='text-align:center'>Revenue Per Attraction From: " . $start_date . " to ". $end_date.  "</h1>";
		echo "<table border='1'><br />";
		echo "<tr>";
		echo "<th>Ride Name</th>";
		echo "<th>Total Revenue</th>";
		echo "</tr>";
		echo "<tr>";		
		
		foreach($array as $first => $val)
		{	
			
			echo "<td>" . $first . "</td>";
			echo "<td>" .  "$" . implode(" ",$val). "</td>";
			echo "</tr>";
			
		}
		
		echo "</table>";
		
	}

	// Runs if no result is found
	else
	{	
		echo 'No results found';
	}
	
	// Closes the SQL connection
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
	$connFour = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	
	if (!$connFour)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	
	// Creates the SQL query to find the sum of the gift shop values for any given start/end dates		
	$sql = "SELECT order_date, orderdetails.price AS price , orderdetails.quantity AS quantity 
		FROM orders, orderdetails 
		WHERE order_date BETWEEN '$start_date' AND '$end_date'";
	
	// Executes the SQL query
	$result = $connFour->query($sql);
	$totalRevenue = 0.00; 
	$total = 0.00;
	
	// Prints table
	echo "<h1 style='text-align:center'>Total Gift Shop Revenue From: " . $start_date . " to ". $end_date.  "</h1>";
	echo "<table border='1'><br />";
	echo "<tr>";
	echo "<th>Date</th>";
	echo "<th>Quantity</th>";
	echo "<th>Price</th>";
	echo "<th>Total Revenue</th>";
	echo "</tr>";
	echo "<tr>";
	
	// Checks if the query returned any results
	if ($result != false && $result->num_rows > 0)
	{	
	
		// Outputs the sum of the 'ticket_total' values
		while($row = mysqli_fetch_array($result))
		{
		
			echo "<td>" . $row['order_date'] . "</td>";
			echo "<td>" . $row['quantity'] . "</td>";
			echo "<td>" . $row['price'] . "</td>";
			$total = $row['quantity'] * $row['price'];		
			echo "<td>" . "$". $total ."</td>";
			echo "</tr>";
			 
			$totalRevenue += $total;
		
		}		
	
	echo "</table>";
	echo "<h4 style='text-align:center'>Total Sales Between: " . $start_date . " and " . $end_date . ": $" . $totalRevenue . "</h4>"."</br>";

	}

	// Runs if no valid values were found
	else
	{		
		echo 'No results found';		
	}		

	// Closes the SQL connection
	$connFour->close();

}

?>

<?php

// Start login process

// Retrieves the start date and end date from 'revenueReport.html'
$start_date = $_POST['start-date'];
$end_date = $_POST['end-date'];

// Calls the 'findTotalTicketRevenue' function
findTotalTicketRevenue($start_date, $end_date);

// Calls the 'attractionRevenueDetails' function
attractionRevenueDetails($start_date, $end_date);

// Calls the 'findMostProfitableRides' function
//attractionRevenue($start_date, $end_date);

// Calls the 'findGiftShopRevenue' function 
findGiftShopRevenue($start_date, $end_date);

?>
