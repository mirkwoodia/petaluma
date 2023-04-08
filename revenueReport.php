<?php

	function findTotalTicketRevenue($start_date, $end_date)
	{
		
		// Enter database credentials here
		$servername = 'localhost';
		$username = '';
		$password = '';
		$dbname = '';
		
		// Creates a new SQL connection using above credentials
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Validates the SQL connection
		if ($conn->connect_error)
		{
			die('Connection failed: ' . $conn->connect_error);
		}
		
		// Creates the SQL query to find the sum of 'ticket_total' values for any given start/end dates
		$sql = "SELECT SUM(ticket_total) AS total FROM ticket_booth WHERE purchase_date BETWEEN '$start_date' AND '$end_date'";
		
		// Executes the SQL query
		$result = $conn->query($sql);
		
		// Checks if the query returned any results
		if ($result->num_rows > 0)
		{
		
			// Outputs the sum of the 'ticket_total' values
			while($row = $result->fetch_assoc())
			{
				echo 'Total ticket sales between ' . $start_date . ' and ' . $end_date . ': $' . $row['total'];
			}
		
		}
		
		// Runs if no valid values were found
		else
		{
		
			echo 'No results found';
		
		}
		
		
		// Closes the SQL connection
		$conn->close();

	}
	
	function findMostProfitableRides($start_date, $end_date)
	{
		
		// Enter database credentials here
		$servername = 'localhost';
		$username = '';
		$password = '';
		$dbname = '';
		
		// Creates a new SQL connection using above credentials
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Validates the SQL connection
		if ($conn->connect_error)
		{
			die('Connection failed: ' . $conn->connect_error);
		}
		
		
		//query the total amount of tickets for each ride and multiplies by the price of each ticket to get total revenue of each ride
		$wheel = "SELECT SUM(QtyWheel) * 10 AS totalQtyWheel FROM ticket_booth WHERE purchase_date BETWEEN '$start_date' AND '$end_date'";
		$speed = "SELECT SUM(QtySpeed) * 25 AS totalQtySpeed FROM ticket_booth WHERE purchase_date BETWEEN '$start_date' AND '$end_date'";
		$aqua = "SELECT SUM(QtyAqua) * 20 AS totalQtyAqua FROM ticket_booth WHERE purchase_date BETWEEN '$start_date' AND '$end_date'";
		$putt = "SELECT SUM(QtyPutt) * 30 AS totalQtyPutt FROM ticket_booth WHERE purchase_date BETWEEN '$start_date' AND '$end_date'";
		//if statements to check which ride is most profitable. If two rides are the same total revenue it will print out the two rides
		//if wheel is the most profitiable
		if($wheel >= $speed && $wheel >= $aqua && $wheel >= $putt){
			if($wheel == $speed){
				echo "Petaluma Wheel and Petaluma Speedway are both most profitable rides.";
			}
			else if($wheel == $aqua){
				echo "Petaluma Wheel and Petaluma Aqua are both most profitable rides"; 
			}
			else if($wheel == $putt){
				echo "Petaluma Wheel and Petaluma Putt are both most profitable rides"; 
			}
			else{
				echo "Petaluma Wheel is the most profitable ride.";
			}
		}
		//if speed is the most profitable
		if($speed >= $wheel && $speed >= $aqua && $speed >= $putt){
			if($speed == $wheel){
				echo "Petaluma Speedway and Petaluma Wheel are both most profitable rides.";
			}
			else if($speed == $aqua){
				echo "Petaluma Speed and Petaluma Aqua are both most profitable rides"; 
			}
			else if($speed == $putt){
				echo "Petaluma Speed and Petaluma Putt are both most profitable rides"; 
			}
			else{
				echo "Petaluma Speed is the most profitable ride.";
			}
		}
		//if aqua is most profitable
		if($aqua >= $wheel && $aqua >= $speed && $aqua >= $putt){
			if($aqua == $wheel){
				echo "Petaluma Aqua and Petaluma Wheel are both most profitable rides.";
			}
			else if($aqua == $speed){
				echo "Petaluma Aqua and Petaluma Speed are both most profitable rides"; 
			}
			else if($aqua == $putt){
				echo "Petaluma Aqua and Petaluma Putt are both most profitable rides"; 
			}
			else{
				echo "Petaluma Aqua is the most profitable ride.";
			}
		}
		//if putt is the most profitable 
		if($putt >= $wheel && $putt >= $speed && $putt >= $aqua){
			if($putt == $wheel){
				echo "Petaluma Putt and Petaluma Wheel are both most profitable rides.";
			}
			else if($putt == $speed){
				echo "Petaluma Putt and Petaluma Speed are both most profitable rides"; 
			}
			else if($putt == $aqua){
				echo "Petaluma Putt and Petaluma Aqua are both most profitable rides"; 
			}
			else{
				echo "Petaluma Putt is the most profitable ride.";
			}
		}
	}
	
	function findGiftShopRevenue($start_date, $end_date)
	{
		
		// Enter database credentials here
		$servername = 'localhost';
		$username = '';
		$password = '';
		$dbname = '';
		
		// Creates a new SQL connection using above credentials
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Validates the SQL connection
		if ($conn->connect_error)
		{
			die('Connection failed: ' . $conn->connect_error);
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
	
	function findParkingRevenue($start_date, $end_date)
	{
		
		// Enter database credentials here
		$servername = 'localhost';
		$username = '';
		$password = '';
		$dbname = '';
		
		// Creates a new SQL connection using above credentials
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Validates the SQL connection
		if ($conn->connect_error)
		{
			die('Connection failed: ' . $conn->connect_error);
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
	
	// Start login process
	session_start();
	
	// Retrieves the start date and end date from 'revenueReport.html'
	$start_date = $_POST['start-date'];
	$end_date = $_POST['end-date'];
	
	// Calls the 'findTotalTicketRevenue' function to get the total ticket revenue between the two dates
	findTotalTicketRevenue($start_date, $end_date);
	
	// Calls the 'findMostProfitableRides' function
	findMostProfitableRides($start_date, $end_date);
	
	// Calls the 'findGiftShopRevenue' function 
	findGiftShopRevenue($start_date, $end_date);
	
	// Calls the 'findParkingRevenue' function
	findParkingRevenue($start_date, $end_date)
	
?>
