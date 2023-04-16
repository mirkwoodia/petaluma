<?php 
$dbServername = "localhost";
$dbUsername = "root";
$dbpassword = "Decon_0213";
$dbname = "mydb";

$dbc = mysqli_connect($dbServername, $dbUsername, $dbpassword, $dbname);

if (!$dbc) {
    die('Error connecting to database: ' . mysqli_connect_error());
}


$q = "SELECT * FROM parking_slots";
$r = mysqli_query($dbc, $q);

if (!$r) {
    die('Error executing query: ' . mysqli_error($dbc));
}

$q = "SELECT ps.*, gpp.member_ID 
      FROM parking_slots ps 
      LEFT JOIN get_parking_pass gpp ON ps.lot_name = gpp.parking_lot";
$r = mysqli_query($dbc, $q);

if (!$r) {
    die('Error executing query: ' . mysqli_error($dbc));
}

?>
