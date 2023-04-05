<?php
include 'CRUD_function.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['maintenance_id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert

        $name = isset($_POST['maintenance_name']) ? $_POST['maintenance_name'] : '';
        $description = isset($_POST['maintenance_description']) ? $_POST['maintenance_description'] : '';
        $start = isset($_POST['maintenance_start_time']) ? $_POST['maintenance_start_time'] : date('Y-m-d H:i:s');
        $end = isset($_POST['maintenance_end_time']) ? $_POST['maintenance_end_time'] : date('Y-m-d H:i:s');    
        $parkNO = isset($_POST['parkNO']) ? $_POST['parkNO'] : 1;
        // Update the record
        $stmt = $pdo->prepare('UPDATE maintenance SET maintenance_name = ?, maintenance_description = ?, maintenance_start_time = ?, maintenance_end_time = ?, parkNO = ? WHERE maintenance_ID = ?');
        $stmt->execute([$name, $description, $start, $end, $parkNO, $_GET['maintenance_ID']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM maintenance WHERE maintenance_ID = ?');
    $stmt->execute([$_GET['maintenance_ID']]);
    $maintenance = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$maintenance) {
        exit('Maintenance doesn\'t exist with that maintenance_ID!');
    }
} else {
    exit('No maintenance_ID specified!');
}
?>