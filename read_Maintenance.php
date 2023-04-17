<?php
include 'CRUD_function.php';
if ($_SESSION['type'] != "admin") {
    header('Location: Login_Admin.php');
    exit;
}
// Connect to MySQL database
$pdo = pdo_connect_mysql();

// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Number of records to show on each page
$records_per_page = 5;

// Prepare the SQL statement and get records from our maintenance table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM maintenance ORDER BY maintenance_ID LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

// Fetch the records so we can display them in our template.
$maintenances = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of maintenance, this is so we can determine whether there should be a next and previous button
$num_maintenances = $pdo->query('SELECT COUNT(*) FROM maintenance')->fetchColumn();
?>

<?=template_header('View Maintenance')?>

<div class="content read">
	<h2>View Maintenance</h2>
	<a href="create_Maintenance.php" class="create-contact">Create New Maintenance Order</a>
	<table>
        <thead>
            <tr>
                <td>Maintenance ID</td>
                <td>Maintenance Description</td>
                <td>Maintenance Start Time</td>
                <td>Maintenance End Time</td> 
                <td>Attraction ID</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($maintenances as $maintenance): ?>
            <tr>
                <td><?=$maintenance['maintenance_ID']?></td>
                <td><?=$maintenance['maintenance_name']?></td>
                <td><?=$maintenance['maintenance_description']?></td>
                <td><?=$maintenance['maintenance_start_time']?></td>
                <td><?=$maintenance['maintenance_end_time']?></td>
                <td><?=$maintenance['attractionID']?></td>
                <td class="actions">
                    <a href="update_Maintenance.php?id=<?=$maintenance['maintenance_ID']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete_Maintenance.php?id=<?=$maintenance['maintenance_ID']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read_Maintenance.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_maintenances): ?>
		<a href="read_Maintenance.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>
