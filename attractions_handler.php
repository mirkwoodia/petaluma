<?php
    include_once 'sqlConnect.php';
    session_start();

	$memberID = $_SESSION['id'];
	$QtyWheel = $_POST['QtyWheel'];
    $QtySpeed = $_POST['QtySpeed'];
    $QtyAqua = $_POST['QtyAqua'];
    $QtyPutt = $_POST['QtyPutt'];

	// $stmt = $conn->prepare('UPDATE `mydb`.`member` SET `QtyWheel` = `QtyWheel` - ?, `QtySpeed` = `QtySpeed` - ?, `QtyAqua` = `QtyAqua` - ?, `QtyPutt` = `QtyPutt` - ? WHERE (`member_ID` = ?);');
	// $stmt->bind_param('iiiii', $QtyWheel, $QtySpeed, $QtyAqua, $QtyPutt, $memberID);
	// try {
	// 	$stmt->execute();
	// } catch (Exception $e) {
	// 	echo '<script>alert("test")</script>';
	// 	header("Location:attractions.php?purchase=failure");
	// } finally {
	// 	$stmt->close();
	// }
	

	// $stmt2 = $conn->prepare('INSERT INTO attractionusage (memberID, QtySpeed, QtyWheel, QtyAqua, QtyPutt) VALUES (?, ?, ?,?, ?);');
	// $stmt2->bind_param('iiiii', $memberID, $QtySpeed, $QtyWheel, $QtyAqua, $QtyPutt);
	// try { 
	// 	$stmt2->execute();
	// } catch (Exception $e) {
	// 	echo '<script>alert("test2")</script>';
	// 	header("Location:attractions.php?purchase=failure");
	// } finally {
	// 	$stmt2->close();
	// }

	if (($QtyAqua + $QtyPutt + $QtySpeed + $QtyWheel) > 0) {
		$deduct = "UPDATE `mydb`.`member` SET `QtyWheel` = `QtyWheel` - $QtyWheel, `QtySpeed` = `QtySpeed` - $QtySpeed, `QtyAqua` = `QtyAqua` - $QtyAqua, `QtyPutt` = `QtyPutt` - $QtyPutt WHERE (`member_ID` = $memberID);";
		$usage = "INSERT INTO attractionusage (memberID, QtySpeed, QtyWheel, QtyAqua, QtyPutt) VALUES ($memberID, $QtySpeed, $QtyWheel, $QtyAqua, $QtyPutt);";
		try {
			mysqli_query($conn, $deduct);
			mysqli_query($conn, $usage);
			header("Location:attractions.php?purchase=success");
		} catch (Exception $e) {
			header("Location:attractions.php?purchase=failure");
		}
	} else {
		header("Location:attractions.php?purchase=empty");
	}
	
?>