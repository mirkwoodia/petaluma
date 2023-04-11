<?php

function pdo_connect_mysql() {
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "Decon_0213";
    $dbName = "mydb";
    try {
    	return new PDO('mysql:host=' . $dbServername . ';dbname=' . $dbName . ';charset=utf8', $dbUsername, $dbPassword);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}

function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>$title</title>
        <link href="CRUD_style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
    <nav class="navtop">
        <div>
            <h1>Petaluma Themepark</h1>
            <a href="Home_Page.php"><i class="fas fa-home"></i>Home</a>
            <a href="read_Maintenance.php"><i class="fas fa-address-book"></i>Maintenances</a>
            <a href="Parking_report.php"><i class="fas fa-address-book"></i>Parking Report</a>
            <a href="attractionUseReport.php"><i class="fas fa-address-book"></i>Attractions Usage Report</a>
            <a href="revenueReport.html"><i class="fas fa-address-book"></i>Revenue Report</a>
            <a href="attractionReport.php"><i class="fas fa-address-book"></i>Attractions Report</a>
            <a href="Logout_Admin.php"><i class="fas fa-address-book"></i>Logout</a>
        </div>
    </nav>
EOT;
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}

?>