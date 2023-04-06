<?php
include 'CRUD_function.php';
$pdo = pdo_connect_mysql();
$msg = '';

// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['maintenance_ID']) && !empty($_POST['maintenance_ID']) && $_POST['maintenance_ID'] != 'auto' ? $_POST['maintenance_ID'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $name = isset($_POST['maintenance_name']) ? $_POST['maintenance_name'] : '';
    $description = isset($_POST['maintenance_description']) ? $_POST['maintenance_description'] : '';
    $start = isset($_POST['maintenance_start_time']) ? $_POST['maintenance_start_time'] : date('Y-m-d H:i:s');
    $end = isset($_POST['maintenance_end_time']) ? $_POST['maintenance_end_time'] : date('Y-m-d H:i:s');    
    $attractionID = isset($_POST['attractionID']) && !empty($_POST['attractionID']) ? $_POST['attractionID'] : NULL;

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO maintenance VALUES (?,?, ?, ?, ?, ?)');
    $stmt->execute([$id, $name, $description, $start, $end, $attractionID]);
    // Output message
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create New Maintenance')?>

<div class="content update">
	<h2>Create New Maintenance</h2>
    <form action="create_Maintenance.php" method="post"> 

        <label for="maintenance_ID">Maintenance ID</label>      
        <label for="maintenance_name">Maintenance Name</label>
        <input type="text" name="maintenance_ID" placeholder="200" value="auto" id="maintenance_ID">   
        <input type="text" name="maintenance_name" placeholder="Enter Name:" id="maintenance_name">

        <label for="maintenance_description">Maintenance Description</label>
        <label for="attractionID">Attraction ID</label>
        <input type="text" name="maintenance_description" placeholder="Enter Description:" id="maintenance_description">        
        <input type="text" name="attractionID" placeholder="Enter Attraction ID" id="attractionID">   

        <label for="maintenance_start_time">Created</label>
        <label for="maintenance_end_time">Finished</label>
        <input type="datetime-local" name="maintenance_start_time" placeholder="Enter Start Date & Time:" id="maintenance_start_time">
        <input type="datetime-local" name="maintenance_end_time" placeholder="Enter End Date & Time:" id="maintenance_end_time">
            
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>