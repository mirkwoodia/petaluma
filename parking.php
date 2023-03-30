<?php 
$dbServername ="localhost"; 
$dbUsername = "root"; 
$dbpassword = "Decon_0213"; 
$dbname = "mydb"; 

$conn = mysqli_connect($dbServername, $dbUsername, $dbpassword, $dbname);



if (isset($_POST['close_parking'])) {
    $parking_id = $_POST['parking_id'];
    $close_time = time() + 5;
    $q = "UPDATE parking SET expiration_time = $close_time WHERE parking_ID = $parking_id";
    mysqli_query($dbc, $q);
    
    echo "Close time: " . date('Y-m-d H:i:s', $close_time) . "<br>";
    echo "Parking ID: " . $parking_id . "<br>";
    
    header("Location: ".$_SERVER['PHP_SELF']);
    die();
}

?>