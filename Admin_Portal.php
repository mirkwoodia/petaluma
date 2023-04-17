<?php

	include 'CRUD_function.php';
	
	session_start();

	// If the user is not logged in redirect to the login page...
	if ($_SESSION['type'] != "admin") {
		header('Location: Login_Admin.php');
		exit;
	}

?>

<?=template_header('Home')?>

<div class="content">
	<h2>Admin Portal</h2>
	<p>You are currently at the admin portal</p>
</div>

<?=template_footer()?>
