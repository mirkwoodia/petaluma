<?php
include 'CRUD_function.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact ID exists
if (isset($_GET['id'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM maintenance WHERE maintenance_ID = ?');
    $stmt->execute([$_GET['id']]);
    $maintenance = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$maintenance) {
        exit('Maintenance doesn\'t exist with that ID!');
    }
    // Make sure the user confirms before deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM maintenance WHERE maintenance_ID = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the maintenance!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: read_Maintenance.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Delete Maintenance')?>

<div class="delete maintenance">
	<h2>Delete Maintenance #<?=$maintenance['maintenance_ID']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete maintenance #<?=$maintenance['maintenance_ID']?>?</p>
    <div class="yesno">
        <a href="delete_Maintenance.php?id=<?=$maintenance['maintenance_ID']?>&confirm=yes">Yes</a>
        <a href="delete_Maintenance.php?id=<?=$maintenance['maintenance_ID']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>