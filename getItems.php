<?php
include 'db_connect.php';
$sql = "SELECT * FROM item_availability";
$result = $conn->query($sql);
$items = array();
while($row = $result->fetch_assoc()) {
    $items[] = $row;
}
$conn->close();
?>