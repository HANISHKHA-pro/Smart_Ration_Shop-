<?php
include 'db_connect.php';
$sql = "SELECT * FROM announcements";
$result = $conn->query($sql);
$announcements = array();
while($row = $result->fetch_assoc()) {
    $announcements[] = $row;
}
$conn->close();
?>