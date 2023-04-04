<?php
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "Decon_0213";
    $dbName = "mydb";
    
    $connEmployee = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (!$connEmployee) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (!isset($_POST['first_name'], $_POST['middle_initial'], $_POST['last_name'], $_POST['email'], $_POST['phone_number'], $_POST['username'], 
    $_POST['password'], $_POST['SSN'], $_POST['birthdate'], $_POST['address'], $_POST['gender'], $_POST['salary'], $_POST['department_number'])) {
        // Could not get the data that should have been sent.
        exit('Please complete the registration form!');
    }
    // Make sure the submitted registration values are not empty.
    if (empty($_POST['first_name']) || empty($_POST['middle_initial']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['phone_number']) || empty($_POST['username']) || 
    empty($_POST['password']) || empty($_POST['SSN']) || empty($_POST['birthdate']) || empty($_POST['address']) || empty($_POST['gender']) || empty($_POST['salary']) || empty($_POST['department_number'])){
        // One or more values are empty.
        exit('Please complete the registration form');
    }
//email validation
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        exit('Email is not valid!');
    }
//will only accept alphabetical and numerical characters
    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
        exit('Username is not valid!');
    }
//enforce the password field to be between 5 and 20 characters long.
    if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        exit('Password must be between 5 and 20 characters long!');
    }
 
    // We need to check if the account with that username exists.
    if ($stmt = $connEmployee->prepare('SELECT employee_ID, password FROM employee WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	    $stmt->bind_param('s', $_POST['username']);
	    $stmt->execute();
	    $stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	    if ($stmt->num_rows > 0) {
		// Username already exists
		    echo 'Username exists, please choose another!';
	    } else {	
        // Username doesn't exists, insert new account
            if ($stmt = $connEmployee->prepare('INSERT INTO employee(first_name, minit, last_name, email, phone_number, username, password, ssn, birthdate, address, gender, salary, DNO) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
	    // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	            $stmt->bind_param('sssssssssssii', $_POST['first_name'], $_POST['middle_initial'], $_POST['last_name'], $_POST['email'], $_POST['phone_number'], $_POST['username'], 
                    $password, $_POST['SSN'], $_POST['birthdate'], $_POST['address'], $_POST['gender'], $_POST['salary'], $_POST['department_number']);
	            $stmt->execute();
	            echo 'You have successfully registered! You can now login!';
            } else {
	        // Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
	            echo 'Could not prepare statement!';
            }
	    } 
	    $stmt->close();
    } else {
	// Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
	    echo 'Could not prepare statement!';
}
$connEmployee->close();
?>
