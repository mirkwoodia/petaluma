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
	
		// Checks if the query returned any results
		if ($result != false && $result->num_rows > 0)
		{	
			
			// Outputs the sum of the 'ticket_total' values
			while($row = mysqli_fetch_array($result))
			{
				
				echo "Date". "  " . $row['date'] . "  ". "Total Revenue" . "  " . "$".$row['total'];
				echo "</br>"; 	
				$totalRevenue += $row['total'];
				
			}		

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

	// Function for finding the most profitable rides in the park
	function findMostProfitableRides($start_date, $end_date)
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

		// Finds the most profitable ride
		$array = array("Petaluma Wheel" => $wheelResult, "Petaluma Speed"=>$speedResult, "Petaluma Aqua"=>$aquaResult, "Petaluma Putt"=>$puttResult);
		
		// Sorts the rides
		asort($array);		
		//$mostProfitableKey = " "; 
		foreach($array as $first => $val)
		{			
			echo "Ride: " . $first . " Total Revenue: $" . implode(" ",$val). "</br>";
		}	
		
		$mostProfitableValue = max(array_values($array)); 
		$mostProfitableKey = array_search($mostProfitableValue, $array); 
		echo $mostProfitableKey." is the most profitable Ride." . "</br>";
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
		$sql = "SELECT SUM(total_revenue) AS total FROM giftshop WHERE revenue_date BETWEEN '$start_date' AND '$end_date'";
		
		// Executes the SQL query
		$result = $conn->query($sql);
		
		// Checks if the query returned any results
		if ($result->num_rows > 0)
		{
		
			// Outputs the sum of the 'ticket_total' values
			while($row = $result->fetch_assoc())
			{
				echo 'Total gift shop sales between ' . $start_date . ' and ' . $end_date . ': $' . $row['total'];
			}
		
		}
		
		// Runs if no valid values were found
		else
		{
			echo 'No results found';
		}
		
		// Closes the SQL connection
		$conn->close();
		
		// TODO: Find the 'n' most profitable gift shops and return them as a list.
	
	}

	/*
	// Function for finding the revenue of the parking lot(s)
	function findParkingRevenue($start_date, $end_date)
	{
		
		$dbServername = "localhost";
		$dbUsername = "root";
		$dbPassword = "Decon_0213";
		$dbName = "mydb";
		
		$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
		if (!$conn)
		{
			die("Connection failed: " . mysqli_connect_error());
		}
		
		// Creates the SQL query to find the total number of parking spaces in the park
		$sql = "SELECT total_parking_space FROM parking";
		
		// Executes the SQL query
		$totalSpots = $conn->query($sql);
		
		// Creates the SQL query to find the total number of available parking spaces in the park
		$sql = "SELECT available_slots FROM parking";
		
		// Executes the SQL query
		$availableSpots = $conn->query($sql);
		
		// Finds the total amount of taken spots (i.e. paid spots)
		$paidSpots = totalSpots - availableSpots;
		
		// Creates the SQL query to find the parking rate per spot
		$sql = "SELECT parking_rate FROM parking";
		
		// Executes the SQL query
		$availableSpots = $conn->query($sql);
		
		// Calculates the total revenue of the parking lot
		$totalParkingRevenue = $paidSpots * $availableSpots;
		
		// Outputs the total revenue of the parking lot
		echo 'Total parking revenue is: ' . $totalParkingRevenue;

	}
	*/
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
	findMostProfitableRides($start_date, $end_date);
	
	// Calls the 'findGiftShopRevenue' function 
	findGiftShopRevenue($start_date, $end_date);
	
	// Calls the 'findParkingRevenue' function
	//findParkingRevenue($start_date, $end_date)
	
?>





