<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="attractionReport.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Attraction Report</title>
</head>
<body>
	<nav class="navtop">
		<div>
			<h1>Petaluma Themepark</h1>
		</div>
	</nav>
	<div class= content>
	<h1>Attraction Report</h1>
	<form method="post" action="attractionReport.php">
		<label for="ride-name">Choose A Ride to Report:</label>
		<div class="form-group">      
            <TR>
              <TD class = "select"> Ride        
              </TD>   
              <TD ALIGN="center">
                 <select id="ride-name" name="ride-name">        
                      <option value="Wheel"> Petaluma Wheel </option>
                      <option value="Speed"> Petaluma Speedway </option>
                      <option value="Aqua"> Petaluma Aqua </option>  
					  <option value="Putt"> Petaluma Putt-Putt </option>                  
                 </select>
              </TD>        
          </TR>
          </div>
	</div>


		<br>

		<input type="submit" value="Generate Report">
	</form>
</body>
</html>

<?php
function totalEmployees($ride_name){


}

function numVisitorsPerAttraction($ride_name){

	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "Decon_0213";
	$dbName = "mydb";
		
	$connTwo = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	if (!$connTwo) {
		die("Connection failed: " . mysqli_connect_error());
	}	


//query specific rides 
	if($ride_name == "Petaluma Wheel"){
		$wheel = "SELECT SUM(QtyWheel) as totalQtyWheel from ticket_booth";
		$wheelResult = $connTwo->query($wheel);
		$rowWheel = $wheelResult->fetch_assoc();
		if($wheelResult != false && $wheelResult->num_rows > 0){

 
  			echo "<td>". $rowWheel['totalQtyWheel'] . "</td>";
 
		}
	}

	if($ride_name == "Petaluma Speedway"){
		$speed = "SELECT SUM(QtySpeed) as totalQtySpeed from ticket_booth";
		$speedResult = $connTwo->query($speed);
		$rowSpeed = $speedResult->fetch_assoc();
		if($speedResult != false && $speedResult->num_rows > 0){


  			echo "<td>" . $rowSpeed['totalQtySpeed'] . "</td>";
  			
		}
	}

	if($ride_name == "Petaluma Aqua"){
		$aqua = "SELECT SUM(QtyAqua) as totalQtyAqua from ticket_booth";		
		$aquaResult = $connTwo->query($aqua);
		$rowAqua = $aquaResult->fetch_assoc();
		if($aquaResult != false && $aquaResult->num_rows > 0){
		

  			echo "<td>" . $rowAqua['totalQtyAqua'] . "</td>";


		}
	}

	if($ride_name == "Petaluma Putt-Putt"){
		$putt = "SELECT SUM(QtyPutt) as totalQtyPutt from ticket_booth";
		$puttResult = $connTwo->query($putt);
		$rowPutt = $puttResult->fetch_assoc();
		if($puttResult != false && $puttResult->num_rows > 0){
		

  			echo "<td>" . $rowPutt['totalQtyPutt'] . "</td>";


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
//this counts the rows associated with the ride. 
//TODO: fill in database. fix database. 
	if($ride_name == "Petauluma Wheel"){
		$wheelSql = "SELECT attractionID, COUNT(*) FROM maintenance GROUP BY attractionID";
	}

}



?>


<?php
	// Start login process
	//session_start();
	
	// Retrieves the start date and end date from 'revenueReport.html'
	$ride_name = $_POST['ride-name'];
	
	
	// Calls the 'totalEmployee' function to get the total employees per attraction
	totalEmployees($ride_name);
	
	// Calls the 'numVisitorPerAttraction' function
	numVisitorsPerAttraction($ride_name);
	
	// Calls the 'numMaintenance' function 
	numMaintenance($ride_name);
	

	
?>

