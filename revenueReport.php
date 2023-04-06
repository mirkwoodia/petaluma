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
		
		// TODO: This function will eventually pull out the amount of tickets each ride sold and multiply each of these amounts by the cost of the respective ticket.
		// 		 Not quite sure how to write this query yet...

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
