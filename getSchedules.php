<?php
include 'db_connect.php';
$sql = "SELECT * FROM schedules";
$result = $conn->query($sql);
$schedules = array();
while($row = $result->fetch_assoc()) {
    $schedules[] = $row;
}
$conn->close();
?>