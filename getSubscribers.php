<?php
include 'db_connect.php';
$sql = "SELECT * FROM subscribers";
$result = $conn->query($sql);
$subscribers = array();
while($row = $result->fetch_assoc()) {
    $subscribers[] = $row;
}
$conn->close();
?>