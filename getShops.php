<?php
include 'db_connect.php';

$sql = "SELECT * FROM Ration_Shop_Details";
$result = $conn->query($sql);

$shops = array();

while($row = $result->fetch_assoc()) {
    $shops[] = $row;
}

echo json_encode($shops);

$conn->close();
?>
<html>