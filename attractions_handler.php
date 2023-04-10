<?php
    include_once 'sqlConnect.php';
    session_start();

		$memberID = $_SESSION['id'];
		$QtyWheel = $_POST['QtyWheel'];
    $QtySpeed = $_POST['QtySpeed'];
    $QtyAqua = $_POST['QtyAqua'];
    $QtyPutt = $_POST['QtyPutt'];

		$deduct = "UPDATE `mydb`.`member` SET `QtyWheel` = `QtyWheel` - $QtyWheel, `QtySpeed` = `QtySpeed` - $QtySpeed, `QtyAqua` = `QtyAqua` - $QtyAqua, `QtyPutt` = `QtyPutt` - $QtyPutt WHERE (`member_ID` = $memberID);";
		mysqli_query($conn, $deduct);

		$usage = "INSERT INTO attractionusage (memberID, QtySpeed, QtyWheel, QtyAqua, QtyPutt) VALUES ($memberID, $QtySpeed, $QtyWheel, $QtyAqua, $QtyPutt);";
		mysqli_query($conn, $usage);

		//search bar will show this message if the insert is successful
    header("Location:attractions.php?purchase=success");
	?>