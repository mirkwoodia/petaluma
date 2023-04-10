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
		
		
		
		$array = array("Petaluma Wheel" => $wheelResult, "Petaluma Speed"=> $speedResult, "Petaluma Aqua"=> $aquaResult, "Petaluma Putt"=> $puttResult);
				
		echo "Revenue per Attraction". "</br>";
		foreach($array as $first => $val){			
			echo "Ride: " . $first . " Total Revenue: $" . implode(" ",$val). "</br>";
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
		?>

		<h4 align ="center" style = "color:blue">Gift Shop Sales Report </h4>
		<hr>
		<div class = "row">
			<table class= "gift-shop-rev table-bordered" width="100%" border="0" style="padding-left:40px">
			<thead>
				<tr>
					<th>Purchase Date</th>
					<th>Total Revenue</th>
				</tr>
			</thead>

		<?php
		// Creates the SQL query to find the sum of 'total_revenue' values for any given start/end dates
		$sql = "SELECT order_date as date, OrderDetails.price, OrderDetails.quantity from Orders 
				join OrderDetails on OrderDetails.order_detail_ID = OrdersID where date BETWEEN '$start_date' AND '$end_date' group by date";
		// Executes the SQL query
		$result = $conn->query($sql);		 

		if($result != false && $result->num_rows > 0){			
			while($row = mysqli_fetch_array($result)){
				?>
				<tbody>
					<tr>
						<td><?php echo $row['purchase date'];?></td>
						<td><?php echo $total = $row['price'] * $row['quantity'];?></td>
			</tr>
			<?php 
			$totalGiftShopRev += $total; 
			
			}
			?>
			<tr>
				<td colspan="2" align = "center"> Total </td>
				<td><?php echo $totalGiftShopRev . " is the total gift shop revenue.";?></td>
		</tr>
		</table>

		<?php } 
		else {
			echo "No results found"; 
		}
		
		// Closes the SQL connection
		$conn->close();
		
		// TODO: Find the 'n' most profitable gift shops and return them as a list.
	
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





