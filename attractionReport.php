<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="attractionReport.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Attraction Report</title>
</head>
<body>
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
                      <option value="Speed"> Petaluma Speed </option>
                      <option value="Aqua"> Petaluma Aqua </option>  
					  <option value="Putt"> Petaluma Putt-Putt </option>                  
                 </select>
              </TD>        
          </TR>
          </div>


		<br>

		<input type="submit" value="Generate Report">
	</form>
</body>
</html>

<?
function totalEmployees($ride_name){

}

function numVisitorsPerAttraction($ride_name){

}

function numMaintenance($ride_name){

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

