<?php
include 'CRUD_function.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $maintenance_ID = isset($_POST['maintenance_ID']) ? $_POST['maintenance_ID'] : NULL;
        $maintenance_name = isset($_POST['maintenance_name']) ? $_POST['maintenance_name'] : '';
        $maintenance_description = isset($_POST['maintenance_description']) ? $_POST['maintenance_description'] : '';
        $maintenance_start_time = isset($_POST['maintenance_start_date']) ? $_POST['maintenance_start_date'] : date('Y-m-d H:i:s');
        $maintenance_end_time = isset($_POST['maintenance_end_date']) ? $_POST['maintenance_end_date'] : date('Y-m-d H:i:s');
        $parkNO = isset($_POST['parkNO']) ? $_POST['parkNO'] : NULL;
        // Update the record
        $stmt = $pdo->prepare('UPDATE maintenance SET maintenance_ID = ?, maintenance_name = ?, maintenance_description = ?, maintenance_start_time = ?, maintenance_end_time = ?, parkNO = ? WHERE maintenance_id = ?');
        $stmt->execute([$maintenance_ID, $maintenance_name, $maintenance_description, $maintenance_start_time, $maintenance_end_time, $parkNO, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM maintenance WHERE maintenance_ID = ?');
    $stmt->execute([$_GET['id']]);
    $maintenance = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$maintenance) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('View Maintenance')?>

<div class="content update">
	<h2>Update Maintenance #<?=$maintenance['maintenance_ID']?></h2>
    <form action="update_maintenance.php?id=<?=$maintenance['maintenance_ID']?>" method="post">
    <label for="maintenance_ID">Maintenance ID</label>      
        <label for="maintenance_name">Maintenance Name</label>
        <input type="text" name="maintenance_ID" placeholder="200" value="<?=$maintenance['maintenance_ID']?>" id="maintenance_ID">   
        <input type="text" name="maintenance_name" placeholder="Enter Name:" value="<?=$maintenance['maintenance_name']?>" id="maintenance_name">

        <label for="maintenance_description">Maintenance Description</label>
        <label for="parkNO">Park ID</label>
        <input type="text" name="maintenance_description" placeholder="Enter Description:" value="<?=$maintenance['maintenance_description']?>" id="maintenance_description">        
        <input type="text" name="parkNO" placeholder="Enter Park ID" value="<?=$maintenance['parkNO']?>" id="parkNO">   

        <label for="maintenance_start_time">Created</label>
        <label for="maintenance_end_time">Finished</label>
        <input type="datetime-local" name="maintenance_start_time" value="<?=date('Y-m-d\TH:i', strtotime($maintenance['maintenance_start_time']))?>" id="maintenance_start_time">
        <input type="datetime-local" name="maintenance_end_time" value="<?=date('Y-m-d\TH:i', strtotime($maintenance['maintenance_end_time']))?>" id="maintenance_end_time">

        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>