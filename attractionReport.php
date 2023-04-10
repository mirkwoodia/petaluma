
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

	
//query specific rides 

	if($ride_name == "Wheel"){
		$wheel = "SELECT SUM(QtyWheel) as totalQtyWheel from ticket_booth";
		$wheelResult = $connTwo->query($wheel);
		$rowWheel = $wheelResult->fetch_assoc();
		if($wheelResult != false && $wheelResult->num_rows > 0){
		
			return $rowWheel['totalQtyWheel'];
			
		}
	}


	else if($ride_name == "Speed"){
		$speed = "SELECT SUM(QtySpeed) as totalQtySpeed from ticket_booth";
		$speedResult = $connTwo->query($speed);
		$rowSpeed = $speedResult->fetch_assoc();
		if($speedResult != false && $speedResult->num_rows > 0){

			return $rowSpeed['totalQtySpeed'];		
  			
		}
	}


	else if($ride_name == "Aqua"){
		$aqua = "SELECT SUM(QtyAqua) as totalQtyAqua from ticket_booth";		
		$aquaResult = $connTwo->query($aqua);
		$rowAqua = $aquaResult->fetch_assoc();
		if($aquaResult != false && $aquaResult->num_rows > 0){
		
			return $rowAqua['totalQtyAqua'];

		}
	}


	else if($ride_name == "Putt"){
		$putt = "SELECT SUM(QtyPutt) as totalQtyPutt from ticket_booth";
		$puttResult = $connTwo->query($putt);
		$rowPutt = $puttResult->fetch_assoc();
		if($puttResult != false && $puttResult->num_rows > 0){

			return $rowPutt['totalQtyPutt'];	

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
	if($ride_name == "Wheel"){
		$wheel = "SELECT attractionID, COUNT(*) AS wheelMain FROM maintenance WHERE attractionID = 500 GROUP BY attractionID";
		$wheelResult = $connThree->query($wheel);
		$rowWheel = $wheelResult->fetch_assoc();
		if($wheelResult != false && $wheelResult->num_rows > 0){
		
			return $rowWheel['wheelMain'];
			
		}
	}
	else if($ride_name == "Speed"){
		$speed = "SELECT attractionID, COUNT(*) AS speedMain FROM maintenance WHERE attractionID = 501 GROUP BY attractionID";
		$speedResult = $connThree->query($speed);
		$rowSpeed = $speedResult->fetch_assoc();
		if($speedResult != false && $speedResult->num_rows > 0){

			return $rowSpeed['speedMain'];		
  			
		}
	}
	else if($ride_name == "Aqua"){
		$aqua = "SELECT attractionID, COUNT(*) AS aquaMain FROM maintenance WHERE attractionID = 502 GROUP BY attractionID";
		$aquaResult = $connThree->query($aqua);
		$rowAqua = $aquaResult->fetch_assoc();
		if($aquaResult != false && $aquaResult->num_rows > 0){
		
			return $rowAqua['aquaMain'];

		}

	}
	else if($ride_name == "Putt"){
		$putt = "SELECT attractionID, COUNT(*) AS puttMain FROM maintenance WHERE attractionID = 503 GROUP BY attractionID";
		$puttResult = $connThree->query($putt);
		$rowPutt = $puttResult->fetch_assoc();
		if($puttResult != false && $puttResult->num_rows > 0){

			return $rowPutt['puttMain'];	

		}
	}


}



?>


<?php	
	$ride_name = $_POST['ride-name'];
	
	// Calls the 'numVisitorPerAttraction' function
	if(isset($ride_name)){
		$numVisitors = numVisitorsPerAttraction($ride_name);
		//echo $numVisitors;
	}
	
	// Calls the 'numMaintenance' function
	if(isset($ride_name)){
		$numMaintenance = numMaintenance($ride_name);;
		//echo $numMaintenance;
	} 
	
	

	
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="attractionReport.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Attraction Report</title>
</head>
<body>
	<?echo $numVisitors ?>
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

	<table>
		<thead>
		<tr>
			<td>Ride Name</td>
			<td>Number of Visitors</td>
			<td>Number of Maintenances</td>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td><?= $ride_name ?></td>
			<td><?= $numVisitors ?></td>
			<td><?= $numVisitors ?></td>
	
		</tr>
		
		</tbody>
	</table>
		<input type="submit" value="Generate Report">
	</form>
</body>
</html>

