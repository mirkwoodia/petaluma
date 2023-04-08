<?php
include 'config.php';

// Handle parking update
if(isset($_POST['update_parking'])){
  $low = $_POST['low'];
  $medium = $_POST['medium'];
  $high = $_POST['high'];
  
  $stmt = $conn->prepare("UPDATE parking SET used=?, free=?, total=? WHERE type=?");
  $stmt->bind_param("iiis", $used, $free, $total, $type);
  
  $used = $low['used'];
  $free = $low['free'];
  $total = $low['total'];
  $type = 'low';
  $stmt->execute();
  
  $used = $medium['used'];
  $free = $medium['free'];
  $total = $medium['total'];
  $type = 'medium';
  $stmt->execute();
  
  $used = $high['used'];
  $free = $high['free'];
  $total = $high['total'];
  $type = 'high';
  $stmt->execute();
  
  echo "Parking data updated successfully";
}

// Handle total update
if(isset($_POST['update_total'])){
  $total = $_POST['total'];
  
  $stmt = $conn->prepare("UPDATE total SET value=? WHERE type=?");
  $stmt->bind_param("is", $value, $type);
  
  $value = $total;
  $type = 'total';
  
  $stmt->execute();
  
  echo "Total data updated successfully";
}

$conn->close();
?>